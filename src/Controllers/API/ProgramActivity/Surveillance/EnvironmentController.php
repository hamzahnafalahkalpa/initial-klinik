<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\Surveillance;

use Hanafalah\PuskesmasAsset\Contracts\Schemas\Surveillance;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController{
    public function __construct(
        protected Surveillance $__schema
    ){
        parent::__construct();
    }

    protected function getSurveillancePaginate(?callable $callback = null){        
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
        })->viewSurveillancePaginate();
    }

    protected function showSurveillance(?callable $callback = null){        
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->showSurveillance();
    }

    protected function deleteSurveillance(?callable $callback = null){        
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->deleteSurveillance();
    }

    protected function storeSurveillance(?callable $callback = null){
        $this->commonRequest();
        return $this->__schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->storeSurveillance();
    }

    protected function commonConditional($query){

    }

    protected function commonRequest(){
        
    }
}