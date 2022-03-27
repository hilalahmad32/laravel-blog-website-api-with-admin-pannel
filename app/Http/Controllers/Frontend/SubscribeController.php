<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {

        try {
            $validation = Validator::make($request->all(), [
                'email' => ['required', 'email'],
            ]);
            if ($validation->fails()) {
                return response()->json(['success' => false, 'message' => $validation->errors()->all()]);
            } else {
                $subscribe = Subscribe::create([
                    'email' => $request->email,
                ]);
                if ($subscribe) {
                    return response()->json(['success' => true, 'message' => 'Subscibe successfully']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Some problem']);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
