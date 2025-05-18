<?php

namespace Projects\Klinik\Controllers\API\ProjectManagement\Rab\RabWorkList;

use Projects\Klinik\Controllers\API\ApiController;

class EnvironmentController extends ApiController
{
    protected $rab_items = [];

    protected function mapper(array $attributes){
        foreach ($attributes as &$attribute) {
            if (isset($attribute['sub_titles']) && count($attribute['sub_titles']) > 0){
                return $this->mapper($attribute['sub_titles']);
            }else{
                if (isset($attribute['rab_items']) && count($attribute['rab_items']) > 0){
                    foreach ($attribute['rab_items'] as &$rab_item) {
                        if ($this->validateRabItemReference($rab_item,'rap_materials')){
                            foreach ($rab_item['rap_materials'] as &$material_dto) {
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
                        }

                        if ($this->validateRabItemReference($rab_item,'rap_services')){
                            foreach ($rab_item['rap_services'] as &$service_dto) {
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
                        }
                    }
                }
            }
        }
        return $attributes;
    }

    private function validateRabItemReference(array $rab_item, string $reference_type){
        return isset($rab_item[$reference_type]) && count($rab_item[$reference_type]) > 0;
    }
}