<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration;

use Projects\Klinik\Controllers\API\PatientEmr\EnvironmentController as EnvEnvironmentController;

class EnvironmentController extends EnvEnvironmentController{

    protected function getVisitRegistrationPaginate(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->viewVisitRegistrationPaginate();
    }

    protected function showVisitRegistration(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $query->when($this->isPerawat(),function($query){
                request()->merge([
                    'search_medic_service_id' => $this->getMedicServiceFromEmployee()
                ]);
            })->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->showVisitRegistration();
    }

    protected function deleteVisitRegistration(?callable $callback = null){        
        $this->commonRequest();
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback){
            $this->commonConditional($query);
            $callback($query);
        })->deleteVisitRegistration();
    }
}
