<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Project;

use Hanafalah\ModuleEvent\Contracts\Data\WorkerFlattenData;
use Hanafalah\ModuleProject\Contracts\Data\Project\ProjectData;
use Hanafalah\ModuleProject\Contracts\Schemas\Project\Project;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Project\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ProjectController extends ApiController
{
    public function __construct(
        protected Project $__project_schema
    ){}

    public function index(ViewRequest $request){
        return $this->__project_schema->viewProjectPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__project_schema->showProject();
    }

    public function store(StoreRequest $request){
        request()->merge([
            'event.name' => request()->name
        ]);
        $sph_nominal = request()->sph_nominal;
        $tax         = request()->tax;
        $sph_tax     = $sph_nominal * $tax['ppn'] / 100;
        request()->merge([
            'netto_nominal' => $sph_nominal - $sph_tax - $tax['mlmp']
        ]);
        return $this->__project_schema->storeProject();
    }

    public function destroy(DeleteRequest $request){
        return $this->__project_schema->deleteProject();
    }
}