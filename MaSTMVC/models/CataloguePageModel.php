<?php

namespace app\models;

use app\core\Model;

class CataloguePageModel extends Model
{

    public string $sort="";
    public string $country="";
    public string $startYear="";
    public string $endYear="";
    public string $theme="";
    public string $color="";
    public string $currency="";

    public function rules(): array
    {
        return [];
    }
    public function generateStamps($country)
    {
        $isFirst = false;
        $query = "SELECT * FROM users where";
        if(isset($country)) {
            if($isFirst==false)
                $isFirst=true;
        if($isFirst==true)
            $query .= "country=:country ";
        else
            $query .= "AND country=:country";
        }
        $statement = Application::$app->db->prepare($query);

        $statement->bindValue(":country",$country);
        $statement->execute();
        $record=$statement->fetchObject();
    }
//un if care verifica daca isFirst e false si o pune true pt fiecare criteriu
//pentru fiecare if vad daca e primul criteriu sau nu si daca e afisez fara AND
}