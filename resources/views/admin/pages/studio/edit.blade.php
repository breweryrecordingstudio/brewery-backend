@extends('admin.layouts.master')
@section('title', 'Edit Studio')

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
                                <h5>Edit Studio</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('admin/studio/edit_post') }}" class="theme-form mega-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    {{-- @dd($studio) --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Name</label>
                                                <input class="form-control" id="name" name="name" value="{{ $studio->name ?? "" }}"
                                                    type="text" placeholder="Enter Studio Name" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Location</label>
                                                <select name="category_id" class="form-control " id="category_id">
                                                    <option value="">Select Location</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $studio->category_id == $category->id ? "selected" : ""  }}>{{ $category->name }}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Description</label>
                                                <textarea name="description" id="description"  class="form-control"  cols="30" rows="10">{{ $studio->description ?? "" }}</textarea>

                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="{{ request()->route('id') }}">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Image</label>
                                                <input type="file" name="img" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset($studio->img ?? "") }}" height="160" accept="image/*" alt="">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Slider Images</label>
                                                <input type="file" name="slide[]" class="form-control" accept="image/*" multiple>
                                            </div>
                                        </div>
                                        {{-- @dd($studio->slider) --}}
                                        @isset($studio->slider)
                                        @foreach ($studio->slider as $slider)
                                        <div class="col-md-1">
                                            <a
                                            href="{{ url('admin/studio/slide_delete/' . \Crypt::encrypt($slider->id)) }}"
                                            type="button" title="" data-bs-original-title=""><i class="fa fa-trash"></i></a>
                                            <img src="{{ asset($slider->img ?? "") }}" height="50" class="p-1" alt="">
                                        </div>
                                        @endforeach
                                        @endisset

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

