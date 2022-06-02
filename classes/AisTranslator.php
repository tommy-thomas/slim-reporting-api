<?php

namespace MyNameSpace\AnnualReport;

class AisTranslator
{

    private $container;
    private $instructors = array();
    private $faculty = array();
    private $courses = array();

    public function __construct($app)
    {
        $this->container = $app->getContainer();
    }

    /**
     * @param \Slim\Http\Request $request
     * @throws \Exception
     */
    public function aisCourseImport(\Slim\Http\Request $request)
    {

        // pkAcademicYear
        $pkAcademicYear = $request->getAttribute('pkAcademicYear');
        // pkQuarter
        $pkQuarter = $request->getAttribute('pkQuarter');

        // Academic Year
        $AcademicYear = $this->container['AcademicYearDAO']->getAcademicYear($pkAcademicYear);

        if (is_null($AcademicYear) || !$AcademicYear instanceof AcademicYear) {
            throw new \Exception('Not a valid key for an academic year.');
        }

        $sTrm = '';
        foreach ($this->container['QuarterDAO']->getQuarters() as $Quarter) {
            if ($Quarter->pkQuarter == $pkQuarter) {
                $Term = ($Quarter->Quarter == 'Autumn') ? $Quarter->Quarter . ' ' . $AcademicYear->AcademicYearStart : $Quarter->Quarter . ' ' . $AcademicYear->AcademicYearEnd;
                $sTrm = $this->termName(array('from' => 'readable', 'to' => 'aisStrm', 'string' => $Term));
                continue;
            }
        }

        if (empty($sTrm)) {
            throw new \Exception('Term is empty.');
        }

        $deleteMsg = $this->container['CourseDAO']->deleteStrmData($sTrm);

        // Set instructors
        $this->setInstructors($pkAcademicYear)
            // Set term courses
            ->setTermCourses($sTrm, $pkQuarter);

        $EditedBy = 'system';

        foreach ($this->faculty as $faculty)
        {
            $instructor = $this->instructors[$faculty->getpersonID()];
            if (!$this->isValidInstructor($instructor) || is_null($faculty->pkReport))
            {
                continue;
            }
            $this->insertCoursesIntoDB( $this->courses[$instructor->EMPLID], $faculty->pkReport, $EditedBy);
        }
        print "Courses successfully imported for STRM: " . $sTrm . ".";
    }

    private function insertCoursesIntoDB($Courses, $pkReport, $EditedBy)
    {
        foreach ($Courses as $Course) {
            $enrollments = $this->aisCourseEnrollmentCount($Course->STRM , $Course->CRSE_ID,$Course->INSTRUCTOR_EMPLID);
            $courseCounts = $this->getCourseEnrollmentCounts($Course, $enrollments);
            $Course->UndergratuateEnrollment = $courseCounts->Undergrad;
            $Course->GraduateEnrollment = $courseCounts->Grad;

            $this->container['CourseDAO']->increaseTimeOutForPayloadImport(360);
            $this->container['CourseDAO']
                ->addCourse(
                    $pkReport,
                    $Course->fkQuarter,
                    $Course->Subject,
                    $Course->CourseTitle,
                    $Course->UndergratuateEnrollment,
                    $Course->GraduateEnrollment,
                    $Course->CRSE_ID,
                    $Course->INSTRUCTOR_EMPLID,
                    $Course->CLASS_NBR,
                    $Course->STRM,
                    $EditedBy
                );

        }
    }

    private function insertNewFacultyCoursesIntoDB($Courses, $pkReport, $EditedBy)
    {
        foreach ($Courses as $Course) {
            $enrollments = $this->aisCourseEnrollmentCount($Course->STRM , $Course->CRSE_ID,$Course->INSTRUCTOR_EMPLID);
            $courseCounts = $this->getCourseEnrollmentCounts($Course, $enrollments);
            $Course->UndergratuateEnrollment = $courseCounts->Undergrad;
            $Course->GraduateEnrollment = $courseCounts->Grad;
            $this->container['CourseDAO']->increaseTimeOutForPayloadImport(360);
            $this->container['CourseDAO']
                ->addCourse(
                    $pkReport,
                    $Course->fkQuarter,
                    $Course->Subject,
                    $Course->CourseTitle,
                    $Course->UndergratuateEnrollment,
                    $Course->GraduateEnrollment,
                    $Course->CRSE_ID,
                    $Course->INSTRUCTOR_EMPLID,
                    $Course->CLASS_NBR,
                    $Course->STRM,
                    $EditedBy
                );

        }
    }

