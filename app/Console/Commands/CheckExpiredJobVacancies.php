<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JobVacancy;
use App\Jobs\CloseExpiredJobVacancy; // Import Job yang sudah dibuat
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CheckExpiredJobVacancies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jobs:check-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks for job vacancies past their end_date and closes them.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->info('Checking for expired job vacancies...');


        $jobVacanciesToClose = JobVacancy::whereIn('job_status', ['Open', 'In-Progress'])
            ->whereDate('end_date', '<', Carbon::today())
            ->get();
        Log::info($jobVacanciesToClose);


        if ($jobVacanciesToClose->isEmpty()) {
            $this->info('No expired job vacancies found.');
            return Command::SUCCESS;
        }

        foreach ($jobVacanciesToClose as $jobVacancy) {
            $this->info("Dispatching job to close Job Vacancy ID: {$jobVacancy->id}");
            // Kirim job ke antrean
            CloseExpiredJobVacancy::dispatch($jobVacancy->id);
        }

        $this->info('Finished checking expired job vacancies.');
        return Command::SUCCESS;
    }
}
