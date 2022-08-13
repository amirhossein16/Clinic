<?php

session_start();

require __DIR__ . "./../vendor/autoload.php";

use App\Core\Application;

$app = new Application();

$app->router->get("/Home", [\App\app\controller\HomeController::class, 'index']);
$app->router->get("/doctors", [\App\app\controller\DoctorController::class, 'doctorList']);

$app->router->get("/register", [\App\app\controller\AuthController::class, 'showRegister']);
$app->router->post("/register", [\App\app\controller\AuthController::class, 'doRegister']);
$app->router->get("/dashboard", [\App\app\controller\dashboardController::class, 'index']);
$app->router->get('/logout', [\App\app\controller\AuthController::class, 'logout']);

$app->router->get("/dashboard/requests", [\App\app\controller\dashboardController::class, 'showRequest']);
$app->router->put("/dashboard/requests", [\App\app\controller\dashboardController::class, 'requests']);

$app->router->post("/dashboard", [\App\app\controller\dashboardController::class, 'addDepartment']);
$app->router->delete("/dashboard", [\App\app\controller\dashboardController::class, 'deleteDepartment']);
$app->router->put("/dashboard", [\App\app\controller\dashboardController::class, 'updateDepartment']);


$app->run();
