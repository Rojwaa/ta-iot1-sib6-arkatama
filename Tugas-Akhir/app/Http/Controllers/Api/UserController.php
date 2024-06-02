<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        return response()->json([
                'message' => 'Berhasil Menampilkan Data User',
                'data'    =>  $users
            ], 200);
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      =>[
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'email'     =>[
                'required',
                'email',
                'unique:users,email'
            ],
            'password'  =>[
                'required',
                'min:8'
            ],
            'password_confirmation' =>[
                'required',
                'same:password'
            ],
            'avatar'    =>[
                'nullable',
                'image',
                'mimes:jpg, jpeg, png',
                'max:2048'
            ]
            ]);

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarPath = $avatar->store('avatar', 'public');

                $validated['avatar'] = $avatarPath;
            }

            $user = User::create($validated);

            return response()->json([
                    'message' => 'Berhasil Menambahkan Data User',
                    'data'    =>  $user
                ], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'message' => 'Berhasil Menampilkan Detail User',
            'data'    => $user
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'name'     =>[
            'required',
            'string',
            'min:3',
            'max:255'
        ],
        'email'     =>[
            'required',
            'email',
            'unique:users,email'
        ],
        'password'  =>[
            'required',
            'min:8'
        ],
        'password_confirmation' =>[
            'required',
            'same:password'
        ],
        'avatar'    =>[
            'nullable',
            'image',
            'mimes:jpg, jpeg, png',
            'max:2048'
        ]
    ]);

    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatarPath = $avatar->store('avatar', 'public');

        $validated['avatar'] = $avatarPath;
    }
        $user = User::find($id);
        $user->update($validated);

        return response()->json([
            'message' => 'Berhasil Mengupdate Data',
            'data'    => $user
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'message' => 'Berhasil Menhapus Data',
            'data'    => $user
        ],200);
    }
}
