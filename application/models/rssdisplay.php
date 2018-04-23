<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 4/5/18
 * Time: 8:09 AM
 */
class RssDisplay extends Model{

    protected $feed_url;
    protected $number_feed_items;

    public function __construct($url){
        parent::__construct();
        $this->feed_url = $url;
    }
    public function getFeedItems($num_feed_items){
        $rss = simplexml_load_file($this->feed_url);
        $this->number_feed_items = $num_feed_items;
        $i = 0;
        foreach($rss->channel->item as $item){
            $title[$i] = "<a href='". $item->link . "'target='_blank'>". $item->title . "</a><br>";
            $pub[$i] = date('l, F j, Y - h:i A', strtotime($item->pubDate)) . "<br>";
            $desc[$i] = $item->description. "<br><hr>";
            if(++$i > $num_feed_items) break;
        }
        return array('title'=>$title, 'pub'=>$pub, 'desc'=>$desc);
    }

    public function getChannelInfo(){
        $rss = simplexml_load_file($this->feed_url);

        $title = $rss->channel->title;
        $link = $rss->channel->link;
        $desc = $rss->channel->description;

        $data = array('title'=>$title,'link'=>$link, 'desc'=>$desc);


        return $data;

    }
}