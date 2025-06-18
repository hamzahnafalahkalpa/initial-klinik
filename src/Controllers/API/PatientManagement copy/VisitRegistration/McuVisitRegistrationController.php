<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitRegistration;

use Gii\ModuleMedicService\Enums\MedicServiceFlag;
use Projects\Klinik\Requests\PatientEmr\VisitExamination\{
    ViewRequest
};

class McuVisitRegistrationController extends EnvironmentController
{
    public function index(ViewRequest $request){
        request()->merge(['flag' => 'MCU']);
        return $this->__visit_registration_schema->conditionals(function($query){
            $query->whereHas('childs',function($query){
                $is_false = true;
                if (isset($this->global_employee)){
                    $room = $this->global_employee->room;
                    if (isset($room)){
                        $medic_service = $this->MedicServiceModel()->find($room->medic_service_id);
                        if (isset($medic_service) && $medic_service->flag == MedicServiceFlag::MCU->value){
                            $is_false = false;
                        }else{
                            $query->where('medic_service_id',$room->medic_service_id);
                        }
                        $is_false = false;
                    }
                }
                if ($is_false){
                    $query->whereRaw('FALSE');
                }
            });
        })->viewVisitRegistrationPaginate();
    }
}
