<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResponseCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * バリデーションルール
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required|max:30',
            'message' => 'required|max:5000'
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'user_name' => '名前',
            'message' => '内容',
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'user_name.required' => ':attributeを入力してください。',
            'user_name.max' => ':attributeは30文字以下で入力してください。',
            'message.required' => ':attributeを入力してください。',
            'message.max' => ':attributeは5000文字以下で入力してください。',
        ];
    }
}
