<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Chirag\Mygrid\Model\Resource\Question;
 
class Collection extends \Magento\Framework\Model\Resource\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Chirag\Mygrid\Model\Question', 'Chirag\Mygrid\Model\Resource\Question');
        //$this->_map['fields']['page_id'] = 'main_table.page_id';
    }
 
    
}
