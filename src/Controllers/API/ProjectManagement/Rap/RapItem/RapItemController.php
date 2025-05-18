<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rap\RapItem;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\RapItem;
use Projects\Klinik\Controllers\API\ProjectManagement\Rap\EnvironmentController;
use Projects\Klinik\Requests\API\ProjectManagement\Rap\RapItem\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class RapItemController extends EnvironmentController
{
    public function __construct(protected RapItem $__rap_item_schema){}

    public function index(ViewRequest $request){
        return $this->__rap_item_schema->conditionals(function($query){
            $query->when(isset(request()->rap_id),function($query){
                $query->where('anggaran_id',request()->rap_id);
            });
        })->viewRapItemPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__rap_item_schema->showRapItem();
    }

    public function store(StoreRequest $request){
        request()->merge([
            'anggaran_id' => request()->rap_id
        ]);
        $attributes = request()->all();
        if (isset(request()->material_id) || isset(request()->material)){
            $this->initializeMaterial($attributes);
        }else{
            $this->initializeJasa($attributes);
        }
        request()->replace($attributes);
        return $this->__rap_item_schema->storeRapItem();
    }

    public function destroy(DeleteRequest $request){
        return $this->__rap_item_schema->deleteRapItem();
    }
}