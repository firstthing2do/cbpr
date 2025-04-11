<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Notifications\NewContactCreated;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::where('UserId', auth()->id())->paginate(6);
        return view('contacts.index', compact('contacts'));
    }
    public function create(){
        return view('contacts.create');
    }
    public function __construct()
{
    $this->middleware('auth');
}
    public function store(Request $request){
        $validated = $request->validate([
            // 'UserId' => 'required|exists:users,UserId',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contact,email',
            'phone_number' => ['required', 'string', 'regex:/^\+250[0-9]{9}$/', 'max:13'],
            'notes' => 'required|string|max:255',
        ]);
        $validated['UserId'] = auth()->id();
        $contact = Contact::create($validated);
        auth()->user()->notify(new NewContactCreated($contact));
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully');
    }
    public function show($id){
        $contact = Contact::findOrFail($id);
        if($contact->UserId !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        return view('contacts.show', compact('contact'));
    }
    public function edit($id){
        $contact = Contact::findOrFail($id);
        if($contact->UserId !== auth()->id()){
            abort(403, 'Unauthorized action.');
        }
        return view('contacts.edit', compact('contact'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:contact,email,{$id},id",
            'phone_number' => ['required', 'string', 'regex:/^\+250[0-9]{9}$/', 'max:13'],
            'notes' => 'required|string|max:255',
        ]);
        $contact = Contact::findOrFail($id);
        $contact->update($validated);
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }
    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}
