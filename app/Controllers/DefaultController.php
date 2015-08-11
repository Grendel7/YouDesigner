<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 4-8-15
 * Time: 20:39
 */

namespace YouDesigner\Controllers;


class DefaultController extends AbstractController
{
    /**
     * Render the default page (the hosting account main page with all the icons)
     *
     * @return string
     * @throws \Exception
     */
    public function actionDefault()
    {
        return $this->render(self::LAYOUT_DEFAULT);
    }
}