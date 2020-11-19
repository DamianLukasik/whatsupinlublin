<?php
namespace Damianlukasik\Whatsupinlublin\Model\ResourceModel\Sample;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'sample_id';
	protected $_eventPrefix = 'damianlukasik_whatsupinlublin_sample_collection';
	protected $_eventObject = 'sample_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
        $this->_init('Damianlukasik\Whatsupinlublin\Model\Sample', 'Damianlukasik\Whatsupinlublin\Model\ResourceModel\Sample');
	}

}