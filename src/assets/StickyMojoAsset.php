<?php
/**
 * User: Damian
 * Date: 19/05/14
 * Time: 6:05 AM
 */

namespace damiandennis\scrollingblocks;

class StickyMojoAsset extends AssetBundle
{

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/../../../bower-asset/stickymojo');
        $this->setupAssets('js', ['stickyMojo']);
        parent::init();
    }
}