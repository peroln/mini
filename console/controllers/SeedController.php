<?php


namespace console\controllers;

use common\components\BinanceExchange;
use yii\console\Controller;

class SeedController extends Controller
{

    /**
     * @throws \yii\db\Exception
     */
    public function actionIndex()
    {
        BinanceExchange::seederCurrency();
    }
}