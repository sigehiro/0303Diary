<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Http\Requests\CreateDiary;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class DiaryController extends Controller
{
    //追加
    public function index()
    {
        $diaries = Diary::all();
        // dd($diaries);//DBに入っている情報を確認
        //index.blade.phpを表示
        // $diaries = Diary::orderBy('id','desc')->get();降順機能
        return view ('diaries.index',['diaries' =>$diaries]);

    }

    public function create()
    {
        return view ('diaries.create');
    }

    public function store(CreateDiary $request)
    {
        // dd('ここに保存処理');
        $diary = new Diary();//インスタンス化
        $diary->title =$request->title;//画面で入力されたタイトルを代入
        $diary->body =$request->body;//上記の本文を代入
        $diary->user_id =Auth::user()->id;//ログインしているユーザーのidを保存
        $diary->save();//DBに保存

        return redirect()->route('diary.index');//一覧ページにリダイレクト

    }

    public function destroy(int $id)
    {
        $diary = Diary ::find($id);
        $diary->delete();

        return redirect()->route('diary.index');

    }

    public function edit (int $id)
    {
        // dd($id);
        //Diaryモデルをしようしてdiariesテーブルから$idと一致するidをもつデータを取得
        $diary = Diary::find($id);
        return view('diaries.edit',['diary' => $diary,]);

    }
    public function update(int $id,CreateDiary $request)
    {
        $diary =Diary::find($id);

        $diary ->title = $request->title;//画面で入力されたタイトル
        $diary->body = $request->body;//画面で入力された本文を代入
        $diary->save(); //DBに保存

        return redirect()->route('diary.index');//一覧ページにリダイレクト

    }
}
