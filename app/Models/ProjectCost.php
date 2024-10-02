<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCost extends Model
{

    use HasFactory;

    protected $fillable = ['pre_project_budget', 'base_budget', 'budget_according_to_passport', 'actual_budget'];
}
