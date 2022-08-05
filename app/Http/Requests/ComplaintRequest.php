<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintRequest extends FormRequest
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
            'anonymous'=>['boolean'],
            'firstname'=>['string'],
            'middlename'=>['string'],
            'lastname' =>['string'],
            'email'=>['email'],
            'phone'=>['phone'],
            'complainanttype'=>['string'],
            'allegetype'=>['string'],
            'reported'=> ['boolean'],
            'description'=>['string'],
            'detail'=>['string'],
            'threat'=>['boolean'],
            'evidence'=>['boolean'],
            'datefrom' => ['date'],
            'dateto' =>['date'], 
            'wid'=>['string'],
            'nid'=>['string'],
            'nopossession'=> ['boolean']
            ];
    }
}
