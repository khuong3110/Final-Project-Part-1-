<?php

class HomeController extends Controller{


	public function index(){
	    $rss = new RssDisplay('http://feeds.foxnews.com/foxnews/latest');

	    $channelinfo = $rss->getChannelInfo();
	    $this->set('channel_title', $channelinfo['title']);
	    $this->set('channel_link', $channelinfo['link']);
        $this->set('channel_desc', $channelinfo['desc']);

        $numofitems = 8;

        $feed_data = $rss->getFeedItems($numofitems);
        $this->set('numItems', $numofitems);
        $this->set('feed_data', $feed_data);
	}


}


?>
