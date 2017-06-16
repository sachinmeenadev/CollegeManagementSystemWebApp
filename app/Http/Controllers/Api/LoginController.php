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
        $data = [
            'userEmail' => $request->userEmail,
            'userPassword' => $request->userPassword,
        ];

        $loginData = App\User::join('roles', 'roleId', '=', 'userRoleId')
            ->select('*')
            ->where($data)
            ->get();

        if (count($loginData) > 0) {
            foreach ($loginData as $data) {
                $response["error"] = FALSE;
                $response["userId"] = $data->userId;
                $response["user"]["userName"] = $data->userName;
                $response["user"]["userEmail"] = $data->userEmail;
                $response["user"]["userRole"] = $data->roleType;
                $response["user"]["userCreatedAt"] = $data->userCreatedAt;;
            }
        } else {
            $response["error"] = TRUE;
            $response["error_msg"] = "Login credentials are wrong. Please try again!";
        }
        return $response;
    }
}