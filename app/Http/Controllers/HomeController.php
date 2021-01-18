<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function edit(User $user)
    {
        // Huidige gebruiker ophalen
        $user = Auth::user();

        //Huidige dag in formaat
        $date = Carbon::now()->format('Y-m-d');
        // Tijd plus 3 uur zodat je niet binnen 3 uur kan annuleren
        $timeNow = Carbon::now()->addHours(3);
        //Formateren van tijd
        $time = $timeNow->format('H:i:s');
        return view('account', compact('user', 'date', 'time'));
    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',

        ]);

        $user->name = request('name');
        $user->email = request('email');
        if (request('password') != '') {
            $user->password = bcrypt(request('password'));
        }
        $user->save();

        return back();
    }

    public function deleteaccount()
    {
        return view('deleteaccount');
    }

    public function deleteconfirm(Request $request)
    {
        // Kijkt of de RECAPTCHA is voltooid
        $validatedData = $request->validate([
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        // Haalt de huidige user op en verwijderd koppeling met reservering om vervolgens de gebruiker te verwijderen.
        $user = Auth::user();
        $user->reservations()->update(['user_id' => null]);
        $user->delete();

        return redirect('/login')->withErrors(['Je account is succesvol verwijderd']);
    }
}
