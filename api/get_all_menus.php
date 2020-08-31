<?php
ini_set('display_errors', 1);
include_once '../Database/Database.php';
include_once '../Database/Models.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate DB & connect
$menu = new Menu($db);

// Read menus from db
$result = $menu->read();

// create response object
$response = [];
$response['data'] = [];

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $single_menu = [
            'id' => $id,
            'title' => $title,
            'preface' => $preface,
            'image' => $image,
        ];

        array_push($response['data'], $single_menu);
    }

    $response['status'] = 200;
}
echo json_encode($response);
