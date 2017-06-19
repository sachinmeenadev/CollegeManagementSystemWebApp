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

    /*
     * Admin User Panel functions
     */
    public function getUser()
    {
        $response = array("error" => FALSE);
        $users = App\Role::join('users', 'userRoleId', 'roleId')->get();
        if (count($users) > 0) {
            $response["error"] = FALSE;
            $response["users"] = $users;
        } else {
            $response["message"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertUser(Request $request)
    {
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
            'userRoleId' => $request->userRoleId,
            'userCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            'userUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\User::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
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

    public function updateUser(Request $request, $id)
    {
        /**
         * 1. "0" For User Name & Email
         * 2. "1" For Password
         * 3. "2" For Role
         * 4. "3" For all update
         */
        if ($request->userUpdateStatus == 0) {
            $data = [
                'userName' => $request->userName,
                'userEmail' => $request->userEmail,
                'userUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->userUpdateStatus == 1) {
            $hash = $this->hashSSHA($request->userPassword);
            $userPassword = $hash["encrypted"]; // encrypted password
            $userSalt = $hash["salt"]; // salt
            $data = [
                'userName' => $request->userName,
                'userEmail' => $request->userEmail,
                'userPassword' => $userPassword,
                'userSalt' => $userSalt,
                'userUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->userUpdateStatus == 2) {
            $data = [
                'userName' => $request->userName,
                'userEmail' => $request->userEmail,
                'userRoleId' => $request->userRoleId,
                'userUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->userUpdateStatus == 3) {
            $hash = $this->hashSSHA($request->userPassword);
            $userPassword = $hash["encrypted"]; // encrypted password
            $userSalt = $hash["salt"]; // salt
            $data = [
                'userName' => $request->userName,
                'userEmail' => $request->userEmail,
                'userPassword' => $userPassword,
                'userSalt' => $userSalt,
                'userRoleId' => $request->userRoleId,
                'userUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }
        $status = App\User::where('userId', $id)->update($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function deleteUser($id)
    {
        $status = App\User::where('userId', '=', $id)->delete();
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
