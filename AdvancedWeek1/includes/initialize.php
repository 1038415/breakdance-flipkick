<?php
require_once 'settings.php';
require_once 'classes/CMGTClass.php';
require_once 'classes/student.php';

try {
    //Load data & convert to PHP Arrays
    $studentsRawDate = file_get_contents(DATA_PATH . 'students.json');
    $studentsRawList = json_decode($studentsRawData, true);

    //Create new instace for class & add students
    $cmgtClass = new CMGTClass();
    foreach ($studentsRawList as $studentRaw) {
        $cmgtClass->addStudent($studentRaw);
    }

    //Get variables for template
    $students = $cmgtClass->getStudents();
    $totalStudents = $cmgtClass->getTotalStudents();
} catch (Exception $e) {
    //Set error variable for template
    $error = 'Oops, try to fix your eroor please: ' .
        $e->getMessage() . ' on line ' . $e->getLine() , ' of ' .
        $e->getFile();

}