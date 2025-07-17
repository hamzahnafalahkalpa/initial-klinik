<?php

namespace Projects\Klinik\Requests\API\ProjectManagement\Project\Purchasing;

use Hanafalah\LaravelSupport\Requests\FormRequest;
use Hanafalah\ModulePurchasing\Contracts\Data\Purchasing\PurchasingData;

class StoreRequest extends FormRequest
{
    protected $__entity = 'Purchasing';

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
