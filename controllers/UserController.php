<?php

namespace app\controllers;

use Yii;
use Exception;
use yii\web\Controller;
use app\models\User;

class UserController extends Controller
{
    public function actionNew()
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash("warning", "No puedes crear usuarios estando logeado");
            return $this->goHome();
        }
        $user = new User;
        if ($user->load(Yii::$app->request->post())) {
            // hay algo en POST
            if ($user->validate()) {
                // lo que se carga valido
                if ($user->save()) {
                    //  validación BD
                    Yii::$app->session->setFlash("success", "Usuario guardado correctamente");
                    return $this->redirect(['site/login']);
                } else {
                    throw new Exception("Error al salvar el usuario");
                    return;
                }
            }
            $user->password = "";
            $user->password_repeat = "";
        }
        return $this->render('new.tpl', ['user' => $user]);
    }
}