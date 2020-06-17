<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends ActiveRecord
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName()
    {
        return 'users';
    }


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['firstName', 'password', 'lastName', 'usertype'], 'required'],
            // rememberMe must be a boolean value
            [['email'], 'unique'],
        ];
    }


    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }


    public function register()
    {

        $user = new RegisterForm();
        $user->email = $this->email;
        $user->firstName = $this->firstName;
        $user->lastName = $this->lastName;
        $user->usertype = $this->usertype;

        $user->password = password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 14]);
        $user->save();

        
    }
    
}
