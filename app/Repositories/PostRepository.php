<?php

namespace App\Repositories;

use App\Interfaces\PostInterface;
use App\Mail\PostStatusChanged;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class PostRepository implements PostInterface
{

    public function addPosts()
    {
        return view('blog.post.add-post');
    }

    public function savePost($request)
    {
        DB::beginTransaction();

        try {
            $post = Post::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'description' => $request->description,
            ]);

            foreach ($request->tag as $tag) {
                DB::table('post_tags')->insert([
                    'post_id' => $post->id,
                    'tag_id' => $tag,
                ]);
            }

            DB::commit();

            return response()->json(['msg' => 'Post Added Successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'msg' => 'Failed to create post.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function managePost($request)
    {
        if ($request->ajax()) {
            $data = Post::select([
                'posts.id',
                'posts.title',
                'posts.status',
                'users.name as author_name'
            ])
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->orderBy('posts.id', 'desc');

            return DataTables::of($data)
                ->addColumn('actions', function ($row) {
                    return '
                        <button class="btn btn-sm btn-primary view-post" title="View" data-id="' . $row->id . '">
                            <i class="fas fa-eye"></i>
                        </button>
                        <input type="hidden" class="post-status" value="' . $row->status . '" />
                        <button class="btn btn-sm btn-secondary status-post" title="Status" data-id="' . $row->id . '">
                           <i class="fas fa-sync-alt"></i>
                        </button>
                        <button class="btn btn-sm btn-warning edit-post" title="Edit" data-id="' . $row->id . '">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-post" title="Delete" data-id="' . $row->id . '">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('blog.post.manage-post');
    }

    public function changeStatus($request)
    {
        $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'status' => ['required', 'in:pending,approved,rejected']
        ]);

        // $statusChange = Post::where(['id' => $request->post_id])
        //     ->update(['status' => $request->status]);

        $post = Post::with('user')->findOrFail($request->post_id);
        $post->status = $request->status;

        if ($post->save()) {
            Mail::to($post->user->email)
                ->queue(new PostStatusChanged($post, $request->status));

            return response()->json(['msg' => 'Post status changed successfully.']);
        }

        return response()->json(['msg' => 'Failed to update post status.'], 500);
    }
}
