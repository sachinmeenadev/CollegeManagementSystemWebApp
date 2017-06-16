<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    const CREATED_AT = 'studentCreatedAt';
    const UPDATED_AT = 'studentUpdatedAt';
    protected $primaryKey = "studentId";
}
