<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index(){
        $totalContacts = Contact::where('UserId', auth()->id())->count();
        $recentContacts = Contact::where('UserId', auth()->id())->latest()->take(5)->get();
        return view('dashboard', compact('totalContacts', 'recentContacts')); 
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
