<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('personal.comment.index');
    }
}
