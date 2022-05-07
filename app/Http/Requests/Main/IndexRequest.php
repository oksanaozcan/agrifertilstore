<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
          'name' => 'nullable|string',
          'n_from' => 'nullable|numeric',
          'n_to' => 'nullable|numeric',
          'p_from' => 'nullable|numeric',
          'p_to' => 'nullable|numeric',         
          'k_from' => 'nullable|numeric',
          'k_to' => 'nullable|numeric', 
          'price_from' => 'nullable|numeric',      
          'price_to' => 'nullable|numeric',      
          'fertilizer_id' => 'nullable|integer|exists:fertilizers,id', 
          'tags' => 'nullable|array',
          'tags.*' => 'nullable|exists:tags,id',     
          'regions' => 'nullable|array',
          'regions.*' => 'nullable|exists:cultures,region',           
          'purpose' => 'nullable|string',          
          'description' => 'nullable|string',
        ];
    }
}
