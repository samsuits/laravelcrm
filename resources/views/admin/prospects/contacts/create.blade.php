@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>

    @endif
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>Create Contact Details <small class="text-muted">{{$prospect->name}}</small></h1>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Actions
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">                                                            
                              <a class="dropdown-item" href="#">View Prospect</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>             
        </div>
        {{-- end of card --}}

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{route('admin.prospects.contacts.store',['prospect' => $prospect ])}}" method="POST">
                    @csrf                   

                    <div class="form-group row">
                        <label for="" class="col-md-3">Mobile</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone_mobile">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Phone</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone">
                        </div>
                    </div>                 
                    
                    <div class="form-group row">
                        <label for="" class="col-md-3">Fax</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="fax">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Address</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Address 2</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address_2">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Unit #</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="unit">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">City</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Provice/State</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="province">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Postal/ Zip Code</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="postal_code">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Country</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="country">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Additional Notes</label>
                        <div class="col-md-9">
                            <textarea name="notes" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary float-right">Create Contact Details</button>

                </form>
            </div>
        </div>

    </div>
@endsection
