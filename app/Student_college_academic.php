<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_college_academic extends Model
{
    const CREATED_AT = 'studentCollegeAcademicCreatedAt';
    const UPDATED_AT = 'studentCollegeAcademicUpdatedAt';
    protected $primaryKey = "studentCollegeAcademicId";
}
