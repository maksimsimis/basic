<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\EntryForm;
use Yii;
//use GuzzleHttp\Client; // подключаем Guzzle
use yii\helpers\Url;
use yii\httpclient\Client;

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
            $model::updateAll(['email' => '0'], ['name' => 'name']);
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionMeteo() {

        // создаем экземпляр класса
        $client = new Client();
        // отправляем запрос к странице Яндекса
        //$res = $client->request('GET', 'https://ya.ru');
        $res = $client->createRequest()
                ->setMethod('post')
                ->setUrl('https://www.gismeteo.ru/diary/4638/2018/10/')
                ->setData(['Year' => '2018',
                    'sd_country' => 'Россия',
                    'sd_distr' => 'Красноярский край',
                    'sd_city' => 'Мотыгино',
                    'Month' => 'Октябрь'])
                ->send();
        // получаем данные между открывающим и закрывающим тегами body
        //$body = $res->getBody();
        $body = $res->content;
        // вывод страницы Яндекса в представление
        return $this->render('meteo', ['body' => $body]);
    }

}
