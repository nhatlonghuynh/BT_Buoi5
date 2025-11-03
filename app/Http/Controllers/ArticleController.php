<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;

class ArticleController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index()
    {
        //
        $articles = Article::all();
        // $articles = [
        //     ['id' => 1, 'title' => 'Giới thiệu Laravel 12', 'body' => 'Nội dung A'],
        //     ['id' => 2, 'title' => 'Blade Components', 'body' => 'Nội dung B'],
        // ];
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        // Xử lý ảnh (nếu có)
        if ($request->hasFile('image')) {
            // Lưu vào disk 'public' (đường dẫn: storage/app/public/articles/...)
            $path = $request->file('image')->store('articles', 'public');
            $data['image_path'] = $path; // lưu đường dẫn tương đối
        }
        Article::create($data);
        return redirect()->route('articles.index')
            ->with('success', 'Tạo bài viết thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        //
        //return 'Xem chi tiet bai viet ID: ' . (int)$id;
        // $article = ['id' => $id, 'title' => 'Tieu de mau', 'body' => 'Noi dung mau'];
        return view('articles.edit', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $article = Article::find($id);
        // $article = ['id' => $id, 'title' => 'Tieu de mau', 'body' => 'Noi dung mau'];
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'min:10'],
        ]);
        return redirect()->route('articles.index')
            ->with('success', "Cập nhật bài viết #$id thành công (demo).");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('articles.index')
            ->with('success', "Đã xoá bài viết #$id (demo).");
    }
}
