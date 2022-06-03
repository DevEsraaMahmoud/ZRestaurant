@extends('admin.layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Profile</h4>
                    {{--
                        <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
                    --}}
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" value="{{$AdminData->email}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" value="{{$AdminData->name}}" class="form-control" required data-validation-required-message="This field is required"> </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>File Input Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input id="image" type="file" name="profile_photo_path" class="form-control" required> </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">

                                                <img id="viewImage" src="{{(!empty($AdminData ->profile_photo_path)) ? url('upload/admin_images'.$AdminData ->profile_photo_path) : url('upload/no_image.jpg')}}"
                                                     style="width: 100px; height: 100px;">
                                            </div>

                                        </div>



                                    </div>



                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-info">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        // to preview image when image is loaded
        $(document).ready(function(){
            $('#image').change(function(e){
                let reader = new FileReader();
                reader.onload = function(e){
                    $('#viewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
                //console.log(e);
            });

        });

    </script>
@endsection