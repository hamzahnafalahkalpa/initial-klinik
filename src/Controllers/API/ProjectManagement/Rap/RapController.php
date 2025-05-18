<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rap;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\Rap;
use Hanafalah\ModuleRencanaAnggaran\Enums\Anggaran\Flag;
use Projects\Klinik\Requests\API\ProjectManagement\Rap\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class RapController extends EnvironmentController
{
    public function __construct(protected Rap $__rap_schema){}

    public function index(ViewRequest $request){
        return $this->__rap_schema->conditionals(function($query){
            $query->when(isset(request()->project_id),function($query){
                $query->where('reference_id',request()->project_id)
                      ->where('reference_type','Project');
            });
        })->viewRapPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__rap_schema->conditionals(function($query){
            $query->when(isset(request()->project_id),function($query){
                $query->where('reference_id',request()->project_id)
                      ->where('reference_type','Project');
            });
        })->showRap();
    }

    public function store(StoreRequest $request){
        return $this->prepareStore();
    }

    protected function prepareStore(){
        $this->userAttempt();
        if (isset(request()->project_id)){
            $project = $this->ProjectModel()->with('rap')->findOrFail(request()->project_id);
            request()->merge([
                'id'   => request()->id ?? $project->rap->id ?? null,
                'name' => request()->name ?? $project->name
            ]);
        }

        $rap_attributes = [
            'name'           => request()->name,
            'author_type'    => $this->global_employee->getMorphClass(),
            'author_id'      => $this->global_employee->getKey(),
            'reference_type' => 'Project',
            'reference_id'   => request()->project_id,
            'flag'           => Flag::Rap->value
        ];
        request()->merge($rap_attributes);
        $attributes = $this->mapper(request()->all());
        request()->replace($attributes);
        return $this->__rap_schema->storeRap();
    }

    public function destroy(DeleteRequest $request){
        return $this->__rap_schema->deleteRap();
    }
}