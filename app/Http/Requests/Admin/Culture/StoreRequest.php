<?php

namespace App\Http\Requests\Admin\Culture;

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
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|string',
          'nitrogen' => 'required|numeric',
          'phosphorus' => 'required|numeric',
          'potassium' => 'required|numeric',
          'fertilizer_id' => 'required|integer|exists:fertilizers,id',         
          'region' => 'required|string',
          'price' => 'required|numeric',
          'description' => 'required|string',
          'purpose' => 'required|string',
          'tags' => 'nullable|array',
          'tags.*' => 'nullable|integer|exists:tags,id',
        ];
    }
}
