@extends('layouts.app')

@section('title', 'Create and Activity for '. $prospect->name)

@section('content')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex">
                    <h1>Create Activity <small class="text-muted">{{ $prospect->name  }}</small></h1>
                    <div class="ma-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                <a href="{{ route('admin.prospects.activities.dashboard', $prospect) }}" class="dropdown-item">Activities Dashboard</a>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('admin.prospects.activities.store', $prospect) }}"method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="" class="col-md-3">Activity Type</label>
                        <div class="col-md-9">
                            <select name="communication_type" class="form-control">
                                <option value="phone_call">Phone Call</option>
                                <option value="email">Email</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Activity</label>
                        <div class="col-md-9">
                            <select name="type" class="form-control">
                                <option value="">Select a Reason</option>
                                <option value="cold_outreach">Cold Outreach</option>
                                <option value="first_contact">First Contact</option>
                                <option value="follow_up">Follow Up</option>
                                <option value="document_signing">Document Signing</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Notes</label>
                        <div class="col-md-9">
                            <textarea name="notes" cols="30" rows="10" class="form-control" placeholder="Enter in your notes"></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-md-3">Documents</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" name="documents[]" multiple>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Schedule Follow up</label>
                        <div class="col-md-9">
                            <input type="datetime-local" class="form-control" name="followup_date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Follow Up Reason</label>
                        <div class="col-md-9">
                            <select name="followup_reason" class="form-control">
                                <option value="">Select a Reason</option>
                                <option value="cold_outreach">Cold Outreach</option>
                                <option value="demo">Demo</option>
                                <option value="follow_up">Follow up</option>
                                <option value="document_signing">Document Signing</option>
                                <option value="close_sale">Close Sale</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-md-3">Follow Up Notes</label>
                        <div class="col-md-9">
                            <textarea name="followup_notes" cols="30" rows="10" class="form-control"
                                      placeholder="Enter in your notes to help remind you of what to do for the next follow up"></textarea>
                        </div>
                    </div>

{{--                    <div class="form-group-row">--}}
{{--                        <label for="" class="col-md-3">Schedule Follow Up</label>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <input type="datetime-local" class="form-control" name="followup_date">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group-row">--}}
{{--                        <label for="" class="col-md-3">Follow Up Reason</label>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <select name="followup_reason" class="form-control">--}}
{{--                                <option value="Prospecting">Prospecting</option>--}}
{{--                                <option value="demo">Demo</option>--}}
{{--                                <option value="follow_up">Follow up</option>--}}
{{--                                <option value="document_signing">Document Signing</option>--}}
{{--                                <option value="close_sale">Close Sale</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group-row">--}}
{{--                        <label for="" class="col-md-3">Follow Up Notes</label>--}}
{{--                        <div class="col-md-9">--}}
{{--                            <textarea name="followup_notes" cols="30" rows="10" class="form-control" placeholder="Enter in your notes"></textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <button class="btn btn-primary float-right">Add Activity</button>


                </form>
            </div>
        </div>
    </div>
@endsection
