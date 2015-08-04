<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 4-8-15
 * Time: 20:18
 */

namespace YouDesigner\Helpers;

use Silex\Application;

class Block
{
    const TYPE_TEXT = 1;
    const TYPE_FILE = 2;
    const TYPE_CSS = 3;
    const TYPE_BLANK = 4;

    protected $app;

    protected $type;
    protected $contentData;

    /**
     * Instantiate a new block
     *
     * @param $app Application
     */
    public function __construct($app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * Instantiate a new block
     *
     * @param $app Application
     * @return Block
     */
    public static function create($app)
    {
        return new self($app);
    }

    /**
     * Set the content of this block
     *
     * @param $type string the type of content (e.g. "text" or "file")
     * @param $data mixed arbitrary data passed to help the given type of content
     * @return \app\Helpers\Block
     */
    public function set($type, $data = null)
    {
        $this->type = $type;
        $this->contentData = $data;
        return $this;
    }

    /**
     * Render this block
     *
     * @return string the content of the block
     * @throws \Exception
     */
    public function render()
    {
        switch($this->type){
            case self::TYPE_TEXT:
                return $this->contentData;
            case self::TYPE_FILE:
                return $this->loadFile();
            case self::TYPE_CSS:
                return $this->loadCss();
            case self::TYPE_BLANK:
                return "";
            default:
                throw new \Exception("The block content type was not set or is not valid");
        }
    }

    /**
     * Load a block file
     *
     * @return string
     * @throws \Exception
     */
    protected function loadFile()
    {
        return $this->getFileContents($this->app['base_path']."/resources/blocks/".$this->app['theme']."/".$this->contentData.".php");
    }

    /**
     * Load the current CSS file
     *
     * @return string
     * @throws \Exception
     */
    protected function loadCss()
    {
        return "<style type='text/css'>".$this->getFileContents($this->app['base_path']."/theme/stylesheet.css")."</style>";
    }

    /**
     * Get the contents of a file at path and filter it so it's safe to include in a template
     *
     * @param $path
     * @return mixed
     * @throws \Exception
     */
    protected function getFileContents($path)
    {
        if(!file_exists($path)){
            throw new \Exception("No file exists at: ".$path);
        }

        return str_replace("$", "&#36;", file_get_contents($path));
    }
}