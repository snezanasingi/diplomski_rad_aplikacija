<?php

namespace app\controllers;

use app\core\Controller;
use app\models\TaskModel;
use mysqli;

class TaskController extends Controller
{


    public function task1()
    {
        $this->view("task1", "crud", null);
    }

    public function zadatak()
    {
        $this->view("zadatak", "crud", null);
    }

    public function getAllTasks()
    {
        $mysql =  new mysqli("localhost", "root", "", "biljkedb") or die();

        $dbResult =  $mysql -> query("select * from zadatak;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);//kacimo se na bazu i dobijamo niz elemenata koje pretvara u json i vraca na prednjoj strani

    }

    public function createZadatakProcess()
    {
        $model = new TaskModel();
        $model->mapData($this->router->request->all());

        $model->validate();

        if($model->errors)
        {
            return $this->view("zadatak", "crud", $model);
        }

        $model->create();
        {
            return $this->view("zadatak", "crud", $model);

        }
    }

    public function authorize()
    {
        return [
            "Administrator",
            "Radnik",
            "Direktor"
        ];
    }
}