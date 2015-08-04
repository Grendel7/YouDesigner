<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 4-8-15
 * Time: 20:39
 */

namespace app\Controllers;


class DefaultController extends AbstractController
{
    public function actionDefault()
    {
        return $this->render();
    }

    protected function getLayout()
    {
        return "default";
    }
}