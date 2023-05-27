@extends('layouts.app')
  
@section('title', 'Show Contact')
  
@section('contents')
    <h1 class="mb-0">Detail Contact</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $contact->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" placeholder="Contact" value="{{ $contact->contact }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $contact->email }}" readonly>
        </div>        
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $contact->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $contact->updated_at }}" readonly>
        </div>
    </div>
@endsection