    private function aisCourseEnrollmentCount($sTrm=null,$crseId=null,$emplID=null)
    {

        try{
            return $this->container['SsdApp']
                ->aisapi
                ->get('enrollmentcounts/strm/'.$sTrm.'/crse_id/'.$crseId.'/emplid/'.$emplID)
                ->body;
        } catch (\Exception $e) {
            return new \stdClass();
        }

    }


    public function aisFacultyCourseImport($personID = null, $EditedBy)
    {
        if (is_null($personID)) {
            return false;
        }
        $CurrentAcademicYear = $this->container['AcademicYearDAO']
            ->getCurrentAcademicYear();
        $pkCurrentAcademicYear = $CurrentAcademicYear->pkAcademicYear;
        $newFaculty = $this->container['FacultyDAO']->facultyLogIn($personID, $pkCurrentAcademicYear);
        if (!is_null($newFaculty) && $newFaculty instanceof Faculty) {
            $courses = $this->newYearCoursesForSsd(
                $newFaculty->personID,
                $CurrentAcademicYear,
                $newFaculty->pkReport,
                $EditedBy
            );
            $this->insertNewFacultyCoursesIntoDB($courses,$newFaculty->pkReport,$EditedBy);
        }
    }

    private function isValidInstructor($instructor)
    {
        return isset($instructor->EMPLID) && is_string($instructor->EMPLID);
    }

    /**
     * @param $pkAcademicYear
     * @return $this
     * @throws \Exception
     */
    private function setInstructors($pkAcademicYear)
    {

        if (!isset($pkAcademicYear)) {
            return false;
        }
        $userendpoints = array();
        $AllFacultyForAcademicYear = $this->container['FacultyDAO']->getAllFacultyByAcademicYear($pkAcademicYear);
        foreach ($AllFacultyForAcademicYear as $Faculty) {
            array_push($userendpoints, 'instructor/personID/' . $Faculty->getpersonID());
            $this->faculty[$Faculty->getpersonID()] = $Faculty;
        }
        $this->instructorNodesToArray(
            $this->container['SsdApp']
                ->aisapi
                ->createCurlMultiple($userendpoints)
                ->fetchNodes());
        $this->container['SsdApp']
            ->aisapi
            ->clear();
        return $this;
    }

    /**
     * @param array $nodes
     * @return bool
     */
    private function instructorNodesToArray($nodes = array())
    {
        if (empty($nodes)) {
            return false;
        }
        foreach ($nodes as $n) {
            $user = substr(curl_getinfo($n, CURLINFO_EFFECTIVE_URL), strrpos(curl_getinfo($n, CURLINFO_EFFECTIVE_URL), '/') + 1);
            $this->instructors[$user] = json_decode(curl_multi_getcontent($n));
        }

    }

    /**
     *
     * Translates between AIS term name and readable term name
     *
     * @param string $options ['from'] required format of original term name; 'readable' (e.g. 'Winter 2017')
     * @param string $options ['to'] required format of converted term name; 'aisStrm' (e.g. '2178')
     * @param string $options ['string'] required the term name value in the 'from' format
     * @return string term name in 'to' format
     */
    public function termName($options)
    {
        $numbersBySeason = array('Winter' => '01', 'Spring' => '02', 'Summer' => '03', 'Autumn' => '04');

        if ($options['from'] == 'readable' && $options['to'] == 'aisStrm') {
            $termBits = explode(' ', $options['string']);
            $season = intval($numbersBySeason[$termBits[0]]) * 2;
            $year = substr($termBits[1], 0, 1) . substr($termBits[1], 2, 2);
            return $year . $season;
        }

    }

    /**
     * @param null $sTrm
     * @param null $pkQuarter
     * @return $this|bool
     */
    private function setTermCourses($sTrm = null, $pkQuarter = null)
    {
        if (is_null($sTrm) || is_null($pkQuarter)) {
            return false;
        }

        $termcourseendpoints = array();
        foreach ($this->instructors as $key => $instr) {
            if (isset($instr->EMPLID) && is_string($instr->EMPLID)) {
                array_push($termcourseendpoints, 'courses/' . $sTrm . '/emplid/' . $instr->EMPLID);
            }
        }
        $nodes = $this->container['SsdApp']
            ->aisapi
            ->createCurlMultiple($termcourseendpoints)
            ->fetchNodes();
        $this->termCourseNodesToArray($nodes, $sTrm, $pkQuarter);
        $this->container['SsdApp']
            ->aisapi
            ->clear();
        return $this;
    }

