<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTerm extends Model
{

    use HasFactory;

    protected $fillable = ['current_actual_pre_project_terms', 'current_actual_terms', 'basic_terms', 'terms_according_to_passport'];
}
