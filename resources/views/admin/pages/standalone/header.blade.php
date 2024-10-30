@extends('admin.layouts.master')
@section('title', 'Edit Header')

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
                                <h5>Edit Header</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('admin/header/edit_post') }}" class="theme-form mega-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Heading</label>
                                                <input class="form-control" id="heading" name="heading" value="{{ $header->heading }}"
                                                    type="text" placeholder="Enter Heading" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Contact</label>
                                                <input class="form-control" id="contact" name="contact" value="{{ $header->contact }}"
                                                    type="text" placeholder="Enter Contact" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta Title</label>
                                                <input class="form-control" id="meta_title" name="meta_title" value="{{ $header->meta_title }}"
                                                    type="text" placeholder="Enter Meta Title" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta Description</label>
<textarea class="form-control" id="meta_description" name="meta_description"  placeholder="Enter Meta Description" cols="30" rows="4">{{ $header->meta_description }}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Location</label>
                                                <select name="location[]" class="form-control " id="location" multiple>
                                                    <option value="">Select Location</option>
                                                    @foreach ($categories as $location)
                                                    <option value="{{ $location->id }}"
                                                        {{ in_array($location->id, json_decode($header->location) ?? []) ? 'selected' : '' }}>
                                                        {{ $location->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Button Name</label>
                                                <input class="form-control" id="btn_text" name="btn_text" value="{{ $header->btn_text }}"
                                                    type="text" placeholder="Enter Button Name" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Link</label>
                                                <input class="form-control" id="link" name="link" value="{{ $header->link }}"
                                                    type="text" placeholder="Enter Link" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Logo</label>
                                                <input type="file" name="logo" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{ asset($header->logo ?? "") }}" height="100" alt="">
                                        </div>
                                        <div class="col-md-4">
                                        <button type="button" class="btn btn-success theme" onclick="add_header_tab()">Add Header Tab</button>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="col-form-label mb-2">Header Tab</label>
                                            <div id="add_header_tab_in_this" >
                                                @php

                $tabsArray = json_decode($header->tabs, true);
            @endphp
                                                @if($tabsArray && count($tabsArray)>0)
                                                    @foreach ($tabsArray as $tab)
                                                        <div class="row mb-1">
                                                            <div class="col-5">
                                                                <input class="form-control" id="tabs" name="tabs[]" value="{{ $tab['tab'] ?? "" }}" placeholder="Enter Header Tab">
                                                            </div>
                                                            <div class="col-5">
                                                                <input class="form-control" id="tab_links" name="tab_links[]" value="{{ $tab['link'] ?? " "}}" placeholder="Enter Header Tab Link">
                                                            </div>
                                                            <div class="col-2">
                                                                <button type="button" class="btn btn-danger theme removeheadertab"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif

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

