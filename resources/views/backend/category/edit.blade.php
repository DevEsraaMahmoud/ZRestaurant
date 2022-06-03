@extends('admin.layout')
@section('content')


        <!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit category </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$category->id}}">
                                <input type="hidden" name="category_image" value="{{$category->category_image}}">

                                <div class="form-group">
                                    <h5>category Name English  <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="category_name_en" class="form-control" value="{{$category->category_name_en}}" >
                                        @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>category Name arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_ar" class="form-control" value="{{$category->category_name_ar}}" >
                                        @error('category_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group">
                                    <h5>category Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="category_image" class="form-control" >
                                        @error('category_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                </div>
                            </form>





                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->


            </div>
            <!-- /.col -->


            <!--   ------------ Add category Page -------- -->







        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection