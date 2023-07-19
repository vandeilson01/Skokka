<?php

namespace App\Http\Controllers\Acompanhantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProviderAdm;
use App\Http\Requests\Auth\LoginAcomRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

use App\Models\AcompanhantesModel;

class AcompanhantesAuthenticationController extends Controller
{
    //

    // public function create(): View
    // {
    //     return view('adm.auth.login');
    // }

    public function getLogin(): View{
        return view('acom.auth.login');
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
 
        if(auth()->guard('acom')->attempt(['email' => $request->input('email'),  'password' => $request->input('password')])){
            $user = auth()->guard('acom')->user();
            // if($user->is_acom == 1){
                return redirect('/acompanhantes/panel');
            // }
        }else {
            return back()->with('error','Whoops! invalid email and password.');
        }
    }

    public function acomLogout(Request $request)
    {
        // dd(1);
        auth()->guard('acom')->logout();
        
        $request->session()->invalidate();
        // Session::flush();
        // Session::put('success', 'You are logout sucessfully');

        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->flush();

        return redirect('/');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('acom')->logout();
         
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->flush();

        return route('logout');
    }


    public function upload(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);


        $salvar = AcompanhantesModel::where('id',Auth::guard('acom')->user()->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $password = $request->input('password');
        $passwordtwo = $request->input('passwordtwo');

        if(!empty($salvar)){
            if($password == $passwordtwo){
                AcompanhantesModel::where('id', Auth::guard('acom')->user()->id)->update([
                    'password' => Hash::make($password),
                ]);
            } 
        }


        return redirect('/acompanhantes/configuracoes');
  
    }
 
}
