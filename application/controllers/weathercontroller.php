<?php

class WeatherController extends Controller{

	protected $api_key = 'f8d3d25c20676bf8dbd847ecfdc7aa71';
	protected $mode = 'xml';
	protected $units = 'imperial';
	protected $zip;

	public function index(){
	    $this->zip = '46013';

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
