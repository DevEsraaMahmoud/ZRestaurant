@extends('admin.layout')
@section('content')




        <!-- Main content -->
<section class="content">
    <div class="row">



        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">meal List <span class="badge badge-pill badge-danger"> {{ count($meal) }} </span></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Image </th>
                                <th>meal En</th>
                                <th>meal Price </th>
                                <th>Quantity </th>
                                <th>Discount </th>
                                <th>Status </th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meal as $item)
                                <tr>
                                    <td> <img src="{{ asset($item->meal_thambnail) }}" style="width: 60px; height: 50px;">  </td>
                                    <td>{{ $item->meal_name_en }}</td>
                                    <td>{{ $item->selling_price }} $</td>
                                    <td>{{ $item->meal_qty }} Pic</td>

                                    <td>
                                        @if($item->discount_price == NULL)
                                            <span class="badge badge-pill badge-danger">No Discount</span>

                                        @else
                                            @php
                                            $amount = $item->selling_price - $item->discount_price;
                                            $discount = ($amount/$item->selling_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

                                        @endif



                                    </td>

                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Active </span>
                                        @else
                                            <span class="badge badge-pill badge-danger"> InActive </span>
                                        @endif

                                    </td>


                                    <td width="30%">
                                        <a href="{{ route('meal.edit',$item->id) }}" class="btn btn-primary" title="meal Details Data"><i class="fa fa-eye"></i> </a>

                                        <a href="{{ route('meal.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                        <a href="{{ route('meal.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                                            <i class="fa fa-trash"></i></a>

                                        @if($item->status == 1)
                                            <a href="{{ route('meal.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                        @else
                                            <a href="{{ route('meal.active',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                        @endif




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






@endsection