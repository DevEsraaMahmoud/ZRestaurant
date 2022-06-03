<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restoran - Bootstrap Restaurant Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<style>
    .hero-header img {
         animation: none;
    }
    .table{
        border-radius: 59px;
        margin-right: 48px;
        width: 125px;
        height: 162px;
        float: left;
        background-color: #00A6C4;
    }
    .reserve{
        margin-top: 35px;
    }



</style>
</head>

<body>
<div class="container-xxl bg-white p-0">

    @include('frontend.body.header')

            <!-- Spinner Start -->
   @yield('content')
    <!-- Footer Start -->
 @include('frontend.body.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<div class="modal fade" id="dd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pname"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">

                   {{-- <div class="col-md-4">

                        <div class="card" style="width: 18rem;">

                            <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 180px;" id="pimage">

                        </div>

                    </div><!-- // end col md -->
--}}

                    <div class="col-md-6">

                        <ul class="list-group">

                            <li class="list-group-item">table_number: <strong id="table_number"></strong></li>
                            <li class="list-group-item">chairs_numbers: <strong id="chairs_numbers"></strong></li>

                        </ul>

                    </div><!-- // end col md -->

                    <div class="col-md-6">

                        <ul class="list-group">
                            <li class="list-group-item">table_position: <strong id="table_position"></strong></li>
                            <li class="list-group-item">Reservation Status: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span>
                                <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
                            </li>
                        </ul>



                    </div><!-- // end col md -->




                </div> <!-- // end row -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating date" id="date3" data-target-input="nearest">
                            <input type="date" class="form-control " id="datetime" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"/>
                            <label for="datetime">Date & Time</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-select" id="select1">
                                <option value="1"> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                            </select>
                            <label for="select1">No. Of People</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                            <label for="message">Special Request</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="hidden" id="table_id">
                        <input type="hidden" id="status" value="0">
                        <button class="btn btn-primary w-100 py-3" onclick="BookATable()">Book Now</button>
                    </div>
                </div>


            </div> <!-- // end modal Body -->

        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('frontend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>


<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function ready(){
        $(document).ready(function() {

            $.ajax({
                Type: 'GET',
                url : '/booking/all-tables',
                dataType: 'json',
                success:function(data){
                    console.log(data)
                    let tables = ""
                    $.each(data, function(key, value){
                        if(value.table_status == 0){
                            tables += `  <div class="table">
                                    <p class="table_number">${value.table_number}</p>
                                    <img class="img-fluid" src="{{ asset('frontend/img/Reserved.png') }}" alt="">
                                    </div>
`
                        }else{
                            tables += `  <div class="table">
                                    <p class="table_number">${value.table_number}</p>
                                    <button class="reserve btn btn-primary" id="${value.id}" onclick="reserveModal(this.id)" data-toggle="modal" data-target="#cartModal">@if(session()->get('language') == 'arabic')احجز@else Reserve @endif  </button>

                                    </div>
`
                        }

                    })
                    $('#tables').html(tables);
                }
            })
        });
    }
    ready();

</script>

<script>
    function reserveModal(id){
        $.ajax({
            type: 'GET',
            url: '/booking/Table/view/modal/'+id,
            dataType: 'json',
            success:function(data){

                $('#dd').modal('show');

               $('#table_number').text(data.tables.table_number);
                let tt = data.tables.table_number;
                $('#chairs_numbers').text(data.tables.chairs_numbers);
                $('#table_id').val(id);
                $('#table_position').text(data.tables.table_position);

                if(data.tables.table_status =  1){
                    $('#aviable').text('available');
                }else{
                    $('#stockout').text('stockout');


                }
            }
        })
    }

    function BookATable(){
        var id = $('#table_id').val();
        var status = $('#status').val();
        var table_number = $('#table_number').text();
        var name = $('#name').val();
        var email = $('#email').val();
        var datetime = $('#datetime').val();
        var people = $('#select1 option:selected').text();
        var message = $('#message').val();
        $("form").submit(function(e) {
            e.preventDefault();
        });
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data:{
                name:name, email:email, datetime:datetime, people:people, message:message, table_number:table_number,status:status
            },
            url: "/booking/data/store/"+id,
            success:function(data){
                $('#dd').modal('toggle');

/*
                location.reload();
*/
                ready();

                const Toast=  Swal.mixin({
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                if ($.isEmptyObject(data.error)){
                    Toast.fire({
                        type: 'success',
                        title: data.success

                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error

                    })
                }
                console.log(data)
            }
        })
    }

    function markRead(id){
        $.ajax({
            type: 'GET',
            url: '/booking/read/'+id,
            dataType: 'json',
            success:function(data){
                console.log('done')
                $('.mark-as-read').removeClass("alert-success");
                $('.bi').css('color','white');
            }
        })
    }
</script>
</body>

</html>