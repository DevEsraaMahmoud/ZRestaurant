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
                        <h3 class="box-title">chef List <span class="badge badge-pill badge-danger"> {{ count($chef) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Chef Image </th>
                                    <th>Chef Name En </th>
                                    <th>Chef Name Ar </th>
                                    <th>Position En</th>
                                    <th>Position Ar</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>Instagram</th>

                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chef as $item)
                                    <tr>
                                        <td><img src="{{ asset($item->chef_image) }}" style="width: 70px; height: 40px; margin-left: 32px;"> </td>
                                        <td>{{ $item->chef_name_en }}</td>
                                        <td>{{ $item->chef_name_ar }}</td>
                                        <td>{{ $item->position_name_en }}</td>
                                        <td>{{ $item->position_name_ar }}</td>
                                        <td>{{ $item->chef_facebook_profile }}</td>
                                        <td>{{ $item->chef_twitter_profile }}</td>
                                        <td>{{ $item->chef_instagram_profile }}</td>
                                        <td>
                                            <a href="{{ route('chef.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                            <a href="{{ route('chef.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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






        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection