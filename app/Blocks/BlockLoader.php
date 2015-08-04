<?php
/**
 * Created by PhpStorm.
 * User: hans
 * Date: 10-7-15
 * Time: 14:51
 */

namespace YouDesign;


use Silex\Application;

class BlockLoader {

    protected $theme = "x1";

    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    protected $blocks = array(
        'block:content',
        'block:footer',
        'block:account',
        'block:find_menu_item',
        'block:find',
        'block:client',
        'block:menu:top:table',
        'block:menu:top',
        'block:menu:cpanel',
        'block:menu:cpanel:home',
        'block:menu:cpanel:sections',
        'block:messages',
        'block:selector:lang:dropdown',
        'block:selector:lang',
        'block:selector:theme:dropdown',
        'block:selector:theme',

        'meta:title',
        'meta:js',
        'meta:css',

        'cpanel:domain',
        'cpanel:url',
        'cpanel:logo',
        'cpanel:login:background_color',
        'cpanel:login:background_image',
        'cpanel:login:foreground_color',

        'client:id',
        'client:name',
        'client:email',
        'client:created_at',
        'client:created_at_timestamp'

    );

    public function render($tag)
    {
        $path = $this->tagToFilename($tag);

        return file_get_contents($path);
    }

    protected function tagToFilename($tag)
    {
        $path = $this->app['base_path']."/themes/".$this->app['theme']."/inc/".str_replace(":", DIRECTORY_SEPARATOR, $tag).".php";

        if(!file_exists($path)){
            throw new \Exception('Cannot find file '.$path);
        }

        return $path;
    }

    public function getTags()
    {
        return $this->blocks;
    }

}