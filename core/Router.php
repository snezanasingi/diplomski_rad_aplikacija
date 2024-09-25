<?php
namespace app\core;

class Router 
{
    public array $routes = [];
    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback)
    {
        $this->routes["get"][$path]= $callback;
    }
    public function post($path, $callback)
    {
        $this->routes["post"][$path]= $callback;

    }
    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback)
        {
            http_response_code(404);
            echo $this->partialView("notFound", null);
            exit;
        }

        if (is_array($callback))
        {
            $callback[0] = new $callback[0](); //pravimo instancu prvog elementa naseg niza
            return call_user_func($callback);//f-ja koja prima niz el. u kome pokrece metodu koja se nalazi na drugom elementu i to je kod nas naziv fje index
        }
        if (is_string($callback))//da nam ruter funkcionise ako je ruta definisana da vrati samo sting, to cesto srecemo u praksi. Primer kod nas home page :D
        {
            echo $this->partialView($callback, null);
        }

    }

    public function partialView($viewName, $params) //to param je objekat koji nes radi npr registration
    {
        if ($params !== null) {                     //ovo radim da bih mogla na registration stranici da procitam parametre
            foreach ($params as $key => $value) {   // prvi element je errors je key , njegova vrednost je niz elemenata, a params je njegova vrednost od tog kljuca koji je array niz el cija vrednost jeste taj error
                $$key = $value;                    // $$ promenljiva promenljive
            }
        }

        ob_start();
        include_once __DIR__ . "/../views/$viewName.php";// je callback koji ja prosledjujem
        return ob_get_clean();
    }

    public function layout($layout)                                                                 // sluzi da bih include layout koji zelim
    {
        ob_start();
        include_once __DIR__ . "/../views/layouts/$layout.php";                                     // includuje view
        return ob_get_clean();
    }

    public function view($viewName, $layout, $params)
    {
        $layoutContent = $this->layout($layout);
        $partialViewContent = $this->partialView($viewName, $params);

        $view = str_replace( "{{ renderPartialView }}", $partialViewContent, $layoutContent);
        echo $view;
    }

}