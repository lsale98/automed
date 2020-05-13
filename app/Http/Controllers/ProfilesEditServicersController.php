<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicer;
use Illuminate\Support\Facades\Hash;

class ProfilesEditServicersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:servicer');
    }

    public function editServicer($id)
    {
        $servicer = Servicer::find($id);
        return view('profiles.servicerEdit')->with('servicer', $servicer);
    }

    public function updateServicer(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'owner_name' => 'required',
            'company_name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle file upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $xtension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $xtension;
            // Upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        $servicer = Servicer::find($id);

        $servicer->name = $request->input('name');
        $servicer->owner_name = $request->input('owner_name');
        $servicer->company_name = $request->input('company_name');
        $servicer->city = $request->input('city');
        $servicer->address = $request->input('address');
        $servicer->number = $request->input('number');
        $servicer->type_of_service = $request->input('type_of_service');
        if ($request->hasFile('cover_image')) {
            Storage::delete('public/cover_images/' . $servicer->cover_image);
            $servicer->cover_image = $fileNameToStore;
        }
        if ($request->input('password') != "" && $request->input('newPassword') != "") {
            if (Hash::check($request->input('password'), $servicer->password)) {
                $servicer->password = Hash::make($request->input('newPassword'));
            } else {
                return redirect('dashboard/' . $id . '/edit')->with('error', 'Your current password does not match');
            }
        }
        $servicer->save();
        return redirect('dashboard/' . $id . '/edit')->with('success', 'You successfully edit profile');
    }
}
