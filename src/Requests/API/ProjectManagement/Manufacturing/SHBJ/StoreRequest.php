<?php

namespace Projects\Klinik\Requests\API\ProjectManagement\Manufacturing\Shbj;

use Hanafalah\LaravelSupport\Requests\FormRequest;
use Hanafalah\ModuleManufacture\Contracts\Data\ShbjData;
use Hanafalah\ModuleManufacture\Enums\Shbj\Flag;

class StoreRequest extends FormRequest
{
    protected $__entity = 'Shbj';

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
        $flag = (request()->reference_type == 'Jasa') ? Flag::JASA->value : Flag::BARANG->value;
        request()->merge([
            'flag' => $flag
        ]);
        $this->requestDTO(ShbjData::class);
        return [
        ];
    }
}
