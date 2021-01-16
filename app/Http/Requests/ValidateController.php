<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateController extends FormRequest
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
        return   [
                    'name'        => 'required|string|max: 30',
                    'comment'     => 'required|max: 256',
               ];
    }

    /**
   * エラーメッセージのカスタマイズ
   * @return array
   */
   public function messages()
   {
       return [
           'name.string' => '名前は文字列で入力してください',
           'name.max' => '名前は30文字以内で入力してください',
           'comment.max' => '名前は256文字以内で入力してください',
       ];
   }
}
