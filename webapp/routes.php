<?php

use \Shared\WS_Vdesk_IP_Range_Validator;

//========================================================
// Faculty
//========================================================
$app->group('/faculty', function () use ($app) {
    /**
     * Get all current active faculty.
     */
    $app->map(['GET'] , '', 'FacultyController:getAllFaculty');
    /**
     * Faculty log in.
     * $personID
     * $pkAcademicYear
     */
    $app->map(['GET'] , '/login/{personID}/{pkAcademicYear}', 'FacultyController:facultyLogIn');
    /**
     * Add faculty.
     * $personID
     * $FirstName
     * $LastName
     * $Email
     * $EditedBy
     */
    $app->map(['POST'] ,'/add', 'FacultyController:addFaculty');
    /**
     * Update faculty profile.
     * $pkReport
     * $pkUser
     * $pkFaculty
     * $pkAcademicYear
     * $FirstName
     * $LastName
     * $DepartmentIDs
     * $EditedBy
     */
    $app->map(['POST'] ,'/update', 'FacultyController:updateFacultyProfile');
    /**
     * Get faculty by id.
     * $pkFaculty
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/get/{pkFaculty}/{pkAcademicYear}', 'FacultyController:getFacultyByID');
    /**
     * Get all faculty by academic year.
     * $pkAcademicYear
     */
    $app->map(['GET'] , '/all/{pkAcademicYear}', 'FacultyController:getAllFacultyByAcademicYear');
    /**
     * Get all faculty by department and academic year.
     * $pkAcademicYear
     * $pkDepartment
     */
    $app->map(['GET'] , '/all/{pkAcademicYear}/department/{pkDepartment}', 'FacultyController:getAllFacultyByAcademicYearAndDepartmentID');
    /**
     * Search faculty by keyword.
     * $pkAcademicYear
     * $SearchTerm
     */
    $app->map(['GET'] , '/all/{pkAcademicYear}/keyword/{SearchTerm}', 'FacultyController:searchFacultyByKeyword');
    /**
     * Get all proxies for faculty.
     * $pkAcademicYear
     */
    $app->map(['GET'] , '/proxies/{pkFaculty}', 'FacultyController:getFacultyProxies');
    /**
     * Delete faculty:
     * $pkFaculty
     */
    $app->map(['GET'] ,'/delete/{pkFaculty}/{pkAcademicYear}', 'FacultyController:deleteFaculty');
    /**
     * Lookup faculty by personID.
     * $personID
     */
    $app->map(['GET'] ,'/lookup/{personID}', 'FacultyController:lookUpFacultyBypersonID');
});

//========================================================
// Admin
//========================================================
$app->group('/admin', function () use ($app) {
    /**
     * Get all admins.
     */
    $app->map(['GET'] ,'', 'AdminController:GetAdmins');
    /**
     * Admin log in.
     * $personID
     */
    $app->map(['GET'] ,'/login/{personID}', 'AdminController:getOneAdmin');
    /**
     * Add admin:
     * $personID
     * $FirstName
     * $LastName
     * $fkAccessLevel
     * $DepartmentIDS
     */
    $app->map(['POST'] ,'/add', 'AdminController:addOneAdmin');
    /**
     * Delete admin.
     * $pkAdmin
     */
    $app->map(['GET'] ,'/delete/{pkAdmin}', 'AdminController:deleteAdmin');
    /**
     * Get admin access levels.
     */
    $app->map(['GET'] ,'/access-levels', 'AdminController:getAdminAccessLevels');
});

//========================================================
// Report
//========================================================
$app->group('/report', function () use ($app) {
    /**
     * Get report by report id.
     * $pkReport
     */
    $app->map(['GET'] ,'/get/{pkReport}', 'ReportController:getReportByID');
    /**
     * Update resident status.
     * $pkReport
     * $fkAutumnStatus
     * $fkWinterStatus
     * $fkSpringStatus
     * $EditedBy
     */
    $app->map(['POST'] ,'/resident-status/update', 'ReportController:updateResidentStatus');
    /**
     * Update teaching status.
     * $pkReport
     * $GrantFundedBuyOut
     * $OtherCourseRelease
     * $ReasonForBuyout
     * $EditedBy
     */
    $app->map(['POST'] ,'/teaching-status/update', 'ReportController:updateTeaching');
    /**
     * Update narrative report.
     * $pkReport
     * $NarrativeReport
     * $EditedBy
     */
    $app->map(['POST'] ,'/narrative/update', 'ReportController:updateNarrativeReport');
    /**
     * Get report summary.
     * $pkReport
     */
    $app->map(['GET'] ,'/summary/{pkReport}', 'ReportController:getReportSummary');
    /**
     * Get report summary.
     * $pkReport
     */
    $app->map(['GET'] ,'/activity-log/{pkReport}', 'ReportController:getReportActivityLog');
    /**
     * Submit report.
     * $pkReport
     */
    $app->map(['GET'] ,'/submit/{pkReport}', 'ReportController:submitReport');

    $app->map(['GET'] ,'/un-submit/{pkReport}', 'ReportController:unSubmitReport');
    /**
     * Get advisee toatals and three year totals.
     */
    $app->map(['GET'] ,'/advisee-totals/{pkReport}/{pkFaculty}', 'ReportController:getAdvisingTotals');
    /**
     * Get faculty dashboard.
     * $pkFaculty
     */
    $app->map(['GET'] ,'/dashboard/{pkFaculty}', 'ReportController:getDashBoardTotals');
});

