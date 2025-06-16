<?php

namespace App\Services;

use App\Models\JobVacancy;
use App\Models\JobVacancyCategory;
use App\Models\JobApplication;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class JobApplicantService extends Service
{
    /**
     * Create a new class instance.
     */
    public function getAllJobApplicant()
    {
        $jobApplicant = JobApplication::all();
        return $jobApplicant;
    }
    // public function getAllJobVacancyByLoginUser()
    // {
    //     $job = JobVacancy::where('user_id', Auth::user()->id)->get();
    //     return $job;
    // }
    // public function getAllJobVacancyCategory()
    // {
    //     $jobVacancyCategory = JobVacancyCategory::all();
    //     return $jobVacancyCategory;
    // }
    // Di service
    public function getAllMyJobApplicant()
    {
        $userId = Auth::id();
        $jobApplications = JobApplication::with(['jobVacancy.jobCategory'])
            ->where('user_id', $userId)
            ->get();

        return $jobApplications;
    }
    public static function updateStatus($id, $status): void
    {
        $jobApp = JobApplication::findOrFail($id);
        $jobApp->status = $status;
        $jobApp->save();
    }
    public function getAllJobApplicantFromJobVacancy()
    {
        $jobApplications = JobApplication::with(['jobVacancy.jobCategory'])
            ->where('user_id', Auth::id())
            ->get();

        return $jobApplications;
    }
    public function getAllJobApplicantFromJobVacancies()
    {
        $jobApplications = JobApplication::with(['jobVacancy.jobCategory'])
            ->whereHas('jobVacancy', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        return $jobApplications;
    }

    public function getJobApplicantBy($jobId)
    {
        $job = JobApplication::findOrFail($jobId);
        return $job;
    }
    public function getJobVacancyById($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        if (!$jobVacancy) {
            return null;
        }
        return $jobVacancy;
    }
    public function createJobApplicant(array $data)
    {
        $cvPath = $data['cv_document']->store('job_applicant_cv', 'public');
        $portfolioPath = $data['portfolio_document']->store('job_applicant_portfolio', 'public');
        $supportingDocumentPath = isset($data['supporting_document'])
            ? $data['supporting_document']->store('job_applicant_supporting_document', 'public')
            : null;
        $data['cv_document'] = $cvPath;
        $data['portfolio_document'] = $portfolioPath;
        $data['supporting_document'] = $supportingDocumentPath;

        $data['user_id'] = Auth::user()->id;

        $jobApplicant = JobApplication::create($data);
        return $jobApplicant;
    }
    public function updateJobVacancy($jobVacancy, $data)
    {
        if (isset($data['job_document']) && $data['job_document']) {
            if ($jobVacancy->job_document) {
                Storage::delete('public/' . $jobVacancy->job_document);
            }
            $path = $data['job_document']->store('job_document', 'public');
            $data['job_document'] = $path;
        } else {
            unset($data['job_document']);
        }
        $jobVacancy->update($data);
        return $jobVacancy;
    }
    public function queryListJobVacancy(array $filters = [])
    {
        $allowedFilters = [
            'job_vacancies.job_title' => 'like',
            'job_vacancies.job_category_id' => 'value',
            'job_vacancies.salary_min' => '>=',
            'job_vacancies.salary_max' => '<=',
        ];

        $selectColumns = [
            'job_vacancies.*',
            'job_vacancy_categories.category_name as category_name',
        ];

        $query = JobVacancy::select($selectColumns)
            ->join('job_vacancy_categories', 'job_vacancies.job_category_id', '=', 'job_vacancy_categories.id')
            ->orderBy('job_vacancies.id', 'desc');

        $query = $this->applyFilters($query, $filters, $allowedFilters);

        $query->with([
            'jobCategory'
        ]);

        return $query;
    }

    public function getListJobVacancy(array $filters = [], int $perPage = null, int $page = null)
    {

        $query = $this->queryListJobVacancy($filters);

        return $this->paginate($query, $perPage, $page);
    }

    public function buildFilters($request)
    {
        $filters = [];

        if ($request->filled('job_title')) {
            $filters['job_vacancies.job_title'] = $request->input('job_title');
        }

        if ($request->filled('job_category_id')) {
            $filters['job_vacancies.job_category_id'] = $request->input('job_category_id');
        }

        if ($request->filled('salary_min')) {
            // cari pekerjaan dengan salary_max >= salary_min user
            $filters['job_vacancies.salary_max'] = ['>=', $request->input('salary_min')];
        }

        if ($request->filled('salary_max')) {
            // cari pekerjaan dengan salary_min <= salary_max user
            $filters['job_vacancies.salary_min'] = ['<=', $request->input('salary_max')];
        }
        return $filters;
    }
}
