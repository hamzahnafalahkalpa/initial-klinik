<?php

namespace Projects\Klinik\Requests\API\ProjectManagement\Manufacturing\Material;

use Hanafalah\LaravelSupport\Requests\FormRequest;
use Hanafalah\ModuleManufacture\Contracts\Data\MaterialData;
use Hanafalah\ModuleManufacture\Enums\Material\Flag;

class StoreRequest extends FormRequest
{
    protected $__entity = 'Material';

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
        $this->requestDTO(MaterialData::class);
        return [
        ];
    }
}
