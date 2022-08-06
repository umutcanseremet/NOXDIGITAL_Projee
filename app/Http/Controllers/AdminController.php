<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comments;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function admin_index()
    {
        $articles = Articles::all();
        return view('admin.index', compact('articles'));

    }
    public function articles()
    {
        return view('admin.articles');
    }
    public function articles_save(Request $request)
    {
        $save=new Articles();
        $save->title=request()->title;
        $save->text=request()->text;
        $save->short_writing=request()->short_writing;
        $save->slug=request()->slug;
        $save->slug = Str::slug($request->title, '-');
        if ($save->save()){
            return back()->with('success','Yazı Başarıyla Eklendi');
        }{
        return back()->with('error','Yazı Eklenemedi');
    }
    }
    public function edit(Articles $data)
    {
        $cat = Articles::all();
        return view('admin.edit', compact(['data','cat']));
    }
    public function update(Request $data){
        $update=Articles::find(request()->id);
        $update->title=request()->title;
        $update->text=request()->text;
        $update->short_writing=request()->short_writing;
        if ($update->save()){
            return back()->with('success','Yazı Başarıyla Güncellendi');
        }{
            return back()->with('error','Yazı Güncellenemedi');
        }


    }
    public function destroy(Articles $id)
    {
        $id->delete();
        return back()->with('success', 'Yazı Başarıyla Silindi 🙂');
    }
    public function admin_comments()
    {
        return view('admin.comments');
    }
    public function admin_comments_save_form(Request $req)
    {

        $comments = new Comments();
        $comments->name = $req->name;
        $comments->comments = $req->comments;
        $comments->title = $req->title;

        $imageName = time().'.'.$req->image->extension();
        $comments->image = $req->image->move('images', $imageName);

        if ($comments->save()) {

            return back()->with('success', 'Yazı Başarıyla Eklendi 🙂');

        }

        return back()->withErrors('fail', 'Kayıt Olmadı');

    }
    public function form_message(){
        $form=Form::all();
        return view('admin.form_message',compact('form'));
    }
    public function form_destroy(Form $id)
    {
        $id->delete();
        return back()->with('success', 'Yazı Başarıyla Silindi 🙂');
    }

    public function editt_form(Form $id)
    {
        $veri = Form::find($id->id);
        return view('admin.editt', compact('veri'));

    }
    public function update_form(Request $data){
        $update=Form::find(request()->id);
        $update->name=request()->name;
        $update->message=request()->message;
        $update->email=request()->email;
        if ($update->save()){
            return back()->with('success','Form Başarıyla Güncellendi');
        }{
            return back()->with('error','Form Güncellenemedi');
        }


    }
}
