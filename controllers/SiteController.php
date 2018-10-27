<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\EntryForm;
use Yii;

class SiteController extends Controller {

    public function actionIndex() {
        return "Hello World!";
    }

    public function actionEntry() {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены
            // делаем что-то полезное с $model ...
            $model->save();
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }

}
