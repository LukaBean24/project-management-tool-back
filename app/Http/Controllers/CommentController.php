<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
	public function getTaskForComment(Comment $comment)
	{
		return response()->json($comment->task);
	}

	public function getAuthorForComment(Comment $comment)
	{
		return response()->json($comment->author);
	}
}
