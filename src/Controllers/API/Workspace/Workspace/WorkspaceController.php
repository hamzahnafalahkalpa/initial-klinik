<?php

namespace Projects\Klinik\Controllers\API\Workspace\Workspace;

use Hanafalah\ModuleWorkspace\Contracts\Schemas\Workspace;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\Workspace\Workspace\{
    ShowRequest, StoreRequest
};

class WorkspaceController extends ApiController{
    public function __construct(
        protected Workspace $__workspace_schema
    ){
        parent::__construct();
    }

    public function show(ShowRequest $request){
        return $this->__workspace_schema->showWorkspace();
    }

    public function store(StoreRequest $request){
        return $this->__workspace_schema->storeWorkspace();
    }
}