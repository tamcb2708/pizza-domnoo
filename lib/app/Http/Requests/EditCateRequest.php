<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'unique:pz-cate,ca_name,'.$this->segment(4).',ca_id'
            //
        ];
    }
    public function messages(){
        return [
            'name.unique'=>'Tên danh mục đã bị trùng'

        ];
    }
}
