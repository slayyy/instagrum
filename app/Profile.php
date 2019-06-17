<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imgPath = ($this->image) ? $this->image : 'profile/TBX3bTR9mjWEOgvpDWGhCLBQSybuoBzrz4vWMs2u.jpeg';
        return '/storage/' . $imgPath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
