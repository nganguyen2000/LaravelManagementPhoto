<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function photos(){
        return $this->hashMany("App\Photo","category_id","id");
    }
}
