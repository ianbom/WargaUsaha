<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobVacancyRequest;
use App\Services\JobVacancyService;
use Illuminate\Http\Request;
use App\Models\JobVacancy;
use App\Models\JobVacancyCategory;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\DB;

class JobVacancyController extends Controller
{
    protected $jobVacancyService;
    public function __construct(JobVacancyService $jobVacancyService)
    {
        $this->jobVacancyService = $jobVacancyService;
    }
    public function index()
    {
        $job_vacancies = $this->jobVacancyService->getAllJobVacancyByLoginUser();
        return view('web.employer.job.index', ['job_vacancies' => $job_vacancies]);
    }
    public function show() {}
    public function create()
    {
        $job_categories = JobVacancyCategory::orderBy('category_name', 'asc')->get();
        return view('web.employer.job.create', ['job_categories' => $job_categories]);
    }
    public function store(JobVacancyRequest $request)
    {
        $data = $request->all();
        // dd($data);
        DB::beginTransaction();
        try {
            $this->jobVacancyService->createJobVacancy($data);
            DB::commit();
            return redirect()->route('employer.job.index')->with('success', 'Lowongan Pekerjaan baru berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan pekerjaan: ' . $e->getMessage())
                ->withInput();
        }
    }
    public function edit(JobVacancy $job)
    {
        $job_categories = JobVacancyCategory::orderBy('category_name', 'asc')->get();
        return view('web.employer.job.edit', [
            'job' => $job,
            'job_categories' => $job_categories
        ]);
    }
    public function update(JobVacancyRequest $request, JobVacancy $job)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $this->jobVacancyService->updateJobVacancy($job, $data);
            DB::commit();
            return redirect()->route('employer.job.index')->with('success', 'Lowongan Pekerjaan berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui pekerjaan: ' . $e->getMessage())
                ->withInput();
        }
    }
    public function destroy(JobVacancy $job)
    {
        try {
            $job->delete();
            return redirect()->route('employer.job.index')->with('success', 'Lowongan Pekerjaan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pekerjaan: ' . $e->getMessage());
        }
    }
}
