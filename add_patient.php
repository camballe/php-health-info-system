<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$firstname = filter_input(INPUT_POST, "firstname");
$middlename = filter_input(INPUT_POST, "middlename");
$surname = filter_input(INPUT_POST, "surname");
$dob = filter_input(INPUT_POST, "dob");
$gender = filter_input(INPUT_POST, "gender");
$county = filter_input(INPUT_POST, "county");

if ($firstname == '' || $middlename == '' || $surname == '' || $dob == '' || $gender == '' || $county == '') {
    $err_msg = "All fields are required<br>";
    include('db_error.php');
} else {
    require_once('db_connect.php');
    $query = 'INSERT INTO patients(id, firstname, middlename, surname, dob, gender, county) VALUES (:id, :firstname, :middlename, :surname, :dob, :gender, :county)';

    $stm = $db->prepare($query);
    $stm->bindValue(':id', null, PDO::PARAM_INT);
    $stm->bindValue(':firstname', $firstname);
    $stm->bindValue(':middlename', $middlename);
    $stm->bindValue(':surname', $surname);
    $stm->bindValue(':dob', $dob);
    $stm->bindValue(':gender', $gender);
    $stm->bindValue(':county', $county);
    $execute_success = $stm->execute();
    $stm->closeCursor();
    if (!$execute_success) {
        print_r($stm->errorInfo()[2]);
    } else {
        // Redirect to records.php after successful submission
        header('Location: /records.php');
        exit(); // Ensure that code execution stops after redirection
    }
}
