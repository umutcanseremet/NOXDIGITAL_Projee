<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Comments;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function adminIndex()
    {
        $articles = Articles::all();
        return view('admin.index', compact('articles'));

    }
    public function articles()
    {
        return view('admin.articles');
    }
    public function createArticle(Request $request)
    {
       $result = Articles::create([
                'title' => $request->title,
                'text' => $request->text,
                'short_writing' => $request->short_writing,
                'slug' => Str::slug($request->title,'-'),
            ]);


        if ($result){
            return back()->with('success','Yazı Başarıyla Eklendi');
        }

        return back()->with('error','Yazı Eklenemedi');
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

        $message='Yazı Başarıyla Güncellendi';
        $status='success';

        if (!$update->save()){
            $message='Yazı Güncellenemedi';
            $status='error';
        }
            return back()->with($status,$message);
        }
    public function destroy(Articles $id)
    {
        $id->delete();
        return back()->with('success', 'Yazı Başarıyla Silindi 🙂');
    }
    public function adminComments()
    {
        return view('admin.comments');
    }
    public function adminCommentsSaveForm(Request $req)
    {

        $comments = new Comments();
        $comments->name = $req->name;
        $comments->comments = $req->comments;
        $comments->email = $req->email;

        $imageName = time().'.'.$req->image->extension();
        $comments->image = $req->image->move('images', $imageName);

        if ($comments->save()) {

            return back()->with('success', 'Yazı Başarıyla Eklendi 🙂');

        }

        return back()->withErrors('fail', 'Kayıt Olmadı');

    }
    public function formMessage(){
        $form=Form::all();
        return view('admin.form_message',compact('form'));
    }
    public function formDestroy(Form $id)
    {
        $id->delete();
        return back()->with('success', 'Yazı Başarıyla Silindi 🙂');
    }

    public function editForm(Form $id)
    {
        $veri = Form::find($id->id);
        return view('admin.editt', compact('veri'));

    }
    public function updateForm(Request $data){
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
    public function commentData(){
        $comment=Comments::all();
        foreach ($comment as $list) {
            $data[] = array(
                'id' => $list->id,
                'name' => $list->name,
                'comments' => $list->comments,
                'title' => $list->title,
                'image' => asset($list->image),
            );
        }
        return view('admin.comment',['data'=>$data]);
    }
    public function deleteComment(Comments $id)
    {
        $id->delete();
        return back()->with('success', 'Yazı Başarıyla Silindi 🙂');
    }
    public function editComment(Comments $data)
    {
        $commentData = Form::find($data->id);
        return view('admin.edit/message', compact(['data','commentData']));
    }
    public function updateFormEdit(Request $request, $id)
    {

        $post = Comments::findOrFail($id);

        $post->name = $request->name;
        $post->email = $request->email;
        $post->comments = $request->comments;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $post->image = $request->image->move('images', $imageName);
        }

        $post->save();

        return back()->with('success', 'Güncellendi 🙂');
    }
}
//q
