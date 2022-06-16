<?php

namespace app\core\form;

require_once("InputField.php");
require_once("core/Model.php");

use app\core\Model;

class Form
{
    public static function begin($action, $method): Form
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field(Model $model, $attribute, $placeholder=""): InputField
    {
        return new InputField($model, $attribute, $placeholder);
    }
}
