<?php

class WeatherController extends Controller{
    /*
     * NOTE
     * I watched 3A and realized the API didn't work so i chose my own API to implement before I saw video 3B
     * I'm hoping that is okay, I still grabbed all the same information as needed in the video.
     */

	protected $api_key = '94f38a7a1a91948b0e04e86d5d4d2ef3';
	protected $mode = 'xml';
	protected $units = 'imperial';
	protected $zip;


	public function index(){
	    $this->zip = '46239'; //Default Zip Code to Load

	    $xml = simplexml_load_file('http://api.openweathermap.org/data/2.5/weather?zip='.$this->zip.'&appid='.$this->api_key.'&mode='.$this->mode.'&units='.$this->units);
        $this->set('current',$xml);
        $this->set('zip',$this->zip);
	}

	public function getResults(){
        $this->zip = $_POST['zip'];
        $xml = simplexml_load_file('http://api.openweathermap.org/data/2.5/weather?zip='.$this->zip.'&appid='.$this->api_key.'&mode='.$this->mode.'&units='.$this->units);
        $this->set('current',$xml);
        $this->set('zip',$this->zip);
    }
	
	
}
?>
