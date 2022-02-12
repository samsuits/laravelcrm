@extends('layouts.app')

@section('title', $prospect->name . "'s profile activity ")

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
                    <h1>Prospect Activities <small class="text-muted">{{ $prospect->name }}</small></h1>

                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                <a href="{{ route('admin.prospects.activities.create', $prospect) }}" class="dropdown-item">Add Action</a>
                            </ul>
                        </div>
                    </div>

                </div>
            </div> <!-- /.card -->

            @foreach(ProspectActivity::ProspectId($prospect->id)->with('documents')->latest()->paginate(10) as $activity)
                <div class="card mt-3">
                    <div class="card-body">
                        {{ $activity }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
