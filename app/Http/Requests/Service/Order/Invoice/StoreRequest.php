<?php

namespace App\Http\Requests\Service\Order\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'service_order_id' => '',
            'title' => 'required|string',
            'amount' => 'required|integer',
            'partial' => ''
        ];
    }
}
