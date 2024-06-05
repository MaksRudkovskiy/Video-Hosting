<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Auth;

class VideoController extends Controller
{
    public function likes(Video $video)
{
    // Увеличиваем количество лайков на 1
    $video->increment('likes');

    return back();
}

public function dislikes(Video $video)
{
    // Увеличиваем количество дизлайков на 1
    $video->increment('dislikes');

    return back();
}
    public function showVideos()
    {
        $videos = Video::latest()->get();
        return view('videos.admin.indexadmin', compact('videos'));
    }
    public function index()
    {
        $videos = Video::where('restriction', 'none')->latest()->take(10)->get();
        return view('videos.index', compact('videos'));
    }

    public function show(Video $video)
    {
        if ($video->restriction == 'ban' || 
            ($video->restriction == 'violation' && !Auth::user()->isAdmin()) ||
            ($video->restriction == 'shadow_ban' && !Auth::check())
        ) {
            abort(404);
        }

        return view('videos.show', compact('video'));
    }
    public function create()
    {
        return view('videos.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
            'video' => 'required|mimes:mp4|max:102400',
        ]);

        $name = time(). "." . $request->video->extension();
        $destination = 'public/';
        $path = $request->video->storeAs($destination, $name);

        Video::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'video_path' => 'storage/' . $name,
            'likes' => 0,
            'dislikes' => 0,
        ]);

        return redirect()->route('home');
    }


    public function adminIndex()
    {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function updateRestriction(Request $request, Video $video)
    {
        $request->validate([
            'restriction' => 'required|in:none,violation,shadow_ban,ban',
        ]);

        $video->update(['restriction' => $request->restriction]);

        return redirect()->route('admin.videos.index');
    }
}
