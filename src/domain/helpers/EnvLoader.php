<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\extension\scenario\collections\ScenarioCollection;
use yii2lab\extension\scenario\helpers\ScenarioHelper;
use yii2lab\extension\common\helpers\Helper;

class EnvLoader
{
	
	/**
	 * @param $definition
	 *
	 * @return \yii2lab\domain\values\BaseValue
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\web\ServerErrorHttpException
	 */
	public static function run($definition) {
		$filterCollection = new ScenarioCollection($definition['filters']);
		$config = $filterCollection->runAll([]);
		$definition['commands'] = Helper::assignAttributesForList($definition['commands'], [
			'env' => $config,
		]);
		$filterCollection = new ScenarioCollection($definition['commands']);
		$filterCollection->runAll();
		return $config;
	}
	
}
