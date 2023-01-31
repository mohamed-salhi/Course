@extends('admin.master')


@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <div class="page-title">
                        <h4 class="mb-0 font-size-18">Responsive Table</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Agroxa</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Responsive Table</li>
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

        <!-- Start Page-content-Wrapper -->
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="m-0"></h3>
                            </div>

                            <br><br>
                            <div class="table-rep-plugin">

                                <div class="table- mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th data-priority="1">#</th>
                                            <th data-priority="3">Name</th>
                                            <th data-priority="1">Email</th>
                                            <th data-priority="3">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user as $item)
                                            <tr id="id{{$item->user_id}}">
                                                <th data-priority="1">{{$loop->index+1}}</th>
                                                <th data-priority="3">{{$item->User->name}}</th>
                                                <th data-priority="3">{{$item->User->email}}</th>



                                                <td>
                                                    <div class="">
                                                        <div class="align-items-center justify-content-between">
                                                            @can('inst.true')
                                                            <button onclick="Accept({{$item->user_id}})" href="{{route('Accept',$item->user_id)}}" type="button" class="btn btn-outline-primary "
                                                                     aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                Accept
                                                              </button>

                                                            <button onclick="Cancel({{$item->user_id}})" href="{{route('Cancel',$item->user_id)}}" type="button" class="btn btn-danger "
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                Cancel
                                                            </button>
                                                            @endcan

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>

                                    </table>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

        </div>
        <!-- End Page-content-wrapper -->

    </div>


@section('script')

    <script src="{{ asset('adminassets/js/pages/form-validation.init.js')}}"></script>
    <script src="{{ asset('adminassets/libs/parsleyjs/parsley.min.js')}}"></script>

    <script>
        function Accept(id) {

            $.ajax({
                type: 'post',
                url: '{{route("Accept")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    id:id,
                },
                success: function (res) {
                    alert('تم القبول')
                    $('#id'+id).remove()

                },
                error: function (data) {
                    alert('تم الرفض')
                }
            });


        }


        function Cancel(id) {

            $.ajax({
                type: 'post',
                url: '{{route("Cancel")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    id:id,
                },
                success: function (res) {
                    alert('تم الرفض')
                    $('#id'+id).remove()

                },
                error: function (data) {
                    alert('تم ييي')
                }
            });


        }



    </script>
@endsection


@endsection