//========================================================
// Resident Status
//========================================================
$app->group('/resident-status', function () use ($app) {
    /**
     * Get all resident status.
     */
    $app->map(['GET'] ,'/all', 'ResidentStatusTypeController:getResidentStatusTypes');
});


//========================================================
// Course
//========================================================
$app->group('/course', function () use ($app) {
    /**
     * Get all courses.
     * $pkReport
     */
    $app->map(['GET'] ,'/all/{pkReport}', 'CourseController:getCourses');
    /**
     * Update course.
     * @param $pkCourse
     * @param $fkCourseType
     * @param $IsCoreCurriculum
     * @param $IsCoTaught
     * @param $EditedBy
     * @return mixed
     */
    $app->map(['POST'] ,'/update', 'CourseController:updateCourse');
    /**
     * Get course types.
     */
    $app->map(['GET'] ,'/types', 'CourseController:getCourseTypes');
    /**
     * Get teaching and enrollment report.
     * $DepartmentIDs (1|2|3)
     * $YearIDs (1|2|3)
     */
    $app->map(['GET'] ,'/report/{DepartmentIDs}/{YearIDs}', 'CourseController:getTeachingAndEnrollmentReport');
});

//========================================================
// AIS
//========================================================
$app->group('/ais', function () use ($app) {
    /**
     * Import AIS Course data for an academic year.
     * $pkAcademicYear
     * Restricted to Web Service vdesks.
     */
    $app->get('/course-import/{pkAcademicYear}/{pkQuarter}', 'AisController:aisCourseImport');
})->add(function ($request, $response, $next) {
    // Only allow internal IP addresses ( programmer vdesks )
    $clientIp = $request->getAttribute('ip_address');
    // Is the client's IP address in the allowed list?
    if ( !WS_Vdesk_IP_Range_Validator::ipInVdeskRange($clientIp)) {
        // Not allowed: return a 403 error
        return $response->withStatus(403);
    }

    // Allowed: continue to action
    return $next($request, $response);
});

//========================================================
// Advisee
//========================================================
$app->group('/advisee', function () use ($app) {
    /**
     * Get all advisees.
     * $pkFaculty
     * $pkReport
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/all/{pkFaculty}/{pkReport}/{pkAcademicYear}', 'AdviseeController:getAdvisees');
    /**
     * Get all advisee roles.
     */
    $app->map(['GET'] ,'/roles', 'AdviseeController:getAdviseeRoles');
    /**
     * Get all advisee ma types .
     */
    $app->map(['GET'] ,'/ma-types', 'AdviseeController:getAdviseeMATypes');
    /**
     * Get all advisee ma types .
     */
    $app->map(['GET'] ,'/types', 'AdviseeController:getAdviseeTypes');
    /**
     * Update advisee.
     * $pkAdvisee
     * $pkReport
     * $fkAdviseeType
     * $fkAdviseeMAType
     * $IsOutsideAdvisee
     * $OutsideAdviseeInstitution
     * $StudentName
     * $TopicTitle
     * $fkAdviseeRole
     * $AdviseeGraduated
     * $AddToNextYearsReport
     * $EditedBy
     */
    $app->map(['POST'] ,'/update', 'AdviseeController:updateAdvisee');
    /**
     * Delete advisee.
     * $pkAdvisee
     */
    $app->map(['GET'] ,'/delete/{pkAdvisee}', 'AdviseeController:deleteAdvisee');
    /**
     * Get advisee reports by department and academic year.
     */
    $app->map(['GET'] ,'/report/{DepartmentIDs}/{YearIDs}', 'AdviseeController:getAdviseeReport');
    /**
     * Get ma advisee reports by department and academic year.
     */
    $app->map(['GET'] ,'/ma-report/{DepartmentIDs}/{YearIDs}', 'AdviseeController:getMAAdviseeReport');
});

