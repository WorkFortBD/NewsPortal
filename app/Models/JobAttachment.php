<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAttachment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_circular_id',
        'file',
        'extension', 
        'is_downloadable',  
        'deleted_at', 
        'created_by', 
        'updated_by', 
        'deleted_by'
    ];
}
