<?php

namespace Projects\Klinik\Controllers\API\Transaction\PointOfSale;

use Projects\Klinik\Controllers\API\Transaction\EnvironmentController as EnvTransaction;

class EnvironmentController extends EnvTransaction{
    protected function commonRequest(){
        $this->__schema = $this->__pos_schema;
    }
}