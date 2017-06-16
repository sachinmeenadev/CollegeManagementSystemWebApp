<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty_member extends Model
{
    const CREATED_AT = 'facultyMemberCreatedAt';
    const UPDATED_AT = 'facultyMemberUpdatedAt';
    protected $primaryKey = "facultyMemberId";
}
