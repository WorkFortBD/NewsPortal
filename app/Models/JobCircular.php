<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobCircular extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'slug', 
        'description', 
        'is_date_applicable', 
        'start_date', 
        'end_date', 
        'meta_description', 
        'is_active', 
        'deleted_at', 
        'created_by', 
        'updated_by', 
        'deleted_by'
    ];
}
