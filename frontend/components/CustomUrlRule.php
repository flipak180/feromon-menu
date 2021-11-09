<?php

namespace frontend\components;

use common\models\Spot;
use yii\base\BaseObject;
use yii\web\UrlRuleInterface;

class CustomUrlRule extends BaseObject implements UrlRuleInterface
{
    public function createUrl($manager, $route, $params)
    {
        return false; // this rule does not apply
    }

    /**
     * @param \yii\web\UrlManager $manager
     * @param \yii\web\Request $request
     * @return array|bool
     * @throws \yii\base\InvalidConfigException
     */
    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        if (!empty($pathInfo) && substr($pathInfo, -1) === '/') {
            $pathInfo = substr(rtrim($pathInfo), 0 , -1);
        }
        $pathParts = explode('/', $pathInfo);
        $lastPart = end($pathParts);
        if (!$lastPart) $lastPart = '/';

        $spot = Spot::find()->where(['url' => $lastPart])->one();
        if ($spot) {
            return ['site/index', ['spot' => $spot]];
        }

        return false;
    }
}
