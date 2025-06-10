<?php

namespace App\Models;

use Illuminate\Contracts\Queue\Job;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobVacancyCategory;
use App\Models\JobApplication;
use App\Models\User;

class JobVacancy extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'job_category_id',
        'job_title',
        'job_description',
        'skill_requirement',
        'salary_min',
        'salary_max',
        'start_date',
        'end_date',
        'location_detail',
        'job_document',
        'user_id',
        'status'
    ];
    public function jobCategory()
    {
        return $this->belongsTo(JobVacancyCategory::class, 'job_category_id');
    }
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_vacancy_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
