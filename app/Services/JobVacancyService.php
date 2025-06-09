<?php

namespace App\Services;

use App\Models\JobVacancy;
use App\Models\JobVacancyCategory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobVacancyService
{
    /**
     * Create a new class instance.
     */
    // protected $jobVacancyService;
    // public function __construct(JobVacancyService $jobVacancyService)
    // {
    //     $this->jobVacancyService = $jobVacancyService;
    // }
    public function getAllJobVacancy()
    {
        $jobVacancy = JobVacancy::all();
        return $jobVacancy;
    }
    public function getAllJobVacancyByLoginUser()
    {
        $job = JobVacancy::where('user_id', Auth::user()->id)->get();
        return $job;
    }
    public function getAllJobVacancyCategory()
    {
        $jobVacancyCategory = JobVacancyCategory::all();
        return $jobVacancyCategory;
    }
    public function getJobVacancyById($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        if (!$jobVacancy) {
            return null;
        }
        return $jobVacancy;
    }
    public function createJobVacancy(array $data)
    {
        $documentPath = $data['job_document']->store('job_document', 'public');
        $data['job_document'] = $documentPath;
        $data['user_id'] = Auth::user()->id;
        $jobVacancy = JobVacancy::create($data);
        return $jobVacancy;
    }
}
