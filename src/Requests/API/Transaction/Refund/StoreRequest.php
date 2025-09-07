<?php

namespace Projects\Klinik\Requests\API\Transaction\Refund;

use Projects\Klinik\Requests\API\Transaction\Refund\Environment;

class StoreRequest extends Environment
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }
}
