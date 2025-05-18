<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\DocumentType;

use App\Http\Controllers\ApiController;
use Hanafalah\ModuleSupport\Contracts\Schemas\DocumentType as SchemaDocumentType;
use Projects\Klinik\Requests\API\ProjectManagement\DocumentType\{
    ViewRequest, ShowRequest, StoreRequest, DeleteRequest
};

class DocumentTypeController extends ApiController{
    public function __construct(protected SchemaDocumentType $__doc_schema){}

    public function index(ViewRequest $request){
        request()->merge([
            'search_name'  => request()->search_value,
            'search_value' => null
        ]);
        return $this->__doc_schema->viewDocumentTypeList();
    }

    public function show(ShowRequest $request){
        return $this->__doc_schema->showDocumentType();
    }

    public function store(StoreRequest $request){
        return $this->__doc_schema->storeDocumentType();
    }

    public function destroy(DeleteRequest $request){
        return $this->__doc_schema->deleteDocumentType();
    }
}