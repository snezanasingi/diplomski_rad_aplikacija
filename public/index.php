<?php

include ('C:\xampp\htdocs\Project\connect.php');

require_once __DIR__ . '/../vendor/autoload.php'; // moramo da ga include ovde, jer se u njemu nalazi citava logika  odredjenih klasaaa.

use app\controllers\AdministrationController;
use app\controllers\PlantController;
use app\controllers\HomeController;
use app\controllers\UserController;
use app\controllers\TaskController;
use app\core\Application;

$app = new Application();

$app->router->get("/", [HomeController::class, 'index']);
$app->router->get("/home", [HomeController::class, 'index']);
$app->router->get("/about", [HomeController::class, 'aboutUs']);
$app->router->get("/slike", [HomeController::class, 'slike']);
$app->router->get("/login", [UserController::class, 'login']);
$app->router->get("/registration", [UserController::class, 'registration']);
$app->router->get("/accessDenied", [UserController::class, 'accessDenied']);
$app->router->get("/administration/users", [AdministrationController::class, 'users']);
$app->router->get("/administration/biljke", [PlantController::class, 'plants']);
$app->router->get("/api/administration/users", [AdministrationController::class, 'getAllUsers']);
$app->router->get("/administration/task1", [TaskController::class, 'task1']);
$app->router->get("/administration/pregledzadataka", [TaskController::class, 'zadatak']);
$app->router->get("/logout", [UserController::class, 'logout']);
$app->router->get("/biljke/create", [PlantController::class, 'create']);
$app->router->get("/biljke/delete", [PlantController::class, 'delete']);
$app->router->get("/biljke/update", [PlantController::class, 'update']);
$app->router->get("/analytics", [AdministrationController::class, 'analytics']);
$app->router->get("/api/administration/biljke", [PlantController::class, 'getAllPlants']);
$app->router->get("/api/administration/zadatak", [TaskController::class, 'getAllTasks']);
$app->router->post("/registrationProcess", [UserController::class, 'registrationProcess']);
$app->router->post("/createBiljkaProcess", [PlantController::class, 'createBiljkaProcess']);
$app->router->post("/deleteBiljkaProcess", [PlantController::class, 'deleteBiljkaProcess']);
$app->router->post("/updateBiljkaProcess", [PlantController::class, 'updateBiljkaProcess']);
$app->router->post("/createZadatakProcess", [TaskController::class, 'createZadatakProcess']);
$app->router->post("/loginProcess", [UserController::class, 'loginProcess']);



$app->run();