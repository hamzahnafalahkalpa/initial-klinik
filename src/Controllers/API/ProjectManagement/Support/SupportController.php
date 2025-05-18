<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Support;

use Hanafalah\ModuleSupport\Contracts\Schemas\Support;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Support\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class SupportController extends ApiController
{
    public function __construct(
        protected Support $__support_schema
    ){
    }

    public function index(ViewRequest $request){
        return $this->__support_schema->viewSupportPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__support_schema->showSupport();
    }

    public function store(StoreRequest $request){
        $this->userAttempt();
        request()->merge([
            'author_type'    => $this->global_employee->getMorphClass(),
            'author_id'      => $this->global_employee->getKey(),
            'reference_type' => 'Project',
            'reference_id'   => request()->project_id,
            'flag'           => request()->flag ?? 'OTHER'
        ]);
        request()->request->remove('project_id');
        return $this->__support_schema->storeSupport();
    }

    public function destroy(DeleteRequest $request){
        return $this->__support_schema->deleteSupport();
    }
}