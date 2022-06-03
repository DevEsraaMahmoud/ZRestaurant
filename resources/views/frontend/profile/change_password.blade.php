@extends('frontend.layout')
@section('content')
    <div class="container-xxl position-relative p-0">


    </div>
    <div class="container-xxl bg-dark py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-6">
                <div class="">
                    <img class="card-img-top" style="border-radius: 50%;width: 30%;text-align: center;margin-left: 236px;border: solid;margin-top: 77px;" src="{{(!empty($user ->profile_photo_path)) ? url('upload/user_images'.$user ->profile_photo_path) : url('upload/no_image.jpg')}}">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <a type="text" class="w-100 py-3 btn btn-primary  btn-block" >Home</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <a type="text" class="w-100 py-3 btn btn-primary  btn-block" href="{{route('user.profile')}}" >Profile Update</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <a type="text" class="w-100 py-3 btn btn-primary  btn-block" >Change Password</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <a type="text" class="w-100 py-3 btn btn-danger  btn-block" href="{{route('user.logout')}}">Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

            <div class="col-md-6 bg-dark d-flex align-items-center">
                <div class="p-5 wow fadeInUp " data-wow-delay="0.2s">
                    <h5 class="section-title ff-secondary text-start text-primary fw-normal">HI....  {{Auth::user()->name}}
                    </h5>
                    <h1 class="text-white mb-4">HI.... <strong> {{Auth::user()->name}}
                        </strong></h1>
                    <form method="post" action="{{ route('user.update.password') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  class="form-control" type="password" id="current_password" name="oldpassword" placeholder="Your password" >
                                    <label for="current_password">Your password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input  class="form-control" type="password" id="password" name="password" placeholder="Your Email" >
                                    <label for="password">New password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Your Phone" >
                                    <label for="password_confirmation">confirm password</label>
                                </div>
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Start -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    {{--   <div class="col-md-12 bg-dark d-flex">
           <div class="p-7 wow fadeInUp" data-wow-delay="0.2s">
               <div class="row">
                   <div class="col-md-6">
                       <img class="card-img-top" style="border-radius: 50%" height="100%" width="100%" src="{{(!empty($AdminData ->profile_photo_path)) ? url('upload/admin_images'.$AdminData ->profile_photo_path) : url('upload/no_image.jpg')}}">
                       <ul class="list-group list-group-flush">
                           <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>

                           <a href="" class="btn btn-primary  btn-block">Home</a>
                           <a href="" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                           <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                           <a href="" class="btn btn-danger btn-sm btn-block">Logout</a>
                       </ul>
                   </div>
                   <div class="col-md-2">
                       <h3 class="text-center"> <span class="text-danger">HI.... <strong> {{Auth::user()->name}}
                               </strong> </span> </h3>
                   </div>
                   <div class="col-md-8"></div>
               </div>
           </div>
       </div>--}}


@endsection