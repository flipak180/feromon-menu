<?php
namespace common\components;

use himiklab\thumbnail\EasyThumbnailImage;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Helper
{

    public static function price($number = 0): string
    {
        return Yii::$app->formatter->asCurrency($number, 'RUB');
    }

    public static function thumb($path, $width, $height, $options = [], $url = false): string
    {
        $fullPath = Yii::getAlias('@frontendWeb').$path;

        if (!$path or !file_exists($fullPath)) {
            return '';
        }

        return $url ?
            EasyThumbnailImage::thumbnailFileUrl($fullPath, $width, $height, EasyThumbnailImage::THUMBNAIL_INSET_BOX, 80) :
            EasyThumbnailImage::thumbnailImg($fullPath, $width, $height, EasyThumbnailImage::THUMBNAIL_INSET_BOX, $options, 80);
    }

    public static function random(): string
    {
        return substr(md5(rand()), 0, 7);
    }

    public static function uploadImage(Model $model, $attribute = 'image'): bool
    {
        if ($image = UploadedFile::getInstance($model, $attribute . '_field')) {
            $image_path = '/files/'.Helper::random().'.'.$image->extension;
            $image->saveAs(Yii::getAlias('@frontendWeb').$image_path);
            if ($model->$attribute and file_exists(Yii::getAlias('@frontendWeb').$model->$attribute)) {
                unlink(Yii::getAlias('@frontendWeb').$model->$attribute);
            }
            $model->$attribute = $image_path;
        }
        return true;
    }

    public static function ellipsis($text, $length = 50): string
    {
        return mb_strlen($text) > $length ? mb_substr($text, 0, $length) . '...' : $text;
    }
}
