<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        if ($this->image) {
            return '/storage/' . $this->image;
        }
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function follower() 
    {
        return $this->belongsToMany(User::class);
    }
}
