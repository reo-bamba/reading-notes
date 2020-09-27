<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function notes()
    {
        return $this->hasMany('App\Note');
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['notes', 'followings', 'followers', 'likes']);
    }
    //reration to user model , followed member
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    //relation to user model , follower
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
        
        if($exist || $its_me)
        {
            return false;
        }
        else
        {
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        $exist = $this->is_following($userId);
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me)
        {
            $this->followings()->detach($userId);
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    //likes
    public function likes()
    {
        return $this->belongsToMany(Note::class, 'likes', 'user_id', 'note_id');
    }
    
    public function like($noteId){
        $exist = $this->is_like($noteId);
        
        if($exist){
            return false;
        }
        else{
            $this->likes()->attach($noteId);
            return true;
        }
    }
    
    public function unlike($noteId){
        $exist = $this->is_like($noteId);
        
        if($exist){
            $this->likes()->detach($noteId);
            return true;
        }
        else{
            return false;
        }
    }
    
    public function is_like($noteId){
        return $this->likes()->where('note_id', $noteId)->exists();
    }
    
}