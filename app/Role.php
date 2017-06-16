<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const CREATED_AT = 'roleCreatedAt';
    const UPDATED_AT = 'roleUpdatedAt';
    protected $primaryKey = "roleId";
}
