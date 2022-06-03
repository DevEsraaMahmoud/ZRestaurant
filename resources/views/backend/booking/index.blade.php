@extends('admin.layout')
@section('content')


        <!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">booking List <span class="badge badge-pill badge-danger"> {{ count($booking) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>booking name </th>
                                    <th>Table ID </th>
                                    <th>email</th>
                                    <th>Date of Booking</th>
                                    <th>Num. of People</th>
                                    <th>Message</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($booking as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->table_id }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->datetime }}</td>
                                        <td>{{ $item->people }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>
                                            <input type="hidden" name="status" value="1">
                                            <a href="{{ route('booking.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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


            <!--   ------------ Add booking Page -------- -->






        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection