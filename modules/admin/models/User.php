<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string $phone
 * @property string $email
 * @property string $city
 * @property string $address
 * @property string $created_at
 * @property string $modified_at
 * @property integer $isAdmin
 */
class User extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash'], 'required'],
            [['date_of_birth', 'created_at', 'modified_at'], 'safe'],
            [['isAdmin'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'first_name', 'last_name', 'phone', 'email', 'city', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер користувача',
            'username' => 'Псевдонім',
            'password_hash' => 'Пароль',
            'auth_key' => 'Auth Key',
            'first_name' => 'Ім`я',
            'last_name' => 'Прізвище',
            'date_of_birth' => 'Дата народження',
            'phone' => 'Телефон',
            'email' => 'Електронна адреса',
            'city' => 'Місто',
            'address' => 'Адреса',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата модифікації',
            'isAdmin' => 'Адміністратор',
        ];
    }
}
