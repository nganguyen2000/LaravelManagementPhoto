<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // public function description(){
    //     return $this->hashOne
    // }
    public function category(){
        return $this->belongsTo("App\Category","category_id","id");
    }
    public function tags(){
        return $this->belongsToMany("App\Tag","taggables","photo_id","tag_id");
    }

    public function photos(){
        return $this->hashMany("App\Photo","category_id","id");
    }

    public function description(){
        return $this->hasOne("App\PhotoDescription","id");
    }

}
