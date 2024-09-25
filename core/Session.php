<?php

namespace app\core;

class Session
{
    public string $USER_SESSION = "USER";
    public string $FLASH_MESSAGE_SESSION = "FLASH_MESSAGE";

    public function __construct()
    {
        session_start();
        $flashMessages = $_SESSION[$this->FLASH_MESSAGE_SESSION] ?? [];

        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['remove'] = true;
             }

        foreach ($flashMessages as $key => &$flashMessage) {
            if ($flashMessage['remove']) {
                unset($flashMessages[$key]);

            }
        }
        $_SESSION[$this->FLASH_MESSAGE_SESSION] = $flashMessages;
    }

    public function setFlash($key,$message)  //mozda ce se pojaviti vise flash message-a, zato svaki mora da ima svoj key
    {
        $_SESSION[$this->FLASH_MESSAGE_SESSION][$key] = [ // koristimo flash key
            'remove' => false, // da li taj fm treba obrisati ili ne, jer u drugom requestu on prelazi u true
            'value' => $message
    ];
    }

    public function getFlash($key)
    {
        return $_SESSION[$this->FLASH_MESSAGE_SESSION][$key]['value'] ?? false;
    }

    public function set($key, $value) // za upis
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)        // za citanje
    {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function __destruct() // uklanja se request, inace fm traje 1 request i prakticno je zbog memorje
    {
        $flashMessages = $_SESSION[$this->FLASH_MESSAGE_SESSION] ?? [];

        foreach ($flashMessages as $key => &$flashMessage) { // & pointer nam treba da bih znala sta da brisem, daje adresu mem gde je sacuvan taj fm
            if ($flashMessage['remove']) { // proveravam za svaku sesiju koja sesija ima 'remove'
                unset($flashMessages[$key]); //mi brisemo radnu memoriju za tu sesiju
            }
        }

        $_SESSION[$this->FLASH_MESSAGE_SESSION] = $flashMessages;
    }

}