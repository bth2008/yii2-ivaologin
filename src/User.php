<?php

namespace bth2008\ivaologin;

use Yii;

class User extends \yii\web\User {

    public $usersModel;
    public $createUserMethod;
    public $getUserById;

    public function init(){
	parent::init();
    }
    public function login(yii\web\IdentityInterface $identity, $duration = 0){
	$model = new $this->usersModel;
	$cu = $this->createUserMethod;
	$model->$cu($identity);
	parent::login($identity,$duration);
    }
}