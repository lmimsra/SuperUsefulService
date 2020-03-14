<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends BaseController
{
    /**
     * 投稿追加
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rule = [
            'thread_id' => ['required'], // スレッドID
            'content' => ['required', 'string'], // 投稿内容
        ];
        $this->validate($request, $rule);


        $data = $request->all();
        if(empty($data['name'])){
            $data['name'] = '名無し';
        }

        Post::create($data);

        return redirect()->to('/threads/' . $data['thread_id']);
    }
}
