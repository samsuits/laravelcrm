@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>        
    @endif
    <div class="card mt-3">
        <div class="card-body">
            <div class="d-flex">
                <h1>Edit Prospect <small class="text-muted">{{ $prospect->name }}</small></h1>
                <div class="ml-auto">
                    <div class="dropdown">  
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="{{ route('admin.prospects.dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('admin.prospects.show',['prospect' => $prospect->id]) }}">View Prospect</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#" onclick="deleteProspect()">Delete Prospect</a>
                                <form action="{{ route('admin.prospects.delete', $prospect->id) }}" id="delete-prospect-form" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Update their name and email and profile image --}}
    <div class="row">
        <div class="col-sm-4">
            {{-- placeholder for image and option to change out just the image --}}
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card mt-4">
                        @if ($prospect->profile_image)
                            <img src="{{ Storage::url($prospect->profile_image) }}" style="max-width: 100%" alt="">
                        @else                   
                            <img src="{{asset('images/user.png')}}" style="max-width: 100%">
                        @endif
                        <hr>
                        <button class="btn btn-outline-primary btn-sm btn-block" data-bs-toggle="modal" data-bs-target="#updateProfileImageModal">New Profile Image</button>
                        @if ($prospect->profile_image)
                            <button class="btn btn-outline-danger btn-sm btn-block" onclick="deleteProfileImage()"><i class="fas fa-trash">Delete Profile Image</i></button>
                            <form action="{{ route('admin.prospects.delete.profile-image', $prospect->id) }}" method="POST" id="delete-profile-image-form">
                                @csrf
                                @method('DELETE')

                            </form>
                        @endif

                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card mt-3">
                <div class="card-body">
                    <h5>Edit persional Details</h5>
        
                    <hr>
                    @if ($errors->count())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        </div>    
                    @endif
        
                    <form action="{{ route('admin.prospects.update', $prospect->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" value="{{$prospect->name}}">
                        </div>
        
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$prospect->email}}">
                        </div>
                        <hr>
                        <div class="form-group">
                        <button class="btn btn-primary float-right">Update Prospect</button>
                        </div>
                    </form>
                </div>
            </div> <!-- end of card -->

            <div class="card mt-3">
                <div class="card-body">
                                
                    @if($prospect->contact)
                        <h5>Edit Contact Details</h5>
                        <hr>
                        @include('admin.prospects.contacts.partials.edit-contact-form', ['prospect_id' => $prospect->id,'contact' => $prospect->contact])
                    @else
                        <div class="d-flex">
                            <div class="mx-auto">
                                <a href="{{route('admin.prospects.contacts.create',$prospect->id)}}" class="btn btn-outline-primary">Create Contact Details</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateProfileImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Profile Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.prospects.update.profile-image', $prospect->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-body">
                    <div class="form-group">
                        <label for="">Choose an Image</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
            </div>
            <div class="modal-footer">            
                <button class="btn btn-primary">Updater Profile Image</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('footer-scripts')
    <script>
            function deleteProfileImage() {
                var r = confirm("Are you sure you want to delete the profile image ? ")

                if(r) {
                    document.querySelector('form#delete-profile-image-form').submit()
                }
            }

            function deleteProspect() {
                var r = confirm("Are you sure you want to delete this prospect ? This can't be undone!")

                if(r) {
                    document.querySelector('form#delete-prospect-form').submit()
                }
            }
    </script>    
@endpush