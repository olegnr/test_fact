<?php

//Данные подключения к БД
$host = "localhost";
$user = "root";
$password = "";
$db = "fact_db";


$today = date("Y-m-d");  
$start_datetime = $today." 00:00:00";
$end_datetime = $today." 23:59:59";


$mysqli = new mysqli($host, $user, $password, $db);
$mysqli->set_charset("utf8");

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

//MySqli Select Query
$query = "SELECT 
            (SELECT count(*) FROM users WHERE deleted = 0 and date_modified between '$start_datetime' and '$end_datetime') as new_users, 
            (SELECT count(*) FROM users WHERE deleted = 1 and date_modified between '$start_datetime' and '$end_datetime') as deleted_users";
$results = $mysqli->query($query);

$row = $results->fetch_array();
$new_users = $row["new_users"];
$deleted_users = $row["deleted_users"];

// Frees the memory associated with a result
$results->free();
// close connection
$mysqli->close();

echo "Статистика на ".$today.":</br>";
echo "Добавлено новых пользователей: ".$new_users."</br>";
echo "Удалено пользователей: ".$deleted_users."</br>";