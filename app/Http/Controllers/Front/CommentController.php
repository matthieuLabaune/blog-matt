<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\Front\CommentRequest;


class CommentController extends Controller
{
    public function __construct()
    {
        if(!request()->ajax()) {
            abort(403);
        }
    }

    /**
     * @param CommentRequest $request
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CommentRequest $request, Post $post)
    {
        $data = [
            'body' => $request->message,
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ];
        $request->has('commentId') ?
            Comment::findOrFail($request->commentId)->children()->create($data):
            Comment::create($data);
        $commenter = $request->user();
        return response()->json($commenter->valid ? 'ok' : 'invalid');
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json();
    }

    /**
     * @param Post $post
     * @return array
     */
    public function comments(Post $post)
    {
        $comments = $post->validComments()
            ->withDepth()
            ->latest()
            ->get()
            ->toTree();
        return [
            'html' => view('front/comments', compact('comments'))->render(),
        ];
    }
}
