<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
     public function updateProfile(Request $request, int $id)
    {
        $request->validate([
           'name' => 'required',
        
               'profile_pic'  => 'required',
               
        ]);
        
        $user = \App\Models\User::where('id', $id)->first();
        $user->name = $request->name;  
        $user->profile_pic = $request->profile_pic;
        $user->save(); 
       
  
        
  
         return redirect()->route('profile')
                        ->with('success','Profile updated successfully.');
    

    
}

     public function updatepass(Request $request, int $id)
    {
        $request->validate([
           'old' => 'required',
            'confirm' => 'required',
               'new'  => 'required',
               
        ]);
        
         $user = \App\Models\User::where('id', $id)->first();
         
         
         
          if (\Illuminate\Support\Facades\Hash::check($request->old, $user->password) ) { 
         
        if ($request->new == $request->confirm) { 
   $user->fill([
    'password' => \Illuminate\Support\Facades\Hash::make($request->new)
    ])->save();

   $request->session()->flash('success', 'Password changed');
    return redirect()->route('profile');

} else {
    $request->session()->flash('error', 'New and Confirm Passwords does not match');
    return redirect()->route('profile');
}

          }
          else{
               $request->session()->flash('error', 'Old Password does not match ');
    return redirect()->route('profile');
              
          }
  
         return redirect()->route('profile')
                        ->with('success','Profile updated successfully.');
    

    
}

}
