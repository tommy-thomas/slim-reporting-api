<?php

$container = $app->getContainer();

//========================================================
// App.
//========================================================
$container['SsdApp'] = function(){
    return new \MyNameSpace\AnnualReport\Application();
};

//========================================================
// Validator.
//========================================================
$container['Validator'] = function(){
    return new \MyNameSpace\AnnualReport\Validation\Validator();
};

//========================================================
// DAOs.
//========================================================

/**
 * @return \MyNameSpace\AnnualReport\FacultyDAO
 */
$container['FacultyDAO'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\FacultyDAO($app , 'Faculty');
};

/**
 * @return \MyNameSpace\AnnualReport\AdminDAO
 */
$container['AdminDAO'] = function(){
    return new \MyNameSpace\AnnualReport\AdminDAO('Admin');
};

/**
 * @return \MyNameSpace\AnnualReport\ReportDAO
 */
$container['ReportDAO'] = function(){
    return new \MyNameSpace\AnnualReport\ReportDAO('Report');
};

/**
 * @return \MyNameSpace\AnnualReport\CourseDAO
 */
$container['CourseDAO'] = function(){
    return new \MyNameSpace\AnnualReport\CourseDAO('Course');
};

/**
 * @return \MyNameSpace\AnnualReport\AdviseeDAO
 */
$container['AdviseeDAO'] = function(){
    return new \MyNameSpace\AnnualReport\AdviseeDAO('Advisee');
};

/**
 * @return \MyNameSpace\AnnualReport\ProxyDAO
 */
$container['ProxyDAO'] = function(){
    return new \MyNameSpace\AnnualReport\ProxyDAO('Proxy');
};

/**
 * @return \MyNameSpace\AnnualReport\AppointmentHistoryDAO
 */
$container['AppointmentHistoryDAO'] = function(){
    return new \MyNameSpace\AnnualReport\AppointmentHistoryDAO('AppointmentHistory');
};

/**
 * @return \MyNameSpace\AnnualReport\CVAttachmentDAO
 */
$container['CVAttachmentDAO'] = function(){
    return new \MyNameSpace\AnnualReport\CVAttachmentDAO('CVAttachment');
};

/**
 * @return \MyNameSpace\AnnualReport\GrantAndFellowshipDAO
 */
$container['GrantAndFellowshipDAO'] = function(){
  return new \MyNameSpace\AnnualReport\GrantAndFellowshipDAO('GrantAndFellowship');
};

/**
 * @return \MyNameSpace\AnnualReport\HonorAndAwardDAO
 */
$container['HonorAndAwardDAO'] = function(){
    return new \MyNameSpace\AnnualReport\HonorAndAwardDAO('HonorAndAward');
};

/**
 * @return \MyNameSpace\AnnualReport\ProfessionalServiceDAO
 */
$container['ProfessionalServiceDAO'] = function(){
    return new \MyNameSpace\AnnualReport\ProfessionalServiceDAO('ProfessionalService');
};

/**
 * @return \MyNameSpace\AnnualReport\PublicationDAO
 */
$container['PublicationDAO'] = function(){
    return new \MyNameSpace\AnnualReport\PublicationDAO('Publication');
};

/**
 * @return \MyNameSpace\AnnualReport\ResearchLeaveDAO
 */
$container['ResearchLeaveDAO'] = function(){
  return new \MyNameSpace\AnnualReport\ResearchLeaveDAO('ResearchLeave');
};

/**
 * @return \MyNameSpace\AnnualReport\ResearchSupportDAO
 */
$container['ResearchSupportDAO'] = function(){
  return new \MyNameSpace\AnnualReport\ResearchSupportDAO('ResearchSupport');
};

/**
 * @return \MyNameSpace\AnnualReport\ReportServiceDAO
 */
$container['ReportServiceDAO'] = function(){
    return new \MyNameSpace\AnnualReport\ReportServiceDAO('ReportService');
};

/**
 * @return \MyNameSpace\AnnualReport\AcademicYearDAO
 */
$container['AcademicYearDAO'] = function(){
    return new \MyNameSpace\AnnualReport\AcademicYearDAO('AcademicYear');
};

/**
 * @return \MyNameSpace\AnnualReport\DepartmentDAO
 */
$container['DepartmentDAO'] = function(){
    return new \MyNameSpace\AnnualReport\DepartmentDAO('Department');
};

/**
 * @return \MyNameSpace\AnnualReport\ResidentStatusTypeDAO
 */
$container['ResidentStatusTypeDAO'] = function(){
    return new \MyNameSpace\AnnualReport\ResidentStatusTypeDAO('ResidentStatusType');
};

/**
 * @return \MyNameSpace\AnnualReport\ResidentStatusTypeDAO
 */
$container['QuarterDAO'] = function(){
    return new \MyNameSpace\AnnualReport\QuarterDAO('Quarter');
};

//========================================================
// Controllers.
//========================================================

$container['AisController'] = function() use ($app) {
    return new \MyNameSpace\AnnualReport\AisTranslator( $app );
};


$container['FacultyController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Faculty' );
};

$container['AdminController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Admin');
};

$container['ReportController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Report');
};

$container['CourseController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Course');
};

$container['AdviseeController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Advisee');
};

$container['ProxyController'] = function() use ($app){
  return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Proxy');
};

$container['AppointmentHistoryController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'AppointmentHistory');
};

$container['CVAttachmentController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'CVAttachment');
};

$container['HonorAndAwardController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'HonorAndAward');
};

$container['GrantAndFellowshipController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'GrantAndFellowship');
};

$container['ProfessionalServiceController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'ProfessionalService');
};

$container['PublicationController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Publication');
};

$container['ResearchLeaveController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'ResearchLeave');
};

$container['ResearchSupportController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'ResearchSupport');
};

$container['ReportServiceController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'ReportService');
};

$container['AcademicYearController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'AcademicYear');
};

$container['DepartmentController'] = function() use ($app){
   return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Department');
};

$container['ResidentStatusTypeController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'ResidentStatusType');
};

$container['QuarterController'] = function() use ($app){
    return new \MyNameSpace\AnnualReport\Controllers\Controller($app , 'Quarter');
};

require __DIR__ . "/routes.php";