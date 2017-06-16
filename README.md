# College Management System

## Welcome to https://sachinmeenadev.github.io/CollegeManagementSystemWebApp/

This is a small College ERP system demo web application. It is the first demo version of this app. By modifying this, one can build basic ERP projects, such as Employee Management System etc.
	
	>For Andoid Application of this go to https://github.com/sachinmeenadev/CollegeManagementSystem/

#### Structure of project (Functional Requirements)
    1. Welcome
	2. Admin
   		2.1 Manage Roles
   		2.2 Manage College Branches list
   		2.3 Manage Subjects list
   		2.4 Manage Users list		
   		2.5 Manage Faculty Members list

	3. HOD
		3.1 Student List
			3.1.1 By class selection
			3.1.2 By Criteria (Placement eligibility)
			3.1.3 By Specific Student
		3.2 Student Profile
		3.3 Tutor list
		3.4 Faculty List	
			3.4.1 Subject Wise
			3.4.2 Class Wise
		3.5 Assign tutor
		3.6 Assign faculty
	4. Faculty (By class selection, default shown own class)
        4.1 Student List
        //Can see list of students of particular class or section
        4.2 Student Profile
        //Can see individual student profile
        4.3 Student Update
        //Can update individual student profile
    5. Placement (Only having placement access)
        5.1 Student List
            5.1.1 By Criteria
            //Like Medium of language, Percentage criteria
            5.1.2 By Specific Student
            //By names, etc
        5.2 Student Profile
        //For checking individual student for their eligibility 
        5.3 Student Volunteer
        //Can check list of students, who can help in placement related activities
    	
#### Project database structure
    > All column name ending with Id are INTEGER Type, rest all are VARCHAR

    *users
		->userId 
		->userName
		->userEmail
		->userPassword
		->userRoleId
        ->userCreatedAt
        ->userUpdatedAt
		
	*roles
		->roleId
		->roleType
		->roleCreatedAt
		->roleUpdatedAt
		
	*student 
		->studentId
		->studentName
		->studentRegNumber
		->studentBranch
		->studentSem
		->studentSemSection
		->studentSemBatch
		->studentEmail
		->studentContact
		->studentImage		
		->studentFullImage
		->studentFatherName
		->studentFatherContact
		->studentFatherEmail
		->studentFatherOccupation
		->studentFatherIncome
		->studentMotherName
		->studentMotherContact
		->studentMotherEmail
		->studentMotherOccupation
		->studentMotherIncome
		->studentLocalGuardianName
		->studentLocalGuardianContact
		->studentLocalGuardianEmail
		->studentResidentType
		->studentLocalAddress
		->studentPermanentAddress
		->studentCity
		->studentState
		->studentCountry
		->studentPinCode
		->studentCreatedAt
		->studentUpdatedAt
		
	*student_academics
		->studentAcademicId
		->studentAcademicStudentId
		->studentAcademicSecPercentage
		->studentAcademicSecBoard
		->studentAcademicSecMedium
		->studentAcademicSecSchoolName
		->studentAcademicSrSecPercentage
		->studentAcademicSrSecBoard
		->studentAcademicSrSecMedium
		->studentAcademicSrSecSchoolName
		->studentAcademicDiplomaPercentage
		->studentAcademicDiplomaBoard
		->studentAcademicDiplomaMedium
		->studentAcademicDiplomaInstituteName
		->studentAcademicCollegeAgg
		->studentAcademicCollegeBackCount
		->studentAcademicCollegeBackSubject
		->studentAcademicHobbies
		->studentAcademicCreatedAt
		->studentAcademicUpdatedAt
		
	*college_branches
		->collegeBranchId
		->collegeBranchName
		->collegeBranchAbbr		
		->collegeBranchCreatedAt
		->collegeBranchUpdatedAt
		
	*tutors
		->tutorId
		->tutorFacultyId
		->tutorSection
		->tutorBatch
		->tutorCreatedAt
		->tutorUpdatedAt
		
	*faculty_members
		->facultyMemberId
		->facultyMemberName
		->facultyMemberBranchId
		->facultyMemberDesignation
		->facultyMemberContact
		->facultyMemberEmail
		->facultyMemberCreatedAt
		->facultyMemberUpdatedAt
		
	*subjects
		->subjectId
		->subjectName
		->subjectAbbr
		->subjectCode
		->subjectCreatedAt
		->subjectUpdatedAt
		
	*faculty_member_subjects
		->fmsId
		->fmsFacultyId
		->fmsSubjectId
		->fmsSubjectCreatedAt
		->fmsSubjectUpdatedAt

#### Project configuration
    Framework Version => 5.4
    PHP Version => 7
    
#### Taken references from
    1. http://instinctcoder.com/android-studio-sqlite-database-multiple-tables-example/
    ->For multiple database table use
    
    2. http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/
    ->For session management
    
    3. http://www.materialdoc.com/
    ->For material design guides

#### Feedback
If you have any feedback,further questions you can either create an issue on the item here on github that we can discuss via comments, or you can reach out to me on either Twitter or Email.

    Twitter: Twitter @_sachinmeena (Be sure to follow me too)
    Email: sachinmeena.dev@gmail.com
