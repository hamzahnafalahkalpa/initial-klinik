<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination;

use Gii\ModuleExamination\Contracts\Examination;
use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    public function __construct(
        protected Examination $__examination_schema
    ){
        parent::__construct();
    }


    protected function setPractitionerId(): void{
        request()->merge([
            'practitioner_id' => $this->global_employee->getKey() ?? null
        ]);
    }

    protected function storeBulkExamination(){
        $this->setPractitionerId();
        $room = $this->global_employee->room;
        if (isset($room)){
            $room_id = $room->getKey();
            if ($room->medic_service_name == "Instalasi Farmasi"){
                $pharmacy_id = $room->getKey();
            }else{
                if (isset($room->pharmacy)){
                    $pharmacy_id = $room->pharmacy->getKey();
                }
            }
        }
        request()->merge([
            'warehouse_id' => $room_id ?? null,
            'pharmacy_id'  => $pharmacy_id ?? null
        ]);
        if (isset(request()->examination_summary)){
            if (!isset(request()->examination_summary['valid_until']) && isset(\request()->examination_summary['certificate_valid_range'])){
                $examination_summary = request()->examination_summary;
                $examination_summary['valid_until'] = now()->addYears(intval($examination_summary['certificate_valid_range']))->format('Y-m-d');
                request()->merge([
                    'examination_summary' => $examination_summary
                ]);
            }
        }
        $data = $this->__examination_schema->storeBulkStoreExamination();
        return $data;
    }
}
