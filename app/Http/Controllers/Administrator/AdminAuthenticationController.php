<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProviderAdm;
use App\Http\Requests\Auth\LoginAdmRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Models\User;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;

class AdminAuthenticationController extends Controller
{
    //

    // public function create(): View
    // {
    //     return view('adm.auth.login');
    // }

    public function getLogin(): View{
        return view('adm.auth.login');
    }
 
    /**
     * Handle an incoming authentication request.
    */
    

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if(auth()->guard('admin')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('admin')->user();
            // if($user->is_admin == 1){
                return redirect('/admin/panel');
            // }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function adminLogout(Request $request)
    {
        // dd(1);
        auth()->guard('admin')->logout();
        $request->session()->invalidate();
        // Session::flush();
        // Session::put('success', 'You are logout sucessfully');

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
         
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            // 'name' => 'required',
            'email' => 'required',
        ]);


        $salvar = Admins::where('id',Auth::guard('admin')->user()->id)->update([
            // 'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $password = $request->input('password');
        $passwordtwo = $request->input('passwordtwo');

        if(!empty($salvar)){
            if($password == $passwordtwo){
                Admins::where('id', Auth::guard('admin')->user()->id)->update([
                    'password' => Hash::make($password),
                ]);
            } 
        }


        return redirect('/admin/config');
  
    }
}
