<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobVacancy;
use App\Models\JobVacancyCategory;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    protected $jobVacancyService;
    public function __construct(JobVacancy $jobVacancyService)
    {
        $this->jobVacancyService = $jobVacancyService;
    }
    public function index() {}
    public function show() {}
    public function create()
    {
        $job_categories = JobVacancyCategory::orderBy('category_name', 'asc')->get();
        return view('web.employer.job.create', ['job_categories' => $job_categories]);
    }
}
