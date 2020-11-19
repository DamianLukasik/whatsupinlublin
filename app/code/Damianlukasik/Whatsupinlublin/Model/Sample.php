<?php
namespace Damianlukasik\Whatsupinlublin\Model;

class Sample extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'damianlukasik_whatsupinlublin_sample';

	protected $_cacheTag = 'damianlukasik_whatsupinlublin_sample';

	protected $_eventPrefix = 'damianlukasik_whatsupinlublin_sample';

	protected function _construct()
	{
		$this->_init('Damianlukasik\Whatsupinlublin\Model\ResourceModel\Sample');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}