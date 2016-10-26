<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsUpdateRequest extends FormRequest
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
     * Get the vation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'required',
            'title' => 'required|max:10',
            'body' => 'required',
        ];
    }

    public function response(array $errors)
    {
//        dd($errors);
        $msg = '';
        foreach($errors as $key => $value){
            foreach($value as $key1 => $value1){
//                dd($value1);
                $msg = $msg.$value1;
            }
        }

        return  response()->json(['code' => 400, 'msg' => $msg]);
    }
    
}
