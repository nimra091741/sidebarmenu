<?php

namespace App\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class Loginpage extends Component
{

    public $email;
    public $password, $error = "These credentials are not found.";

    public function store()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);
        try {
            $user = User::where('email', $this->email)->where('status', 'true')->first();
            if (empty($user)) {
                session()->flash('error', '*Invalid credentials');
            } else if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

                return redirect()->intended(route('productlisting'));
            } else {
                session()->flash('error', '*Invalid credentials');
            }
        } catch (Exception $e) {
            $this->error = $e->getMessage();
        }
    }
    //  dd( $user);

    public function render()
    {
        return view('livewire.loginpage');
    }
}
  // $user = User::where('email', $this->email)->where('status', 'true')->first();
            // if (empty($user)) {
            //      throw new \Exception('The email addresses you provided do not match, or it has not been verified.');
            // }
