<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cv
 * @package App\Models
 * @version March 28, 2017, 11:09 am UTC
 */
class Cv extends Model
{
    
    public $table = 'cvs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    
    
    public $fillable = [
        'name',
        'json'
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'json' => 'string'
    ];
    
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'json' => 'required'
    ];
    
    
}
