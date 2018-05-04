<?php
namespace common\elastic;

use common\elastic\models\News;
use common\elastic\models\TrendyPage;

class ElasticManager
{

    public static $moeldAvailable = [
      \backend\modules\news\models\News::class   => \common\elastic\models\News::class,

    ];

    public static function createIndexes() {

        //delete old
        self::deleteIndexes();

        $news = \backend\modules\news\models\News::find()->active()->all();
        foreach ($news as $item) {
            $elasticNews = new \common\elastic\models\News();
            $elasticNews->initAttributes($item);
            $elasticNews->save();
        }



        $trendyPages = \lateos\trendypage\models\TrendyPage::find()->removed(false)->all();
        foreach ($trendyPages as $item) {
            $elasticTrendy = new \common\elastic\models\TrendyPage();
            $elasticTrendy->initAttributes($item);
            $elasticTrendy->save();
        }
    }

    /**
     *
     * @author Andrew Litvinov <andleex@gmail.com>
     *
     */
    public static function deleteIndexes(){
        $news = new News();
        $news->deleteAll();

        $trendy = new TrendyPage();
        $trendy->deleteAll();
    }


}