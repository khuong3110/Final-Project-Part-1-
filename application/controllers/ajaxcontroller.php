<?php

class AjaxController extends Controller{
	
	protected $postObject;
    protected $userObject;
    protected $categoryObject;
   

	public function index(){
		$this->set('response', "Invalid Request");
	}

	public function get_post_content(){
	    $this->postObject = new Post();
	    $post = $this->postObject->getPost($_GET['pID']);
	    $this->set('response', $post['content']);
    }

    public function get_weather(){
        $zip = $_GET['zip'];
        $xml = simplexml_load_file('http://api.openweathermap.org/data/2.5/weather?zip='.$zip.'&appid=94f38a7a1a91948b0e04e86d5d4d2ef3&mode=xml&units=imperial');

        $html = "<div class=\"page-header\">
    <h1> Weather for ". $xml->city['name']." (". $zip.")</h1>
  </div>
    <h4>". ucwords($xml->weather['value'])." <img src=\"http://openweathermap.org/img/w/".$xml->weather['icon'].".png\"></h4>
    <h4>Temperature: ". $xml->temperature['value']."°F</h4>
    <h4>Wind: ". $xml->wind->speed['name']." (". $xml->wind->speed['value']." MPS) from the ". $xml->wind->direction['name']."</h4>
    <h4>Humidity: ". $xml->humidity['value'] . $xml->humidity['unit']."</h4>

</div>";

        $this->set('response', $html);
    }

	
	
}
