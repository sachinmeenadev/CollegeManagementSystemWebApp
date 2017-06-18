<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*
    |----------------------------------------------------------------------
    |Admin Panel functions for Mobile Application
    |----------------------------------------------------------------------
    */

    /*
     * Admin Role Panel functions
     */
    public function getRole()
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

    public function insertRole(Request $request)
    {
        $data[] = array(
            'roleType' => $request->roleType,
            'roleCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\Role::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["error_msg"] = "Successfully Registered";
        } else {
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration. Please try again!";
        }
        return $response;
    }
}
