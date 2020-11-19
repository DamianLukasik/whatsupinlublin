<?php
namespace Damianlukasik\Whatsupinlublin\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	protected $_sampleFactory;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Damianlukasik\Whatsupinlublin\Model\SampleFactory $sampleFactory
	)
	{
		$this->_sampleFactory = $sampleFactory;
		parent::__construct($context);
	}

	public function city()
	{
		return __('Lublin');
	}

	public function getSampleCollection(){
		$collection = $this->_sampleFactory->create();
		return $collection->getCollection();
    }
    
    public function getLatestSample(){        
        $collection = $this->_sampleFactory->create();
        return $collection->getCollection()->getLastItem();
    }

    public function getNewSampleFromAPI(){
        ini_set("allow_url_fopen", 1);
        $ch = curl_init();
        $url = "http://api.openweathermap.org/data/2.5/weather?q=lublin,pl&APPID=fcfeb401adba06359742be547d3ca04b";
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($result);
        //save to database
        $variable = $this->_sampleFactory->create();
        $data = [          
            'weather' => $obj->weather[0]->main,
            'icon' => $obj->weather[0]->icon,
            'temp' => $obj->main->temp,
            'feels_like' => $obj->main->feels_like,
            'temp_min' => $obj->main->temp_min,
            'temp_max' => $obj->main->temp_max,
            'pressure' => $obj->main->pressure,
            'humidity' => $obj->main->humidity,
            'visibility' => $obj->visibility,
            'wind_speed' => $obj->wind->speed,
            'wind_deg' => $obj->wind->deg,
            'clouds' => $obj->clouds->all,
            'sunrise' => $obj->sys->sunrise,
            'sunset' => $obj->sys->sunset,
            'dt' => $obj->dt
        ];     /*  */         
        $variable->setData($data);
        $variable->save(); 
    }
}