@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row size-column">
            <div class="col-xl-7 box-col-12 xl-100">
                <div class="row dash-chart">

                    {{-- <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-body">
                                <div class="ecommerce-widgets media">
                                    <div class="media-body">
                                        <p class="f-w-500 font-roboto">Our Sale Value<span
                                                class="badge pill-badge-primary ms-3">New</span></p>
                                        <h4 class="f-w-500 mb-0 f-20">$<span class="counter">7454.25</span></h4>
                                    </div>
                                    <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart"
                                            aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="f-w-500 font-roboto">Today Stock value<span
                                                class="badge pill-badge-primary ms-3">Hot</span></p>
                                        <div class="progress-box">
                                            <h4 class="f-w-500 mb-0 f-20">$<span class="counter">9000.04</span></h4>
                                            <div
                                                class="progress sm-progress-bar progress-animate app-right d-flex justify-content-end">
                                                <div class="progress-gradient-primary" role="progressbar" style="width: 35%"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span
                                                        class="font-primary">88%</span><span class="animate-circle"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
