<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact as ModelsContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Contact extends Controller
{
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'subject' => ['required'],
            'message' => ['required']
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => true,
                'message' => $validation->errors()->all(),
            ]);
        } else {
            $result = ModelsContact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contact Sucessfully Admin will responsne you via email'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some Problem'
                ]);
            }
        }
    }
}
