<?php
namespace Dev\Testing\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(
		SchemaSetupInterface $setup, 
		ModuleContextInterface $context
	){
        $setup->startSetup();

        $quote = $setup->getTable('quote');
        $salesOrder = $setup->getTable('sales_order');
		
		
		$setup->getConnection()->addColumn(
			$quote,
			'custom_notes',
			[
				'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'nullable' => true,
				'comment' =>'Custom Notes'
			]
		);
		
		$setup->getConnection()->addColumn(
			$salesOrder,
			'custom_notes',
			[
				'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'nullable' => true,
				'comment' =>'Custom Notes'
			]
		);
		
        $setup->endSetup();
    }
}