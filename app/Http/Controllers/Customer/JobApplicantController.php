<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Services\JobApplicantService;
use App\Http\Requests\JobApplicationRequest;
use App\Models\JobVacancyCategory;
use Illuminate\Support\Facades\DB;

class JobApplicantController extends Controller
{
    protected $jobApplicantService;

    public function __construct(JobApplicantService $jobApplicantService)
    {
        $this->jobApplicantService = $jobApplicantService;
    }
    // Menampilkan riwayat lowongan yang saya apply
    public function index()
    {
        $job_vacancies = $this->jobApplicantService->getAllMyJobApplicant();
        return view('web.customer.job.index', ['job_vacancies' => $job_vacancies]);
    }
    public function show(JobApplication $jobApply)
    {
        $jobApply->load(['user', 'jobVacancy.jobCategory']);
        return view('web.customer.job.detail', ['job' => $jobApply]);
    }
    public function create()
    {
        return view('web.employer.job.create');
    }
    public function store(JobApplicationRequest $request)
    {
        $data = $request->all();
        // dd($data);
        DB::beginTransaction();
        try {
            $this->jobApplicantService->createJobApplicant($data);
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil Apply Pekerjaan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal apply pekerjaan: ' . $e->getMessage())
                ->withInput();
        }
    }
}
