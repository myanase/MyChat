<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //コメント取得(非同期通信処理)
    public function getData()
    {
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();
        //コメント件数取得
        $comments = new Comment;
        $comments = Comment::select('comment_id')->where('user_id', $user_id)->where('del_flg', '0')->count();

        //1件以上だった場合、コメントと投稿者名を取得
        if($comments > 0){
            $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')
                ->select('comments.comment_id','users.name', 'comments.comment', 'comments.created_at')
                ->where('comments.user_id', $user_id)
                ->where('comments.del_flg', '0')
                ->orderBy('comment_id', 'desc')
                ->get();
        }
        $json = ["comments" => $comments];
        return response()->json($json);
}

    //コメント登録
    public function store(Request $request){
        // 現在ログインしているユーザーのID取得
        $user_id = Auth::id();

        //入力値を取得・登録
        $comment = new Comment;
        $comment->user_id = $user_id;
        $comment->comment = $request->input('comment');
        $comment->save();
        
        return redirect()->route('talk');
    }

    //コメント編集画面表示
    public function edit($comment_id){
        $comment = new Comment;
        $comment = Comment::select('comment_id','comment','created_at')
                    ->where('comment_id', $comment_id)
                    ->get();

        return view('chat.edit', ['comment' => $comment]);
    }

    //コメント編集処理
    public function update(Request $request,$comment_id){
        $comment = new Comment;
        $comment = Comment::find($comment_id);
        $comment->comment = $request-> input('comment');
        $comment->save();

        return redirect()->route('talk');
    }

    //コメント削除(論理削除)
    public function delate($comment_id){
        $comment = new Comment;
        $comment = Comment::find($comment_id);
        $comment->del_flg = 1;
        $comment->save();
        
        return redirect()->route('talk');
    }
}