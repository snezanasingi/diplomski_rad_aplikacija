<?php

namespace app\models;

use app\core\DbModel;


class RegistrationModel extends DbModel
{
    public string $ime;
    public string $prezime;
    public string $email;
    public string $password;

    public function rules(): array
    {
        return [
            'ime' => [self::RULE_REQUIRED],
            'prezime' => [self::RULE_REQUIRED],
            'email' => [self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],

        ];
    }

    public function registration() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->create();
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
          "password",

        ];
    }
}