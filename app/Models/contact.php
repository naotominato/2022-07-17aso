<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];

    protected $guarded = ['id'];

    public static $rules = [
        'family_name' => 'required',
        'first_name' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'postcode' => 'required|size:8',
        'address' => 'required',
        'opinion' => 'required|max:120'
    ];
    
}
