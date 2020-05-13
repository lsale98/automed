<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Servicer;


class ServicersRegisterController extends Controller
{

    public function showRegister()
    {
        return view('auth.servicerRegister');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'owner_name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email',
            'type_of_servic' => 'reqired',
            'city' => 'required',
            'address' => 'required',
            'number' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'password' => 'required|confirmed|min:6'
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
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // // Create Post
        // $servicer = new Servicer();
        // $servicer->name = $request->input('name');
        // $servicer->owner_name = $request->input('owner_name');
        // $servicer->company_name = $request->input('company_name');
        // $servicer->email = $request->input('email');
        // $servicer->city = $request->input('city');
        // $servicer->address = $request->input('address');
        // $servicer->type_of_service = $request->input('type_of_service');
        // $servicer->number = $request->input('number');
        // $servicer->cover_image = $fileNameToStore;
        // $servicer->password = Hash::make($request->input('password'));
        // $servicer->save();
        // return redirect()->route('login.servicer');


        $servicer = Servicer::create([
            'name' => $request['name'],
            'owner_name' => $request['owner_name'],
            'company_name' => $request['company_name'],
            'email' => $request['email'],
            'city' => $request['city'],
            'address' => $request['address'],
            'type_of_service' => $request['type_of_service'],
            'number' => $request['number'],
            'cover_image' => $fileNameToStore,
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->intended(route('login.servicer'));
    }
}
