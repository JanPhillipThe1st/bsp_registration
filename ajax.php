<?php
$action = filter_input(INPUT_POST,"action");

include "models/school.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include 'db.php';
session_start();
if($action == 'login'){
    $resultObject = new stdClass();
    $username = filter_input(INPUT_POST,"username");
    $password = filter_input(INPUT_POST,"password");

    // $result=$conn->query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".md5(hash("sha256",($password)))."' AND `type` = '".$type."' ;");
    $result=$conn->query("SELECT * FROM `user` INNER JOIN `account` ON `account`.`userID` = `user`.`userID` 
    WHERE `username` = '".$username."' AND `password` = '$password' ;");
    $row = $result->fetch_assoc();
    if($row > 0){
        $resultObject->username = $row["username"];
        $resultObject->access = $row["access_type"];
        $_SESSION["userID"] = $row["userID"];
        $_SESSION["school_id"] = $row["schoolID"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["full_name"] = $row["full_name"];
        $_SESSION["access"] = $row["access_type"];
        echo json_encode($resultObject);
    }
    else{
        echo json_encode($result);
    }
    
}
if($action == 'get_school_years'){
    $rooms_query=$conn->query("SELECT * FROM `school_year`;");
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->ID = $row["syID"];
        $room_object->school_year_start = $row["school_year_start"];
        $room_object->school_year_end = $row["school_year_end"];
        $room_object->semester = $row["semester"];
        $room_object->current = $row["current"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_students'){
    $query=$conn->query("SELECT * FROM `student` WHERE `student`.`school_year_ID` = ".$_SESSION["school_year"].";");
    $resultObject = array();
    while( $row = $query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->studentID = $row["studentID"];
        $room_object->schoolID = $row["schoolID"];
        $room_object->student_first_name = $row["student_first_name"];
        $room_object->student_middle_name = $row["student_middle_name"];
        $room_object->student_last_name = $row["student_last_name"];
        $room_object->student_grade = $row["student_grade"];
        $room_object->student_section = $row["student_section"];
        $room_object->student_rank = $row["student_rank"];
        $room_object->student_photo = $row["student_photo"];
        $room_object->student_barangay = $row["student_barangay"];
        $room_object->student_city = $row["student_city"];
        $room_object->student_province = $row["student_province"];
        $room_object->student_email = $row["student_email"];
        $room_object->student_phone = $row["student_phone"];
        $room_object->student_emergency_guardian = $row["student_emergency_guardian"];
        $room_object->student_emergency_phone = $row["student_emergency_phone"];
        $room_object->student_emergency_address = $row["student_emergency_address"];
        $room_object->date_registered = $row["date_registered"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'filter_students'){
    $search_filter = filter_input(INPUT_POST,"search_filter");
    $search_text = filter_input(INPUT_POST,"search_text");
    switch($search_filter){
        case 'all':
            $query=$conn->query("SELECT * FROM `student` WHERE `student`.`school_year_ID` = ".$_SESSION["school_year"].";");
            break;
        default:
            $query=$conn->query("SELECT * FROM `student` WHERE `student`.`school_year_ID` = ".$_SESSION["school_year"]." AND `$search_filter` LIKE '%$search_text%';");
            break;
    }
    $resultObject = array();
    while( $row = $query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->studentID = $row["studentID"];
        $room_object->schoolID = $row["schoolID"];
        $room_object->student_first_name = $row["student_first_name"];
        $room_object->student_middle_name = $row["student_middle_name"];
        $room_object->student_last_name = $row["student_last_name"];
        $room_object->student_grade = $row["student_grade"];
        $room_object->student_section = $row["student_section"];
        $room_object->student_rank = $row["student_rank"];
        $room_object->student_photo = $row["student_photo"];
        $room_object->student_barangay = $row["student_barangay"];
        $room_object->student_city = $row["student_city"];
        $room_object->student_province = $row["student_province"];
        $room_object->student_email = $row["student_email"];
        $room_object->student_phone = $row["student_phone"];
        $room_object->student_emergency_guardian = $row["student_emergency_guardian"];
        $room_object->student_emergency_phone = $row["student_emergency_phone"];
        $room_object->student_emergency_address = $row["student_emergency_address"];
        $room_object->date_registered = $row["date_registered"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_students_by_school_id'){
    $schoolID = filter_input(INPUT_POST,"schoolID");
    $query=$conn->query("SELECT * FROM `student` WHERE `student`.`school_year_ID` = ".$_SESSION["school_year"]." AND schoolID = '".$schoolID."';");
    $resultObject = array();
    while( $row = $query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->studentID = $row["studentID"];
        $room_object->schoolID = $row["schoolID"];
        $room_object->student_first_name = $row["student_first_name"];
        $room_object->student_middle_name = $row["student_middle_name"];
        $room_object->student_last_name = $row["student_last_name"];
        $room_object->student_grade = $row["student_grade"];
        $room_object->student_section = $row["student_section"];
        $room_object->student_rank = $row["student_rank"];
        $room_object->student_photo = $row["student_photo"];
        $room_object->student_barangay = $row["student_barangay"];
        $room_object->student_city = $row["student_city"];
        $room_object->student_province = $row["student_province"];
        $room_object->student_email = $row["student_email"];
        $room_object->student_phone = $row["student_phone"];
        $room_object->student_emergency_guardian = $row["student_emergency_guardian"];
        $room_object->student_emergency_phone = $row["student_emergency_phone"];
        $room_object->student_emergency_address = $row["student_emergency_address"];
        $room_object->date_registered = $row["date_registered"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_districts'){
    $query=$conn->query("SELECT * FROM `district`;");
    $resultObject = array();
    while( $row = $query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->districtID = $row["districtID"];
        $room_object->district_number = $row["district_number"];
        $room_object->date_created = $row["date_created"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_teachers'){
    $query=$conn->query("SELECT *,CONCAT(barangay,' ',city,' ',province) AS `address` FROM `teacher` WHERE `teacher`.`school_year_ID` = ".$_SESSION["school_year"].";");
    $resultObject = array();
    while( $row = $query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->studentID = $row["teacher_id"];
        $room_object->schoolID = $row["school_id"];
        $room_object->student_first_name = $row["first_name"];
        $room_object->student_middle_name = $row["middle_name"];
        $room_object->student_last_name = $row["last_name"];
        $room_object->student_grade = $row["grade"];
        $room_object->student_address = $row["address"];
        $room_object->student_section = $row["section"];
        $room_object->student_barangay = $row["barangay"];
        $room_object->student_city = $row["city"];
        $room_object->student_province = $row["province"];
        $room_object->student_email = $row["email_address"];
        $room_object->student_phone = $row["phone_number"];
        $room_object->student_photo = $row["teacher_photo"];
        $room_object->student_emergency_guardian = $row["contact_person"];
        $room_object->student_emergency_phone = $row["contact_person_number"];
        $room_object->student_emergency_address = $row["contact_person_address"];
        $room_object->date_registered = $row["date_registered"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'filter_teachers'){
    $search_filter = filter_input(INPUT_POST,"search_filter");
    $search_text = filter_input(INPUT_POST,"search_text");
    switch($search_filter){
        case 'name':
                $query=$conn->query("SELECT *,CONCAT(first_name,' ',middle_name,' ',last_name) AS 'name',CONCAT(barangay,' ',city,' ',province) AS 'address'
                FROM `teacher` 
                WHERE `teacher`.`school_year_ID` = ".$_SESSION["school_year"]." AND (`first_name` LIKE '%".$search_text."%' OR `middle_name` LIKE '%".$search_text."%'OR `last_name` LIKE '%".$search_text."%');");
            break;
        case 'address':
                $query=$conn->query("SELECT *,CONCAT(first_name,' ',middle_name,' ',last_name) AS 'name',CONCAT(barangay,' ',city,' ',province) AS 'address'
                FROM `teacher` 
                WHERE `teacher`.`school_year_ID` = ".$_SESSION["school_year"]." AND (`barangay` LIKE '%".$search_text."%' OR `city` LIKE '%".$search_text."%'OR `province` LIKE '%".$search_text."%');");
            break;
            default:
                $query=$conn->query("SELECT *,CONCAT(first_name,' ',middle_name,' ',last_name) AS 'name',CONCAT(barangay,' ',city,' ',province) AS 'address'
                FROM `teacher` WHERE `teacher`.`school_year_ID` = ".$_SESSION["school_year"]." AND `".$search_filter."` LIKE '%".$search_text."%';");
            break;
        }
    $resultObject = array();
    while( $row = $query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->studentID = $row["teacher_id"];
        $room_object->schoolID = $row["school_id"];
        $room_object->student_first_name = $row["first_name"];
        $room_object->student_middle_name = $row["middle_name"];
        $room_object->student_last_name = $row["last_name"];
        $room_object->student_grade = $row["grade"];
        $room_object->student_address = $row["address"];
        $room_object->student_section = $row["section"];
        $room_object->student_barangay = $row["barangay"];
        $room_object->student_city = $row["city"];
        $room_object->student_province = $row["province"];
        $room_object->student_email = $row["email_address"];
        $room_object->student_phone = $row["phone_number"];
        $room_object->student_photo = $row["teacher_photo"];
        $room_object->student_emergency_guardian = $row["contact_person"];
        $room_object->student_emergency_phone = $row["contact_person_number"];
        $room_object->student_emergency_address = $row["contact_person_address"];
        $room_object->date_registered = $row["date_registered"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_users'){
    $rooms_query=$conn->query("SELECT * FROM `user` INNER JOIN `account` ON  `account`.`userID` = `user`.`userID` INNER JOIN `school` ON `school`.`schoolID` = `account`.`schoolID`;");
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->userID = $row["userID"];
        $room_object->username = $row["username"];
        $room_object->password = $row["password"];
        $room_object->access_type = $row["access_type"];
        $room_object->full_name = $row["full_name"];
        $room_object->accountID = $row["acccountID"];
        $room_object->userID = $row["userID"];
        $room_object->schoolID = $row["schoolID"];
        $room_object->account_first_name = $row["account_first_name"];
        $room_object->account_middle_name = $row["account_middle_name"];
        $room_object->account_last_name = $row["account_last_name"];
        $room_object->account_grade = $row["account_grade"];
        $room_object->account_section = $row["account_section"];
        $room_object->account_photo = $row["account_photo"];
        $room_object->account_barangay = $row["account_barangay"];
        $room_object->account_city = $row["account_city"];
        $room_object->account_province = $row["account_province"];
        $room_object->account_email = $row["account_email"];
        $room_object->account_phone = $row["account_phone"];
        $room_object->districtID = $row["districtID"];
        $room_object->school_name = $row["school_name"];
        $room_object->school_address = $row["school_address"];
        $room_object->date_registered = $row["date_registered"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}

if($action == 'get_current_user'){
    $rooms_query=$conn->query("SELECT * FROM `user` INNER JOIN `account` ON  `account`.`userID` = `user`.`userID` 
    WHERE `user`.`userID` = '".$_SESSION["userID"]."'
    ");
    $resultObject = new stdClass();
    while( $row = $rooms_query->fetch_assoc()){
        $resultObject->userID = $row["userID"];
        $resultObject->username = $row["username"];
        $resultObject->password = $row["password"];
        $resultObject->access_type = $row["access_type"];
        $resultObject->full_name = $row["full_name"];
        $resultObject->accountID = $row["acccountID"];
        $resultObject->userID = $row["userID"];
        $resultObject->schoolID = $row["schoolID"];
        $resultObject->account_first_name = $row["account_first_name"];
        $resultObject->account_middle_name = $row["account_middle_name"];
        $resultObject->account_last_name = $row["account_last_name"];
        $resultObject->account_grade = $row["account_grade"];
        $resultObject->account_section = $row["account_section"];
        $resultObject->account_photo = $row["account_photo"];
        $resultObject->account_barangay = $row["account_barangay"];
        $resultObject->account_city = $row["account_city"];
        $resultObject->account_province = $row["account_province"];
        $resultObject->account_email = $row["account_email"];
        $resultObject->account_phone = $row["account_phone"];
        $resultObject->date_registered = $row["date_registered"];
    }
    echo json_encode($resultObject);
}
if($action == 'get_school_coordinator'){
    $school_coordinator_id = filter_input(INPUT_POST,"ID");
    $rooms_query=$conn->query("SELECT * FROM `account`
    WHERE `account`.`acccountID` = '$school_coordinator_id';");
    $resultObject = new stdClass();
    
    while( $row = $rooms_query->fetch_assoc()){
        $resultObject->accountID = $row["acccountID"];
        $resultObject->userID = $row["userID"];
        $resultObject->schoolID = $row["schoolID"];
        $resultObject->account_first_name = $row["account_first_name"];
        $resultObject->account_middle_name = $row["account_middle_name"];
        $resultObject->account_last_name = $row["account_last_name"];
        $resultObject->account_grade = $row["account_grade"];
        $resultObject->account_section = $row["account_section"];
        $resultObject->account_photo = $row["account_photo"];
        $resultObject->account_barangay = $row["account_barangay"];
        $resultObject->account_city = $row["account_city"];
        $resultObject->account_province = $row["account_province"];
        $resultObject->account_email = $row["account_email"];
        $resultObject->account_phone = $row["account_phone"];
        $resultObject->date_registered = $row["date_registered"];
    }
    echo json_encode($resultObject);
}
if($action == 'get_school_coordinators'){
    $rooms_query=$conn->query("SELECT * FROM `account` a INNER JOIN `user` b
    ON a.userID = b.userID WHERE b.access_type = 'school_coordinator';");
    $resultArrayObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $resultObject = new stdClass();
        $resultObject->accountID = $row["acccountID"];
        $resultObject->userID = $row["userID"];
        $resultObject->schoolID = $row["schoolID"];
        $resultObject->full_name = $row["full_name"];
        $resultObject->account_first_name = $row["account_first_name"];
        $resultObject->account_middle_name = $row["account_middle_name"];
        $resultObject->account_last_name = $row["account_last_name"];
        $resultObject->account_grade = $row["account_grade"];
        $resultObject->account_section = $row["account_section"];
        $resultObject->account_photo = $row["account_photo"];
        $resultObject->account_barangay = $row["account_barangay"];
        $resultObject->account_city = $row["account_city"];
        $resultObject->account_province = $row["account_province"];
        $resultObject->account_email = $row["account_email"];
        $resultObject->account_phone = $row["account_phone"];
        $resultObject->date_registered = $row["date_registered"];
        array_push($resultArrayObject,$resultObject);
    }
    echo json_encode($resultArrayObject);
}
if($action == 'get_schools'){
    $rooms_query=$conn->query("SELECT * FROM school");
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->ID = $row["schoolID"];
        $room_object->school_name = $row["school_name"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'search_schools'){
    $search_text = filter_input(INPUT_POST,"search_text");
    $search_filter = filter_input(INPUT_POST,"search_filter");
    $schools_query=$conn->query("SELECT * FROM school WHERE ".$search_filter." LIKE '%".$search_text."%'");
    $resultObject = array();
    while( $row = $schools_query->fetch_assoc()){
        $school_object =  School::fromAssoc($row);
        array_push($resultObject,$school_object);
    }
    echo json_encode($resultObject);
}
if($action == 'filter_users'){
    $searchFilter = filter_input(INPUT_POST,"searchFilter");
    $searchTerm = filter_input(INPUT_POST,"searchTerm");
    
      if ($searchFilter === "all") {
        $rooms_query=$conn->query("SELECT * FROM `user` INNER JOIN `account` ON
      `account`.`userID` = `user`.`userID` ;");
      }
      else{
        $rooms_query=$conn->query("SELECT * FROM `user` INNER JOIN `account` ON
            `account`.`userID` = `user`.`userID` 
            WHERE ".$searchFilter." LIKE '%".$searchTerm."%'");
      }
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->userID = $row["userID"];
        $room_object->username = $row["username"];
        $room_object->password = $row["password"];
        $room_object->access_type = $row["access_type"];
        $room_object->full_name = $row["full_name"];
        $room_object->accountID = $row["acccountID"];
        $room_object->userID = $row["userID"];
        $room_object->schoolID = $row["schoolID"];
        $room_object->account_first_name = $row["account_first_name"];
        $room_object->account_middle_name = $row["account_middle_name"];
        $room_object->account_last_name = $row["account_last_name"];
        $room_object->account_grade = $row["account_grade"];
        $room_object->account_section = $row["account_section"];
        $room_object->account_photo = $row["account_photo"];
        $room_object->account_barangay = $row["account_barangay"];
        $room_object->account_city = $row["account_city"];
        $room_object->account_province = $row["account_province"];
        $room_object->account_email = $row["account_email"];
        $room_object->account_phone = $row["account_phone"];
        $room_object->date_registered = $row["date_registered"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_school_by_id'){
    $schoolID = filter_input(INPUT_POST,"schoolID");
    $rooms_query=$conn->query("SELECT * FROM school");
    $resultObject = array();
    $room_object = new stdClass();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object->ID = $row["schoolID"];
        $room_object->school_name = $row["school_name"];
        $room_object->school_contact = $row["school_contact"];
        $room_object->district = $row["districtID"];
        $room_object->school_address = $row["school_address"];
    }
    echo json_encode($room_object);
}
if($action == 'get_schools_it_coordinator'){
    $rooms_query=$conn->query("SELECT *,a.schoolID AS 'school_id',a.date_registered AS 'school_registered' FROM `school` a
    INNER JOIN `account`  
    INNER JOIN `user`  ON  `account`.`userID` = `user`.`userID` 
    WHERE `user`.`access_type` = 'school_coordinator';");
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->ID = $row["school_id"];
        $room_object->school_name = $row["school_name"];
        $room_object->district = $row["districtID"];
        $room_object->date_registered = $row["school_registered"];
        $room_object->address = $row["school_address"];
        $room_object->contact = $row["school_contact"];
        $room_object->school_coordinator_id = $row["acccountID"];
        $room_object->coordinator = $row["account_last_name"].	", ".  $row["account_first_name"]." ". substr($row["account_middle_name"],0,1).". ";
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_schools_by_district'){
    $districtID = filter_input(INPUT_POST,"districtID");
    $rooms_query=$conn->query("SELECT * FROM school WHERE districtID = '$districtID'");
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->school_name = $row["school_name"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'log_out'){
    session_destroy();
}
if($action == 'confirm_school_year'){
    $school_year_id = filter_input(INPUT_POST,"school_year_id");
    $school_year_string = filter_input(INPUT_POST,"school_year_string");
    $_SESSION["school_year"] = $school_year_id;
    $_SESSION["school_year_string"] = $school_year_string;
}
if($action == 'get_current_teacher'){
    $current_userID = $_SESSION["userID"];
    $rooms_query=$conn->query("SELECT * FROM `teacher`;");
    $row = $rooms_query->fetch_assoc();
    $resultObject = array();
    if($row > 0){
        $room_object = new stdClass();
        $room_object->ID = $row["ID"];
        $room_object->teacher_name = $row["teacher_name"];
        $room_object->teacher_address = $row["teacher_address"];
        $room_object->teacher_contact = $row["teacher_contact"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_schedules'){
    $rooms_query=$conn->query("SELECT * FROM `schedule` INNER JOIN `room` ON `schedule`.`room_ID` = `room`.`ID` INNER JOIN `teacher` ON `schedule`.`teacher_ID` = `teacher`.`ID`;");
    $row = $rooms_query->fetch_assoc();
    $resultObject = array();
    if($row > 0){
        $room_object = new stdClass();
        $room_object->ID = $row["ID"];
        $room_object->course_code = $row["course_code"];
        $room_object->subject_description = $row["subject_description"];
        $room_object->time_from = $row["time_from"];
        $room_object->time_until = $row["time_until"];
        $room_object->teacher_name = $row["teacher_name"];
        $room_object->room_number = $row["room_number"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_page_information'){
    $rooms_query=$conn->query("SELECT * FROM `page_information`;");
    $room_object = new stdClass();
    $row = $rooms_query->fetch_assoc();
    if($row > 0){
        $room_object->address = $row["address"];
        $room_object->contact_globe = $row["contact_globe"];
        $room_object->contact_smart = $row["contact_smart"];
        $room_object->contact_email = $row["contact_email"];
    }
    echo json_encode($room_object);
}
if($action == 'add_student'){
    $student_first_name = filter_input(INPUT_POST,"student_first_name");
    $student_middle_name = filter_input(INPUT_POST,"student_middle_name");
    $student_last_name = filter_input(INPUT_POST,"student_last_name");
    $student_grade = filter_input(INPUT_POST,"student_grade");
    $student_photo = filter_input(INPUT_POST,"student_photo");
    $student_section = filter_input(INPUT_POST,"student_section");
    $student_barangay = filter_input(INPUT_POST,"student_barangay");
    $student_city = filter_input(INPUT_POST,"student_city");
    $student_province = filter_input(INPUT_POST,"student_province");
    $student_email = filter_input(INPUT_POST,"student_email");
    $student_phone = filter_input(INPUT_POST,"student_phone");
    $student_emergency_guardian = filter_input(INPUT_POST,"student_emergency_guardian");
    $student_emergency_phone = filter_input(INPUT_POST,"student_emergency_phone");
    $student_emergency_address = filter_input(INPUT_POST,"student_emergency_address");

    $add_students_query=$conn->query("INSERT INTO `student`(`schoolID`, `student_first_name`, `student_middle_name`, 
    `student_last_name`, `student_grade`, `student_section`, `student_rank`, `student_photo`, `student_barangay`, `student_city`,
     `student_province`, `student_email`, `student_phone`, `student_emergency_guardian`, `student_emergency_phone`, 
     `student_emergency_address`) 
    VALUES ( '1', '$student_first_name', '$student_middle_name', 
    '$student_last_name', '$student_grade', '$student_section', '', '$student_photo', '$student_barangay', '$student_city', '$student_province',
     '$student_email', '$student_phone', '$student_emergency_guardian', '$student_emergency_phone', '$student_emergency_address') ;");
  
}
if($action == "add_teacher"){
    $teacher_first_name = filter_input(INPUT_POST,"teacher_first_name");
    $teacher_middle_name = filter_input(INPUT_POST,"teacher_middle_name");
    $teacher_last_name = filter_input(INPUT_POST,"teacher_last_name");
    $teacher_grade = filter_input(INPUT_POST,"teacher_grade");
    $teacher_photo = filter_input(INPUT_POST,"teacher_photo");
    $teacher_section = filter_input(INPUT_POST,"teacher_section");
    $teacher_barangay = filter_input(INPUT_POST,"teacher_barangay");
    $teacher_city = filter_input(INPUT_POST,"teacher_city");
    $teacher_province = filter_input(INPUT_POST,"teacher_province");
    $teacher_email = filter_input(INPUT_POST,"teacher_email");
    $teacher_phone = filter_input(INPUT_POST,"teacher_phone");
    $teacher_emergency_guardian = filter_input(INPUT_POST,"teacher_emergency_guardian");
    $teacher_emergency_phone = filter_input(INPUT_POST,"teacher_emergency_phone");
    $teacher_emergency_address = filter_input(INPUT_POST,"teacher_emergency_address");
    $school_id = $_SESSION["school_id"];
    $school_year_ID = $_SESSION["school_year"];
    echo "INSERT INTO `teacher` (`first_name`, 
    `middle_name`, `last_name`, `grade`, `section`, `barangay`, 
    `city`, `province`, `teacher_photo`, `email_address`, `phone_number`, 
    `contact_person`, `contact_person_number`, `contact_person_address`, 
    `school_id`, `school_year_ID`) 
    VALUES ('$teacher_first_name', '$teacher_middle_name', '$teacher_last_name',
     '$teacher_grade', '$teacher_section', '$teacher_barangay', '$teacher_city', 
     '$teacher_photo', '$teacher_province', '$teacher_email', '$teacher_phone', 
     '$teacher_emergency_guardian', '$teacher_emergency_phone', '$teacher_emergency_address', 
     '$school_id', '$school_year_ID')";

    $add_teacher_query=$conn->query("INSERT INTO `teacher` (`first_name`, 
    `middle_name`, `last_name`, `grade`, `section`, `barangay`, 
    `city`, `teacher_photo`, `province`, `email_address`, `phone_number`, 
    `contact_person`, `contact_person_number`, `contact_person_address`, 
    `school_id`, `school_year_ID`) 
    VALUES ('$teacher_first_name', '$teacher_middle_name', '$teacher_last_name',
     '$teacher_grade', '$teacher_section', '$teacher_barangay', '$teacher_city', 
     '$teacher_photo', '$teacher_province', '$teacher_email', '$teacher_phone', 
     '$teacher_emergency_guardian', '$teacher_emergency_phone', '$teacher_emergency_address', 
     '$school_id', '$school_year_ID')");
}
if($action == 'add_district'){
    $district_number = filter_input(INPUT_POST,"district_number");
    $add_user_query=$conn->query("INSERT INTO `district`(`district_number`)
    VALUES ('$district_number')");
    $userID = $conn->insert_id;
       
  
}
if($action == 'add_user'){
    $user_first_name = filter_input(INPUT_POST,"add_user_first_name");
    $user_middle_name = filter_input(INPUT_POST,"add_user_middle_name");
    $user_last_name = filter_input(INPUT_POST,"add_user_last_name");
    $user_photo = filter_input(INPUT_POST,"add_user_photo");
    $user_username = filter_input(INPUT_POST,"add_user_username");
    $user_password = filter_input(INPUT_POST,"add_user_password");
    $user_account_grade = filter_input(INPUT_POST,"add_user_account_grade");
    $user_section = "N/A";
    $user_barangay = filter_input(INPUT_POST,"add_user_barangay");
    $user_city = filter_input(INPUT_POST,"add_user_city");
    $user_province = filter_input(INPUT_POST,"add_user_province");
    $user_email = filter_input(INPUT_POST,"add_user_email");
    $user_phone = filter_input(INPUT_POST,"add_user_phone");
    $user_access_type = filter_input(INPUT_POST,"add_user_access_type");
    $user_schoolID = filter_input(INPUT_POST,"add_user_school");
    
    $add_user_query=$conn->query("INSERT INTO `user`(`username`, `password`, `access_type`, `full_name`) 
    VALUES ('$user_username', '$user_password', '$user_access_type', '$user_first_name  $user_last_name')");
    $userID = $conn->insert_id;
    echo $userID;
    $conn->query("INSERT INTO `account`(`userID`, `schoolID`,
     `account_first_name`, `account_middle_name`, `account_last_name`, `account_grade`,
      `account_section`, `account_photo`, `account_barangay`, `account_city`, `account_province`,
       `account_email`, `account_phone`) 
       VALUES ('$userID', $user_schoolID,
     '$user_first_name', '$user_middle_name', '$user_last_name', '$user_account_grade',
      '$user_section', '$user_photo', '$user_barangay', '$user_city', '$user_province',
       '$user_email', '$user_phone')");
       
  
}
if($action == "add_school_year"){
    $school_year_start = filter_input(INPUT_POST,"school_year_from");
    $school_year_end = filter_input(INPUT_POST,"school_year_to");
    $semester = filter_input(INPUT_POST,"semester");
    $addSchoolYearQuery = "INSERT INTO `school_year`(`school_year_start`, `school_year_end`, `semester`) 
    VALUES ('$school_year_start','$school_year_end','$semester')";
    if($conn->query($addSchoolYearQuery)){
        echo "200";
        return true;
    }
    else{
        echo "500";
        return false; 
    }
}
if($action == "update_school_year"){
    $school_year_start = filter_input(INPUT_POST,"school_year_start");
    $school_year_end = filter_input(INPUT_POST,"school_year_end");
    $semester = filter_input(INPUT_POST,"semester");
    $school_year_id = filter_input(INPUT_POST,"school_year_id");
    $updateSchoolYearQuery = "UPDATE `school_year` SET `school_year_start`='$school_year_start',
    `school_year_end`='$school_year_end',`semester`='$semester' WHERE `syID`='$school_year_id'";
    if($conn->query($updateSchoolYearQuery)){
        echo "200";
        return true;
    }
    else{
        echo "500";
        return false; 
    }
}
if($action == "set_current_school_year"){
    $school_year_id = filter_input(INPUT_POST,"syID");
    $setSchoolYearQuery = "UPDATE `school_year` SET `current`='0' WHERE `syID`!='$school_year_id'";
    if($conn->query($setSchoolYearQuery)){
        $updateSchoolYearQuery = "UPDATE `school_year` SET `current`='1' WHERE `syID`='$school_year_id'";
        if($conn->query($updateSchoolYearQuery)){
            echo "200";
            return true;
        }
        else{
            echo "500";
            return false; 
        }
    }
    else{
        echo "500";
        return false; 
    }
}
if($action == "delete_school_year"){
    $school_year_id = filter_input(INPUT_POST,"school_year_id");
    $deleteSchoolYearQuery = "DELETE FROM `school_year` WHERE `syID`='$school_year_id'";
    if($conn->query($deleteSchoolYearQuery)){
        echo "200";
        return true;
    }
    else{
        echo "500";
        return false; 
    }
}
if($action == "add_school"){
    if(!isset($_SESSION["userID"])){
        echo "no user ID found";
        return;
    }
    else{
            $schoolID = filter_input(INPUT_POST,"school_id");
            $districtID = filter_input(INPUT_POST,"school_district_id");
            $school_name = filter_input(INPUT_POST,"school_name");
            $school_address = filter_input(INPUT_POST,"school_address");
            $school_contact = filter_input(INPUT_POST,"school_contact");
            $school_coordinator_ID = filter_input(INPUT_POST,"school_coordinator_id");
            $add_school_query = $conn->query("INSERT INTO `school` (`schoolID`, `districtID`, `school_name`, `date_registered`, `school_address`, `school_contact`, `it_coordinator_ID`) 
            VALUES ('$schoolID', '$districtID', '$school_name', current_timestamp(), '$school_address', '$school_contact', '$school_coordinator_ID')");
            if ($add_school_query) {
                http_response_code(200);
                echo "200";
            }   
            else{
                echo "500";
            } 
    }
}
if($action == "edit_school"){
    if(!isset($_SESSION["userID"])){
        echo "no user ID found";
        return;
    }
    else{
        $schoolID = filter_input(INPUT_POST,"school_id");
        $districtID = filter_input(INPUT_POST,"school_district_id");
        $school_name = filter_input(INPUT_POST,"school_name");
        $school_address = filter_input(INPUT_POST,"school_address");
        $school_contact = filter_input(INPUT_POST,"school_contact");
        $school_coordinator_ID = filter_input(INPUT_POST,"school_coordinator_id");
        $edit_school_query = $conn->query("UPDATE `school` 
        SET `schoolID` = '$schoolID', `districtID` = '$districtID', `school_name` = '$school_name', `date_registered` = current_timestamp(), 
        `school_address` = '$school_address', `school_contact` = '$school_contact', `it_coordinator_ID` =  '$school_coordinator_ID'
        WHERE `schoolID` = '$schoolID';");
        if ($edit_school_query) {
             http_response_code(200);
            echo "200";
        }   
        else{
            echo "500";
        } 
    }
}
if($action == "delete_school"){
    if(!isset($_SESSION["userID"])){
        echo "no user ID found";
        return;
    }
    else{
        $schoolID = filter_input(INPUT_POST,"school_id");
        $delete_school_query = $conn->query("DELETE FROM `school` 
        WHERE `schoolID` = '$schoolID';");
        if ($delete_school_query) {
             http_response_code(200);
            echo "200";
        }   
        else{
            echo "500";
        } 
    }
}
if($action == 'update_student'){
    $studentID = filter_input(INPUT_POST,"studentID");
    $student_first_name = filter_input(INPUT_POST,"student_first_name");
    $student_middle_name = filter_input(INPUT_POST,"student_middle_name");
    $student_last_name = filter_input(INPUT_POST,"student_last_name");
    $student_grade = filter_input(INPUT_POST,"student_grade");
    $student_photo = filter_input(INPUT_POST,"student_photo");
    $student_section = filter_input(INPUT_POST,"student_section");
    $student_barangay = filter_input(INPUT_POST,"student_barangay");
    $student_city = filter_input(INPUT_POST,"student_city");
    $student_province = filter_input(INPUT_POST,"student_province");
    $student_email = filter_input(INPUT_POST,"student_email");
    $student_phone = filter_input(INPUT_POST,"student_phone");
    $student_emergency_guardian = filter_input(INPUT_POST,"student_emergency_guardian");
    $student_emergency_phone = filter_input(INPUT_POST,"student_emergency_phone");
    $student_emergency_address = filter_input(INPUT_POST,"student_emergency_address");

    $add_students_query=$conn->query("UPDATE `student` SET
    `student_first_name`='$student_first_name',`student_middle_name`='$student_middle_name',
    `student_last_name`='$student_last_name',`student_grade`='$student_grade',
    `student_section`='$student_section',`student_rank`='Growing Usa',`student_photo`='$student_photo',
    `student_barangay`='$student_barangay',`student_city`='$student_city',`student_province`='$student_province',
    `student_email`='$student_email',`student_phone`='$student_phone',`student_emergency_guardian`='$student_emergency_guardian',
    `student_emergency_phone`='$student_emergency_phone',`student_emergency_address`='$student_emergency_address' WHERE `studentID`='$studentID';");
  
}
if($action == 'update_user'){
    $user_first_name = filter_input(INPUT_POST,"user_first_name");
    $user_middle_name = filter_input(INPUT_POST,"user_middle_name");
    $user_last_name = filter_input(INPUT_POST,"user_last_name");
    $user_photo_name = filter_input(INPUT_POST,"user_photo_name");
    $user_barangay = filter_input(INPUT_POST,"user_barangay");
    $user_city = filter_input(INPUT_POST,"user_city");
    $user_province = filter_input(INPUT_POST,"user_province");
    $user_email = filter_input(INPUT_POST,"user_email");
    $user_phone = filter_input(INPUT_POST,"user_phone");
    $user_username = filter_input(INPUT_POST,"user_username");
    $user_password = filter_input(INPUT_POST,"user_password");
    $user_confirm_password = filter_input(INPUT_POST,"user_confirm_password");
    $user_access_type = filter_input(INPUT_POST,"edit_user_access_type");
    $user_phone = filter_input(INPUT_POST,"user_phone");
    $userID = filter_input(INPUT_POST,"userID");
    $user_school = filter_input(INPUT_POST,"user_school");
    $user_access_type = filter_input(INPUT_POST,"user_access_type");

    $conn->query("UPDATE `user`
     SET `username`='$user_username',`password`='$user_password',`access_type`='$user_access_type',`full_name`='$user_first_name $user_last_name' 
    WHERE`userID`='$userID';");

    $update_account_query ="UPDATE `account` SET `schoolID`='$user_school',`account_first_name`='$user_first_name',
    `account_middle_name`='$user_middle_name',`account_last_name`='$user_last_name',`account_grade`='N/A',
    `account_section`='N/A',`account_photo`='$user_photo_name',`account_barangay`='$user_barangay',
    `account_city`='$user_city',`account_province`='$user_province',`account_email`='$user_email',
    `account_phone`='$user_phone'
    WHERE`userID`='$userID';";
    if ($conn->query($update_account_query) === TRUE) {
        echo "<h1>Record updated successfully</h1>";
      } else {
        echo "Error updating record: " . $conn->error;
      }
  
}
if($action == 'delete_user'){
    $userID = filter_input(INPUT_POST,"userID");

    $delete_user_query=$conn->query("DELETE FROM `user` WHERE userID = '$userID';");
    $delete_account_query=$conn->query("DELETE FROM `account` WHERE userID = '$userID';");
  
}
if($action == 'edit_page_information'){
    $address = filter_input(INPUT_POST,"address");
    $contact_globe = filter_input(INPUT_POST,"contact_globe");
    $contact_smart = filter_input(INPUT_POST,"contact_smart");
    $contact_email = filter_input(INPUT_POST,"contact_email");

    $conn->query("UPDATE `page_information` SET
    `address`='$address',`contact_globe`='$contact_globe',
    `contact_smart`='$contact_smart',`contact_email`='$contact_email';");
}
if($action == 'delete_student'){
    $studentID = filter_input(INPUT_POST,"studentID");

    $add_students_query=$conn->query("DELETE FROM `student` WHERE `studentID`='$studentID';");
  
}
if($action == 'delete_teacher'){
    $teacherID = filter_input(INPUT_POST,"teacherID");

    $delete_teacher_query=$conn->query("DELETE FROM `teacher` WHERE `teacher_id`='$teacherID';");
  
}
if($action == 'reset_password'){
    require './assets/vendor/PHPMailer/src/Exception.php';
    require './assets/vendor/PHPMailer/src/PHPMailer.php';
    require './assets/vendor/PHPMailer/src/SMTP.php';
    //Create an instance; passing `true` enables exceptions

    $recipient_email = filter_input(INPUT_POST,"recipient_email");

    $result=$conn->query("SELECT * FROM `user` INNER JOIN `account` ON `account`.`userID` = `user`.`userID` 
    WHERE `account_email` = '".$recipient_email."' ;");
    $row = $result->fetch_assoc();
    if($row > 0){
        $username = $row["username"];
        $password = $row["password"];
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'bspreg84@gmail.com';                     //SMTP username
        $mail->Password   = 'vgvg lbso ojgq bcoi';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('bspreg84@gmail.com', 'Mailer');
        $mail->addAddress($recipient_email, );
        $mail->addReplyTo('bspreg84@gmail.com', 'Information');
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'BSP Registration';
        $mail->Body    = "Your username is: '$username' and your password is: '$password'";
    
        $mail->send();
        echo 'Password sent successfully! Please check your email.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }   
    }
    else{
        echo "Message could not be sent. No email address found for this account.";
    }
 
}
?>