<?php

namespace Projects\Klinik\Controllers\API\ProgramActivity\ActivityList\Surveillance;

use Projects\Klinik\Controllers\API\ProgramActivity\Surveillance\EnvironmentController as EnvEnvironmentController;

class EnvironmentController extends EnvEnvironmentController{
    protected function commonRequest(){
        request()->merge([
            'reference_type' => 'ActivityList',
            'reference_id'   => request()->activity_list_id
        ]);
    }
}