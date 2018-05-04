<?php

namespace common\elastic\models;

use Yii;
use yii\elasticsearch\ActiveRecord;

class TrendyPage extends ActiveRecord
{
    /**
     * name of the index
     * @author Andrew Litvinov <andleex@gmail.com>
     *
     * @return string
     */
    public static function index()
    {
        return 'fulltext';
    }

    public static function type()
    {
        return 'trendy-page';
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    public function attributes()
    {
        // path mapping for '_id' is setup to field 'id'
        return ['id', 'updatedDate', 'title','body', 'slug', 'urlBackend', 'urlFrontend'];
    }

    public static function mapping()
    {
        return [
            self::type() => [
                'properties' => [
                    'id' => ['type' => 'long'],
                    'updatedDate' => ['type' => 'date'],
                    'body' => ['type' => 'text'],
                    'title' => ['type' => 'text'],
                    'slug' => ['type' => 'keyword'],
                    'urlBackend' => ['type' => 'keyword'],
                    'urlFrontend' => ['type' => 'keyword'],
                ]
            ]
        ];
    }

    public function initAttributes(\lateos\trendypage\models\TrendyPage $model)
    {
        $this->id = $model->id;
        $this->setPrimaryKey($model->id);
        $this->updatedDate = $model->updatedDate;
        $this->title = $model->title;
        $this->body = strip_tags($model->body);
        $this->slug = $model->slug;
        $this->urlBackend = Yii::$app->urlManagerBackend->createAbsoluteUrl(['news/manage/update', 'id' => $model->id]);
        $this->urlFrontend = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/'.$model->slug]);
    }

}