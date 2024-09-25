<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\LoginModel;
use app\models\RegistrationModel;

class UserController extends Controller
{

    public function login()                                                                      // smestanje podataka u sesiju, ako postoji sesija korisnik je ulogoan i obrnuto
    {
        if(Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) // ukoliko je korisnik vec ulogovan ne treba mu omoguciti opet pristup login-u
        {
            header("location:" . "/home");                                                // redirekcija
        }
        return $this->view("login", "auth", null);
    }

    public function loginProcess()
    {

        $login = new LoginModel();
        $login->mapData($this->router->request->all());

        $login->validate();

        if($login->errors)
        {
            return $this->view("login", "auth", $login);
        }
        if ($login->login()) {
            $user = $login->one("email = '$login->email'");
            Application::$app->session->set(Application::$app->session->USER_SESSION, $user["email"]);
            header("location:" . "/administration/users");
            exit;
        }
        Application::$app->session->setFlash("login", "Login failed, please try again!");
        return $this->view("login", "auth", $login);
    }

    public function logout()
    {
        Application::$app->session->remove(Application::$app->session->USER_SESSION);
        header("location:" . "/login");
    }


    public function registration()
    {
        return $this->view("registration", "auth", null);
    }


    public function registrationProcess()
    {

        $registration = new RegistrationModel();                                                                                    // instanca modela
        $registration->mapData($this->router->request->all());

        $registration->validate();

        if($registration->errors)                                                                                                       // sa ovim korisnik nece moci da upise podatke u bazu
        {
            return $this->view("registration", "auth", $registration);
        }

    $registration->registration();
    {
        return $this->view("task", "dashboard", null);

    }

}

    public function accessDenied()
    {
        return $this->view("accessDenied", "auth", null);
    }

    public function authorize()
    {
        return [

        ];
    }
}