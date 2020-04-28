<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateTask extends FormRequest
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
            'title' => 'required|string:255',
            'column_id' => 'required|integer',
            'dashboard_id' => 'required|integer',
            'description' => 'sometimes|string',
            'archived' => 'sometimes|boolean',
            'sort' => 'sometimes|integer',
        ];
    }
}