//========================================================
// Proxy
//========================================================
$app->group('/proxy', function () use ($app) {
    /**
     * Log in.
     * $personID
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/login/{personID}/{pkAcademicYear}', 'ProxyController:proxyLogIn');
    /**
     * Add proxy.
     * $personID
     * $FirstName
     * $LastName
     * $pkFaculty
     */
    $app->map(['POST'] ,'/add', 'ProxyController:addProxy');
    /**
     * Get all faculty by proxy id.
     */
    $app->map(['GET'] ,'/all/{pkProxy}', 'ProxyController:getAllFacultyByProxyID');
    /**
     * Delete proxy.
     * $pkProxyFaculty
     */
    $app->map(['GET'] ,'/delete/{pkProxyFaculty}', 'ProxyController:deleteProxy');
    /**
     * Lookup faculty by user id.
     * $personID
     */
    $app->map(['GET'] ,'/faculty-lookup/{personID}', 'ProxyController:lookUpFacultyBypersonID');
});

//========================================================
// Appointment History
//========================================================
$app->group('/appointment-history', function () use ($app) {
    /**
     * Get all appointment history.
     * $pkFaculty
     */
    $app->map(['GET'] ,'/all/{pkFaculty}', 'AppointmentHistoryController:getAppointmentHistory');
    /**
     * Update appointment history.
     * $pkAppointmentHistory
     * $fkFaculty
     * $fkFacultyRank
     * $fkFacultyTrack
     * $AppointmentHistoryStartDate
     * $AppointmentHistoryEndDate
     * $IsOnGoing
     */
    $app->map(['POST'] ,'/update', 'AppointmentHistoryController:updateAppointmentHistory');
    /**
     * Delete appointment history.
     * $pkAppointmentHistory
     */
    $app->map(['GET'] ,'/delete/{pkAppointmentHistory}', 'AppointmentHistoryController:deleteAppointmentHistory');
    /**
     * Get all faculty ranks for appointment history.
     */
    $app->map(['GET']  ,'/ranks', 'AppointmentHistoryController:getAllFacultyRanks');
    /**
     * Get all faculty tracks for appointment history.
     */
    $app->map(['GET']  ,'/tracks', 'AppointmentHistoryController:getAllFacultyTracks');
});

//========================================================
// CVAttachment
//========================================================
$app->group('/cvattachment', function () use ($app) {
    /**
     * Get all cv attachments.
     * $pkReport
     */
    $app->map(['GET'] ,'/all/{pkReport}', 'CVAttachmentController:getCVAttachments');
    /**
     * Add cv attachment.
     * $pkReport
     * $OriginalFileName
     * $SystemFileName
     * $EditedBy
     */
    $app->map(['POST'] ,'/add', 'CVAttachmentController:addCVAttachment');
    /**
     * Delete cv attachment.
     * $pkCVAttachment
     */
    $app->map(['GET'] ,'/delete/{pkCVAttachment}', 'CVAttachmentController:deleteCVAttachment');
});

//========================================================
// Honors and Awards
//========================================================
$app->group('/honors-awards', function () use ($app) {
    /**
     * Get all honors and awards.
     * $pkReport
     */
    $app->map(['GET'] ,'/all/{pkReport}', 'HonorAndAwardController:getHonorAndAwards');
    /**
     * Update honor and award.
     * $pkHonorAward
     * $fkReport
     * $AwardName
     * $AwardDescription
     * $EditedBy
     */
    $app->map(['POST'] ,'/update', 'HonorAndAwardController:updateHonorAndAward');
    /**
     * Delete honor and award.
     * $pkHonorAward
     */
    $app->map(['GET'] ,'/delete/{pkAward}', 'HonorAndAwardController:deleteHonorAndAward');
    /**
     * Get honors and awards report.
     * $DepartmentIDs
     * $YearIDs
     */
    $app->map(['GET'] ,'/report/{DepartmentIDs}/{YearIDs}', 'HonorAndAwardController:getHonorsAndAwardsReport');
});

