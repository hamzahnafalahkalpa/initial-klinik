<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\ProjectCategory;

use Hanafalah\ModuleProject\Contracts\Schemas\Project\ProjectCategory;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\ProjectCategory\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ProjectCategoryController extends ApiController
{
    public function __construct(protected ProjectCategory $__client_schema){}

    public function index(ViewRequest $request){
        return $this->__client_schema->viewProjectCategoryList();
    }

    public function show(ShowRequest $request){
        return $this->__client_schema->showProjectCategory();
    }

    public function store(StoreRequest $request){
        return $this->__client_schema->storeProjectCategory();
    }

    public function destroy(DeleteRequest $request){
        return $this->__client_schema->deleteProjectCategory();
    }
}