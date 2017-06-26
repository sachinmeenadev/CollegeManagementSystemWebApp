<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;


class HodController extends Controller
{
    /*
    |----------------------------------------------------------------------
    |HOD Panel functions for Mobile Application
    |----------------------------------------------------------------------
    */

    /*
     * HOD Faculty Member List Panel functions
     */
    public function getFacultyMember(Request $request)
    {
        $response = array("error" => FALSE);
        $facultyMember = App\Faculty_member::join('college_branches as parent_branch', 'facultyMemberBranchId', 'parent_branch.collegeBranchId')
            ->leftJoin('college_branches as  current_branch', 'facultyMemberCurrentBranchId', 'current_branch.collegeBranchId')->select('faculty_members.*', 'parent_branch.*', 'current_branch.collegeBranchName as currentBranchName', 'current_branch.collegeBranchAbbr as currentBranchAbbr')
            ->where('current_branch.collegeBranchId', $request->branchId)
            ->get();
        if (count($facultyMember) > 0) {
            $response["error"] = FALSE;
            $response["facultyMembers"] = $facultyMember;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }
}
