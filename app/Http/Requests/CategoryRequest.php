<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        //接受路由参数
//      dd($this->route('category'));//如果没有参数则为null
        $id = $this->route('category') ? $this->route('category')->id : null;
        return [
            'title'=>'required|unique:categories,title,' . $id,
            'icon'=>'required'
        ];
    }


    public function messages()
    {
        return [
            'title.required'=>'请输入栏目名称',
            'title.unique'=>'栏目已存在',
            'icon.required'=>'请选择栏目图标'
        ];
    }
}
