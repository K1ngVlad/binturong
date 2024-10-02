<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{

    use HasFactory;

    public function projectCost(): HasOne
    {
        return $this->hasOne(ProjectCost::class);
    }

    public function projectDocument(): HasOne
    {
        return $this->hasOne(ProjectDocument::class);
    }

    public function projectGoal(): HasOne
    {
        return $this->hasOne(ProjectGoal::class);
    }

    public function projectMonitoring(): HasOne
    {
        return $this->hasOne(ProjectMonitoring::class);
    }

    public function projectOrganizationalStructure(): HasOne
    {
        return $this->hasOne(ProjectOrganizationalStructure::class);
    }

    public function projectState(): HasOne
    {
        return $this->hasOne(ProjectState::class);
    }

    public function projectTerm(): HasOne
    {
        return $this->hasOne(ProjectTerm::class);
    }

    protected $fillable = ['in_the_portfolio_of_the_year', 'status', 'code', 'name', 'stage', 'priority', 'post_project_monitoring', 'area_of_activity', 'category', 'program', 'belonging_to_strategy', 'r_g_t', 'short_description', 'dependencies', 'short_name'];
}
