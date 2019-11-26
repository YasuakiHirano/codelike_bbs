<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoardCreateRequest extends FormRequest
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
            'board_title' => 'required|max:30',
            'user_name' => 'required|max:30',
            'about_text' => 'required',
            'password' => 'required'
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'board_title' => 'タイトル',
            'user_name' => '名前',
            'about_text' => '説明文',
            'password' => 'パスワード'
        ];
    }

    /**
     * バリデーションメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'board_title.required' => ':attributeを入力してください。',
            'board_title.max' => ':attributeは30文字以下で入力してください。',
            'user_name.required' => ':attributeを入力してください。',
            'user_name.max' => ':attributeは30文字以下で入力してください。',
            'about_text.required' => ':attributeを入力してください。',
            'password.required' => ':attributeを入力してください。'
        ];
    }
}
