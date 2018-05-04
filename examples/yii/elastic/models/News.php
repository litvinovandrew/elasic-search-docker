<?php

namespace common\elastic\models;

use Yii;
use yii\elasticsearch\ActiveRecord;

class News extends ActiveRecord
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
        return 'news';
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    public function attributes()
    {
        // path mapping for '_id' is setup to field 'id'
        return ['id', 'type', 'publishDate', 'body', 'slug', 'urlBackend', 'urlFrontend'];
    }

    public static function mapping()
    {
        return [
            self::type() => [
                'properties' => [
                    'id' => ['type' => 'long'],
                    'type' => ['type' => 'keyword'],
                    'publishDate' => ['type' => 'date'],
                    'body' => ['type' => 'text'],
                    'urlBackend' => ['type' => 'keyword'],
                    'urlFrontend' => ['type' => 'keyword'],
                ]
            ]
        ];
    }

    public function initAttributes(\backend\modules\news\models\News $news)
    {
        $this->id = $news->id;
        $this->setPrimaryKey($news->id);
        $this->type = $news->type;
        $this->publishDate = $news->publishDate;
        $this->body = $news->body;
        $this->slug = $news->slug;
        $this->urlBackend = Yii::$app->urlManagerBackend->createAbsoluteUrl(['news/manage/update', 'id' => $news->id]);
        $this->urlFrontend = Yii::$app->urlManagerFrontend->createAbsoluteUrl(['news/view', 'id' => $news->id]);
    }

}