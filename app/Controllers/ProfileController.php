<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 4-8-15
 * Time: 20:39
 */

namespace YouDesigner\Controllers;


use YouDesigner\Helpers\Block;

class ProfileController extends AbstractController
{
    /**
     * Show the My Profile page
     *
     * @return string
     * @throws \Exception
     */
    public function actionProfile()
    {
        $this->setBlock("meta:title", Block::TYPE_TEXT, "Profile");
        $this->setBlock("block:content", Block::TYPE_FILE, "content/profile");
        return $this->render(self::LAYOUT_PROFILE);
    }
}