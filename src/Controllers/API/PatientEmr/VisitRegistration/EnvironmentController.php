<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration;

use Projects\Klinik\Controllers\API\PatientEmr\EnvironmentController as EnvEnvironmentController;
use Illuminate\Support\Str;

class EnvironmentController extends EnvEnvironmentController{

    protected function getVisitRegistrationPaginate(?callable $callback = null){
        $medic_service_label = Str::upper(Str::snake(request()->search_medic_service_label ?? request()->flag ?? 'RAWAT JALAN',' '));
        request()->merge([
            'search_medic_service_label' => $medic_service_label,
        ]);
        
        return $this->__visit_registration_schema->conditionals(function($query) use ($callback, $medic_service_label){
            $query->when($this->isPerawat(),function($query){
                request()->merge([
                    'search_medic_service_id' => $this->getMedicServiceFromEmployee()
                ]);
            })->when(isset($callback),function ($query) use ($callback){
                $callback($query);
            });
        })->viewVisitRegistrationPaginate();
    }
}
