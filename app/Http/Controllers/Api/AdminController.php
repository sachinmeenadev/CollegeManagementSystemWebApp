<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    public function getRoles()
    {
        $response = array("error" => FALSE);
        $roles = App\Role::get();
        if (count($roles) > 0) {
            $response["error"] = FALSE;
            $response["roles"] = $roles;
        } else {
            $response["error"] = FALSE;
            $response["error_msg"] = "No entry in database";
        }
        return $response;
    }
}
