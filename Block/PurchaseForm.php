<?php

namespace Prymag\PurchaseForm\Block;

class PurchaseForm extends Base
{
    /**
     * @var array
     */
    private $postData = null;

    public function getFormAction()
    {
        # code...
        return $this->_helper->getPOSTUrl();
    }

    /**
    * Get value from POST request by key
    *
    * @param string $key
    * @return string
    */
    public function getPostValue($key)
    {
        //
        if (null === $this->postData) {
            $this->postData = (array) $this->_dataPersistor->get('purchase_form');
            $this->_dataPersistor->clear('purchase_form');
        }

        if (isset($this->postData[$key])) {
            return (string) $this->postData[$key];
        }
 
         return '';
    }

    public function getAnalyticsSection()
    {
        # code...
        return $this->_objectManager
            ->create(Analytics::class)
            ->toHtml();
    }

}