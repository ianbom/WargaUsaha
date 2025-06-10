<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JobVacancy;

class JobApplication extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'job_vacancy_id',
        'user_id',
        'proposed_salary',
        'cv_document',
        'portfolio_document',
        'supporting_document',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function jobVacancy()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }
}
