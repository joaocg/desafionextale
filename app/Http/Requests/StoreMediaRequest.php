<?php

namespace App\Http\Requests;

use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public $validator = null;

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
            'media' => 'file|max:5120|mimes:png,jpg,mp3,mp4',
            'user_id' => 'required|exists:App\Models\User,id',
            'story_id' => 'required|exists:App\Models\Story,id',
        ];
    }

        
    protected function failedValidation(Validator $validator) {
        $this->validator = $validator;
    }
}