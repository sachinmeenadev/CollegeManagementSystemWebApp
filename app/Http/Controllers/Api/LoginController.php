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
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $response = array("error" => FALSE);
        $salt = '';
        $encrypted_password = '';

        $loginData = App\User::join('roles', 'roleId', '=', 'userRoleId')
            ->select('*')
            ->where('userEmail', '=', $request->userEmail)
            ->get();

        if (count($loginData) > 0) {
            foreach ($loginData as $data) {
                $salt = $data->userSalt;
                $encrypted_password = $data->userPassword;
            }
            $hash = $this->checkHashSSHA($salt, $request->userPassword);
            if ($encrypted_password == $hash) {
                // user authentication details are correct
                foreach ($loginData as $data) {
                    $response["error"] = FALSE;
                    $response["userUniqueId"] = $data->userUniqueId;
                    $response["user"]["userName"] = $data->userName;
                    $response["user"]["userEmail"] = $data->userEmail;
                    $response["user"]["userRole"] = $data->roleType;
                }
            } else {
                $response["error"] = TRUE;
                $response["message"] = "Login credentials are wrong. Please try again!";
            }
        } else {
            $response["error"] = TRUE;
            $response["message"] = "No user found. Please try again!";
        }
        return $response;
    }

    /**
     * Decrypting password
     * @param salt , password
     * @returns hash string
     */
    public function checkHashSSHA($salt, $password)
    {
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
        return $hash;
    }

    public function register(Request $request)
    {
        $response = array("error" => FALSE);
        $userUniqueId = uniqid('', true);
        $hash = $this->hashSSHA($request->userPassword);
        $userPassword = $hash["encrypted"]; // encrypted password
        $userSalt = $hash["salt"]; // salt
        $data[] = array(
            'userUniqueId' => $userUniqueId,
            'userName' => $request->userName,
            'userEmail' => $request->userEmail,
            'userPassword' => $userPassword,
            'userSalt' => $userSalt,
            'userRoleId' => 1,
            'userCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\User::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Registered";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in registration. Please try again!";
        }
        return $response;
    }

    /**
     * Encrypting password
     * @param password
     * @returns salt and encrypted password
     */
    public function hashSSHA($password)
    {
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
}