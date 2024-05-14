<?php
$action = filter_input(INPUT_POST,"action");

include 'db.php';
session_start();
if($action == 'login'){
    $resultObject = new stdClass();
    $username = filter_input(INPUT_POST,"username");
    $password = filter_input(INPUT_POST,"password");
    // $result=$conn->query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".md5(hash("sha256",($password)))."' AND `type` = '".$type."' ;");
    $result=$conn->query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '$password';");
    $row = $result->fetch_assoc();
    if($row > 0){
        $resultObject->username = $row["username"];
        $resultObject->access = $row["access"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["full_name"] = $row["full_name"];
        $_SESSION["access"] = $row["access"];
    }
    echo json_encode($resultObject);
}
if($action == 'get_rooms'){
    $rooms_query=$conn->query("SELECT * FROM `room`;");
    $row = $rooms_query->fetch_assoc();
    $resultObject = array();
    if($row > 0){
        $room_object = new stdClass();
        $room_object->ID = $row["ID"];
        $room_object->room_floor = $row["floor"];
        $room_object->room_number = $row["room_number"];
        $room_object->seating_capacity = $row["seating_capacity"];
        array_push($resultObject,$room_object);
    }
    echo json_encode($resultObject);
}
if($action == 'log_out'){
    session_destroy();
}
if($action == 'get_teachers'){
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
if($action == 'add_room'){
    $room_number = filter_input(INPUT_POST,"room_number");
    $room_floor =  filter_input(INPUT_POST,"room_floor");
    $seating_capacity =  filter_input(INPUT_POST,"seating_capacity");
    $rooms_query=$conn->query(" INSERT INTO `room`( `room_number`, `floor`, `seating_capacity`) 
    VALUES ('$room_number','$room_floor','$seating_capacity');");
  
}
if($action == 'add_schedule'){
    $course_number = filter_input(INPUT_POST,"course_number");
    $course_code =  filter_input(INPUT_POST,"course_code");
    $subject_description =  filter_input(INPUT_POST,"subject_description");
    $time_slot_from =  filter_input(INPUT_POST,"time_slot_from");
    $time_slot_to =  filter_input(INPUT_POST,"time_slot_to");
    $select_teacher =  filter_input(INPUT_POST,"select_teacher");
    $room_selection =  filter_input(INPUT_POST,"room_selection");

    $rooms_query=$conn->query("INSERT INTO `schedule`(`ID`, `course_code`, `subject_description`, `time_from`, `time_until`, `room_ID`, `teacher_ID`) 
    VALUES ('$course_number','$course_code','$subject_description','$time_slot_from','$time_slot_to','$room_selection','$select_teacher')");
  
}
if($action == 'add_schedule'){
    $room_number = filter_input(INPUT_POST,"room_number");
    $room_floor =  filter_input(INPUT_POST,"room_floor");
    $seating_capacity =  filter_input(INPUT_POST,"seating_capacity");
    $rooms_query=$conn->query(" INSERT INTO `room`( `room_number`, `floor`, `seating_capacity`) 
    VALUES ('$room_number','$room_floor','$seating_capacity');");
  
}
if($action == 'add_teacher'){
    $teacher_name = filter_input(INPUT_POST,"teacher_name");
    $teacher_address =  filter_input(INPUT_POST,"teacher_address");
    $teacher_contact =  filter_input(INPUT_POST,"teacher_contact");
    $rooms_query=$conn->query(" INSERT INTO `teacher`(`teacher_name`, `teacher_address`, `teacher_contact`) 
    VALUES ('$teacher_name','$teacher_address','$teacher_contact');");
  
}
?>