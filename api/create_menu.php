<?php
ini_set('display_errors', 1);
include_once '../Database/Database.php';
include_once '../Database/Models.php';

$database = new Database();
$db = $database->connect();
$menu = new Menu($db);

$response = [];

if (isset($_POST)) {
    if (empty($_POST['title']) || empty($_POST['servings']) || empty($_POST['preface']) || empty($_FILES['file'])) {
        http_response_code(400);
        $response['Error'] = 'All fields are required';
    }

    $filename = $_FILES['file']['name'];

    $uniqImageName = uniqid();
    $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
    $imageFile = $uniqImageName . '.' . $imageFileType;
    $location = __DIR__ . "/../uploads/" . $imageFile;
    $valid_extentions = ['jpg', 'png', 'jpeg'];

    $menu->title = $_POST['title'];
    $menu->preface = $_POST['preface'];
    $menu->servings = $_POST['servings'];
    $menu->image = $imageFile;

    if (!in_array(strtolower($imageFileType), $valid_extentions)) {
        http_response_code(400);
        $response['Error'] = 'File type not allowed';
    } else {
        move_uploaded_file($_FILES['file']['tmp_name'], $location);

        // Create menu
        if ($menu->create()) {
            $response['message'] = 'Menu created successfully created.';
        } else {
            http_response_code(400);
            $response['Error'] = 'Menu not created';
        }
    }

    echo json_encode($response);
}
