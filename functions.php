<?php

//Данные подключения к БД
$host = "localhost";
$user = "root";
$password = "";
$db = "fact_db";

$type_request = $_REQUEST['type_request'];

//Данные о пользователях
if($type_request == 'get_user_info')
{
    $mysqli = new mysqli($host, $user, $password, $db);
    $mysqli->set_charset("utf8");

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    //MySqli Select Query
    $results = $mysqli->query("SELECT * FROM users where deleted = 0 order by date_create");

    while($row = $results->fetch_array()) {

        $user_info[] = array(
            "id" => $row["id"],
            "date_create" => $row["date_create"],
            "first_name" => $row["first_name"],
            "last_name" => $row["last_name"],
            "patronymic" => $row["patronymic"],
            "phone_mobile" => $row["phone_mobile"],
            "position" => $row["position"]
        );
    }

    $json_data = json_encode( $user_info);
    echo $json_data;

    // Frees the memory associated with a result
    $results->free();
    // close connection
    $mysqli->close();
}

//Добавление нового пользователя
if($type_request == 'create_user')
{
    $mysqli = new mysqli($host, $user, $password, $db);
    $mysqli->set_charset("utf8");

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    $id = trim(com_create_guid(), '{}');
    $first_name = $mysqli->real_escape_string($_REQUEST['first_name']);
    $last_name = $mysqli->real_escape_string($_REQUEST['last_name']);
    $patronymic = $mysqli->real_escape_string($_REQUEST['patronymic']);
    $position = $mysqli->real_escape_string($_REQUEST['position']);
    $phone_mobile = $mysqli->real_escape_string($_REQUEST['phone_mobile']);

    $query_insert = "INSERT INTO users (id, date_create, date_modified, deleted, first_name, last_name, patronymic, phone_mobile, position) 
								VALUES ('$id', now(), now(), 0, '$first_name', '$last_name', '$patronymic', '$phone_mobile', '$position')";
    $insert_row = $mysqli->query($query_insert);

    if($insert_row){
        echo 'Пользователь успешно добавлен';
    }else{
        echo 'Error : ('. $mysqli->errno .') '. $mysqli->error;
    }

    // close connection
    $mysqli->close();
}

//Удаление пользователя
if($type_request == 'delete_user')
{
    $mysqli = new mysqli($host, $user, $password, $db);
    $mysqli->set_charset("utf8");

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    $user_id = $mysqli->real_escape_string($_REQUEST['user_id']);

    $query_update = "update users set deleted = 1, date_modified = now() where id = '$user_id'";
    $update_row = $mysqli->query($query_update);

    if($update_row){
    echo 'Пользователь успешно удален';
    }else{
    echo 'Error : ('. $mysqli->errno .') '. $mysqli->error;
    }

    // close connection
    $mysqli->close();

    echo $user_id;
}