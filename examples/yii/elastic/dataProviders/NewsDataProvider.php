<?php
namespace common\elastic\dataProviders;

use yii\data\ActiveDataProvider;

class NewsDataProvider
{
    public static function get($q) {
        $query = \common\elastic\models\News::find()->query([
                "simple_query_string" => [
                    "query" => $q,
                    'fields' => ['body'],
                    "default_operator" => "and",
                ]
            ]
        )->highlight([
            'fields' => [
                'body' => [
                    'number_of_fragments' => 3,
                    'type' => 'plain'
                ]
            ]
        ]);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $provider;
    }
}