    /**
     * @param $nodes
     * @param $sTrm
     * @param $pkQuarter
     * @return bool
     */
    private function termCourseNodesToArray($nodes, $sTrm, $pkQuarter)
    {
        if (empty($nodes)) {
            return false;
        }
        foreach ($nodes as $n) {
            $uri_path = parse_url(curl_getinfo($n, CURLINFO_EFFECTIVE_URL), PHP_URL_PATH);
            $uri_segments = explode('/', $uri_path);
            $sTrm = $uri_segments[4];
            $emplid = $uri_segments[6];
            $ais_courses = json_decode(curl_multi_getcontent($n));
            $this->courses[$emplid] = $this->newTermCoursesForSsd($ais_courses, $emplid, $pkQuarter, $sTrm);
        }
        return true;
    }

    private function getCourseEnrollmentCounts($Course , $enrollments)
    {
        $courseCounts = new \StdClass;
        $courseCounts->Undergrad = 0;
        $courseCounts->Grad = 0;
        if (!isset($Course->STRM)
            || !isset($enrollments->UC_ENRL_COUNT)
            || !isset($enrollments->UC_ENRL_COUNT->ENRL_COUNT)) {
            return $courseCounts;
        }
        $enrollments = $enrollments->UC_ENRL_COUNT->ENRL_COUNT;
        foreach ($enrollments as $key => $count) {
            if ($count->STRM == $Course->STRM
                && $count->CRSE_ID == $Course->CRSE_ID
                && $this->instructorMatch($count,$Course->INSTRUCTOR_EMPLID)
            ) {
                if ($count->ACAD_CAREER == "GRD") {
                    $courseCounts->Grad += $count->UC_COUNT;
                } elseif ($count->ACAD_CAREER == "UGD") {
                    $courseCounts->Undergrad += $count->UC_COUNT;
                }
            }
        }
        return $courseCounts;
    }

    private function instructorMatch($count , $INSTRUCTOR_EMPLID)
    {
        if( !isset($count->UC_INSTR) || !is_array($count->UC_INSTR)  )
        {
            return false;
        }
        foreach($count->UC_INSTR as $key => $instr)
        {
            if( $instr->EMPLID == $INSTRUCTOR_EMPLID )
            {
                return true;
            }
        }
        return false;
    }

    public function newYearCoursesForSsd($FacultypersonID, $AcademicYear, $pkReport, $EditedBypersonID)
    {
        $SsdCourses = array();
        $this->instructor[0] = $this->container['SsdApp']
            ->aisapi
            ->get('instructor/personID/' . $FacultypersonID)
            ->body;
        if (is_string($this->instructor[0]->EMPLID)) {

            foreach ($this->container['QuarterDAO']->getQuarters() as $key => $Quarter) {
                $Year = ($Quarter->Quarter == 'Autumn') ? $AcademicYear->AcademicYearStart : $AcademicYear->AcademicYearEnd;

                $QuarterCourses = $this->newTermCoursesForOneFaculy(
                    $this->instructor[0]->EMPLID,
                    $Quarter->Quarter,
                    $Year,
                    $Quarter->pkQuarter);

                $SsdCourses = array_merge($SsdCourses, $QuarterCourses);
            }

            foreach ($SsdCourses as $key => $SsdCourse) {
                $SsdCourse->pkReport = $pkReport;
                $SsdCourse->EditedBy = $EditedBypersonID;
            }

        }

        return $SsdCourses;
    }

    /**
     * @param $aisCourseObject
     * @param $FacultyEmplId
     * @param $pkQuarter
     * @param $sTrm
     * @return array
     */
    public function newTermCoursesForSsd($aisCourseObject, $FacultyEmplId, $pkQuarter, $sTrm)
    {
        if (!isset($aisCourseObject->UC_CLASS_TBL)) {
            return array();
        }

        // get AIS Courses into an array
        if (is_array($aisCourseObject->UC_CLASS_TBL)) {
            $aisCourses = $aisCourseObject->UC_CLASS_TBL;
        } else {
            $aisCourses = array($aisCourseObject->UC_CLASS_TBL);
        }

        $xlists = $this->xlists($aisCourses);

        $usedCrseIds = array();

        // Make array of parent courses, smooshing crosslists into course name
        $Courses = array();
        foreach ($aisCourses as $key => $aisCourse) {
            // ignore child courses
            if ($aisCourse->CRSE_OFFER_NBR != 1) {
                continue;
            }

            // ignore other subsequent sections of a course that we already added to Courses array
            if (in_array($aisCourse->CRSE_ID, $usedCrseIds)) {
                continue;
            }

            // ignore courses with 0 credits
            if ($aisCourse->CREDITS == 0) {
                continue;
            }

            $ssdCourse = new \StdClass;

            $ssdCourse->CourseTitle = $aisCourse->SUBJECT . ' ' . $aisCourse->CATALOG_NBR;
            if (is_string($aisCourse->LONG_TITLE)) {
                $ssdCourse->CourseTitle .= ': ' . $aisCourse->LONG_TITLE;
            }
            if (!is_string($aisCourse->LONG_TITLE) && is_string($aisCourse->TITLE)) {
                $ssdCourse->CourseTitle .= ': ' . $aisCourse->TITLE;
            }
            if (array_key_exists($aisCourse->CRSE_ID, $xlists)) {
                $ssdCourse->CourseTitle .= ' (' . implode(', ', $xlists[$aisCourse->CRSE_ID]) . ')';
            }

            $ssdCourse->Subject = $aisCourse->SUBJECT;
            $ssdCourse->CLASS_NBR = '';
            $ssdCourse->CRSE_ID = $aisCourse->CRSE_ID;
            $ssdCourse->STRM = $sTrm;
            $ssdCourse->INSTRUCTOR_EMPLID = $FacultyEmplId;
            $ssdCourse->fkQuarter = $pkQuarter;

            array_push($usedCrseIds, $aisCourse->CRSE_ID);

            array_push($Courses, $ssdCourse);
        }

        return $Courses;
    }

