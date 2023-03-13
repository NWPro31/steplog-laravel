<?php

namespace App\Http\Requests\Domain\Order;

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
            'url' => 'required|string',
            'domain_id' => 'required|integer',
            'family_ru' => 'required|string',
            'family_en' => 'required|string',
            'name_ru' => 'required|string',
            'name_en' => 'required|string',
            'otchestvo_ru' => 'required|string',
            'otchestvo_en' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'birthday' => 'required|string',
            'address_city' => 'required|string',
            'address_country' => 'required|string',
            'address_oblast' => 'required|string',
            'address_index' => 'required|string',
            'address_street' => 'required|string',
            'passport_date' => 'required|string',
            'passport_code' => 'required|string',
            'passport_number' => 'required|string',
            'passport_org' => 'required|string',
            'ns' => ''
        ];
    }
}
