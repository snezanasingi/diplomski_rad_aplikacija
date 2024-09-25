<?php

namespace app\models;

use app\core\DbModel;

class UserModel extends DbModel
{
    public string $ime;
    public string $prezime;
    public string $email;
    public string $password;
    public $roleNames;

    public function rules(): array
    {
        return [];
    }

    public function tableName()
    {
        return "radnici";
    }

    public function attributes(): array
    {
        return [
            "ime",
            "prezime",
            "email",
            "password"
        ];
    }
}