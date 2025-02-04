<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public static array $types = [
        'full-time',
        'part-time',
        'internship',
        'contract',
    ];

    public static array $experiences = [
        'entry',
        'intermediate',
        'senior',
    ];

    public static array $categories = [
        'IT',
        'Sales',
        'Finance',
        'Digital Marketing',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder| QueryBuilder $query, $filters): Builder | QueryBuilder
    {
        return $query
            ->when($filters['search'] ?? null, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orWhereHas('employer', function ($query) use ($search) {
                            $query->where('company_name', 'like', "%$search%");
                        });
                });
            })
            ->when(
                $filters['location'] ?? null,
                fn($query, $location) =>
                $query->where('location', 'like', "%$location%")
            )
            ->when(
                $filters['min_salary'] ?? null,
                fn($query, $minSalary) =>
                $query->where('salary', '>=', $minSalary)
            )
            ->when(
                $filters['max_salary'] ?? null,
                fn($query, $maxSalary) =>
                $query->where('salary', '<=', $maxSalary)
            )
            ->when(
                $filters['experience'] ?? null,
                fn($query, $experience) =>
                $query->where('experience', $experience)
            )
            ->when(
                $filters['job_type'] ?? null,
                fn($query, $jobType) =>
                $query->whereIn('type', $jobType)
            )
            ->when(
                $filters['category'] ?? null,
                fn($query, $category) =>
                $query->where('category', $category)
            );
    }
}
