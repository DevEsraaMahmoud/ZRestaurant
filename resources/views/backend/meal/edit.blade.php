@extends('admin.layout')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit meal </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('meal.update') }}" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $meals->id }}">
                                <div class="row">
                                    <div class="col-12">


                                        <div class="row"> <!-- start 1st row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>chef Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="chef_id" class="form-control"  >
                                                            <option value="" selected="" disabled="">Select chef</option>
                                                            @foreach($chefs as $chef)
                                                                <option value="{{ $chef->id }}" {{ $chef->id == $meals->chef_id ? 'selected': '' }} >{{ $chef->chef_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('chef_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control"  >
                                                            <option value="" selected="" disabled="">Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $meals->category_id ? 'selected': '' }} >{{ $category->category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control"  >
                                                            <option value="" selected="" disabled="">Select SubCategory</option>

                                                            @foreach($subcategory as $sub)
                                                                <option value="{{ $sub->id }}" {{ $sub->id == $meals->subcategory_id ? 'selected': '' }} >{{ $sub->subcategory_name_en }}</option>
                                                            @endforeach

                                                        </select>
                                                        @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 1st row  -->



                                        <div class="row"> <!-- start 2nd row  -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Name En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_name_en" class="form-control"  value="{{ $meals->meal_name_en }}">
                                                        @error('meal_name_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Name AR <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_name_ar" class="form-control"   value="{{ $meals->meal_name_ar }}">
                                                        @error('meal_name_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 2nd row  -->



                                        <div class="row"> <!-- start 3RD row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Code <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_code" class="form-control"  value="{{ $meals->meal_code }}">
                                                        @error('meal_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Quantity <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_qty" class="form-control"  value="{{ $meals->meal_qty }}">
                                                        @error('meal_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Tags En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_tags_en" class="form-control" value="{{ $meals->meal_tags_en }}" data-role="tagsinput" >
                                                        @error('meal_tags_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 3RD row  -->






                                        <div class="row"> <!-- start 4th row  -->
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Tags AR <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_tags_ar" class="form-control" value="{{ $meals->meal_tags_ar }}" data-role="tagsinput" >
                                                        @error('meal_tags_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Size En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_size_en" class="form-control" value="{{ $meals->meal_size_en }}" data-role="tagsinput" >
                                                        @error('meal_size_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->


                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <h5>meal Size AR <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_size_ar" class="form-control" value="{{ $meals->meal_size_ar }}" data-role="tagsinput"  >
                                                        @error('meal_size_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 4 -->

                                        </div> <!-- end 4th row  -->



                                        <div class="row"> <!-- start 5th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>meal_type_ar <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_type_ar" class="form-control" value="{{ $meals->meal_tags_ar }}" data-role="tagsinput" >
                                                        @error('meal_type_ar')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>meal_type_en <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meal_type_en" class="form-control" value="{{ $meals->meal_type_en }}" data-role="tagsinput" >
                                                        @error('meal_type_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->



                                        </div> <!-- end 5th row  -->




                                        <div class="row"> <!-- start 6th row  -->



                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>meal Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="selling_price" class="form-control"  value="{{ $meals->selling_price }}">
                                                        @error('selling_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div> <!-- end col md 6 -->


                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>meal Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="discount_price" class="form-control" value="{{ $meals->discount_price }}">
                                                        @error('discount_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 6th row  -->





                                        <div class="row"> <!-- start 7th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Short Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
	<textarea name="short_descp_en" id="textarea" class="form-control" required placeholder="Textarea text">
		{!! $meals->short_descp_en !!}
	</textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Short Description ARdi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
	<textarea name="short_descp_ar" id="textarea" class="form-control" required placeholder="Textarea text">
		{!! $meals->short_descp_ar !!}
	</textarea>
                                                    </div>
                                                </div>


                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 7th row  -->





                                        <div class="row"> <!-- start 8th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Long Description English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
	<textarea id="editor1" name="long_descp_en" rows="10" cols="80" >
		{!! $meals->long_descp_en !!}
						</textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Long Description ARdi <span class="text-danger">*</span></h5>
                                                    <div class="controls">
	<textarea id="editor2" name="long_descp_ar" rows="10" cols="80">
		{!! $meals->long_descp_ar !!}
						</textarea>
                                                    </div>
                                                </div>


                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 8th row  -->


                                        <hr>



                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $meals->hot_deals == 1 ? 'checked': '' }}>
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $meals->featured == 1 ? 'checked': '' }}>
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $meals->special_offer == 1 ? 'checked': '' }}>
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $meals->special_deals == 1 ? 'checked': '' }}>
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update meal">
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


        <!-- ///////////////// Start Multiple Image Update Area ///////// -->

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">meal Multiple Image <strong>Update</strong></h4>
                        </div>


                        <form method="post" action="{{ route('update.meal.image') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach($multiImgs as $img)
                                    <div class="col-md-3">

                                        <div class="card">
                                            <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{--{{ route('meal.multiimg.delete',$img->id) }}--}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
                                                </div>
                                                </p>

                                            </div>
                                        </div>

                                    </div><!--  end col md 3		 -->
                                @endforeach

                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>



                        </form>





                    </div>
                </div>



            </div> <!-- // end row  -->

        </section>
        <!-- ///////////////// End Start Multiple Image Update Area ///////// -->



        <!-- ///////////////// Start Thambnail Image Update Area ///////// -->

        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">meal Thambnail Image <strong>Update</strong></h4>
                        </div>


                        <form method="post" action="{{ route('update.meal.thambnail') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $meals->id }}">
                            <input type="hidden" name="old_img" value="{{ $meals->meal_thambnail }}">

                            <div class="row row-sm">

                                <div class="col-md-3">

                                    <div class="card">
                                        <img src="{{ asset($meals->meal_thambnail) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                        <div class="card-body">

                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" name="meal_thambnail" class="form-control" onChange="mainThamUrl(this)"  >
                                                <img src="" id="mainThmb">
                                            </div>
                                            </p>

                                        </div>
                                    </div>

                                </div><!--  end col md 3		 -->


                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            </div>
                            <br><br>



                        </form>





                    </div>
                </div>



            </div> <!-- // end row  -->

        </section>
        <!-- ///////////////// End Start Thambnail Image Update Area ///////// -->









    </div>





    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/subCategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });





        });
    </script>


    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                            .height(80); //create image element 
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>




@endsection