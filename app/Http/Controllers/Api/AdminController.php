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
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertUser(Request $request)
    {
        $userUniqueId = uniqid('', true);
        $data[] = array(
            'userUniqueId' => $userUniqueId,
            'userName' => $request->userName,
            'userEmail' => $request->userEmail,
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

    public function updateUser(Request $request, $id)
    {
        /**
         * 1. "0" For User Name & Email
         * 2. "1" For Role
         */
        if ($request->userUpdateStatus == 0) {
            $data = [
                'userName' => $request->userName,
                'userEmail' => $request->userEmail,
                'userUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->userUpdateStatus == 1) {
            $data = [
                'userName' => $request->userName,
                'userEmail' => $request->userEmail,
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

    /*
     * Admin College Branch Panel functions
     */
    public function getBranch()
    {
        $response = array("error" => FALSE);
        $branches = App\College_branch::get();
        if (count($branches) > 0) {
            $response["error"] = FALSE;
            $response["branches"] = $branches;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertBranch(Request $request)
    {
        $data[] = array(
            'collegeBranchName' => $request->collegeBranchName,
            'collegeBranchAbbr' => $request->collegeBranchAbbr,
            'collegeBranchCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            'collegeBranchUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\College_branch::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function updateBranch(Request $request, $id)
    {
        $data = [
            'collegeBranchName' => $request->collegeBranchName,
            'collegeBranchAbbr' => $request->collegeBranchAbbr,
            'collegeBranchUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        $status = App\College_branch::where('collegeBranchId', $id)->update($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function deleteBranch($id)
    {
        $status = App\College_branch::where('collegeBranchId', '=', $id)->delete();
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
     * Admin Subject Panel functions
     */
    public function getSubject()
    {
        $response = array("error" => FALSE);
        $subjects = App\Subject::get();
        if (count($subjects) > 0) {
            $response["error"] = FALSE;
            $response["subjects"] = $subjects;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertSubject(Request $request)
    {
        $data[] = array(
            'subjectName' => $request->subjectName,
            'subjectAbbr' => $request->subjectAbbr,
            'subjectCode' => $request->subjectCode,
            'subjectCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            'subjectUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\Subject::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function updateSubject(Request $request, $id)
    {
        $data = [
            'subjectName' => $request->subjectName,
            'subjectAbbr' => $request->subjectAbbr,
            'subjectCode' => $request->subjectCode,
            'subjectUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        $status = App\Subject::where('subjectId', $id)->update($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function deleteSubject($id)
    {
        $status = App\Subject::where('subjectId', '=', $id)->delete();
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
     * Admin Faculty Member Panel functions
     */
    public function getFacultyMember()
    {
        $response = array("error" => FALSE);
        $facultyMember = App\Faculty_member::join('college_branches as parent_branch', 'facultyMemberBranchId', 'parent_branch.collegeBranchId')
            ->leftJoin('college_branches as  current_branch', 'facultyMemberCurrentBranchId', 'current_branch.collegeBranchId')->select('faculty_members.*', 'parent_branch.*', 'current_branch.collegeBranchName as currentBranchName', 'current_branch.collegeBranchAbbr as currentBranchAbbr')->get();
        if (count($facultyMember) > 0) {
            $response["error"] = FALSE;
            $response["facultyMembers"] = $facultyMember;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertFacultyMember(Request $request)
    {
        $data[] = array(
            'facultyMemberName' => $request->facultyMemberName,
            'facultyMemberBranchId' => $request->facultyMemberBranchId,
            'facultyMemberCurrentBranchId' => $request->facultyMemberCurrentBranchId,
            'facultyMemberDesignation' => $request->facultyMemberDesignation,
            'facultyMemberContact' => $request->facultyMemberContact,
            'facultyMemberEmail' => $request->facultyMemberEmail,
            'facultyMemberCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            'facultyMemberUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\Faculty_member::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function updateFacultyMember(Request $request, $id)
    {
        /**
         * 1. "0" Without Branch
         * 2. "1" With Parent Branch
         * 3. "1" With Current Branch
         * 4. "1" With Both Branch
         */

        if ($request->facultyMemberUpdateStatus == 0) {
            $data = [
                'facultyMemberName' => $request->facultyMemberName,
                'facultyMemberDesignation' => $request->facultyMemberDesignation,
                'facultyMemberContact' => $request->facultyMemberContact,
                'facultyMemberEmail' => $request->facultyMemberEmail,
                'facultyMemberUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->facultyMemberUpdateStatus == 1) {
            $data = [
                'facultyMemberName' => $request->facultyMemberName,
                'facultyMemberBranchId' => $request->facultyMemberBranchId,
                'facultyMemberDesignation' => $request->facultyMemberDesignation,
                'facultyMemberContact' => $request->facultyMemberContact,
                'facultyMemberEmail' => $request->facultyMemberEmail,
                'facultyMemberUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->facultyMemberUpdateStatus == 2) {
            $data = [
                'facultyMemberName' => $request->facultyMemberName,
                'facultyMemberCurrentBranchId' => $request->facultyMemberCurrentBranchId,
                'facultyMemberDesignation' => $request->facultyMemberDesignation,
                'facultyMemberContact' => $request->facultyMemberContact,
                'facultyMemberEmail' => $request->facultyMemberEmail,
                'facultyMemberUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->facultyMemberUpdateStatus == 3) {
            $data = [
                'facultyMemberName' => $request->facultyMemberName,
                'facultyMemberBranchId' => $request->facultyMemberBranchId,
                'facultyMemberCurrentBranchId' => $request->facultyMemberCurrentBranchId,
                'facultyMemberDesignation' => $request->facultyMemberDesignation,
                'facultyMemberContact' => $request->facultyMemberContact,
                'facultyMemberEmail' => $request->facultyMemberEmail,
                'facultyMemberUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }
        $status = App\Faculty_member::where('facultyMemberId', $id)->update($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public
    function deleteFacultyMember($id)
    {
        $status = App\Faculty_member::where('facultyMemberId', '=', $id)->delete();
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
