<?php

namespace app\core;

class Application
{
    public Router $router;
    public Session $session;
    public Response $response;
    public static Application $app; //poziva samu sebe, static je da mozemo direktno preko naziva klase da mu pristupimo, bez pozivanja novog kreiranog objekta

    public function __construct()
{
        $this -> router = new Router();
        $this -> session = new Session();
        $this -> response = new Response();
        self::$app = $this; // moramo i njemu da dodelimo trenutni objekat da bismo mu pristupili iz nekog drugog dela apl

}
    public function run()
    {
        $this->router->resolve();//on samo poziva resolve da bismo u indexu pozvali run
    }
}