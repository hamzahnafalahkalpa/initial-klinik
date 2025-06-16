<?php

namespace Projects\Klinik\Requests\PatientManagement\ExaminationStuff;

use Illuminate\Validation\Rule;

class ViewRequest extends ExaminationStuffEnvironment
{
  public function authorize(){
    return true;
  }

  public function rules(){
    $rule = Rule::in([
      'gcs',
      'allergy',
      'vitalsign',
      'triage',
      'familyillness',
      'servicelabel'
    ]);
    if (isset(request()->stuff_type) && request()->stuff_type == 'gcs'){
      request()->merge([
        'stuff_types' => ['gcs_eyes','gcs_verbal','gcs_motor'],
        'stuff_type'  => null
      ]);
    }
    if (isset(request()->stuff_type) && request()->stuff_type == 'allergy'){
      request()->merge([
        'stuff_types' => ['allergy_type'],
        'stuff_type'  => null
      ]);
    }
    if (isset(request()->stuff_type) && request()->stuff_type == 'vitalsign'){
      request()->merge([
        'stuff_types' => ['vitalsign_loc'],
        'stuff_type'  => null
      ]);
    }
    if (isset(request()->stuff_type) && request()->stuff_type == 'familyillness'){
      request()->merge([
        'stuff_types' => ['familyillness_family_role_id'],
        'stuff_type'  => null
      ]);
    }
    return [
        'stuff_type' => [
            'required_without:stuff_types',$rule
        ],
        'stuff_types' => [
            'required_without:stuff_type','array'
        ],
        'stuff_types.*' => [$rule]
    ];
  }
}