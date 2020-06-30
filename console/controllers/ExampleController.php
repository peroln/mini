<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;
use yii\console\Controller;
use common\components\BinanceExchange;

class ExampleController extends Controller
{

    public function actionIndex(){
	    BinanceExchange::miniTicker();
    }

}