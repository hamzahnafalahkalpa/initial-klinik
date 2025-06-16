<?php

namespace Projects\Klinik\Controllers\API\PatientManagement\Patient;

use Zahzah\ModulePatient\Enums\FamilyRelationship\Role;
use Projects\Klinik\Requests\PatientManagement\Patient\{
    ShowRequest, ViewRequest, DeleteRequest, StoreRequest
};
use Zahzah\ModulePatient\Resources\Patient\{
    ShowPatient, ViewPatient
};

class PatientController extends EnvironmentController{

    public function index(ViewRequest $request){
        $this->recombineRequest();
        return $this->__patient_schema->viewPatientList();
    }

    public function store(StoreRequest $request){
        return $this->__patient_schema->storePatient();
    }

    public function find(){
        $this->recombineRequest();
        return $this->__patient_schema->viewFullPatientList();
    }

    public function getRoleRelationship(){
        $roleRelationShip = Role::cases();
        $roleRelationShip = collect($roleRelationShip)->map(function($role){
            return [
                "label" => ucwords(strtolower(str_replace("_"," ",$role->name))),
                "value" => $role->value
            ];
        });
        return $roleRelationShip;
    }

    public function show(ShowRequest $request){
        return $this->__patient_schema->showPatient();

        return $this->transaction(function(){
            $patient = $this->__patient_schema->booting()->patient(function($query){
                $query->with(["familyRelationship","addresses","reference.addresses","boat.organization",'profession']);
                $query->UUID(request()->uuid)->with(["reference"]);
            })->first();
            if($patient){
                return $this->retransform($patient,function($patient){
                    return new ShowPatient($patient);
                });
            }
        });
    }

    public function destroy(DeleteRequest $request){
        $this->transaction(function(){

            $this->__patient_schema->removeByUuid(request()->uuid,"props->uuid");
        });
    }
}
