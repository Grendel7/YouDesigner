<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 4-8-15
 * Time: 20:41
 */

namespace YouDesigner\Controllers;

use YouDesigner\Helpers\Block;
use Silex\Application;

abstract class AbstractController
{
    /**
     * @var Application
     */
    protected $app;

    private $blocks = array();

    /**
     * Create a new controller
     *
     * @param $app Application
     */
    public function __construct($app)
    {
        $this->app = $app;
        $this->loadStandardBlocks();
        return $this;
    }

    /**
     * Load all blocks with some content
     *
     * @throws \Exception
     */
    private function loadStandardBlocks()
    {
        $this->blocks['block:content'] =                Block::create($this->app)->set(Block::TYPE_BLANK);
        $this->blocks['block:content:before'] =         Block::create($this->app)->set(Block::TYPE_BLANK);
        $this->blocks['block:content:after'] =          Block::create($this->app)->set(Block::TYPE_BLANK);
        $this->blocks['block:footer'] =                 Block::create($this->app)->set(Block::TYPE_TEXT, "Generated by YouDesigner");
        $this->blocks['block:account'] =                Block::create($this->app)->set(Block::TYPE_FILE, "block/account");
        $this->blocks['block:find_menu_item'] =         Block::create($this->app)->set(Block::TYPE_FILE, "block/find_menu_item");
        $this->blocks['block:find'] =                   Block::create($this->app)->set(Block::TYPE_FILE, "block/find");
        $this->blocks['block:client'] =                 Block::create($this->app)->set(Block::TYPE_FILE, "block/client");
        $this->blocks['block:menu:top:table'] =         Block::create($this->app)->set(Block::TYPE_FILE, "block/menu_top_table");
        $this->blocks['block:menu:top'] =               Block::create($this->app)->set(Block::TYPE_FILE, "block/menu_top");
        $this->blocks['block:menu:cpanel'] =            Block::create($this->app)->set(Block::TYPE_FILE, "block/menu_cpanel");
        $this->blocks['block:menu:cpanel:home'] =       Block::create($this->app)->set(Block::TYPE_FILE, "block/menu_cpanel_home");
        $this->blocks['block:menu:cpanel:sections'] =   Block::create($this->app)->set(Block::TYPE_FILE, "block/menu_cpanel_sections");
        $this->blocks['block:messages'] =               Block::create($this->app)->set(Block::TYPE_FILE, "block/messages");
        $this->blocks['block:selector:lang:dropdown'] = Block::create($this->app)->set(Block::TYPE_FILE, "block/selector_lang_dropdown");
        $this->blocks['block:selector:lang'] =          Block::create($this->app)->set(Block::TYPE_FILE, "block/selector_lang");
        $this->blocks['block:selector:theme:dropdown']= Block::create($this->app)->set(Block::TYPE_FILE, "block/selector_theme_dropdown");
        $this->blocks['block:selector:theme'] =         Block::create($this->app)->set(Block::TYPE_FILE, "block/selector_theme");

        $this->blocks['meta:title'] =                   Block::create($this->app)->set(Block::TYPE_TEXT, "Control Panel");
        $this->blocks['meta:js'] =                      Block::create($this->app)->set(Block::TYPE_FILE, "block/js");
        $this->blocks['meta:css'] =                     Block::create($this->app)->set(Block::TYPE_CSS);

        $this->blocks['cpanel:domain'] =                Block::create($this->app)->set(Block::TYPE_TEXT, "examplehost.com");
        $this->blocks['cpanel:url'] =                   Block::create($this->app)->set(Block::TYPE_TEXT, "http://cpanel.main-hosting.com/");
        $this->blocks['cpanel:logo'] =                  Block::create($this->app)->set(Block::TYPE_TEXT, "http://static.main-hosting.com/images/cpanel-logo.png");
        $this->blocks['cpanel:login:background_color']= Block::create($this->app)->set(Block::TYPE_TEXT, "#0e6c9f");
        $this->blocks['cpanel:login:background_image']= Block::create($this->app)->set(Block::TYPE_TEXT, "http://static.main-hosting.com/wallpapers/picture-1.jpg");
        $this->blocks['cpanel:login:foreground_color']= Block::create($this->app)->set(Block::TYPE_TEXT, "#0e6c9f"); //TODO find default foreground color

        $this->blocks['client:id'] =                    Block::create($this->app)->set(Block::TYPE_TEXT, "12345");
        $this->blocks['client:name'] =                  Block::create($this->app)->set(Block::TYPE_TEXT, "Example Client");
        $this->blocks['client:email'] =                 Block::create($this->app)->set(Block::TYPE_TEXT, "client@example.com");
        $this->blocks['client:created_at'] =            Block::create($this->app)->set(Block::TYPE_TEXT, date('Y-m-d H:i:s'));
        $this->blocks['client:created_at_timestamp'] =  Block::create($this->app)->set(Block::TYPE_TEXT, time());
    }

    /**
     * Get all blocks
     *
     * @return array
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Get a specific block
     *
     * @param $tag
     * @return mixed
     */
    public function getBlock($tag)
    {
        return $this->blocks[$tag];
    }

    /**
     * Set the content of a block
     *
     * @param $tag
     * @param $block
     */
    public function setBlock($tag, $block)
    {
        $this->blocks[$tag] = $block;
    }

    /**
     * Render the current page
     *
     * @return string
     * @throws \Exception
     */
    public function render()
    {
        $page = file_get_contents($this->app['base_path'] . "/theme/" . $this->getLayout() . ".html");

        foreach($this->getBlocks() as $tag => $content){
            $page = preg_replace("/{\s*".$tag."\s*}/", $content->render(), $page);

            if(is_null($page)){
                throw new \Exception("An error occurred while trying to parse the tag ".$tag);
            }
        }

        return $page;
    }

    abstract protected function getLayout();
}