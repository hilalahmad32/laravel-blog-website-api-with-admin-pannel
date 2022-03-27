<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class GetPostController extends Controller
{
    // all posts
    public function index()
    {
        try {
            $posts = Post::with('categorys')->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    // most viewed posts

    public function viewPosts()
    {
        try {
            $posts = Post::with('categorys')->where('views', '>', 0)->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function getPostById($id)
    {
        try {
            $posts = Post::with('categorys')->findOrFail($id);
            $posts->views = $posts->views + 1;
            $posts->save();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function getPostByCategory($id)
    {
        try {
            $posts = Post::with('categorys')->where('id', $id)->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function searchPost($search)
    {
        try {
            $posts = Post::with('categorys')->where('title', 'LIKE', '%' . $search . '%')->orderBy('id', 'desc')->get();
            return response()->json([
                'success' => true,
                'posts' => $posts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
