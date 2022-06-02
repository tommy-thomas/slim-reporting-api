Slim Reporting API
========

The api returns payloads representing entities or operational end points for an Annual Reporting application, it was developed using the [Slim micro framework.](http://www.slimframework.com/)


Models
------


### faculty

**GET /faculty**: 

_Get all current active faculty._

**GET /faculty/login/{personID}/{pkAcademicYear}**: 

_Faculty log in._

**POST /faculty/add**: 

_Add faculty._

**POST /faculty/update**: 

_Update faculty profile._

**GET /faculty/get/{pkFaculty}/{pkAcademicYear}**: 

_Get faculty by id._

**GET /faculty/all/{pkAcademicYear}**: 

_Get all faculty by academic year._

**GET /faculty/all/{pkAcademicYear}/department/{pkDepartment}**: 

_Get all faculty by department and academic year._

**GET /faculty/all/{pkAcademicYear}/keyword/{SearchTerm}**: 

_Search faculty by keyword._

**GET /faculty/proxies/{pkFaculty}**: 

_Get all proxies for faculty._

**GET /faculty/delete/{pkFaculty}/{pkAcademicYear}**: 

_Get all proxies for faculty._

**GET /faculty/lookup/{personID}**: 

_Lookup faculty by personID._





### admin

**GET /admin**: 

_Get all admins._

**GET /admin/login/{personID}**: 

_Admin log in._

**POST /admin/add**: 

_Admin log in._

**GET /admin/delete/{pkAdmin}**: 

_Delete admin._

**GET /admin/access-levels**: 

_Get admin access levels._





### report

**GET /report/get/{pkReport}**: 

_Get report by report id._

**POST /report/resident-status/update**: 

_Update resident status._

**POST /report/teaching-status/update**: 

_Update teaching status._

**POST /report/narrative/update**: 

_Update narrative report._

**GET /report/summary/{pkReport}**: 

_Get report summary._

**GET /report/activity-log/{pkReport}**: 

_Get report summary._

**GET /report/submit/{pkReport}**: 

_Submit report._

**GET /report/un-submit/{pkReport}**: 

_Submit report._

**GET /report/advisee-totals/{pkReport}/{pkFaculty}**: 

_Get advisee toatals and three year totals._

**GET /report/dashboard/{pkFaculty}**: 

_Get faculty dashboard._





### resident-status

**GET /resident-status/all**: 

_Get all resident status._





### course

**GET /course/all/{pkReport}**: 

_Get all courses._

**POST /course/update**: 

_Update course._

**GET /course/types**: 

_Get course types._

**GET /course/report/{DepartmentIDs}/{YearIDs}**: 

_Get teaching and enrollment report._





### advisee

**GET /adviseeall/{pkFaculty}/{pkReport}/{pkAcademicYear}**: 

_Get all advisees._

**GET /adviseeroles**: 

_Get all advisee roles._

**GET /adviseema-types**: 

_Get all advisee ma types ._

**GET /adviseetypes**: 

_Get all advisee ma types ._

**POST /adviseeupdate**: 

_Update advisee._

**GET /adviseedelete/{pkAdvisee}**: 

_Delete advisee._

**GET /adviseereport/{DepartmentIDs}/{YearIDs}**: 

_Get advisee reports by department and academic year._

**GET /adviseema-report/{DepartmentIDs}/{YearIDs}**: 

_Get ma advisee reports by department and academic year._





### proxy

**GET /proxy/login/{personID}/{pkAcademicYear}**: 

_Log in._

**POST /proxy/add**: 

_Add proxy._

**GET /proxy/all/{pkProxy}**: 

_Get all faculty by proxy id._

**GET /proxy/delete/{pkProxyFaculty}**: 

_Delete proxy._

**GET /proxy/faculty-lookup/{personID}**: 

_Lookup faculty by user id._





### appointment-history

**GET /appointment-history/all/{pkFaculty}**: 

_Get all appointment history._

**POST /appointment-history/update**: 

_Update appointment history._

**GET /appointment-history/delete/{pkAppointmentHistory}**: 

_Delete appointment history._

**GET /appointment-history/ranks**: 

_Get all faculty ranks for appointment history._

**GET /appointment-history/tracks**: 

_Get all faculty tracks for appointment history._





### cvattachment

**GET /cvattachment/all/{pkReport}**: 

_Get all cv attachments._

**POST /cvattachment/add**: 

_Add cv attachment._

**GET /cvattachment/delete/{pkCVAttachment}**: 

_Delete cv attachment._





### honors-awards

**GET /honors-awards/all/{pkReport}**: 

_Get all honors and awards._

**POST /honors-awards/update**: 

_Update honor and award._

**GET /honors-awards/delete/{pkAward}**: 

_Delete honor and award._

**GET /honors-awards/report/{DepartmentIDs}/{YearIDs}**: 

_Get honors and awards report._





### grants-fellowships

**GET /grants-fellowships/all/{pkReport}**: 

_Get all grants and fellowships._

**GET /grants-fellowships/status**: 

_Get all grant and fellowship options._

**GET /grants-fellowships/types**: 

_Get all grant and fellowship types._

**POST /grants-fellowships/update**: 

_Update gramt and fellowship._

**GET /grants-fellowships/delete/{pkGrantFellowship}**: 

_Delete grant and fellowship._

**GET /grants-fellowships/report/{DepartmentIDs}/{YearIDs}/{StartDate}/{EndDate}/{EditedDate}**: 

_Delete grant and fellowship._





### professional-service

**GET /professional-service/all/{pkFaculty}/{pkReport}/{pkAcademicYear}**: 

_Get all professional services._

**GET /professional-service/types**: 

_Get professional service types._

**POST /professional-service/update**: 

_Update professional service._

**GET /professional-service/delete/{pkProfessionalService}**: 

_Delete professional service._





### publication

**GET /publication/all/{pkFaculty}/{pkReport}/{pkAcademicYear}**: 

_Get all publications._

**GET /publication/types**: 

_Get all publication types._

**GET /publication/status-types**: 

_Get all publication status types._

**GET /publication/categories**: 

_Get all publication categories._

**POST /publication/update**: 

_Update publication._

**GET /publication/delete/{pkPublication}**: 

_Delete publication._





### research-leave

**GET /research-leaveall/{pkFaculty}**: 

_Get all research leave._

**POST /research-leaveupdate**: 

_Update research leave._

**GET /research-leavedelete/{pkResearchLeave}**: 

_Delete research leave._

**GET /research-leavetypes**: 

_Get all research leave types._





### research-support

**GET /research-support/all/{pkFaculty}**: 

_Get all research support._

**POST /research-support/update**: 

_Update research support._

**GET /research-support/delete/{pkResearchSupport}**: 

_Delete research support._

**GET /research-support/report/{DepartmentIDs}/{YearIDs}/{StartDate}/{EndDate}/{EditedDate}**: 

_Delete research support._





### company-service

**GET /company-service/all/{pkFaculty}/{pkReport}/{pkAcademicYear}**: 

_Get all company services._

**POST /company-service/update**: 

_Update company services._

**GET /company-service/delete/{pkReportService}**: 

_Delete company services._





### academic-year

**GET /academic-year/get/{pkAcademicYear}**: 

_Get academic year by pk._

**GET /academic-year/current**: 

_Get current academic year._

**GET /academic-year/all**: 

_Get all academic years._

**POST /academic-year/add**: 

_Add academic year._

**POST /academic-year/update**: 

_Update academic year._

**GET /academic-year/set-current/{pkAcademicYear}**: 

_Set current academic year._





### department

**GET /department/all**: 

_Get all departments._

**GET /department/get/{DepartmentName}**: 

_Get department id by department name._





### quarter

**GET /quarter**: 

_Get all quarters._
