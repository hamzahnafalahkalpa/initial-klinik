<?php

namespace Projects\Klinik\Controllers\API\PatientEmr\VisitExamination\Examination;

use Projects\Klinik\Controllers\API\PatientEmr\EnvironmentController as EnvEnvironmentController;

class EnvironmentController extends EnvEnvironmentController
{
    protected function commonRequest(){
        $this->userAttempt();
        request()->merge([
            'practitioner_id' => $this->global_employee->getKey() ?? null
        ]);
    }

    protected function storeExamination(){
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
            'warehouse_type' => config('module-examination.warehouse') ?? 'Room',
            'warehouse_id' => $room_id ?? null,
            'pharmacy_id'  => $pharmacy_id ?? null,
            'pharmacy_type' => config('module-examination.warehouse') ?? 'Room'
        ]);
        // if (isset(request()->examination_summary)){
        //     if (!isset(request()->examination_summary['valid_until']) && isset(\request()->examination_summary['certificate_valid_range'])){
        //         $examination_summary = request()->examination_summary;
        //         $examination_summary['valid_until'] = now()->addYears(intval($examination_summary['certificate_valid_range']))->format('Y-m-d');
        //         request()->merge([
        //             'examination_summary' => $examination_summary
        //         ]);
        //     }
        // }
        return $this->__examination_schema->storeExamination();
    }
}
