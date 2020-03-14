<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ThreadController extends BaseController
{
    /**
     * スレッドの一覧取得
     * @todo 後でページングできるようにしたい
     * @return Factory|View
     */
    public function index()
    {
        $threads = Thread::orderBy('updated_at', 'desc')->get();
        return view('threads', compact($threads));
    }

    /**
     * スレッドIDから投稿一覧を表示
     * @param int $id
     * @return Factory|View
     */
    public function show(int $id)
    {
        $thread = Thread::findOrFail($id);
        return view('posts', compact('thread'));
    }

    /**
     * 新規スレ作成
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $rule = [
            'title' => ['required', 'string'], // スレ名
        ];
        $this->validate($request, $rule);

        $data = $request->all();
        Thread::create($data);

        return redirect()->to('/threads/');
    }
}
