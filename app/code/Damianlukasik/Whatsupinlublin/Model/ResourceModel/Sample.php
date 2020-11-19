<?php
namespace Damianlukasik\Whatsupinlublin\Model\ResourceModel;

class Sample extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('damianlukasik_whatsupinlublin_sample', 'sample_id');
	}
	
}