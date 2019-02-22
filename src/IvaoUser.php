<?php

namespace bth2008\ivaologin;

use Yii;

class IvaoUser extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $vid;
    public $username;
    public $firstname;
    public $lastname;
    public $rating;
    public $ratingatc;
    public $ratingpilot;
    public $division;
    public $country;
    public $skype;
    public $result;
    public $authKey;

    public function load($data){
	foreach ($data as $k=>$v){
	    $this->$k=$v;
	}
    }
    
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
	//$d = new IvaoUser;
	//$d = json_decode(Yii::$app->cache->get('user_data_'.$id));
	$usersmodel = new Yii::$app->user->usersModel;
	$findmethod = Yii::$app->user->getUserById;
	$usersmodel->vid = $id;
	if($d = $usersmodel->$findmethod()){
	    return new static($d);
	}
	return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->vid;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
