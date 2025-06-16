<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\ExaminationStuff;

use Projects\Klinik\Requests\PatientManagement\ExaminationStuff\{
    ViewRequest
};
use Illuminate\Support\Str;

class ExaminationStuffController extends EnvironmentController
{
    public function index(ViewRequest $request){
        if (isset(request()->stuff_type)){
            $stuff_type = $this->replacingStuff(request()->stuff_type);
            return $this->__examination_stuff_schema->viewExaminationStuffList($stuff_type);
        }else{
            $stuff_type = [];
            foreach (request()->stuff_types as $type) $stuff_type[] = $this->replacingStuff($type);
            return $this->__examination_stuff_schema->viewMultipleExaminationStuffList($stuff_type);
        }
    }

    private function replacingStuff(string $stuff_type){
        return Str::upper(Str::replace('-','_',$stuff_type));
    }
}
