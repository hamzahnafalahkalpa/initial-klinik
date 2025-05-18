<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rap;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\Rap;
use Illuminate\Http\Request;

class ImportExportRapController extends RapController
{
    public function template(Request $request){
        return $this->__rap_schema->template();
    }

    public function import(Request $request){
        $rap = $this->prepareStore();
        request()->merge([
            'id'   => request()->id ?? $rap['id'],
        ]);
        return $this->__rap_schema->import();
    }

    public function export(Request $request){
        return $this->__rap_schema->export();
    }
}