<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 15-06-2017
 * Time: 11:44 PM
 */

namespace App\Http\Controllers\Api;

use App;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $response = array("error" => FALSE);

        $loginData = App\User::join('roles', 'roleId', '=', 'userRoleId')
            ->select('*')
            ->where('userEmail', '=', $request->userEmail)
            ->get();

        if (count($loginData) > 0) {
            foreach ($loginData as $data) {
                $response["error"] = FALSE;
                $response["userUniqueId"] = $data->userUniqueId;
                $response["user"]["userName"] = $data->userName;
                $response["user"]["userEmail"] = $data->userEmail;
                $response["user"]["userRole"] = $data->roleType;
            }
        } else {
            $response["error"] = TRUE;
            $response["message"] = "No user found. Please try again!";
        }
        return $response;
    }
}