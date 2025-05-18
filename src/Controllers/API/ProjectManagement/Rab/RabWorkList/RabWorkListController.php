<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rab\RabWorkList;

use Hanafalah\ModuleRencanaAnggaran\Contracts\Schemas\RabWorkList;
use Projects\Klinik\Requests\API\ProjectManagement\Rab\RabWorkList\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class RabWorkListController extends EnvironmentController
{
    public function __construct(protected RabWorkList $__rab_work_list){}

    public function index(ViewRequest $request){
        return $this->__rab_work_list->conditionals(function($query){
            $query->when(isset(request()->project_id) || isset(request()->rab_id),function($query){
                if (isset($query->rab_id)){
                    $query->where('rab_id',request()->rab_id);
                }else{
                    $query->whereHas('rab',function($query){
                        $query->where('reference_id',request()->project_id)
                             ->where('reference_type','Project');
                    });
                }
            }); 
        })->viewRabWorkListList();
    }

    public function show(ShowRequest $request){
        return $this->__rab_work_list->showRabWorkList();
    }

    public function store(StoreRequest $request){
        $attributes = $this->mapper([request()->all()]);
        request()->replace($attributes[0]);
        return $this->__rab_work_list->storeRabWorkList();
    }

    public function destroy(DeleteRequest $request){
        return $this->__rab_work_list->deleteRabWorkList();
    }
}