<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobVacancyRequest;
use App\Services\JobApplicantService;
use Illuminate\Http\Request;
use App\Models\JobVacancy;
use App\Models\JobVacancyCategory;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\DB;

class JobApplicantController extends Controller
{
    protected $jobApplicantService;

    public function __construct(JobApplicantService $jobApplicantService)
    {
        $this->jobApplicantService = $jobApplicantService;
    }
    public function index()
    {
        $job_applicant = $this->jobApplicantService->getAllJobApplicantByLoginUser();
        return view('web.employer.job_applicant.index', ['job_applicant' => $job_applicant]);
    }
}
