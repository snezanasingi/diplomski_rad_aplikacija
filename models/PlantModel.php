<?php

namespace app\models;

use app\core\DbModel;

class PlantModel extends DbModel
{
    public string $naziv;
    public int $kolicina;
    public int $cena;

    public function tableName()
    {
        return "biljke";
    }

    public function rules(): array
    {
        return [
            'naziv' => [self::RULE_REQUIRED],
            'kolicina' => [self::RULE_REQUIRED, self::RULE_INT],
            'cena' => [self::RULE_REQUIRED, self::RULE_INT]
        ];
    }

    public function attributes(): array
    {
        return [
          "naziv",
          "kolicina",
          "cena"
        ];
    }
}