//========================================================
// Grants and Fellowships
//========================================================
$app->group('/grants-fellowships', function () use ($app) {
    /**
     * Get all grants and fellowships.
     * $pkReport
     */
    $app->map(['GET'] ,'/all/{pkReport}', 'GrantAndFellowshipController:getGrantsAndFellowships');
    /**
     * Get all grant and fellowship options.
     */
    $app->map(['GET'] ,'/status', 'GrantAndFellowshipController:getGrantFellowhipStatus');
    /**
     * Get all grant and fellowship types.
     */
    $app->map(['GET'] ,'/types', 'GrantAndFellowshipController:getGrantFellowshipTypes');
    /**
     * Update gramt and fellowship.
     * $pkGrantFellowship
     * $pkReport
     * $fkGrantFellowshipType
     * $fkGrantFellowshipStatus
     * $ProjectTitle
     * $FundingAgency
     * $Abstract
     * $ProjectBudget
     * $TotalAmountRequested
     * $TotalAmountAwarded
     * $AwardStartDate
     * $AwardEndDate
     * $Reason
     * $IsAssociatedWithResearchLeave
     * $EditedBy
     */
    $app->map(['POST'] ,'/update', 'GrantAndFellowshipController:updateGrantAndFellowship');
    /**
     * Delete grant and fellowship.
     * $pkGrantFellowship
     */
    $app->map(['GET'] ,'/delete/{pkGrantFellowship}', 'GrantAndFellowshipController:deleteGrantsAndFellowships');
    /**
     * $DepartmentIDs(1|2|3)
     * $YearIDs(1|2|3)
     * $StartDate(0000-00-00)
     * $EndDate(0000-00-00)
     * $EditedDate(0000-00-00)
     */
    $app->map(['GET'] ,'/report/{DepartmentIDs}/{YearIDs}/{StartDate}/{EndDate}/{EditedDate}', 'GrantAndFellowshipController:getFinancialCommitmentReport');
});

//========================================================
// Professional services
//========================================================
$app->group('/professional-service', function () use ($app) {
    /**
     * Get all professional services..
     * $pkFaculty
     * $pkReport
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/all/{pkFaculty}/{pkReport}/{pkAcademicYear}', 'ProfessionalServiceController:getProfessionalServices');
    /**
     * Get professional service types.
     */
    $app->map(['GET'] ,'/types', 'ProfessionalServiceController:getProfessionalServiceTypes');
    /**
     * Update professional service.
     * $pkProfessionalService
     * $pkReport
     * $fkProfessionalServiceType
     * $ProfessionalServiceDescription
     * $ProfessionalServiceLocation
     * $AddToNextYearsReport
     * $EditedBy
     */
    $app->map(['POST'] ,'/update', 'ProfessionalServiceController:updateProfessionalService');
    /**
     * Delete professional service.
     * $pkProfessionalService
     */
    $app->map(['GET'] ,'/delete/{pkProfessionalService}', 'ProfessionalServiceController:deleteProfessionalService');
});

//========================================================
// Publication
//========================================================
$app->group('/publication', function () use ($app) {
    /**
     * Get all publications.
     * $pkFaculty
     * $pkReport
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/all/{pkFaculty}/{pkReport}/{pkAcademicYear}', 'PublicationController:getPublications');
    /**
     * Get all publication types.
     */
    $app->map(['GET'] ,'/types', 'PublicationController:getPublicationTypes');
    /**
     * Get all publication status types.
     */
    $app->map(['GET'] ,'/status-types', 'PublicationController:getPublicationStatusTypes');
    /**
     * Get all publication categories.
     */
    $app->map(['GET'] ,'/categories', 'PublicationController:getPublicationCategories');
    /**
     * Update publication.
     * $pkPublication
     * $pkReport
     * $fkPublicationType
     * $fkPublicationCategory
     * $fkPublicationSatus
     * $PublicationTitle
     * $PublicationCitation
     * $PublicationUrl
     * $OriginalFileName
     * $SystemFileName
     * $EditedBy
     */
    $app->map(['POST'] ,'/update', 'PublicationController:updatePublication');
    /**
     * Delete publication.
     * $pkPublication
     */
    $app->map(['GET'] ,'/delete/{pkPublication}', 'PublicationController:deletePublication');
});

//========================================================
// Research leave.
//========================================================
$app->group('/research-leave', function () use ($app) {
    /**
     * Get all research leave.
     * $pkFaculty
     */
    $app->map(['GET'] ,'/all/{pkFaculty}', 'ResearchLeaveController:getResearchLeave');
    /**
     * Update research leave.
     * $pkResearchLeave
     * $fkFaculty
     * $fkAcademicYear
     * $QuarterIDs (1|2|3)
     * $fkResearchLeaveType
     * $FellowshipName
     * $FellowshipAmount
     * $Comments
     */
    $app->map(['POST'] ,'/update', 'ResearchLeaveController:updateResearchLeave');
    /**
     * Delete research leave.
     * $pkResearchLeave
     */
    $app->map(['GET'] ,'/delete/{pkResearchLeave}', 'ResearchLeaveController:deleteResearchLeave');
    /**
     * Get all research leave types.
     */
    $app->map(['GET'] ,'/types', 'ResearchLeaveController:getResearchLeaveTypes');
});

