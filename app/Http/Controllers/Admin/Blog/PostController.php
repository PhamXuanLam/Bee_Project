<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostRequest;
use App\Models\Blog\Categories;
use App\Models\Blog\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::query()->paginate(10);
        $data = [
            'posts' => $posts
        ];
        return view('admin.blog.post.index', $data);
    }

    public function show($id)
    {
        $post = Posts::find($id);
        $data = [
            'post' => $post
        ];
        return view('admin.blog.post.show', $data);
    }

    public function create()
    {
        $categories = Categories::query()->get();
        $categories = $categories->pluck('name', 'id');
        // dd($category);
        return view('admin.blog.post.create', [
            'categories' => $categories
        ]);
    }

    public function store(PostRequest $request)
    {
        $posts = new Posts();
        $parrams = $request->only('name', 'description', 'content', 'category_id', 'status');
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $file->move(public_path(Posts::DIRECTORY_POSTS), $fileName);
        $params['image'] = $fileName;
        // dd(Posts::DIRECTORY_POSTS);
        $posts->fill($parrams);
        $posts->save();
        return redirect('admin/blog/post/')->with('success', 'Thêm mới thành công');
    }

    public function edit($id)
    {
        $post = Posts::find($id);
        $categories = Categories::query()->get();
        $categories = $categories->pluck('name', 'id');
        $data = [
            'categories' => $categories,
            'post' => $post
        ];
        return view('admin.blog.post.edit', $data);
    }

    public function update(PostRequest $request)
    {
        $post = Posts::find($request->get('id'));
        $params = $request->only('name', 'description', 'content', 'category_id', 'status');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path(Posts::DIRECTORY_POSTS), $fileName);
            $params['image'] = $fileName;
        }
        $post->fill($params);
        $post->save();
        return redirect('admin/blog/post/')->with('success', 'Sửa dữ liệu thành công');
    }

    public function destroy(Request $request, $id)
    {
        $post = Posts::find($id);
        if ($post) {
            $post->delete();
            $data = [
                'status' => true,
                'msg' => 'Success',
            ];
        } else {
            $data = [
                'status' => false,
                'msg' => 'Error',
            ];
        }
        return response()->json($data);



        // $post->delete();
        // return redirect('admin/blog/post/')->with('success', 'Xóa thành công');
    }
}
