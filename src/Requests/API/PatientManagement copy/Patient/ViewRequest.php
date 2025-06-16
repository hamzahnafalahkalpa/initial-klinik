<?php

namespace Projects\Klinik\Requests\PatientManagement\Patient;
use Hanafalah\LaravelSupport\Requests\FormRequest;

class ViewRequest extends FormRequest
{
  protected $__entity = 'Patient';

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
    ];
  }
}