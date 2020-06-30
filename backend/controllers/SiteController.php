<?php
namespace backend\controllers;

use Codeception\PHPUnit\Constraint\Page;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
		$data = "example";
		return $this->render("index", ['data'=>$data]);
    }
}
