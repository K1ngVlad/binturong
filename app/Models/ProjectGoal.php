<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectGoal extends Model
{

    use HasFactory;

    protected $fillable = ['project_product', 'business_goals'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
