<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::orderBy('created_at', 'DESC')->get();
  
        return view('contacts.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $contact = Contact::firstOrCreate([
            'email' => $request->email 
        ], $request->all());

        if ($contact->wasRecentlyCreated) {
            return redirect()->route('contacts')->with('success', 'Contact added successfully');        
        }else{
            return redirect()->route('contacts')->with('error', 'Contact already exists');        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
  
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
  
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {       

        $contact = Contact::findOrFail($id);

        $update = [
            'email'     => request('email'),            
        ];
        
        $new_contact = $contact->firstOrNew($update);        

        if($new_contact->exists === false){            
            $contact->update($request->all());
            return redirect()->route('contacts')->with('success', 'contact updated successfully');
        }else{
            return redirect()->route('contacts')->with('error', 'Email already existis');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
  
        $contact->delete();
  
        return redirect()->route('contacts')->with('success', 'contact deleted successfully');
    }
}
