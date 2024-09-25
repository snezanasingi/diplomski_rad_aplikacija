<?php

namespace app\models;

use app\core\DbModel;

class TaskModel extends DbModel
{
    public string $naziv;
    public int $kolicina;
    public string $adresa;
    public string $email;

    public function tableName()
    {
        return "zadatak";
    }
    public function rules(): array
    {
        return [
            'naziv' => [self::RULE_REQUIRED],
            'adresa' => [self::RULE_REQUIRED],
            'kolicina' => [self::RULE_REQUIRED, self::RULE_INT],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL]
        ];
    }
    public function attributes(): array
    {
        return [
            "naziv",
            "adresa",
            "kolicina",
            "email"
        ];
    }
}


