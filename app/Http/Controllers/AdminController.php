<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {

        $usersCount      = User::count();
        $postsCount      = Post::count();
        $commentsCount   = Comment::count();
        $categoriesCount = Category::count();
        $mediaCount      = Photo::count();
        $repliesCount    = CommentReply::count();

        return view('admin.index', [
            'usersCount'      => $usersCount,
            'postsCount'      => $postsCount,
            'commentsCount'   => $commentsCount,
            'categoriesCount' => $categoriesCount,
            'mediaCount'      => $mediaCount,
            'repliesCount'    => $repliesCount
        ]);
    }
}
