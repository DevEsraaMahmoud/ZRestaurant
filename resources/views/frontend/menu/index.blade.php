@extends('frontend.layout')
@section('content')
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">

            <div class="container-xxl py-5 ">
                <div class="container text-center my-5 pt-5 pb-4">
                    <div class="container-xxl py-5">
                        <div class="container">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                                <h1 class="mb-5">Most Popular Items</h1>
                            </div>

                            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                                    @foreach($categories as $category)
                                        <li class="nav-item">
                                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#category-{{ $category->id }}">
                                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                                <div class="ps-3">
                                                    <small class="text-body">Special</small>
                                                    <h6 class="mt-n1 mb-0">{{ $category-> category_name_en }}</h6>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content ">
                                    @foreach($categories as $category)

                                        <div id="category-{{ $category->id }}" class=" tab-pane fade show p-0">
                                            <div class="row g-4">



                                                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                                                            @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                                            @endphp
                                                            @foreach($subcategories as $subcategory)
                                                                <li class="nav-item justify-content-center">
                                                                    <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#subcategory-{{ $subcategory->id }}">
                                                                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                                                                        <div class="ps-3">
                                                                            <small class="text-body">Special</small>
                                                                            <h6 class="mt-n1 mb-0">{{ $subcategory-> subcategory_name_en }}</h6>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                 <div class="tab-content ">
                                                    @foreach($subcategories as $subcategory)
                                                        <div id="subcategory-{{ $subcategory->id }}" class=" tab-pane fade show p-0">
                                                            <div class="row g-4">
                                                                @php
                                                                $meals = App\Models\Meal::where('subcategory_id', $subcategory->id)->orderBy('meal_name_en', 'ASC')->get();
                                                                @endphp
                                                                @foreach($meals  as $meal)
                                                                <div class="col-lg-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <img class="flex-shrink-0 img-fluid rounded" src="{{ $meal->meal_thambnail }}" alt="" style="width: 80px;">
                                                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                                                <span>{{ $meal->meal_name_en }}</span>
                                                                                <span class="text-primary">{{ $meal->discount_price }}L.E</span>
                                                                            </h5>
                                                                            <small class="fst-italic">{{ $meal->short_descp_en }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach

                                                            </div>

                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


@endsection