<?php

namespace Projects\Klinik\Controllers\API\Setting;

use Hanafalah\ModuleExamination\Contracts\Schemas\Screening;
use Projects\Klinik\Controllers\API\ApiController;
use Illuminate\Http\Request;

class ScreeningController extends ApiController{
    public function __construct(
        protected  Screening $__schema
    ){ }

    public function index(Request $req) {
        return $this->__schema->viewScreeningList();
    }

    public function show(Request $req) {
        return $this->__schema->showScreening();
    }

    public function store(Request $request) {
       return $this->__schema->storeScreening();
    }

    public function delete(Request $req) {
       return $this->__schema->deleteScreening();
    }
}
