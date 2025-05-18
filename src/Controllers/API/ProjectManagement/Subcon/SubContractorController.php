<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Subcon;

use App\Http\Controllers\ApiController;
use Hanafalah\ModuleProject\Contracts\Schemas\Partner\SubContractor;
use Projects\Klinik\Requests\API\ProjectManagement\SubContractor\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class SubContractorController extends ApiController{
    public function __construct(protected SubContractor $__sub_contractor_schema){}

    public function index(ViewRequest $request){
        request()->merge([
            'search_name'  => request()->search_value,
            'search_value' => null
        ]);
        return $this->__sub_contractor_schema->viewSubContractorPaginate();
    }

    public function show(ShowRequest $request){
        return $this->__sub_contractor_schema->showSubContractor();
    }

    public function store(StoreRequest $request){
        return $this->__sub_contractor_schema->storeSubContractor();
    }

    public function destroy(DeleteRequest $request){
        return $this->__sub_contractor_schema->deleteSubContractor();
    }
}