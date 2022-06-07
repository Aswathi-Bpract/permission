<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    protected $fillable = ['first_name', 'last_name','class','dob','is_ncc'];

    public function getFullNameAttribute()
{
    return ucwords("{$this->first_name} {$this->last_name}");


}

}

