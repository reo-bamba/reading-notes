<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NotesController extends Controller
{
    public function index()
    {
        $data = [];
        //$user = \Auth::user();
        //$notes = $user->notes()->orderBy('created_at', 'desc')->paginate(5);
        $notes = Note::paginate(5);
        $data = [
           //'user' => $user,
           'notes' => $notes,
            ];
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'book_image' => 'file|mimes:jpeg,png,jpg,bmb|max:2048',
            'title' => 'required|max:255',
            'summary' => 'required|max:255',
            'thoughts' => 'required|max:255',
            'rate' => 'required|max:100',
            ]);
            
        //if($file = $request->book_image){
            //保存ファイルに名前をつける
            //$fileName = time().'.'.$file->getClientOriginalExtension();
            //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
            //$target_path = public_path('/uproads/');
            //$file->move($target_path, $fileName);
        //}else{
            //画像が登録されなかった時はから文字をいれる
            //$name = "";
        //}
        //S3に保存
        $note = new Note;
        $image = $request->file('book_image');
        
        $path = Storage::disk('s3')->putFile('books', $image, 'public');
        
        $note->book_image = Storage::disk('s3')->url($path);
        
        $request->user()->notes()->create([
            'book_image' => $note->book_image,
            'title' => $request->title,
            'summary' => $request->summary,
            'thoughts' => $request->thoughts,
            'rate' => $request->rate,
            ]);
            
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $note = \App\Note::findOrFail($id);
        
        if(\Auth::id() === $note->user_id)
        {
            $note->delete();
        }
        return back();
    }
    
    public function create()
    {
        $note = new Note;
        return view('notes.form', [
            'note' => $note,
            ]);
    }
    
    public function show($id)
    {
        $note = Note::findOrFail($id);
        //$user = User::findOrFail($id);
        
        return view('notes.contents',[
            'note' => $note,
            //'user' => $user,
            ]);
    }
    
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit', [
            'note' => $note,
            ]);
    }
    
    public function update(Request $request, $id)
    {
        //if($file = $request->book_image){
            //保存ファイルに名前をつける
            //$fileName = time().'.'.$file->getClientOriginalExtension();
            //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
            //$target_path = public_path('/uproads/');
            //$file->move($target_path, $fileName);
        //}else{
            //画像が登録されなかった時はから文字をいれる
            //$name = "";}
            //s3に保存
            $note = Note::findOrFail($id);
            //$note = new Note;
            $image = $request->file('book_image');
            
            $path = Storage::disk('s3')->putFile('UDbooks', $image, 'public');
            
            //$note->book_image = Storage::disk('s3')->url('$path');
        
        //$note = Note::findOrFail($id);
        $note->book_image = Storage::disk('s3')->url($path);
        $note->title = $request->title;
        $note->rate = $request->rate;
        $note->summary = $request->summary;
        $note->thoughts = $request->thoughts;
        $note->save();
        
        return redirect('/');
    }
}
