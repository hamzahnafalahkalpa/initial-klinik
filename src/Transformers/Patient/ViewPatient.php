<?php

namespace Projects\Klinik\Transformers\Patient;

use Hanafalah\ModulePatient\Resources\Patient\ViewPatient as PatientViewPatient;

class ViewPatient extends PatientViewPatient
{
    public function toArray(\Illuminate\Http\Request $request): array
    {
        $arr = [
            'consument' => $this->prop_consument
        ];
        $arr = $this->mergeArray(parent::toArray($request), $arr);
        return $arr;
    }
}
