<?php
namespace damiandennis\stickymojo;

use yii\base\Widget;
use yii\helpers\Html;
use yii\web\View;

/**
 * Created by PhpStorm.
 * User: damian
 * Date: 6/10/14
 * Time: 8:01 AM
 */
class StickyMojoWidget extends Widget
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerPluginAssets();
        ob_start();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::init();
        $content = ob_get_clean();
        $wrapper = Html::tag('div', $content, ['id' => $this->id]);
        return $wrapper;

    }

    /**
     * Registers the needed assets
     */
    public function registerPluginAssets()
    {
        $view = $this->getView();
        StickyMojoAsset::register($view);
        $view->registerJs(
            "$(function() {
                $('#restaurant-navigation').stickyMojo({
                    footerID: '#footer',
                    contentID: '#restaurant-menus',
                    orientation: 'left',
                    offsetTop: 60
                });
                $('#cart').stickyMojo({footerID: '#footer', contentID: '#restaurant-menus', orientation: 'right', offsetTop: 60});
            });
            \n",
            View::POS_END
        );
    }
}