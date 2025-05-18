<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rab;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\Rab;
use Illuminate\Http\Request;

class ImportExportRabController extends RabController
{
    public function template(Request $request){
        return $this->__rab_schema->template();
    }

    public function import(Request $request){
        $rab = $this->prepareStore();
        request()->merge([
            'id'   => request()->id ?? $rab['id'],
        ]);
        return $this->__rab_schema->import();
    }

    public function export(Request $request){
        return $this->__rab_schema->export();
    }
}