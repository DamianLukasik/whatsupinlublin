<?php
namespace Damianlukasik\Whatsupinlublin\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) 
    {
		$installer = $setup;
		$installer->startSetup();
		if(version_compare($context->getVersion(), '1.1.0', '<')) {
			if (!$installer->tableExists('damianlukasik_whatsupinlublin_sample')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('damianlukasik_whatsupinlublin_sample')
                )
                ->addColumn(
					'sample_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Sample ID'
				)
				->addColumn(
					'weather',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Weather'
				)
				->addColumn(
					'icon',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'icon'
				)
				->addColumn(
					'temp',
					\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					'10,2',
                    ['nullable' => false, 'default' => '0.00'],
					'temperature'
                )
                ->addColumn(
					'feels_like',
					\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					'10,2',
                    ['nullable' => false, 'default' => '0.00'],
					'Feels Like'
                )
                ->addColumn(
					'temp_min',
					\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					'10,2',
                    ['nullable' => false, 'default' => '0.00'],
					'temperature min'
                )
                ->addColumn(
					'temp_max',
					\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					'10,2',
                    ['nullable' => false, 'default' => '0.00'],
					'temperature max'
                )
                ->addColumn(
					'pressure',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Pressure'
                )
                ->addColumn(
					'humidity',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Humidity'
                )
                ->addColumn(
					'visibility',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Visibility'
                )
                ->addColumn(
					'wind_speed',
					\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					'10,2',
                    ['nullable' => false, 'default' => '0.00'],
					'Wind Speed'
                )
                ->addColumn(
					'wind_deg',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Wind Deg'
                )
                ->addColumn(
					'clouds',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Clouds'
                )
                ->addColumn(
					'sunrise',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Sunrise'
                )
                ->addColumn(
					'sunset',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Sunset'
                )
                ->addColumn(
					'dt',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Datetime'
                )
				->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At')
				->setComment('Weather Sample Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('damianlukasik_whatsupinlublin_sample'),
				$setup->getIdxName(
					$installer->getTable('damianlukasik_whatsupinlublin_sample'),
					['weather','icon'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['weather','icon'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
            }
        }
		$installer->endSetup();
	}
}