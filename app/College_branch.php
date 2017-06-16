<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College_branch extends Model
{
    const CREATED_AT = 'collegeBranchCreatedAt';
    const UPDATED_AT = 'collegeBranchUpdatedAt';
    protected $primaryKey = "collegeBranchId";
}
