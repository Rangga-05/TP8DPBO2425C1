<?php
session_start();

include_once "config.php";

//Ambil parameter routing
$page   = isset($_GET['page']) ? $_GET['page'] : 'lecturer';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

//Tentuin controller berdasarkan page
if ($page === 'lecturer') {
    include_once "controllers/LecturerController.php";
    $controller = new LecturerController();

} elseif ($page === 'department') {
    include_once "controllers/DepartmentController.php";
    $controller = new DepartmentController();

} elseif ($page === 'course') {
    include_once "controllers/CourseController.php";
    $controller = new CourseController();

} else {
    echo "404 - Page not found";
    exit;
}

//Jalanin action
if (method_exists($controller, $action)) {
    $controller->{$action}();
} else {
    echo "404 - Action not found";
}
?>