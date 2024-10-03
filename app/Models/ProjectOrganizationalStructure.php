<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectOrganizationalStructure extends Model
{

    use HasFactory;

    protected $fillable = ['client', 'mp_i', 'project_manager', 'team_leader', 'business_analyst', 'composition_of_the_uk', 'interested_departments', 'external_persons', 'program_manager', 'a_d_m', 'c_f_o', 'business_lines'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
