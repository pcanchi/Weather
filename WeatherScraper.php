<?php
class WeatherScraper  
{
	public $searchString;
	public $site;
	public $jobs;
	public function __construct($param)
	{
		$input_search = $param['input_search'];
		//make the site into a string like:
		//http://weather.yahooapis.com/forecastrss?w=<<<<<<$city>>>>>>>
		$this->site = "http://weather.yahooapis.com/forecastrss?w=2488137";
		$this->jobs = simplexml_load_file($this->site);
	}

	/**
	This method gets the temperature from the RSS feed
	*/
	function getTemp()
	{
		//array to hold job titles
		print "getting temp...\n";
		
		$temp = $this->jobs->channel->item->children('yweather',true)->children('condition', true);
		print "temp = " . $temp . "\n";
		

		return $temp;
	}
}

$API_VERSION = '0.0.1';

$weather = new WeatherScraper($_REQUEST);

$status = 0;
$messages = array();
$data = $weather->getTemp();
print $data;

?>
