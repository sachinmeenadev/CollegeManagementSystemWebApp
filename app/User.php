<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const CREATED_AT = 'userCreatedAt';
    const UPDATED_AT = 'userUpdatedAt';
    protected $primaryKey = "userId";
}
