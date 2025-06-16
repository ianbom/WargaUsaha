<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobVacancyRequest;
use App\Http\Requests\UpdateJobApplicantStatusRequest;
use App\Models\JobApplication;
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
        $job_applicant = $this->jobApplicantService->getAllJobApplicantFromJobVacancies();
        return view('web.employer.job_applicant.index', ['job_applicant' => $job_applicant]);
    }
    public function show(JobApplication $jobApplicant)
    {
        return view('web.employer.job_applicant.detail', ['jobApplicant' => $jobApplicant]);
    }

    public function update(UpdateJobApplicantStatusRequest $request, $id)
    {
        $status = $request->input('status');
        try {
            JobApplicantService::updateStatus($id, $status);

            return redirect()->back()->with('success', 'Status lamaran berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui status.');
        }
    }
}
