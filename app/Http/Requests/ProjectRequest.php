<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
      'name' => 'required|min:3|max:100',
      'start_date' => 'required|date',
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'The name is a required field',
      'name.min' => 'The name must have at least :min characters',
      'name.max' => 'The name can\'t have more than :max characters',

      'start_date.required' => 'The start date is a required field',
      'start_date.date' => 'The date must be a valid date',
    ];
  }
}
