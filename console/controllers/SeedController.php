<?php


namespace console\controllers;


use common\assets\BinanceApi;
use common\models\Currency;
use common\models\Quotation;
use yii\console\Controller;

class SeedController extends Controller
{
    public function actionIndex()
    {
        $api = new BinanceApi();

        $ticker = $api->prices();
        $server_time = ($api->time())['serverTime'] / 1000;
        $keys = array_keys($ticker);
        $arr = array_map(function ($n) {
            return [$n];
        }, $keys);

        \Yii::$app->db->createCommand()->batchInsert(Currency::tableName(), ['symbol'], $arr)->execute();

        $currencies = Currency::find()->all();
        $arr_curses = [];
        foreach ($ticker as $key => $value) {
            foreach ($currencies as $currency) {
                if ($currency->symbol === $key) {
                    $arr_curses[] = [
                        'currency_id' => $currency->id,
                        'value' => $value,
                        'server_time' => $server_time,
                        'created_at' => time()
                    ];
                }
            }
        }

        \Yii::$app->db->createCommand()->batchInsert(Quotation::tableName(), ['currency_id', 'value', 'server_time', 'created_at'], $arr_curses)->execute();

    }
}