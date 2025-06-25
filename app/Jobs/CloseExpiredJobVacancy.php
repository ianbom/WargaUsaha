<?php

namespace App\Jobs;

use App\Models\JobVacancy; // Import model JobVacancy Anda
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CloseExpiredJobVacancy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $jobVacancyId;

    /**
     * Create a new job instance.
     *
     * @param int $jobVacancyId
     * @return void
     */
    public function __construct(int $jobVacancyId)
    {
        $this->jobVacancyId = $jobVacancyId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $jobVacancy = JobVacancy::find($this->jobVacancyId);


        if (
            $jobVacancy &&
            $jobVacancy->job_status !== 'Closed' &&
            $jobVacancy->job_status !== 'Cancelled') {
            try {
                $jobVacancy->job_status = 'Closed';
                $jobVacancy->save();

                Log::info("Job Vacancy ID {$jobVacancy->id} changed status to 'Closed' due to end_date passed.");
            } catch (\Exception $e) {
                Log::error("Failed to close Job Vacancy ID {$jobVacancy->id}: " . $e->getMessage());
            }
        } else {
            Log::info("Job Vacancy ID {$this->jobVacancyId} is not eligible for closure (not found, already closed/cancelled, or end_date not passed).");
        }
    }

    /**
     * Handle a job failure.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(\Throwable $exception): void
    {
        Log::error("CloseExpiredJobVacancy Job failed for Job Vacancy ID {$this->jobVacancyId}: " . $exception->getMessage());
        // Anda bisa menambahkan notifikasi (misal ke Slack atau email admin) di sini
    }
}
