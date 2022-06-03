@extends('admin.layout')
@section('content')

<!--   ------------ Add chef Page -------- -->




        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('chef.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row"> <!-- start 1st row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                        <h5>chef name En <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="chef_name_en" class="form-control" >
                                                            @error('chef_name_en')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>chef name arabic <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="chef_name_ar" class="form-control" >
                                                        @error('chef_name_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->




                                        </div> <!-- end 1st row  -->
                                        <div class="row"> <!-- start 1st row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>position name en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="position_name_en" class="form-control" >
                                                        @error('position_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>position name ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="position_name_ar" class="form-control" >
                                                        @error('position_name_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->




                                        </div> <!-- end 1st row  -->

                                        <div class="form-group">
                                            <h5>chef Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="chef_image" class="form-control" >
                                                @error('chef_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5>chef facebook profile <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="chef_facebook_profile" class="form-control" >
                                                    @error('chef_facebook_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5>chef twitter profile<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="chef_twitter_profile" class="form-control" >
                                                    @error('chef_twitter_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <h5>chef instagram profile<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="chef_instagram_profile" class="form-control" >
                                                    @error('chef_instagram_profile')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Chef">
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



@endsection