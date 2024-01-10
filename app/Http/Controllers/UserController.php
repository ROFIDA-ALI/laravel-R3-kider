<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User:: get(); 
        return view('dashboard.useradmin', compact ('users')); 
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        return view ('dashboard/userDetails',compact('users'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('dashboard/editUser', compact ('users'));     
    }

    /**
     * Update the specified resource in storage.
     */
    
    
        public function update(Request $request, string $id) : RedirectResponse
    {

        // return dd($request);
        
   
    $messages=$this->messages();

    // $category = Category::findOrFail($request->category_id);

    $data =$request->validate ([
    'name'=>'required|string',
    'email' => 'required|string',
    'mobile'=>'required|string',
    ], $messages);
    $request['password'] = Hash::make($request['password']);

   
        
    User::where('id', $id)->update($data);

    return redirect('useradmin');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User :: where('id', $id)->delete();

        return redirect ('useradmin');    }


        public function delete(string $id): RedirectResponse
    {
        
        User :: where('id', $id)->forceDelete();

     return redirect ('trashed');   
     }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();
    return view('dashboard/trashedUsers',compact('users'));
    }

    public function restore(string $id): RedirectResponse
    {
        User :: where('id', $id)->restore();
        return redirect ('useradmin');
    }
    public function messages(){
        return [ 'name.required' => __('messages.Title is required'), 
        'email.required' =>  __('messages.should be text') ,
        'mobile.required' => __('messages.should be 8 numbers'),
        
    ];
    }

}
