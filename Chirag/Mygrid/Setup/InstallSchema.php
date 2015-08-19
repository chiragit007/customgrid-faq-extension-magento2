<?php

namespace Chirag\Mygrid\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()->newTable(
            $installer->getTable('questions_and_answers')
        )->addColumn(
            'question_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true, 'nullable' => false, 'primary' => true),
            'Question ID'
        )->addColumn(
            'question_title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            array('nullable' => false),
            'Title'
        )->addColumn(
            'question',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            '2M',
            array('nullable' => false),
            'Question'
        )->addColumn(
            'publish_date',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            array(),
            'Publish Date'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            array(),
            'Active Status'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            array(),
            'Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            array(),
            'Modification Time'
        )->setComment(
            'Questions Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
