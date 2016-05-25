<?php namespace Rainlab\Twitter\Components;

use Cms\Classes\ComponentBase;
use RainLab\Twitter\Classes\TwitterClient;

class LatestTweet extends ComponentBase
{
    public $tweetContent;

    public function componentDetails()
    {
        return [
            'name'        => 'LatestTweet Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
            'tweet-limit' => [
                 'title'             => 'No of tweets',
                 'description'       => 'To fix the size of a timeline to a preset number of Tweets, use any value between 1 and 20 Tweets',
                 'type'              => 'string',
                 'default'           => 1,
                 'validationPattern' => '^\d+$',
                 'validationMessage' => 'The tweet limit attribute must be an integer.'
            ],
            'exclude-replies' => [
                 'title'             => 'Exclude replies',
                 'description'       => 'Exclude replies from the tweets collected',
                 'type'              => 'dropdown',
                 'default'           => "No",
                 'options'           => ["Yes", "No"]
            ]
        ];
    }

    public function onRun()
    {
        try {
            $latestTweet = TwitterClient::instance()
                                        ->getLatestTweet([
                                            "tweet-limit" => $this->property('tweet-limit'),
                                            "exclude-replies" => $this->property('exclude-replies')
                                            ]);
        } catch (Exception $ex) {
            return [];
        }

       $this->page["tweets"] = $latestTweet;
    }

}