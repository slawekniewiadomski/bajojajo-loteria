<?php

namespace App\Http\Requests;

use App\Models\Lottery;
use Illuminate\Foundation\Http\FormRequest;

class CreateParticipantRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $names = implode(',',Lottery::where('id', $this->input('lottery_id'))->first()->participants->pluck('name')->toArray());
        return [
            'name' => "required|string|not_in:$names",
            'price_cap' => "required",
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Imię jest wymagane',
            'name.not_in' => 'Imię jest już zajęte',
            'price_cap.required' => 'Pole jest wymagane',
        ];
    }
}
