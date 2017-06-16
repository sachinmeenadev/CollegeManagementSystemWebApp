<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    const CREATED_AT = 'tutorCreatedAt';
    const UPDATED_AT = 'tutorUpdatedAt';
    protected $primaryKey = "tutorId";
}
