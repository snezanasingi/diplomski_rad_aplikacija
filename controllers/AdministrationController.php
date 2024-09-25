<?php

namespace app\controllers;

use app\core\Controller;
use mysqli;

class AdministrationController extends Controller
{
    public function analytics()
    {
        $this->view("analytics", "dashboard", null);
    }

    public function users()
    {
        $this->view("users", "dashboard",null);
    }

    public function getAllUsers()
    {
        $mysql =  new mysqli("localhost", "root", "", "biljkedb") or die();

        $dbResult =  $mysql -> query("select * from radnici;") or die(mysqli_error($mysql));

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);                                                                                                 //kacimo se na bazu i dobijamo niz elemenata koje pretvara u json i vraca na prednjoj strani
    }


    public function authorize()
    {
        return [
            "Administrator",
            "Direktor",
            "Radnik"

        ];
    }
}