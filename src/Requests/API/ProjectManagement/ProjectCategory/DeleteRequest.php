<?php

namespace Projects\Klinik\Requests\API\ProjectManagement\ProjectCategory;

use Hanafalah\LaravelSupport\Requests\FormRequest;

class DeleteRequest extends FormRequest
{
    protected $__entity = 'ProjectCategory';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'   => ['required',$this->idValidation($this->__entity)],            
        ];
    }
}
