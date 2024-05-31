<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\Shortlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShortlinkController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $shortlinks = Shortlink::where('id_user', Auth::id())->get();
        return view('dashboard', compact('shortlinks'));
    }

    public function create()
    {
        return view('shortlinks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'real_url' => 'required|url',
        ]);

        Shortlink::create([
            'real_url' => $request->real_url,
            'short_url' => Str::random(6),
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('dashboard');
    }

    public function show(Shortlink $shortlink)
    {
        if ($shortlink->id_user !== Auth::id()) {
            abort(403);
        }

        $shortlink->load('clicks');

        return view('shortlinks.show', compact('shortlink'));
    }

    public function edit(Shortlink $shortlink)
    {
        if ($shortlink->id_user !== Auth::id()) {
            abort(403);
        }

        $shortlink->update([
            'updated_at' => $shortlink->updated_at
        ]);

        return view('shortlinks.edit', compact('shortlink'));
    }

    public function update(Request $request, Shortlink $shortlink)
    {
        if ($shortlink->id_user !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'real_url' => 'required|url',
        ]);

        $shortlink->update([
            'real_url' => $request->real_url,
        ]);

        return redirect()->route('shortlinks.show', $shortlink);
    }

    public function destroy(Shortlink $shortlink)
    {
        if ($shortlink->id_user !== Auth::id()) {
            abort(403);
        }

        $shortlink->delete();

        return redirect()->route('dashboard');
    }

    public function redirect($short_url)
    {
        $shortlink = Shortlink::where('short_url', $short_url)->first();

        if ($shortlink) {
            Click::create([
                'ip' => request()->ip(),
                'device_info' => request()->userAgent(),
                'click_time' => now(),
                'id_shortlink' => $shortlink->id,
            ]);
            return redirect($shortlink->real_url);
        } else {
            return abort(404);
        }
    }
}
