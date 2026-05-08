<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;

class UserDetailController extends Controller
{
    public function edit(Request $request)
    {
        $detail = $request->user()->detail;

        return view('admin.user-details', [
            'detail' => $detail,
        ]);
    }

    public function update(Request $request)
    {

        $validated = $request->validate([
            'times' => ['required', 'string'],
            'job_name' => ['required', 'string'],
            'city' => ['nullable', 'string'],
            'street' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'service_tag' => ['nullable', 'string'],
        ]);

        $request->user()->detail()->updateOrCreate(
            ['user_id' => $request->user()->id],
            $validated
        );

        return redirect()->back()->with('success', 'Uložené');
    }
}
