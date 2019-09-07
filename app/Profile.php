<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        //default image for user
        $imagePath = ($this->image) ? $this->image : '/profile/7TbO5cF8Eo6Mkklnr1MYU7gxqfk5HCw09WyJLaYW.jpeg';
        return $imagePath;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
