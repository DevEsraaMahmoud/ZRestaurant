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
                        <h3 class="box-title">table List <span class="badge badge-pill badge-danger"> {{ count($tables) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>table number </th>
                                    <th>table position</th>
                                    <th>chairs number</th>
                                    <th>table status</th>
                                    <th> Action </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tables as $item)
                                    <tr>
                                        <td>{{ $item->table_number }}</td>
                                        <td>{{ $item->table_position }}</td>
                                        <td>{{ $item->chairs_numbers }}</td>
                                        <td>@if($item->table_status == 1)
                                                <span class="badge badge-pill badge-success"> Available </span>
                                            @else
                                                <span class="badge badge-pill badge-danger"> Reserved </span>
                                            @endif</td>
                                        <td>
                                            <a href="{{ route('table.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                            <a href="{{ route('table.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->


            <!--   ------------ Add table Page -------- -->


            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add table </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">


                            <form method="post" action="{{ route('table.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>table_number  <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text"  name="table_number" class="form-control" >
                                        @error('table_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <h5>table_position <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="table_position" class="form-control" >
                                        @error('table_position')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>chairs_numbers <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="chairs_numbers" class="form-control" >
                                        @error('chairs_numbers')
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




        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection