<?php

namespace common\components;

use common\assets\BinanceApi;
use Binance;
use common\models\Currency;
use common\models\Quotation;
use yii\helpers\ArrayHelper;

class BinanceExchange
{


    public static function miniTicker()
    {

        $api = new BinanceApi();
        $ticker = $api->prices();
        print_r($ticker);
    }

    /**
     * @throws \yii\db\Exception
     */
    public static function seederCurrency()
    {
        $api = new BinanceApi();

        try {
            $ticker = $api->prices();
            $keys = array_keys($ticker);
            $arr = array_map(function ($n) {
                return [$n];
            }, $keys);
            \Yii::$app->db->createCommand()->batchInsert(Currency::tableName(), ['symbol'], $arr)->execute();
            self::seederQuotation($api, $ticker);
            echo('All right!');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }

    }

    /**
     * @param BinanceApi $api
     * @param array $ticker
     * @throws \yii\db\Exception
     */
    private static function seederQuotation(BinanceApi $api, array $ticker)
    {
        $server_time = ($api->time())['serverTime'] / 1000;
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