<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the authenticated user's profile.
     */
    public function edit(Request $request)
    {
        return view('profile.edit', ['user' => $request->user()]);
    }

    /**
     * Update the authenticated user's chosen character.
     */
    public function updateAvatar(Request $request)
    {
        $validated = $request->validate([
            'avatar' => ['required', 'string', Rule::in(array_keys(User::AVATARS))],
        ]);

        $request->user()->update($validated);

        return redirect()->route('profile.edit')->with('success', 'Personagem atualizado!');
    }
}
