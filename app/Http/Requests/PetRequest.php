<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
        $method = request()->method();

        $name = 'required|string|unique:pets,name';
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

        if($method != 'post') {
            $name = 'required|string';
        }

        return [
            'name'      => $name,
            'nickname'  => 'string',
            'weight'    => array('required','regex:'.$regex),
            'height'    => array('required','regex:'.$regex),
            'color'     => 'string',
            'friendliness'  => 'string',
            'birthday'  => 'required|date',
        ];
    }
}
