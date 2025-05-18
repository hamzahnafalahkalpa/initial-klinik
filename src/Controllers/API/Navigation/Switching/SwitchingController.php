<?php

namespace Projects\Klinik\Controllers\API\Navigation\Switching;

use Hanafalah\ModuleEmployee\Contracts\Schemas\Employee;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Navigation\Switching\{
    UpdateRequest
};

class SwitchingController extends ApiController{
    public function __construct(
        protected Employee $__employee_schema
    ){}

    public function update(UpdateRequest $request){
        $this->userAttempt();

        $role = $this->transaction(function() use ($request){
            switch ($request->type) {
                case 'role':
                    return $this->global_user_reference->switchRoleTo($request->id);
                break;
            }
        });
        return $role->toViewApi();
    }
}