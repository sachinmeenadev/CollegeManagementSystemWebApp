<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_academic extends Model
{
    const CREATED_AT = 'studentAcademicCreatedAt';
    const UPDATED_AT = 'studentAcademicUpdatedAt';
    protected $primaryKey = "studentAcademicId";
}
