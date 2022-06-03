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
                        <h3 class="box-title">Edit table </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form method="post" action="{{ route('table.update', $table->id) }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$table->id}}">

                                <div class="form-group">
                                    <h5>table_number <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="table_number" class="form-control" value="{{$table->table_number}}" >
                                        @error('table_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>table_position <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="table_position" class="form-control" value="{{$table->table_position}}" >
                                        @error('table_position')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>chairs_numbers <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="chairs_numbers" class="form-control" value="{{$table->chairs_numbers}}" >
                                        @error('chairs_numbers')
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


            <!--   ------------ Add table Page -------- -->







        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection