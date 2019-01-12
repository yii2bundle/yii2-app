<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\extension\scenario\collections\ScenarioCollection;
use yii2lab\extension\scenario\helpers\ScenarioHelper;

class Handler {
	
	public $filters = [];
	public $commands = [];
	
	/**
	 * @param array $data
	 *
	 * @return array|\yii2lab\domain\values\BaseValue
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\web\ServerErrorHttpException
	 */
	public function run($data = []) {
		$filterCollection = new ScenarioCollection($this->filters);
		$data = $filterCollection->runAll($data);
		return $data;
	}
	
}
