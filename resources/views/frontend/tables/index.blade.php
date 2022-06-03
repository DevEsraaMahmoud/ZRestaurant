@extends('frontend.layout')
@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-xxl position-relative p-0">

            <div class="container-xxl py-5 ">
                <div class="container text-center my-5 pt-5 pb-4">
                    <div class="container-xxl py-5">
                        <div class="container">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title ff-secondary text-center text-primary fw-normal"> @if(session()->get('language') == 'arabic')احجز@else Reserve @endif All Tables</h5>
                                <h1 class="mb-5">@if(session()->get('language') == 'arabic') احجز طاولتك@else Reserve Your Table @endif </h1>
                            </div>

                            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                                <div class="tab-content ">
                                    <div style="width: 100%; overflow: hidden;" id="tables">

                                       </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>
    </div>



@endsection