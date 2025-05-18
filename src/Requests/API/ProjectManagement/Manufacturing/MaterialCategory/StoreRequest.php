<?php

namespace Projects\Klinik\Requests\API\ProjectManagement\Manufacturing\MaterialCategory;

use Hanafalah\LaravelSupport\Requests\FormRequest;
use Hanafalah\ModuleManufacture\Contracts\Data\MaterialCategoryData;
use Hanafalah\ModuleManufacture\Enums\MaterialCategory\Flag;

class StoreRequest extends FormRequest
{
    protected $__entity = 'MaterialCategory';

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
        $this->requestDTO(MaterialCategoryData::class);
        return [
        ];
    }
}
