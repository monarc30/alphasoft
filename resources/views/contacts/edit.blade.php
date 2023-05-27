@extends('layouts.app')
  
@section('title', 'Edit Contact')
  
@section('contents')
    <h1 class="mb-0">Edit Contact</h1>
    <hr />
    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $contact->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Contact</label>
                <input type="text" name="contact" class="form-control" placeholder="Contact" value="{{ $contact->contact }}" >
            </div>        
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $contact->email }}" >
            </div>            
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection