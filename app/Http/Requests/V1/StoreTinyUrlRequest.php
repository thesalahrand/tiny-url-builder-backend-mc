<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreTinyUrlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_url' => ['required', 'url'],
            'custom_url' => ['nullable', 'min:6', 'max:20', 'alpha_num', 'unique:tiny_urls,tiny_url']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'full_url' => $this->fullUrl,
            'custom_url' => $this->customUrl,
        ]);
    }
}
