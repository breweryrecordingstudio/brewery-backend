@extends('admin.layouts.master')
@section('title', 'Social Icon')

@section('css')


@endsection

@section('style')
    <style>
        body.dark-only .page-wrapper .page-body-wrapper .page-body .card:not(.email-body) .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        body.dark-only .page-wrapper .page-body-wrapper .page-body .card:not(.email-body) .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            border-color: var(--theme-deafult);
            /* color: black; */
            background: #3a3e4a;
        }
    </style>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="display: inline">Social Icon </h5>
                        <a href="{{url('admin/social_icon/add')}}"
                            class="btn btn-primary" style="float: right">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example-style-4_wrapper" class="dataTables_wrapper">

                                <table class="hover dataTable" id="example-style-4" role="grid"
                                    aria-describedby="example-style-4_info">
                                    <thead>
                                        @if (session()->has('green'))
                                            <div class="alert alert-success dark alert-dismissible fade show"
                                                role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-thumbs-up">
                                                    <path
                                                        d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                    </path>
                                                </svg>
                                                <p>{{ session('green') }}</p>
                                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                                    aria-label="Close" data-bs-original-title="" title=""></button>
                                            </div>
                                        @elseif(session()->has('red'))
                                            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-thumbs-down">
                                                    <path
                                                        d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17">
                                                    </path>
                                                </svg>
                                                <p>{{ session('red') }}</p>
                                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                                    aria-label="Close" data-bs-original-title="" title=""></button>
                                            </div>
                                        @endif
                                        <tr role="row">
                                            <th rowspan="1" colspan="1">Icon</th>
                                            <th rowspan="1" colspan="1">Link</th>
                                            <th rowspan="1" colspan="1">Created At</th>
                                            <th rowspan="1" colspan="1">Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($social_icons as $item)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><img src="{{ asset($item->img) }}" height="100"  alt=""></td>
                                                <td class="sorting_1"> <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">{{ $item->link }}</a></td>
                                                <td>{{ $item->created_at->isoFormat('D-M-Y') }}</td>
                                                <td><a class="btn btn-success theme"
                                                        href="{{ url('admin/social_icon/edit/' . \Crypt::encrypt($item->id)) }}"
                                                        type="button" data-original-title="btn btn-danger "
                                                        title="" data-bs-original-title=""><i class="fa fa-pencil"></i></a>

                                                        <a class="btn btn-danger theme"
                                                        href="{{ url('admin/social_icon/delete/' . \Crypt::encrypt($item->id)) }}"
                                                        type="button" data-original-title="btn btn-danger "
                                                        title="" data-bs-original-title=""><i class="fa fa-trash"></i></a>

                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Icon</th>
                                            <th rowspan="1" colspan="1">Link</th>
                                            <th rowspan="1" colspan="1">Created At</th>
                                            <th rowspan="1" colspan="1">Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
