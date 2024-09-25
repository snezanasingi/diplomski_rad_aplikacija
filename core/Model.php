<?php

namespace app\core;

abstract class Model
{
    public const RULE_EMAIL = 'email';
    public const RULE_EMAIL_UNIQUE = 'emailUnique';
    public const RULE_REQUIRED = 'required';
    public const RULE_MATCH = 'match';
    public const RULE_INT = 'int';

    public $errors;

    abstract public function rules() : array;

    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules)                    // validate poziva metod rules, foreach-uje ga kao naziv atributa i kao odredjeno pravilo za validaciju
        {                                                                   // uzme email npr i ispituje
            $value = $this->{$attribute};

            foreach ($rules as $rule)                                    // citamo atribut key to je email i zatim niz el. sta treba validirati
            {
                if ($rule === self::RULE_REQUIRED)
                {
                    if (!$value)
                    {
                        $this->addErrors($attribute, $rule);
                    }

                }
                if ($rule === self::RULE_EMAIL){
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) // prvo postavljam value koji zelim da filtriram
                    {
                        $this->addErrors($attribute, $rule);
                    }

                }
                if ($rule === self::RULE_INT){
                    if (!filter_var($value, FILTER_VALIDATE_INT))
                    {
                        $this->addErrors($attribute, $rule);
                    }
                }
            }
        }
    }
    public function addErrors($attribute, $rule)
    {
        $message = $this->errorMessages()[$rule] ?? '';
        return $this->errors[$attribute][] = $message;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQUIRED => "Ovo polje je obavezno!",
            self::RULE_EMAIL => "Ovo polje mora biti u email formatu!",
            self::RULE_EMAIL_UNIQUE => "Email koji ste uneli vec postoji!",
            self::RULE_MATCH => "Ovo polje mora biti isto {match}",
            self::RULE_INT => "Ovo polje mora biti u integer formatu"
        ];
    }

    public function mapData($data)
    {
        if ($data !== null) {
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    if ($key === 'kolicina' || $key === 'cena') {
                        $this->{$key} = is_numeric($value) ? (int) $value : 0;
                    } else {
                        $this->{$key} = $value;
                    }
                }
            }
        }
    }
}