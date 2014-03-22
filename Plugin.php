<?php namespace RainLab\TwitterFeed;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'Twitter',
            'description' => 'Provides the Twitter integration.',
            'author'      => 'Alexey Bobkov, Samuel Georges',
            'icon'        => 'icon-twitter'
        ];
    }

    public function registerComponents()
    {
        return [
           '\RainLab\TwitterFeed\Components\Favorites' => 'twitterFavorites'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Twitter',
                'icon'        => 'icon-twitter',
                'description' => 'Configure Twitter authentication parameters.',
                'class'       => 'RainLab\TwitterFeed\Models\Settings',
                'order'       => 210
            ]
        ];
    }
}