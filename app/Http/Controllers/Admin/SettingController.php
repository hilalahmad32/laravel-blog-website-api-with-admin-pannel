<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        try {
            $settings = Setting::findOrFail(1);
            return response()->json([
                'success' => false,
                'settings' => $settings
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'header_logo' => ['required'],
                'footer_logo' => ['required'],
                'footer_desc' => ['required'],
                'email' => ['required', 'email'],
                'phone' => ['required'],
                'address' => ['required'],
                'facebook' => ['required'],
                'instagram' => ['required'],
                'youtube' => ['required'],
                'about_title' => ['required'],
                'about_desc' => ['required'],
            ]
        );

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all(),
            ]);
        } else {
            $result = Setting::findOrFail($id)->update(
                [
                    'header_logo' => $request->header_logo,
                    'footer_logo' => $request->footer_logo,
                    'footer_desc' => $request->footer_desc,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                    'about_title' => $request->about_title,
                    'about_desc' => $request->about_desc,
                ]
            );
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => "Setting Update Successfully",
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Some Problem",
                ]);
            }
        }
    }
}
