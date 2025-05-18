<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rap;

use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    protected $attributess = [];

    protected function mapper(array $attributes){
        if ($this->validateRabItemReference($attributes,'rap_materials')){
            foreach ($attributes['rap_materials'] as &$material_dto) {
               $this->initializeMaterial($material_dto);
            }
        }

        if ($this->validateRabItemReference($attributes,'rap_services')){
            foreach ($attributes['rap_services'] as &$service_dto) {
               $this->initializeJasa($service_dto);
            }
        }
        return $attributes;
    }

    protected function initializeMaterial(array &$material_dto){
        $material_dto['item_reference'] = [];
        $material_dto['item_reference_type'] ??= "ProjectMaterial";
        $item_reference_dto = &$material_dto['item_reference'];
        $item_reference_dto['project_id'] = request()->project_id;
        $material_id ??= $material_dto['material_id'] ?? null;
        $material    ??= $material_dto['material'] ?? null;
        unset($material_dto['material_id'],$material_dto['material']);
        if (isset($material_id)){
            $item_reference_dto['material_id'] = $material_id;
        }else{
            $item_reference_dto['material'] = $material;
        }
    }

    protected function initializeJasa(array &$service_dto){
        $service_dto['item_reference'] = [];
        $service_dto['item_reference_type'] ??= "Service";
        $item_reference_dto = &$service_dto['item_reference'];
        $item_reference_dto['project_id'] = request()->project_id;

        $jasa_id ??= $service_dto['jasa_id'] ?? null;
        $jasa    ??= $service_dto['jasa'] ?? null;
        unset($service_dto['jasa_id'],$service_dto['jasa']);
        if (isset($jasa_id)){
            $service = $this->ServiceModel()->where('reference_id',$jasa_id)
                            ->where('reference_type','Jasa')->firstOrFail();
            $item_reference_dto['service_id'] = $service->reference_id;
        }else{
            $item_reference_dto['jasa'] = $jasa;
        }
    }

    private function validateRabItemReference(array $attributes, string $reference_type){
        return isset($attributes[$reference_type]) && count($attributes[$reference_type]) > 0;
    }
}