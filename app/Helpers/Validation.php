<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class Validation
{
    public static function set(Object $request, Array $filter, Array $message = [])
    {
        $customMessage = !empty($message) ? $message : ['required' => ':attribute field is required'];
        $validator = Validator::make($request->all(), $filter, $customMessage);

        if ($validator->fails()) throw new \Exception($validator->errors()->first());
        
        return $validator;
    }
}
