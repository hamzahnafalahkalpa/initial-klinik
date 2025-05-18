<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Project\Item;

use Hanafalah\ModuleItem\Contracts\Schemas\Item;
use Projects\Klinik\Controllers\API\ApiController;
use Projects\Klinik\Requests\API\ProjectManagement\Project\Item\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class ItemController extends ApiController
{
    public function __construct(
        protected Item $__item_schema
    ){}

    public function index(ViewRequest $request){
        return $this->__item_schema->conditionals(function($query){
            $query->whereHasMorph('reference','ProjectMaterial',function($query){
                $query->where('project_id',request()->project_id);
            });
        })->viewItemPaginate('ProjectMaterial');
    }

    public function show(ShowRequest $request){
        return $this->__item_schema->showItem();
    }

    public function store(StoreRequest $request){
        request()->merge([
            'event.name' => request()->name
        ]);
        return $this->__item_schema->storeItem();
    }

    public function destroy(DeleteRequest $request){
        return $this->__item_schema->deleteItem();
    }
}