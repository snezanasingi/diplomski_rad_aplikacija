<?php

namespace app\models;

use app\core\DbModel;

class LoginModel extends DbModel
{
    public string $email;
    public string $password;

    public function tableName()
    {
        return "radnici";
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $result = $this->one("email = '$this->email'");                     // proveravamo da li postoji taj email u bazi
        if ($result !== null)                                                     // ukoliko postoji taj korissnik u bazi
        {
            return password_verify($this->password, $result["password"]);         // verifikuje password, hesira unesen password i uporedjuje ih
        }
        return false;
    }

    public function attributes(): array
    {
        return [
            "email",
            "password"
        ];
    }
}