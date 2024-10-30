@extends('admin.layouts.master')
@section('title', 'Edit Studio Booking')

@section('css')


@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('green'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-thumbs-up">
                        <path
                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                        </path>
                    </svg>
                    <p>{{ session('green') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
            @endif
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Studio Booking</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('admin/plan/edit_post') }}" class="theme-form mega-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Heading</label>
                                                <input class="form-control" id="heading" name="heading" value="{{ $plan->heading }}"
                                                    type="text" placeholder="Enter Heading" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Link</label>
                                                <input class="form-control" id="link" name="link" value="{{ $plan->link }}"
                                                    type="text" placeholder="Enter Link" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Status</label>
                                                <select name="status" class="form-control " id="status">
                                                    <option value="">Select Status</option>
                                                    <option value="1" {{ $plan->status == 1?"selected":"" }}>Enabled</option>
                                                    <option value="0" {{ $plan->status == 0?"selected":"" }}>Disabled</option>
                                                </select>

                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ request()->route('id') }}">

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Per Hour</label>
                                                <input class="form-control" id="per_hour" name="per_hour" value="{{ $plan->per_hour }}"
                                                    type="text" placeholder="Enter Per Hour" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Half Day</label>
                                                <input class="form-control" id="half_day" name="half_day" value="{{ $plan->half_day }}"
                                                    type="text" placeholder="Enter Half Day" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Full Day</label>
                                                <input class="form-control" id="full_day" name="full_day" value="{{ $plan->full_day }}"
                                                    type="text" placeholder="Enter Full Day" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Description</label>
                                                <textarea name="description" id="description"  class="form-control"  cols="30" rows="10">{{ $plan->description }}</textarea>

                                            </div>
                                        </div>
                                    </div>

 <input type="submit" class="btn btn-primary text-end mt-2" style="float: right"
                                        value="Edit" data-bs-original-title="" title="">
                                    </div>



                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

