<?php

namespace app\core;

class Stamp{
    public string $name = 'null';
    public string $country = 'null';
    public string $category = 'null';
    public string $color = 'null';
    public string $width = 'null';
    public string $height = 'null';
    public string $price = 'null';
    public string $perforations = 'null';
    public string $issued = 'null';

    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    public function __construct4($mName, $mCountry, $mCategory, $mColor): void
    {
        $this->name = $mName;
        $this->country = $mCountry;
        $this->category = $mCategory;
        $this->color = $mColor;
    }

    public function __construct1($query): void
    {
        $this->name = $query["name"];
        $this->country = $query["country"];
        $this->category = $query["category"];
        $this->color = $query["color"];
    }

    public static function constructCollection($query): array
    {
        $collection = [];
        for($i = 0; $i < count($query) ; ++$i){
            $stamp = new Stamp($query[$i]);
            array_push($collection,$stamp);
        }
        return $collection;
    }

    public static function attributes(): array{
        return ['name', 'country', 'category',
            'color', 'width', 'height', 'price',
            'perforations', 'issued'];
    }

    public function values(): array{
        return [$this->name, $this->country, $this->category,
            $this->color, $this->width, $this->height, $this->price,
            $this->perforations, $this->issued];
    }

    ///
    /// FILE MANIPULATION
    ///

    /**
     * @throws DOMException
     */

    public function parseXML($name): void{
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;

        $root = $dom->createElement('Stamp');
        $attributes = StampN::attributes();
        $values = $this->values();


        for($i = 0; $i < count($attributes) ; ++$i){
            $attr = $dom->createElement($attributes[$i], $values[$i]);
            $root->appendChild($attr);
        }

        $dom->appendChild($root);
        $dom->save($name.'.stp');

    }

    static public function loadFile($path): StampN{

        $xmlData = simplexml_load_file($path) or die("Failed to load");
        $attributes = StampN::attributes();

        $name = 'null';
        $country = 'null';
        $category = 'null';
        $color = 'null';
        $width = 'null';
        $height = 'null';
        $price = 'null';
        $perforations = 'null';
        $issued = 'null';

        for ($i = 0; $i < count($attributes); $i++) {
            $attr_name = $attributes[$i];
            $$attr_name = $xmlData->$attr_name;
        }

        return new Stamp($name,$country,$category,$color);
    }

    ///
    /// HTML CODE
    ///

    public static function getShortHTMLCode($stamp): string
    {
        $pathToImage = Application::$app->rootpath;
        $pathToImage = str_replace("\\","/",$pathToImage);
        $pathToImage .= "/views/assets/stamp_image1.jpg";
        $pathToImage = "http://localhost/MaSTMVC/views/assets/stamp_image1.jpg";
        return
            "
        <div class=\"stamp-card card1\" style=\"margin: 15px\">
            <div class=\"stamp-card-image\">
                <img src=\"$pathToImage\" alt=\"\" />
            </div>
            <div class=\"stamp-card-title\">
                $stamp->name 
            </div>
            <div class=\"stamp-card-price\">
                $stamp->price
            </div>
            <div class=\"stamp-card-country\">
                $stamp->country 
            </div>
        </div>
        ";
    }

    static public function renderShortStamps($collection, $target): string
    {

        $result = "";
        for($i = 0; $i < count($collection) ; ++$i){

            $result .= Stamp::getShortHTMLCode($collection[$i]);
        }
        echo $result;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$target.php";
        return str_replace('{{stamps}}', $result, ob_get_clean());

    }
}