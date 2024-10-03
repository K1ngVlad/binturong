<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectDocument extends Model
{

    use HasFactory;

    protected $fillable = ['documents_on_the_beginning', 'change_requests', 'documents_on_change_of_status_or_completion'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
