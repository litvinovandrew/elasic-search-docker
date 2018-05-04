<?php


namespace common\elastic\models;


use yii\db\ActiveRecord;

interface ElasticCompatibilityInterface
{
    /**
     * Mapping for elastic search index
     * @author Andrew Litvinov <andleex@gmail.com>
     *
     * @return mixed
     */
    public static function mapping();

    /**
     * Prepare attributes for Elastic from base model
     * @author Andrew Litvinov <andleex@gmail.com>
     *
     * @param ActiveRecord $model
     * @return mixed
     */
    public function  initAttributes(ActiveRecord $model);
}