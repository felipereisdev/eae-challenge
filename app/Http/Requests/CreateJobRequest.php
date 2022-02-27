<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateJobRequest extends FormRequest
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
            'title' => 'required|string|max:90',
            'contract' => Rule::in(Job::JOB_CONTRACTS),
            'location' => 'required|string|max:255',
            'created_at' => 'required|string|max:255',
            'role_id' => 'required|integer',
            'level_id' => 'required|integer',
            'company_id' => 'required|integer',
            'new' => 'boolean',
            'featured' => 'boolean',
        ];
    }
}
