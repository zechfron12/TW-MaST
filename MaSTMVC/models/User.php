<?php

namespace app\models;

require_once("core/db/DbModel.php");
require_once("core/UserModel.php");

use app\core\Application;
use app\core\db\DbModel;
use app\core\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public int $id = 0;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $username = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';

    public static function tableName(): string
    {
        return 'users';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

//    public function getCreatedTime()
//    {
//        $statement = Application::$app->db->prepare("SELECT created_datetime as created FROM users WHERE id");
//        $statement->bindValue(":attr", $value);
//        $statement->execute();
//        $record = $statement->fetchObject();
//    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['username','firstname', 'lastname', 'email', 'password', 'status'];
    }

    public function values(): array
    {
        return [$this->firstname, $this->lastname, $this->email, $this->password, $this->status];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword ' => 'Confirm Password'
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
