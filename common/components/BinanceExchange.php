<?
namespace common\components;
use common\assets\BinanceApi;

use Binance;

use yii\helpers\ArrayHelper;

class BinanceExchange {
	

    public static function miniTicker(){

        $api = new BinanceApi();
		$ticker = $api->prices();
		print_r($ticker);
    }

}
?>