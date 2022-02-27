<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;

    public const JOB_CONTRACTS = [
        'Part Time',
        'Full Time',
        'Contract',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class);
    }

    public function tools(): BelongsToMany
    {
        return $this->belongsToMany(Tool::class);
    }

    public function scopeActive(Builder $query)
    {
        $query->whereActive(true);
    }

    public function scopeAllRelations(Builder $query)
    {
        $query->with([
            'company:id,name,logo',
            'role:id,name',
            'level:id,name',
            'languages:name',
            'tools:name',
        ])
        ->active();
    }
}
