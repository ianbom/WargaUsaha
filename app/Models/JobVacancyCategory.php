<?php

namespace App\Models;
use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Model;
class JobVacancyCategory extends Model
{
    protected $guarded = ['id'];

    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class);
    }
}
