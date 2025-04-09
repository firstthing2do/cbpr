<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Notifications\NewContactCreated;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
    public function create(){
        return view('contacts.create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique',
            'phone_number' => ['required', 'string', 'regex:/^\+250[0-9]{9}$/', 'max:13'],
            'notes' => 'required|string|max:255'
        ]);
        $contact = Contact::create($validated);
        // auth()->user()->notify(new NewContactCreated($contact));
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully');
    }
    public function show($id){
        $contacts = Contact::findOrFail($id);
        return view('contacts.show', compact('contacts'));
    }
    public function edit($id){
        $contacts = Contact::findOrFail($id);
        return view('contacts.edit', compact('contacts'));
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique',
            'phone_number' => ['required', 'string', 'regex:/^\+250[0-9]{9}$/', 'max:13'],
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
