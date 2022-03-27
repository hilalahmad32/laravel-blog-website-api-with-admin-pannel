<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getComments()
    {
        try {
            $comments = Comment::orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'contects' => $comments
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'contects' => $e->getMessage(),
            ]);
        }
    }

    public function gettotalComments()
    {
        try {
            $comments = Comment::count();
            return response()->json([
                'success' => true,
                'contects' => $comments
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
        $result = Comment::findOrFail($id)->delete();
        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Comment Delete Successfully'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some Problem'
            ]);
        }
    }
}
