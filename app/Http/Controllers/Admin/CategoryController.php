<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::all();
      //  echo $categoies;

        //echo"<pre>". json_encode($categoies, JSON_PRETTY_PRINT)."</pre>";
        return view("admin.dashboard",["categories"=>$categories]);
    }
    function create(){
        return view('admin.createCategory');
    }

}
