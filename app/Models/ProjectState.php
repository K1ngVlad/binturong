<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectState extends Model
{

    use HasFactory;

    protected $fillable = ['sales_percentages', 'general_status', 'business_goals', 'terms', 'budget', 'content', 'link_to_report'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
