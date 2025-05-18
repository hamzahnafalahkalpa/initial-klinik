<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rab;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\Rab;
use Hanafalah\ModuleRencanaAnggaran\Enums\Anggaran\Flag;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Rab\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class RabController extends ApiController
{
    public function __construct(protected Rab $__rab_schema){
        parent::__construct();
    }

    public function index(ViewRequest $request){
        return $this->__rab_schema->viewRabPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__rab_schema->showRab();
    }

    public function store(StoreRequest $request){
        return $this->prepareStore();
    }

    protected function prepareStore(){
        $this->userAttempt();

        if (isset(request()->project_id)){
            $project = $this->ProjectModel()->with('rab')->findOrFail(request()->project_id);
            request()->merge([
                'id'   => request()->id ?? $project->rab->id ?? null,
                'name' => request()->name ?? $project->name
            ]);
        }

        $rab_attributes = [
            'name'           => request()->name,
            'author_type'    => $this->global_employee->getMorphClass(),
            'author_id'      => $this->global_employee->getKey(),
            'reference_type' => 'Project',
            'reference_id'   => request()->project_id,
            'flag'           => Flag::Rab->value
        ];
        request()->merge($rab_attributes);
        $rab_attributes['flag']      = Flag::Rap->value;
        $rab_attributes['rab_id']    = request()->id;
        $rab_attributes['parent_id'] = null;
        request()->merge([
            'rap' => $this->mergeArray(request()->rap ?? [],$rab_attributes)
        ]);
        if (!isset(request()->name)){
            $reference = $this->{request()->reference_type}()->findOrFail(request()->reference_id); 
            request()->merge(['name' => $reference->name]);
        }
        return $this->__rab_schema->storeRab();
    }

    public function destroy(DeleteRequest $request){
        return $this->__rab_schema->deleteRab();
    }
}