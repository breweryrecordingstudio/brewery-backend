@extends('admin.layouts.master')
@section('title', 'Edit Footer')

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
                                <h5>Edit Heading Service</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('admin/heading_other_service/edit_post') }}" class="theme-form mega-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h6>Rates</h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Rate 1 Heading</label>
                                                <input class="form-control" id="rate_1" name="rate_1" value="{{ $service->rate_1 }}"
                                                    type="text" placeholder="Enter Rate 1 Heading" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Rate 2 Heading</label>
                                                <input class="form-control" id="rate_2" name="rate_2" value="{{ $service->rate_1 }}"
                                                    type="text" placeholder="Enter Rate 2 Heading" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Rate 3 Heading</label>
                                                <input class="form-control" id="rate_3" name="rate_3" value="{{ $service->rate_1 }}"
                                                    type="text" placeholder="Enter Rate 3 Heading" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <h6>Other services</h6>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Top Heading </label>
                                                <input class="form-control" id="top_heading_other_service_card" name="top_heading_other_service_card" value="{{ $service->top_heading_other_service_card }}"
                                                    type="text" placeholder="Enter Top Heading of Other services" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Top Heading Link</label>
                                                <input class="form-control" id="link" name="link" value="{{ $service->link }}"
                                                    type="text" placeholder="Enter Heading Link" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Bottom Heading </label>
                                                <input class="form-control" id="heading_other_service" name="heading_other_service" value="{{ $service->heading_other_service }}"
                                                    type="text" placeholder="Enter Bottom Heading of other service" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ request()->route('id') }}">
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

