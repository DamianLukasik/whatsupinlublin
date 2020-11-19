<?php
namespace Damianlukasik\Whatsupinlublin\Cron;

class UpdateWeather
{
	public function execute()
	{
		\Magento\Framework\App\ObjectManager::getInstance()
		->get(\Damianlukasik\Whatsupinlublin\Block\Display::class)->getNewSampleFromAPI();
	}
}