<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Builder;
class Service
{

    public function applyFilters(Builder $query, array $filters, array $allowedFilters): Builder
    {
        foreach ($filters as $field => $value) {
            if (array_key_exists($field, $allowedFilters)) {
                $type = $allowedFilters[$field];

                switch ($type) {
                    case 'date':
                        if (is_array($value) && isset($value['start'], $value['end'])) {
                            $query = $query->whereBetween($field, [$value['start'] .' 00:00:00', $value['end'] . ' 23:59:59']);
                        }
                        break;

                    case 'range':
                         if (is_array($value) && isset($value['min'], $value['max'])) {
                        $query = $query->whereBetween($field, [$value['min'], $value['max']]);
                    } elseif (is_array($value) && isset($value['min'])) {
                        // Jika hanya ada minimum
                        $query = $query->where($field, '>=', $value['min']);
                    } elseif (is_array($value) && isset($value['max'])) {
                        // Jika hanya ada maximum
                        $query = $query->where($field, '<=', $value['max']);
                    }
                    break;

                    case 'value':
                        if (is_array($value)) {
                            $query = $query->where(function (Builder $q) use ($field, $value) {
                                $firstItem = array_shift($value);
                                $q->where($field, $firstItem); // Mulai dengan WHERE pertama

                                foreach ($value as $item) {
                                    $q->orWhere($field, $item); // Tambahkan OR untuk item berikutnya
                                }
                            });
                        } else {
                            $query->where($field, $value);
                        }
                        break;

                    case 'like':
                        if (is_array($value)) {
                            $query = $query->where(function (Builder $q) use ($field, $value) {
                                foreach ($value as $item) {
                                    $q->orWhere($field, 'LIKE', "%{$item}%");
                                }
                            });
                        } else {
                            $query = $query->where($field, 'LIKE', "%{$value}%");
                        }
                        break;

                    case '>=':
                        $this->applyOperatorFilter($query, $field, $value, '>=');
                        break;

                    case '<=':
                        $this->applyOperatorFilter($query, $field, $value, '<=');
                        break;

                    case '>':
                        $this->applyOperatorFilter($query, $field, $value, '>');
                        break;

                    case '<':
                        $this->applyOperatorFilter($query, $field, $value, '<');
                        break;

                    case '!=':
                        if (is_array($value)) {
                            $query->whereNotIn($field, $value);
                        } else {
                            $query->where($field, '!=', $value);
                        }
                        break;
                }
            }
        }

        return $query;
    }

    private function applyOperatorFilter(Builder $query, string $field, $value, string $operator): void
    {
        if (is_array($value)) {
            $query->where(function (Builder $q) use ($field, $value, $operator) {
                foreach ($value as $item) {
                    $q->orWhere($field, $operator, $item);
                }
            });
        } else {
            $query->where($field, $operator, $value);
        }
    }

    protected function paginate(Builder $query, ?int $perPage = null, ?int $page = null)
    {
        // if paginated
        if ($perPage !== null) {

            $data =  $query->paginate($perPage, ['*'], 'page', $page);

            return [
                'data' => $data->items(),
                'meta' => [
                    'total' => $data->total(),
                    'per_page' => $data->perPage(),
                    'current_page' => $data->currentPage(),
                    'last_page' => $data->lastPage(),
                ]
            ];
        }

        // if not paginated
        $data = $query->get();
        $count = $query->count();

        return [
            'data' => $data,
            'meta' => [
                'total' => $count,
                'per_page' => $count,
                'current_page' => 1,
                'last_page' => 1,
            ]
        ];
    }
}
