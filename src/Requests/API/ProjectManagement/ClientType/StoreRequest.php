<?php

namespace Projects\Klinik\Requests\API\ProjectManagement\ClientType;

use Hanafalah\LaravelSupport\Requests\FormRequest;
use Hanafalah\ModuleProject\Contracts\Data\Project\ProjectStuffData;

class StoreRequest extends FormRequest
{
    protected $__entity = 'ClientType';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        ];
    }
}
