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
                        <h3 class="box-title">Edit subcategory </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form method="post" action="{{ route('subcategory.update', $subcategory->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$subcategory->id}}">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" id="select" required="" class="form-control"  >
                                            @foreach($categories as $category)
                                                <option value="">Select Category</option>
                                                <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected' : ''}}>{{$category->category_name_en}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>subcategory Name English  <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="subcategory_name_en" class="form-control" value="{{$subcategory->subcategory_name_en}}" >
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>subcategory Name arabic <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_ar" class="form-control" value="{{$subcategory->subcategory_name_ar}}" >
                                        @error('subcategory_name_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                </div>
                            </form>





                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

                <!-- /.box -->


            </div>
            <!-- /.col -->


            <!--   ------------ Add subcategory Page -------- -->







        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection