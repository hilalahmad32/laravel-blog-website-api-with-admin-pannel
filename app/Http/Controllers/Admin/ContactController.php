<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContects()
    {
        try {
            $contacts = Contact::orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'contects' => $contacts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'contects' => $e->getMessage(),
            ]);
        }
    }
    public function getTotalContects()
    {
        try {
            $contacts = Contact::count();
            return response()->json([
                'success' => true,
                'contects' => $contacts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'contects' => $e->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        $result = Contact::findOrFail($id)->delete();
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Contact Delete Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some Problem'
            ]);
        }
    }
}
