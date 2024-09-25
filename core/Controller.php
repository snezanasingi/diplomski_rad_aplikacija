<?php

namespace app\core;

abstract class Controller
{
    public Router $router;

    public function __construct()
    {

        $this->router = new Router();
        $this->checkRoles();
    }

    abstract public function authorize();

    public function view($view,$layout,$params)
    {
        return $this->router->view($view,$layout,$params);
    }

    public function  checkRoles()
    {
        $roles = $this->authorize();
        if ($roles === []) return;

        $access = false;
        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);
        $userRoles = $this->getRoles();

        if($email !== false) {
            foreach ($roles as $role){
                foreach ($userRoles as $userRole)                                                           // za svaku rolu moram da ispitam da li korisnik ima tu rolu i ako se barem 1 pojavi stavljam access na true
                {

                    if($role === $userRole["name"]){
                        $access = true;
                    }
                }
            }
            if(!$access){
                header("location:" . "/accessDenied");
            }
            return;
        }
        header("location:"."/login");
    }
// ispitujemo da li korisnik ima tu rolu
// ako je prazan daje svima pristup
// ako imamo ulogovanog korisnika, onda foreach role

    public function getRoles() : array                                                                      //ova f-ja ce prihvatiti email korisnika
    {
        $connection = new DbConnection();
        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);                 // info. o email adresi stize preko sesije
        $resultFromDb = $connection->con()->query("
            select * from radnici u
            inner join user_role ur on u.id = ur.id_user                                                    /* citamo role koje ima taj korisnik*/
            inner join role r on ur.id_role = r.id
            where u.email = '$email' and r.active = true;

        ");                                                                                                  // citamo role za nasu email adresu;
        $resultArray = [];
        while ($result = $resultFromDb->fetch_assoc()) {
            $resultArray[] = $result;
        }
        return $resultArray;                                                                                   //vraca nam role za odredjenog korisnika
    }
}