<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectMonitoring extends Model
{

    use HasFactory;

    protected $fillable = ['sign', 'status', 'year_of_completion', 'product', 'product_manager', 'product_characteristics'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
