<?php

namespace App\Http\Requests\CPanel\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;

class UpdatePermissionRequest extends FormRequest
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
            //
            'name' => 'required|string|min:3|max:50|unique:permissions,name,' . Crypt::decrypt($this->id),
            'for_guard' => 'required|string|in:admin',
            'active' => 'required|boolean',
        ];
    }

    /**
     * Prepare inputs for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'active' => $this->toBoolean($this->active),
        ]);
    }

    /**
     * Convert to boolean
     *
     * @param $booleable
     * @return boolean
     */
    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }

    public function  attributes()
    {
        return [
            'name' => 'Permission name',
            'for_guard' => 'Guard name',
            'active' => 'Permission status',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'لا يمكنـــك ترك حقل الاسم فارغاً',
            'name.min' => 'يجب أن يحتوي الاسم على 3 حروف على الأقل',
            'name.max' => 'يجب أن يحتوي الاسم على 50 حروف على الأكثر',
            'name.unique' => 'قمت بإنشاء الصلاحية من قبل',

            'for_guard.required' => 'المستخدم المختار غير صالح',
            'for_guard.in' => 'المستخدم المختار غير صالح',
        ];
    }
}
