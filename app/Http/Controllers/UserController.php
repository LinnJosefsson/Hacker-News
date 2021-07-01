<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Image;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usersprofile.index');
    }

    public function update(Request $request, $id)
    {


        $user = User::findOrFail($id); //find or throw error
        $request->validate([
            'name' => 'required:string',
            'email' => 'required|string',
        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->biography = $request->get('biography');


        //bild vill ej synas eller sparas i storage. detta är bara lite test
        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'mimes:jpeg,png|max:2048'
            ]);

            $imageName = $user->id . '_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $user->image = $imageName;
            //lägg till kod för att ta bort gammal bild vid uppdatering
        }

        $user->save();
        return redirect('users')->with('status', 'Profile updated!'); //denna ska va länkad till informations-sidan sen

    }
}
