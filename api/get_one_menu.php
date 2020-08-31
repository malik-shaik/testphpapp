<?php
ini_set('display_errors', 1);
include_once '../Database/Database.php';
include_once '../Database/Models.php';

$response = [];

$database = new Database();
$db = $database->connect();
$menu = new Menu($db);

if (!isset($_GET['id']) || empty($_GET['id'])) {
    http_response_code(400);
    $response['Error'] = 'menu id is not valid';
} else {
    $menu->id = $_GET['id'];

    // Get single menu
    $menu->read_single();

    $response['data'] = [
        'id' => $menu->id,
        'title' => $menu->title,
        'servings' => $menu->servings,
        'preface' => $menu->preface,
        'image' => $menu->image,
    ];

}

// Make JSON
echo json_encode($response);
