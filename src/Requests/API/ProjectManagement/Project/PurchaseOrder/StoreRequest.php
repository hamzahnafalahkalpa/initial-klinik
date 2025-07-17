<?php

namespace Projects\Klinik\Requests\API\ProjectManagement\Project\PurchaseOrder;

use Hanafalah\LaravelSupport\Requests\FormRequest;
use Hanafalah\ModulePurchaseOrder\Contracts\Data\PurchaseOrder\PurchaseOrderData;

class StoreRequest extends FormRequest
{
    protected $__entity = 'PurchaseOrder';

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
