<?php

namespace app\core;

require_once ("DbModel.php");

 abstract class UserModel extends DbModel
{
    abstract public function  getDisplayName(): string;

}