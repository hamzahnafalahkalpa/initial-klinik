<?php

namespace Projects\Klinik\Controllers\API\Transaction;

use Hanafalah\ModulePayment\Contracts\Schemas\POSTransaction;
use Hanafalah\ModuleTransaction\Contracts\Schemas\{
    Transaction
};
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController{
    protected $__schema;

    public function __construct(
        public Transaction $__transaction_schema,
        public POSTransaction $__pos_schema
    ){
        parent::__construct();
        $this->userAttempt();
        $this->__schema = $this->__schema;
    }

    protected function commonConditional($query){

    }

    protected function commonRequest(){
        
    }

    protected function getTransactionPaginate(?callable $callback = null){        
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->viewTransactionPaginate();
    }

    protected function showTransaction(?callable $callback = null){        
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->showTransaction();
    }

    protected function deleteTransaction(?callable $callback = null){        
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->deleteTransaction();
    }

    protected function storeTransaction(?callable $callback = null){
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->storeTransaction();
    }
}