    public function newTermCoursesForOneFaculy($FacultyEmplId, $Season, $Year, $pkQuarter)
    {
        $term = $Season . ' ' . $Year;
        $strm = $this->termName(array('from' => 'readable', 'to' => 'aisStrm', 'string' => $term));
        $aisCourseObject = $this->container['SsdApp']
            ->aisapi
            ->get('courses/' . $strm . '/emplid/' . $FacultyEmplId)
            ->body;

        if (!property_exists($aisCourseObject, 'UC_CLASS_TBL')) {
            return array();
        }

        // get AIS Courses into an array
        if (is_array($aisCourseObject->UC_CLASS_TBL)) {
            $aisCourses = $aisCourseObject->UC_CLASS_TBL;
        } else {
            $aisCourses = array($aisCourseObject->UC_CLASS_TBL);
        }

        $xlists = $this->xlists($aisCourses);

        $usedCrseIds = array();

        // Make array of parent courses, smooshing crosslists into course name
        $Courses = array();
        foreach ($aisCourses as $key => $aisCourse) {
            // ignore child courses
            if ($aisCourse->CRSE_OFFER_NBR != 1) {
                continue;
            }

            // ignore other subsequent sections of a course that we already added to Courses array
            if (in_array($aisCourse->CRSE_ID, $usedCrseIds)) {
                continue;
            }

            // ignore courses with 0 credits
            if ($aisCourse->CREDITS == 0) {
                continue;
            }

            $ssdCourse = new \StdClass;

            $ssdCourse->CourseTitle = $aisCourse->SUBJECT . ' ' . $aisCourse->CATALOG_NBR;
            if (is_string($aisCourse->LONG_TITLE)) {
                $ssdCourse->CourseTitle .= ': ' . $aisCourse->LONG_TITLE;
            }
            if (!is_string($aisCourse->LONG_TITLE) && is_string($aisCourse->TITLE)) {
                $ssdCourse->CourseTitle .= ': ' . $aisCourse->TITLE;
            }
            if (array_key_exists($aisCourse->CRSE_ID, $xlists)) {
                $ssdCourse->CourseTitle .= ' (' . implode(', ', $xlists[$aisCourse->CRSE_ID]) . ')';
            }

            $ssdCourse->Subject = $aisCourse->SUBJECT;
            $ssdCourse->CLASS_NBR = '';
            $ssdCourse->CRSE_ID = $aisCourse->CRSE_ID;
            $ssdCourse->STRM = $strm;
            $ssdCourse->INSTRUCTOR_EMPLID = $FacultyEmplId;
            $ssdCourse->fkQuarter = $pkQuarter;
            $ssdCourse->UndergratuateEnrollment = 0;
            $ssdCourse->GraduateEnrollment = 0;

            array_push($usedCrseIds, $aisCourse->CRSE_ID);

            array_push($Courses, $ssdCourse);
        }

        return $Courses;
    }

    /**
     * @param $aisCourses
     * @return array
     */
    private function xlists($aisCourses)
    {
        $xlists = array();

        foreach ($aisCourses as $key => $aisCourse) {
            if ($aisCourse->CRSE_OFFER_NBR == 1) {
                continue;
            }
            $xlists[$aisCourse->CRSE_ID][$key] = $aisCourse->SUBJECT . ' ' . $aisCourse->CATALOG_NBR;
        }

        return $xlists;
    }
}