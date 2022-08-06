<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comments;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MainController extends Controller
{
    public function index(){
        $topics=Articles::all();
        $comments=Comments::all();

        foreach ($topics as $item)
            $data[]=array(
                'id'=>$item->id,
                'slug'=>$item->slug,
                'title'=>$item->title,
                'short_writing'=>$item->short_writing,
                'text'=>Str::words($item->text, 3,'....'),
            );
        if (@$data){
            return view('index', ['topics' => $data,'comments'=>$comments]);
        }{
            echo "Şuan da içerik yok,admin panelinden veri ekleyin";
        }


    }
    public function form_save(Request $request){
        $form_save=new Form();
        $form_save->name=request()->name;
        $form_save->email=request()->email;
        $form_save->message=request()->message;
        if ($form_save->save()){
            return back()->with('success','Mesajınız Başarıyla Gönderildi');
        }{
            return back()->with('error','Mesajınız Gönderilemedi');
          }
    }
    public  function show($id){
        $deneme = Articles::findOrFail($id);
        $topic[] = array(
            'title' => $deneme->title,
            'slug' => $deneme->slug,
            'text' => $deneme->text,
            'short_writing'=>$deneme->short_writing,
        );
        return view('show',compact('topic'));
    }
}
