<?php
/**
 * SigninForm
 * Форма аутентификации
 * @copyright Copyright (c) 2021 Eugene Andreev
 * @author Eugene Andreev <gjhonic@gmail.com>
 */
namespace app\models\auth\forms;

use Yii;
use yii\base\Model;
use app\models\auth\UserIdentity;


class SigninForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * rules - метод возвращает правила валидации.
     * @return array - правила валидации.
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * validatePassword - метод валидации пароля.
     * @param $attribute, $params
     */
    // >> -------------------------------------------------
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }
    // ------------------------------------------------- <<

    /**
     * login - метод "залогинивания" юзера в сессию.
     * @return bool.
     */
    // >> -------------------------------------------------
    public function signin()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }else{
            return false;
        }

    }
    // ------------------------------------------------- <<


    /**
     * getUser - метод заполняем свойство _user  обьектом user, если он не заполнен и возвращает его.
     * @return object - user.
     */
    // >> -------------------------------------------------
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserIdentity::findByUsername($this->username);
        }

        return $this->_user;
    }
    // ------------------------------------------------- <<

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
}
