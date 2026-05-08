<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $clients = UserDetail::with('user')->get();

        return view('admin.clients', [
            'clients' => $clients,
        ]);
    }

    public function update(Request $request, $id)
    {
        $client = UserDetail::findOrFail($id);
        $client->status = $request->status;
        $client->save();

        return back()->with('success', 'Status uložený');
    }





    public function postshow()
    {
        $posts = Post::all();

        return view('admin.posts', [
            'posts' => $posts,
        ]);
    }

    public function postshowdetail($id)
    {
        $posts = Post::where('id', $id)->firstOrFail();

        //dd($posts);

        return view('admin.post-detail', [
            'posts' => $posts,
        ]);
    }

    public function postupdate(Request $request, $id)
    {
        Post::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'text' => $request->text,
            'user_id' => $request->user()->id,
        ]);

        //dd($posts);

        return back()->with('success', 'Status uložený');

    }

    public function postcreatestore(Request $request)
    {
        Post::create([
            'name' => $request->name,
            'slug'=> Str::slug($request->slug),
            'text' => $request->text,
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('admin.posts');
    }
}
