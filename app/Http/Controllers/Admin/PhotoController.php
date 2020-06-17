<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use App\Category;
use App\PhotoDescription;
use App\Taggable;
use App\Tag;

class PhotoController extends Controller
{
    function index(){
        $photos = Photo::all();
        foreach ($photos as $photo){
            $photo->category;
            $photo->tags;
            $photo->description;
        }
        return view("admin.dashboard",['photos'=>$photos]);

       // echo"<pre>". json_encode($photos, JSON_PRETTY_PRINT)."</pre>";
    }

    function delete($id){
        // DB::table('taggable')->where('photo_id','=',$id)->delete();
        // DB:: table('photos')->where('id','=',$id)->delete();
        Taggable::where('photo_id',$id)->delete();
        PhotoDescription::find($id)->delete();
        Photo::find($id)->delete();

       
        return redirect()->route('admin.photos'); 
    }

    function create(){
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.createphoto',["categories"=>$categories,"tags"=>$tags]);
    }
    function store(Request $request){
    	$title = $request->title;
    	$cate = $request->category;
        $tag_id = $request->tags;
        $file =$request->file('image')->store("public");
        $content=$request->descrition;
        $photo = new Photo;
        $photo->title =$title;
        $photo->category_id =$cate;
        $photo->image =$file;
        $photo->save();

        $idPhoto=$photo->id;


        $descrition = new PhotoDescription;
        $descrition->id =$idPhoto;
        $descrition->content =$content ;
        $descrition->save();

        for($i = 0; $i<count($tag_id);$i++){
            $taggable = new Taggable;
            $taggable->photo_id =$idPhoto;
            $taggable->tag_id = $tag_id[$i];
            $taggable->save();
        }
        return redirect()->route('admin.photos'); 
    }
}
