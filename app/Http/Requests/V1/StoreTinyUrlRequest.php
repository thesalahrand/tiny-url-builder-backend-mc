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
            'full_url' => ['required', 'string', 'max:65535', 'url'],
            'custom_url' => ['nullable', 'string', 'min:6', 'max:48', 'regex:/^(?!-)(?!.*--)[a-zA-Z0-9-]+(?<!-)$/', 'unique:tiny_urls,tiny_url']
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
