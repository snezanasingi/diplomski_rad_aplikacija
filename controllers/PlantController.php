<?php

namespace app\controllers;

use app\core\Controller;
use app\models\PlantModel;
use mysqli;

class PlantController extends Controller
{

    public function plants()
    {
        $this->view("biljke", "magacin",null);
    }

    public function getAllPlants()
    {
        $mysql =  new mysqli("localhost", "root", "", "biljkedb") or die();

        $dbResult =  $mysql -> query("select * from biljke;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);//kacimo se na bazu i dobijamo niz elemenata koje pretvara u json i vraca na prednjoj strani

    }

    public function create()
    {
        return $this->view("dodajBiljku", "crud", null);
    }


    public function createBiljkaProcess()
    {
        $model = new PlantModel();
        $model->mapData($this->router->request->all());

        $model->validate();

        if($model->errors)
        {
            return $this->view("dodajBiljku", "crud", $model);
        }

        $model->create();
        {
            return $this->view("dodajBiljku", "crud", $model);

        }
    }
    public function delete()
    {
        return $this->view("obrisiBiljku", "crud", null);
    }

    public function deleteBiljkaProcess()
    {
        $model = new PlantModel();
        $model->mapData($this->router->request->all());

        $model->validate();

        if($model->errors)
        {
            return $this->view("obrisiBiljku", "crud", $model);
        }

        $model->delete();
        {
            return $this->view("obrisiBiljku", "crud", $model);

        }
    }
    public function update()
    {
        return $this->view("azurirajBiljku", "crud", null);
    }

    public function updateBiljkaProcess()
    {
        $model = new PlantModel();
        $model->mapData($this->router->request->all());

        $model->validate();

        if($model->errors)
        {
            return $this->view("azurirajBiljku", "crud", $model);
        }

        $model->update(); // napravi ovu funkcionalnost
        {
            return $this->view("azurirajBiljku", "crud", $model);

        }
    }

    public function authorize()
    {
        return [
            "Administrator",
            "Direktor"

        ];
    }
}