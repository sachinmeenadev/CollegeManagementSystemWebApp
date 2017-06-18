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
            $response["message"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertRole(Request $request)
    {
        $data[] = array(
            'roleType' => $request->roleType,
            'roleCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            'roleUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\Role::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function updateRole(Request $request, $id)
    {
        $data = [
            'roleType' => $request->roleType,
            'roleUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        $status = App\Role::where('roleId', $id)->update($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function deleteRole($id)
    {
        $status = App\Role::where('roleId', '=', $id)->delete();
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully deleted";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in deleting. Please try again!";
        }
        return $response;
    }
}
