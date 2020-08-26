<?php


    namespace frontend\components;

    use Exception;
    use Yii;
    use yii\helpers\FileHelper;

    class ImageThumb
    {
        public static function def($path, $w = 450, $h = 300, $crop = true, $holder = "default")
        {

            $path = trim($path);
            $url = $path;

            $placeholder = Yii::$app->params['siteUrl'] . "/static/placeholder/{$holder}.png";

            if (empty($path)) {
                return $placeholder;
            }

            $path = Yii::getAlias('@frontend') . '/web' . $path;

            try {
                $path = urldecode($path);
                if ($path != null) {

                    if (!file_exists($path)) {
                        return $placeholder;
                    }

                    if ($crop) {
                        $newFile = md5($path . $w . $h) . "." . pathinfo($path, PATHINFO_EXTENSION);

                        $thumbPath = Yii::getAlias('@frontend/')."/web/thumbs/.dbstorage";
                        if (!is_dir(dirname($thumbPath))) {
                            FileHelper::createDirectory(dirname($thumbPath));
                        }

                        if (!file_exists(Yii::getAlias('@frontend') . "/web/thumbs/" . $newFile)) {
                            $img = new SimpleImage($path);
                            $img->thumbnail($w, $h)
                                ->save(Yii::getAlias('@frontend') . "/web/thumbs/" . $newFile);
                        }
                        return "/thumbs/" . $newFile;
                    } else {
                        return $url;
                    }

                } else {
                    return $placeholder;
                }
            } catch (Exception $e) {
                return $placeholder;
            }
        }
    }