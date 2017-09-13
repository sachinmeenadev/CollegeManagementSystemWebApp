<?php

namespace App\Http\Controllers\Api;

use App;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
            ->where('facultyMemberCurrentBranchId', $request->branchId)
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

    /*
     * HOD Faculty Member Class and Subject Allotment Panel functions
     */
    public function getFacultyMembersAllotClassSubjects(Request $request)
    {
        $response = array("error" => FALSE);
        $facultyMembersClassSubjects = App\Faculty_member_subject::join('faculty_members', 'facultyMemberId', 'fmsFacultyId')
            ->join('subjects', 'subjectId', 'fmsSubjectId')
            ->where('facultyMemberCurrentBranchId', $request->branchId)
            ->get();
        if (count($facultyMembersClassSubjects) > 0) {
            $response["error"] = FALSE;
            $response["facultyMembersClassSubjects"] = $facultyMembersClassSubjects;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertFacultyMembersAllotClassSubjects(Request $request)
    {
        $data[] = array(
            'fmsFacultyId' => $request->fmsFacultyId,
            'fmsSubjectId' => $request->fmsSubjectId,
            'fmsClass' => $request->fmsClass,
            'fmsSection' => $request->fmsSection,
            'fmsBatch' => $request->fmsBatch,
            'fmsCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            'fmsUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\Faculty_member_subject::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function updateFacultyMembersAllotClassSubjects(Request $request, $id)
    {
        /**
         * 1. "0" For others
         * 2. "1" For Changing faculty also
         */
        if ($request->fmsFacultyId != 0 && $request->fmsSubjectId == 0) {
            $data = [
                'fmsFacultyId' => $request->fmsFacultyId,
                'fmsClass' => $request->fmsClass,
                'fmsSection' => $request->fmsSection,
                'fmsBatch' => $request->fmsBatch,
                'fmsUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->fmsSubjectId != 0 && $request->fmsFacultyId == 0) {
            $data = [
                'fmsSubjectId' => $request->fmsSubjectId,
                'fmsClass' => $request->fmsClass,
                'fmsSection' => $request->fmsSection,
                'fmsBatch' => $request->fmsBatch,
                'fmsUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->fmsSubjectId != 0 && $request->fmsFacultyId != 0) {
            $data = [
                'fmsFacultyId' => $request->fmsFacultyId,
                'fmsSubjectId' => $request->fmsSubjectId,
                'fmsClass' => $request->fmsClass,
                'fmsSection' => $request->fmsSection,
                'fmsBatch' => $request->fmsBatch,
                'fmsUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else {
            $data = [
                'fmsClass' => $request->fmsClass,
                'fmsSection' => $request->fmsSection,
                'fmsBatch' => $request->fmsBatch,
                'fmsUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }
        $status = App\Faculty_member_subject::where('fmsId', $id)->update($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function deleteFacultyMembersAllotClassSubjects($id)
    {
        $status = App\Faculty_member_subject::where('fmsId', '=', $id)->delete();
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
     * HOD Tutor List Panel functions
     */
    public function getTutor(Request $request)
    {
        $response = array("error" => FALSE);
        $tutor = App\Faculty_member::join('tutors', 'tutorFacultyId', 'facultyMemberId')
            ->where('facultyMemberCurrentBranchId', $request->branchId)
            ->get();
        if (count($tutor) > 0) {
            $response["error"] = FALSE;
            $response["tutors"] = $tutor;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function insertTutor(Request $request)
    {
        $data[] = array(
            'tutorFacultyId' => $request->tutorFacultyId,
            'tutorClass' => $request->tutorClass,
            'tutorSection' => $request->tutorSection,
            'tutorBatch' => $request->tutorBatch,
            'tutorCreatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            'tutorUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
        );
        $status = App\Tutor::insert($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function updateTutor(Request $request, $id)
    {
        /**
         * 1. "0" For others
         * 2. "1" For Changing faculty also
         */
        if ($request->tutorNameUpdateStatus == 0) {
            $data = [
                'tutorClass' => $request->tutorClass,
                'tutorSection' => $request->tutorSection,
                'tutorBatch' => $request->tutorBatch,
                'tutorUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        } else if ($request->tutorNameUpdateStatus == 1) {
            $data = [
                'tutorFacultyId' => $request->tutorFacultyId,
                'tutorClass' => $request->tutorClass,
                'tutorSection' => $request->tutorSection,
                'tutorBatch' => $request->tutorBatch,
                'tutorUpdatedAt' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }
        $status = App\Tutor::where('tutorId', $id)->update($data);
        if ($status == 1) {
            $response["error"] = FALSE;
            $response["message"] = "Successfully Created";
        } else {
            $response["error"] = TRUE;
            $response["message"] = "Unknown error occurred in creation. Please try again!";
        }
        return $response;
    }

    public function deleteTutor($id)
    {
        $status = App\Tutor::where('tutorId', '=', $id)->delete();
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
     * HOD student Panel functions
     */

    public function getStudentSearch(Request $request)
    {
        $response = array("error" => FALSE);
        $studentName = App\Student::where('studentName', 'like', '%' . $request->studentInfo . '%')
            ->orWhere('studentRegNumber', 'like', '%' . $request->studentInfo . '%')
            ->get();
        if (count($studentName) > 0) {
            $response["error"] = FALSE;
            $response["students"] = $studentName;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }

    public function getStudentProfile($id)
    {
        $response = array("error" => FALSE);
        $student = App\Student::leftJoin('student_college_academics', 'studentCollegeAcademicStudentId', 'studentId')
            ->leftJoin('student_academics', 'studentAcademicStudentId', 'studentId')
            ->join('college_branches', 'collegeBranchId', 'studentBranchId')
            ->where('studentId', $id)
            ->get();
        if (count($student) > 0) {
            $response["error"] = FALSE;
            $response["student"] = $student;
        } else {
            $response["error"] = FALSE;
            $response["message"] = "No entry in database";
        }
        return $response;
    }
}
