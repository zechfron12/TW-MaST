<?php

namespace app\models;

require_once ("core/Application.php");

use app\core\Application;
use app\core\Model;

class CataloguePageModel extends Model
{

    public string $sort;
    public string $country;
    public string $startYear;
    public string $endYear;
    public string $theme;
    public string $color;
    public string $width;
    public string $height;

    public function rules(): array
    {
        return [];
    }
    public function generateStamps()
    {
        $isFirst = true;
        $query = "SELECT * FROM stamps where ";
        if(isset($this->country)) {
            if ($isFirst) {
                $query .= "country='$this->country' ";
                $isFirst = false;
            } else {
                $query .= "AND country='$this->country' ";
            }
        }
        if(isset($this->startYear)) {
            if ($isFirst) {
                $query .= "issued_datetime >= $this->startYear";
                $isFirst = false;
            } else {
                $query .= "AND issued_datetime >= $this->startYear ";
            }
        }

        if(isset($this->endYear)) {
            if($isFirst) {
                $query .= "issued_datetime <= $this->endYear ";
                $isFirst = false;
            }
            else
                $query .= "AND issued_datetime <= $this->endYear ";
        }

        if(isset($this->theme)) {
            if ($isFirst) {
                $query .= "category='$this->theme' ";
                $isFirst = false;
            } else {
                $query .= "AND category='$this->theme' ";
            }
        }

        if(isset($this->color)) {
            if ($isFirst) {
                $query .= "color=:'$this->color' ";
                $isFirst = false;
            } else {
                $query .= "AND color='$this->color' ";
            }
        }


        if(isset($this->width)) {
            if ($isFirst) {
                $query .= "width=:$this->width ";
                $isFirst = false;
            } else {
                $query .= "AND width=$this->width ";
            }
        }

        if(isset($this->height)) {
            if ($isFirst) {
                $query .= "height=$this->height ";
                $isFirst = false;
            } else {
                $query .= "AND height=$this->height ";
            }
        }

        if(isset($this->sort)){
            if($this->sort==1)
            {
                $query .="order by likes";
            }
            else
            if($this->sort==2)
            {
                $query .="order by price";
            }
            else
            if($this->sort==3)
            {
                $query .="order by price DESC";
            }
            else
            if($this->sort==4)
            {
                $query .="order by length(country) ,country";
            }
            else
            if($this->sort==5)
            {
                $query .="order by length(country) ,country DESC";
            }
            else
            if($this->sort==6)
            {
                $query .="order by length(name) ,name";
            }
            else
            if($this->sort==7)
            {
                $query .="order by length(name) ,name DESC";
            }
        }

        var_dump($query);
        $statement = Application::$app->db->prepare($query);

        $statement->execute();
        $record=$statement->fetchObject();

        var_dump($record);
        $record['country'] = $this->country;
        $record['startyear']= $this->startYear;
        $record['endYear']= $this->endYear;
        $record['theme']= $this->theme;
        $record['color']= $this->color;
        $record['width']= $this->width;
        $record['height']= $this->height;


    }
}