//========================================================
// Research support.
//========================================================
$app->group('/research-support', function () use ($app) {
    /**
     * Get all research support.
     * $pkFaculty
     */
    $app->map(['GET'] ,'/all/{pkFaculty}', 'ResearchSupportController:getResearchSupport');
    /**
     * Update research support.
     * $pkResearchSupport
     * $fkFaculty
     * $fkAcademicYear
     * $ResearchSupportStartDate
     * $ResearchSupportEndDate
     * $Amount
     * $Comments
     */
    $app->map(['POST'] ,'/update', 'ResearchSupportController:updateResearchSupport');
    /**
     * Delete research support.
     * $pkResearchSupport
     */
    $app->map(['GET'] ,'/delete/{pkResearchSupport}', 'ResearchSupportController:deleteResearchReport');
    /**
     * $DepartmentIDs(1|2|3)
     * $YearIDs(1|2|3)
     * $StartDate(0000-00-00)
     * $EndDate(0000-00-00)
     * $EditedDate(0000-00-00)
     */
    $app->map(['GET'] ,'/report/{DepartmentIDs}/{YearIDs}/{StartDate}/{EndDate}/{EditedDate}', 'ResearchSupportController:getFinancialCommitmentReport');
});

//========================================================
// company service.
//========================================================
$app->group('/company-service', function () use ($app) {
    /**
     * Get all company services.
     * $pkFaculty
     * $pkReport
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/all/{pkFaculty}/{pkReport}/{pkAcademicYear}', 'ReportServiceController:getReportServices');
    /**
     * Update company services.
     * $pkReportService
     * $fkReport
     * $BookCommitteeCouncilName
     * $ReportServiceRole
     * $AddToNextYearsReport
     * $EditedBy
     */
    $app->map(['POST'] ,'/update', 'ReportServiceController:updateReportService');
    /**
     * Delete company services.
     * $pkReportService
     */
    $app->map(['GET'] ,'/delete/{pkReportService}', 'ReportServiceController:deleteReportService');
});

//========================================================
// Academic year.
//========================================================
$app->group('/academic-year', function () use ($app) {
    /**
     * Get academic year by pk.
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/get/{pkAcademicYear}', 'AcademicYearController:getAcademicYear');
    /**
     * Get current academic year.
     */
    $app->map(['GET'] ,'/current', 'AcademicYearController:getCurrentAcademicYear');
    /**
     * Get all academic years.
     */
    $app->map(['GET'] ,'/all', 'AcademicYearController:getAllAcademicYears');
    /**
     * Add academic year.
     * $AcademicYearStart
     * $AcademicYearEnd
     * $OpenReportDate
     * $FacultyDeadlineDate
     * $HardCloseDate
     * $HardCloseDateNoSubmit
     */
    $app->map(['POST'] ,'/add', 'AcademicYearController:addAcademicYear');
    /**
     * Update academic year.
     * $pkAcademicYear
     * $AcademicYearStart
     * $AcademicYearEnd
     * $OpenReportDate
     * $FacultyDeadlineDate
     * $HardCloseDate
     * $HardCloseDateNoSubmit
     */
    $app->map(['POST'] ,'/update', 'AcademicYearController:updateAcademicYear');
    /**
     * Set current academic year.
     * $pkAcademicYear
     */
    $app->map(['GET'] ,'/set-current/{pkAcademicYear}', 'AcademicYearController:setCurrentAcademicYear');
});

//========================================================
// Department.
//========================================================
$app->group('/department', function () use ($app) {
    /**
     * Get all departments.
     */
    $app->map(['GET'] ,'/all', 'DepartmentController:getDepartments');
    /**
     * Get department id by department name.
     * $DepartmentName
     */
    $app->map(['GET'] ,'/get/{DepartmentName}', 'DepartmentController:getDepartmentIDByName');
});

//========================================================
// Quarters
//========================================================
$app->group('/quarter', function () use ($app) {
    /**
     * Get all quarters.
     */
    $app->map(['GET'] ,'', 'QuarterController:getQuarters');
});