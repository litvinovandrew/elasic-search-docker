<?php
namespace common\elastic\actions;

use common\elastic\ElasticManager;
use yii\base\Action;

class CreateIndexesAction extends Action
{
    public function run() {
        ElasticManager::createIndexes();
    }
}