<?php

namespace Projects\Klinik\Controllers\API\Transaction\Deposit;

use Projects\Klinik\Controllers\API\Transaction\BaseWalletEnvironmentController as BaseEnv;

class EnvironmentController extends BaseEnv{
    protected function getDepositList(?callable $callback = null){        
        $this->commonRequest();
        return $this->__deposit_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->viewDepositList();
    }

    protected function getDepositPaginate(?callable $callback = null){        
        $this->commonRequest();
        return $this->__deposit_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->viewDepositPaginate();
    }

    protected function showDeposit(?callable $callback = null){        
        $this->commonRequest();
        return $this->__deposit_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->showDeposit();
    }

    protected function deleteDeposit(?callable $callback = null){        
        $this->commonRequest();
        return $this->__deposit_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->deleteDeposit();
    }

    protected function storeDeposit(?callable $callback = null){
        $this->commonRequest();
        return $this->__deposit_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->storeDeposit();
    }
}