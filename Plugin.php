<?php namespace RainLab\Twitter;

use System\Classes\PluginBase;

/**
 * Plugin class is the plugin initialization script that defines the plugin information.
 */
class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Twitter',
            'description' => 'Provides integration with Twitter.',
            'author' => 'Alexey Bobkov, Samuel Georges',
            'icon' => 'icon-twitter'
        ];
    }

    public function registerComponents()
    {
        return [
            \RainLab\Twitter\Components\Favorites::class => 'twitterFavorites',
            \RainLab\Twitter\Components\FollowButton::class => 'followButton',
            \RainLab\Twitter\Components\TweetButton::class => 'tweetButton',
            \RainLab\Twitter\Components\EmbedTweet::class => 'embedTweet',
            \RainLab\Twitter\Components\EmbedTimeline::class => 'embedTimeline',
            \RainLab\Twitter\Components\LatestTweet::class => 'latestTweet'
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Twitter',
                'icon'        => 'icon-twitter',
                'description' => 'Configure Twitter authentication parameters.',
                'class'       => \RainLab\Twitter\Models\Settings::class,
                'order'       => 600
            ]
        ];
    }
}
