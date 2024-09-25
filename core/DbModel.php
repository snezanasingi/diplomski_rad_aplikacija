<?php

namespace app\core;

abstract class DbModel extends Model
{
    public DbConnection $db;

    public function  __construct()
    {
        $this->db = new DbConnection();
    }

    abstract public function tableName();
    abstract public function  attributes(): array;   //niz el koje cemo importovati ili citati iz baze
    // sa ove 2 f-je ja govorim DbModelu sta cemo raditi i koju obradu cemo raditi :D
    public function rules(): array
    {
        return [];
    }

    public function create()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $values = array_map(fn($attr) => ":$attr", $attributes);    // array map kreira niz tako sto kreira promenljivu attr i prolazi kroz svaki atribut definisam u registerModelu; a : rekli smo kao string
        $sqlString = "INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES (" . implode(',', $values) . ")";// implode radi foreach kroz attributes, kao string i stavlja zarez

        foreach ($attributes as $attribute) {
            $sqlString = str_replace(":$attribute", is_numeric($this->{$attribute}) ? $this->{$attribute} : '"' . $this->{$attribute} . '"', $sqlString);
        }

        $this->db->con()->query($sqlString); // samo pokrecem ovaj sql
    }

    public function delete()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $sqlString = "DELETE FROM $tableName WHERE ";
        $conditions = [];

        foreach ($attributes as $attribute) {
            $conditions[] = "$attribute = " . (is_numeric($this->{$attribute}) ? $this->{$attribute} : '"' . $this->{$attribute} . '"');
        }

        $sqlString .= implode(' AND ', $conditions);

        $this->db->con()->query($sqlString);
    }
    public function update()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $sqlString = "UPDATE $tableName SET ";
        $updates = [];

        foreach ($attributes as $attribute) {
            if ($attribute !== 'id') {
                $updates[] = "$attribute = " . (is_numeric($this->{$attribute}) ? $this->{$attribute} : '"' . $this->{$attribute} . '"');
            }
        }

        $sqlString .= implode(', ', $updates);
        $sqlString .= " WHERE naziv = '" . $this->naziv . "'";


        $this->db->con()->query($sqlString);
    }

    public function one($where) // sa ovom metodom za svaki model mozemo da procitamo vrednosti iz baze
    {
        $tableName = $this->tableName();
        $sqlString = "SELECT * FROM $tableName WHERE $where limit 1";
        $dbResult = $this->db->con()->query($sqlString);

        return $dbResult->fetch_assoc();
    }
}