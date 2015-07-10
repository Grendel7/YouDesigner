<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 10-7-15
 * Time: 14:36
 */

namespace YouDesign;


use Silex\Application;

class ThemeParser {

    protected $theme = "x1";

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function render($pageName)
    {
        $page = file_get_contents($this->app['base_path'] . "/themes/" . $this->app['theme'] . "/" . $pageName . ".html");

        $blockLoader = new BlockLoader($this->app);

        foreach($blockLoader->getTags() as $tag){
            $page = preg_replace("/{\s*".$tag."\s*}/", $blockLoader->render($tag), $page);

            if(is_null($page)){
                throw new \Exception("An error occured while trying to parse the tag ".$tag);
            }
        }

        return $page;
    }

}