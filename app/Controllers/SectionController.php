<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 4-8-15
 * Time: 20:39
 */

namespace YouDesigner\Controllers;


use YouDesigner\Helpers\Block;

class SectionController extends AbstractController
{
    /**
     * Show an example section page
     *
     * @return string
     * @throws \Exception
     */
    public function actionSection()
    {
        $this->setBlock("meta:title", Block::TYPE_TEXT, "Mange Emails");
        $this->setBlock("block:content", Block::TYPE_FILE, "content/inner");
        return $this->render(self::LAYOUT_INNER);
    }
}