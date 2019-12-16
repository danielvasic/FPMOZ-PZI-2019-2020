<?php

class Model {
    protected static $baza;

    public static function init($baza){
        if (self::$baza == null)
            self::$baza = $baza;
    }

    public static function spasi($object){
        $klasa = get_class($object);
        $atributi = get_object_vars($object);
        unset($atributi["id"]);

        $vrijednosti = array();
        
        $sql = "INSERT INTO `" . strtolower($klasa) . "` (";
        foreach ($atributi as $kljuc => $vrijednost):
            $sql .= "`" . $kljuc . "`, ";
        endforeach;
        $sql = substr($sql, 0, -2);

        $sql .= ") VALUES (";
        foreach ($atributi as $kljuc => $vrijednost):
            $sql .= "?, ";
            array_push($vrijednosti, $vrijednost);
        endforeach;
        $sql = substr($sql, 0, -2);
        $sql .= ");";
        
        $iskaz = self::$baza->getKonekcija()->prepare($sql);
        $iskaz->execute($vrijednosti);
        $object->setId(self::$baza->getKonekcija()->lastInsertId());
        return $object;
    }

    public static function uredi($object){
        $klasa = get_class($object);
        $atributi = get_object_vars($object);
        unset($atributi["id"]);

        $vrijednosti = array();
        
        $sql = "UPDATE `" . strtolower($klasa) . "` SET ";
        foreach ($atributi as $kljuc => $vrijednost):
            $sql .= "`" . $kljuc . "` = ? ";
            array_push($vrijednosti, $vrijednost);
        endforeach;
        $sql = substr($sql, 0, -2);
        $sql .= "WHERE id=" . $object->id;

        $iskaz = self::$baza->getKonekcija()->prepare($sql);
        $iskaz->execute($vrijednosti);
        return $object;
    }

    public static function brisi($object){
        $klasa = get_class($object);
        $atributi = get_object_vars($object);
        unset($atributi["id"]);
        
        $sql = "DELETE FROM `" . strtolower($klasa) . "` ";
        $sql .= "WHERE id=" . $object->id;

        $iskaz = self::$baza->getKonekcija()->prepare($sql);
        $iskaz->execute();
        return $object;
    }
}