<?php

namespace app\models;

use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $date_of_birth;
    public $phone;
    public $city;
    public $address;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'trim'],
            [['username', 'email', 'password', 'first_name', 'last_name', 'date_of_birth', 'phone', 'city', 'address'], 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Псевдонім',
            'email' => 'Електронна адреса',
            'password' => 'Пароль',
            "first_name" => 'Ім\'я',
            "last_name" => 'Прізвище',
            "date_of_birth" => 'Дата народження (РРРР-ММ-ДД)',
            "phone" => 'Телефон',
            "city" => 'Місто',
            "address" => 'Адреса',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->date_of_birth = $this->date_of_birth;
        $user->phone = $this->phone;
        $user->city = $this->city;
        $user->address = $this->address;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}