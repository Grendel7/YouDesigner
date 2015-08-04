<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 4-8-15
 * Time: 20:39
 */

namespace YouDesigner\Controllers;


use YouDesigner\Helpers\Block;

class PublicController extends AbstractController
{
    private $layout = "login";

    /**
     * The action to render the Control Panel login page
     *
     * @return string
     * @throws \Exception
     */
    public function actionLogin()
    {
        $this->emptyUnsupportedFields();
        $this->setBlock("block:content", Block::TYPE_FILE, "content/login");
        $this->setBlock("meta:title", Block::TYPE_TEXT, "Login");
        return $this->render();
    }

    /**
     * Action to render the Public page
     *
     * @return string
     * @throws \Exception
     */
    public function actionTicket()
    {
        $this->layout = "public";
        $this->emptyUnsupportedFields();
        $this->setBlock("block:content", Block::TYPE_FILE, "content/public_ticket");
        $this->setBlock("meta:title", Block::TYPE_TEXT, "Ticket Details");
        return $this->render();
    }

    protected function getLayout()
    {
        return $this->layout;
    }

    /**
     * Because the client is not logged in, many features are not available. We need to empty or disable those fields
     */
    protected function emptyUnsupportedFields()
    {
        $this->setBlock("block:messages", Block::TYPE_BLANK);
        $this->setBlock("block:account", Block::TYPE_BLANK);
        $this->setBlock("block:client", Block::TYPE_BLANK);
        $this->setBlock("block:menu:top:table", Block::TYPE_DISABLED);
        $this->setBlock("block:menu:top", Block::TYPE_DISABLED);
        $this->setBlock("block:menu:cpanel", Block::TYPE_BLANK);
        $this->setBlock("block:menu:cpanel:home", Block::TYPE_BLANK);
        $this->setBlock("block:menu:cpanel:sections", Block::TYPE_BLANK);

        $this->setBlock("client:id", Block::TYPE_BLANK);
        $this->setBlock("client:name", Block::TYPE_BLANK);
        $this->setBlock("client:email", Block::TYPE_BLANK);
        $this->setBlock("client:created_at", Block::TYPE_BLANK);
        $this->setBlock("client:created_at_timestamp", Block::TYPE_BLANK);
    }
}