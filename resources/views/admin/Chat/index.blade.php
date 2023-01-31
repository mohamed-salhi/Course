@extends('admin.master')

@section('content')
    <div class="container-fluid">
        @vite('resources/js/app.js')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Dashboard</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Welcome to Agroxa Dashboard</li>
                        </ol>
                    </div>

                    <div class="state-information d-none d-sm-block">
                        <div class="state-graph">
                            <div id="header-chart-1"></div>
                            <div class="info">Balance $ 2,317</div>
                        </div>
                        <div class="state-graph">
                            <div id="header-chart-2"></div>
                            <div class="info">Item Sold 1230</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start page content-wrapper -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h5 class="text-uppercase verti-label font-size-16 text-white-50">Orders
                                </h5>
                                <div class="text-white">
                                    <h5 class="text-uppercase font-size-16 text-white-50">Orders</h5>
                                    <h3 class="mb-3 text-white">1,587</h3>
                                    <div class="">
                                        <span class="badge bg-light text-info"> +11% </span> <span
                                            class="ms-2">From previous period</span>
                                    </div>
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-cube-outline display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h5 class="text-uppercase verti-label font-size-16 text-white-50">Revenue
                                </h5>
                                <div class="text-white">
                                    <h5 class="text-uppercase font-size-16 text-white-50">Revenue</h5>
                                    <h3 class="mb-3 text-white">$46,785</h3>
                                    <div class="">
                                        <span class="badge bg-light text-danger"> -29% </span> <span
                                            class="ms-2">From previous period</span>
                                    </div>
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-buffer display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h5 class="text-uppercase verti-label font-size-16 text-white-50">Av. Price
                                </h5>
                                <div class="text-white">
                                    <h5 class="text-uppercase font-size-16 text-white-50">Average Price
                                    </h5>
                                    <h3 class="mb-3 text-white">15.9</h3>
                                    <div class="">
                                        <span class="badge bg-light text-primary"> 0% </span> <span
                                            class="ms-2">From previous period</span>
                                    </div>
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-tag-text-outline display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mini-stat position-relative">
                        <div class="card-body">
                            <div class="mini-stat-desc">
                                <h5 class="text-uppercase verti-label font-size-16 text-white-50">Pr. Sold
                                </h5>
                                <div class="text-white">
                                    <h5 class="text-uppercase font-size-16 text-white-50">Product Sold
                                    </h5>
                                    <h3 class="mb-3 text-white">1890</h3>
                                    <div class="">
                                        <span class="badge bg-light text-info"> +89% </span> <span
                                            class="ms-2">From previous period</span>
                                    </div>
                                </div>
                                <div class="mini-stat-icon">
                                    <i class="mdi mdi-briefcase-check display-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
            <section class="gradient-custom">
                <div class="container py-5">

                    <div class="row">
                        <div class="ajax-loading">fff</div>
                        <section style="background-color: #eee;">
                            <div class="container py-5">

                                <div class="row">



                                    <div class="col-md-6 col-lg-7 col-xl-8">
                                        <button onclick="readmore()">
                                            read more
                                        </button>

                                        <ul id="chat-content" class="list-unstyled">

                                            <div id="results">

                                            </div>
                                            @for($i=19;$i>=0;$i--)
                                                @if($message[$i]->admin_id==Auth::id())
                                            <li class="d-flex justify-content-between mb-4">
                                                <img src="{{asset('upload/images/admin/'.$message[$i]->admin->image)}}" alt="avatar"
                                                     class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                                                <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="fw-bold mb-0">{{$message[$i]->admin->name}}</p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{$message[$i]->created_at->diffForHumans()}}</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                            {{$message[$i]->message}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                                @else
                                            <li class="d-flex justify-content-between mb-4">
                                                <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="fw-bold mb-0">{{$message[$i]->admin->name}}</p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i> {{$message[$i]->created_at->diffForHumans()}}</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                            {{$message[$i]->message}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <img src="{{asset('upload/images/admin/'.$message[$i]->admin->image)}}" alt="avatar"
                                                     class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                            </li>
                                                @endif
                                            @endfor


                                        </ul>
                                        <li class="bg-white mb-3">
                                            <form>
                                                <div class="form-outline">
                                                    <textarea id="massage" class="form-control"  rows="4">Message</textarea>

                                                </div>

                                                <button onclick="addmassage()" type="button" class="btn btn-info btn-rounded float-end">Send</button>
                                            </form>
                                        </li>
                                    </div>

                                </div>


                            </div>
                        </section>

                    </div>

                </div>
            </section>


        </div>
        <!-- end page-content-wrapper-->

    </div>


    <script>
        var site_url = "{{ url('/') }}";
        var page = 1;

       function readmore() {
           // if(page!=1) {

           // }
               page++;
           $.ajax({
               url: site_url + "/admin/chat_group?page=" + page,
               type: "get",
               datatype: "html",
               beforeSend: function()
               {
                   $('.ajax-loading').show();
               }
           })
               .done(function(data)
               {
                   $(document).ready(function () {
                       $(this).scrollTop(3100);
                   });
                   if(data.length == 0){
                       $('.ajax-loading').html("No more records!");
                       return;
                   }
                   $('.ajax-loading').hide();
                   $("#results").append(data);
               })
               .fail(function(jqXHR, ajaxOptions, thrownError)
               {
                   alert('No response from server');
               });
       }


    </script>


    <script>


        var id={{Auth::id()}};
        console.log(id);
        function addmassage() {
            var message=$('#massage').val();

            $.ajax({
                type: 'post',
                url: '{{route("massage")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    message:message,

                },
                success: function (res) {
                    $('#massage').val('');
                    $(document).scrollTop($(document).height());
                    console.log('tt');


                },
                error: function (data) {
                    console.log('dd');

                }
            });


        }
    </script>
    <script>
        // $('html, body').animate({ scrollTop:  $(SELECTOR).offset().top - 50 }, 'slow');
        $(document).ready(function(){
            $(this).scrollTop(3100);
        });
        // function scrollDown() {
        //      document.body.scrollHeight
        // }
        // setInterval(scrollDown, 1000);
    </script>
    <script src="{{asset('js/app.js')}}"></script>

@endsection
