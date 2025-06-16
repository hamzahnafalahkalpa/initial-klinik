<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\Patient;

use Projects\Klinik\Controllers\API\ApiController as ApiBaseController;
use Zahzah\ModulePatient\Schemas\FamilyRelationship;
use Projects\Klinik\Contracts\Patient\Patient;
use Zahzah\ModulePeople\Schemas\People;
use Gii\ModuleOrganization\Schemas\Organization;

class EnvironmentController extends ApiBaseController{

    public function __construct(
        protected Patient $__patient_schema,
        protected People $__people_schema,
        protected FamilyRelationship $__family_relationship_schema,
        protected Organization $__organization_schema
    ){

    }

    protected function recombineRequest(){
        if (isset(request()->search_value)){
            $this->__patient_schema->setParamLogic('or');
            request()->merge([
                'search_name'           => request()->search_value,
                'search_dob'            => request()->search_value,
                'search_nik'            => request()->search_value,
                'search_crew_id'        => request()->search_value,
                'search_medical_record' => request()->search_value,
                'search_value' => null
            ]);
        }
    }
}
