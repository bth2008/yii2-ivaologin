<?php 

namespace bth2008\ivaologin;

use Yii;

class IvaoLogin{

    public function LP(){
        return 'https://login.ivao.aero/?url='.Yii::$app->request->absoluteUrl.'site/login';
    }

    public function login(){
      if( $token = Yii::$app->request->get('IVAOTOKEN')){
	if($data = file_get_contents('https://login.ivao.aero/api.php?token='.$token.'&type=json')){
	    $model = new IvaoUser;
	    $model->load(json_decode($data));
	    Yii::$app->user->login($model,0);
	    Yii::$app->user->returnUrl = '/';
	    return Yii::$app->controller->redirect('/');
	}
	return false;
      }
      return false;
    }
}

