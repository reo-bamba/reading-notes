<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
            ]);
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $notes = $user->notes()->orderBy('created_at', 'desc')->paginate(16);
        return view('users.show', [
            'user' => $user,
            'notes' => $notes,
            ]);
    }
    public function followings($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        
        $followings = $user->followings()->get();
        
        return view('user_follow.followings', [
            'user' => $user,
            'followings' => $followings,
            ]);
    }
    public function followers($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        
        $followers = $user->followers()->get();//paginate(10);

        return view('user_follow.followers', [
            'user' => $user,
            'followers' => $followers,
            ]);
    }
    
    public function likes($id)
    {
        $user = User::findOrFail($id);
        $user->loadRelationshipCounts();
        $likes = $user->likes()->orderBy('created_at', 'desc')->paginate(16);
        
        return view('users.likes', [
            'user' => $user,
            'likes' => $likes,
            ]);
    }
}
