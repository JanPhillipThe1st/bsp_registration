<?php
$action = filter_input(INPUT_POST,"action");

include 'db.php';
session_start();
if($action == 'login'){
    $resultObject = new stdClass();
    $username = filter_input(INPUT_POST,"username");
    $password = filter_input(INPUT_POST,"password");
    $password = filter_input(INPUT_POST,"password");

    // $result=$conn->query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".md5(hash("sha256",($password)))."' AND `type` = '".$type."' ;");
    $result=$conn->query("SELECT * FROM `user` WHERE `username` = '".$username."' AND `password` = '$password';");
    $row = $result->fetch_assoc();
    if($row > 0){
        $resultObject->username = $row["username"];
        $resultObject->access = $row["access_type"];
        $_SESSION["userID"] = $row["userID"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["full_name"] = $row["full_name"];
        $_SESSION["access"] = $row["access_type"];
    }
    echo json_encode($resultObject);
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
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'get_students'){
    $rooms_query=$conn->query("SELECT * FROM `student`;");
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
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
    INNER JOIN `school` ON `school`.`schoolID` = `account`.`schoolID`
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
        $resultObject->districtID = $row["districtID"];
        $resultObject->school_name = $row["school_name"];
        $resultObject->school_address = $row["school_address"];
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
if($action == 'get_school_by_id'){
    $schoolID = filter_input(INPUT_POST,"schoolID");
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
if($action == 'get_schools_it_coordinator'){
    $rooms_query=$conn->query("SELECT * FROM `school` 
    INNER JOIN `account` 
    ON  `school`.`schoolID` = `account`.`schoolID` 
    INNER JOIN `user` ON  `account`.`userID` = `user`.`userID` 
    WHERE `user`.`access_type` = 'school_coordinator';");
    $resultObject = array();
    while( $row = $rooms_query->fetch_assoc()){
        $room_object = new stdClass();
        $room_object->ID = $row["schoolID"];
        $room_object->school_name = $row["school_name"];
        $room_object->district = $row["districtID"];
        $room_object->date_registered = $row["date_registered"];
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
    '$student_last_name', '$student_grade', '$student_section', 'Growing Usa', '$student_photo', '$student_barangay', '$student_city', '$student_province',
     '$student_email', '$student_phone', '$student_emergency_guardian', '$student_emergency_phone', '$student_emergency_address') ;");
  
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
?>