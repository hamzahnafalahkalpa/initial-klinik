<?php

namespace Projects\Klinik\Requests\PatientManagement\Patient;
use Hanafalah\LaravelSupport\Requests\FormRequest;

class ShowRequest extends FormRequest
{
  protected $__entity = 'Patient';

  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [];
  }
}
