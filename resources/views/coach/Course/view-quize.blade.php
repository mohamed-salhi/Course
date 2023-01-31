@extends('admin.master')
@section('style')

@endsection

@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title" id="namee" >View Quize {{ $quize->name}} </h4>
                            <div class="row">

                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">Name Course {{ $quize->course->name }}</h3>
                                        <h3 class="text-uppercase" id="section-name">Name Secion {{ $quize->section->section_name }}</h3>
                                        <h3 class="text-uppercase" id="time-quize">Time {{ $quize->time }} minute</h3>
                                        <h3 class="text-uppercase" >Number Qustion <span id="number">{{ $quize->number }}</span> </h3>
                                        <ul class="list-unstyled">
                                            <li>Latest Added: <span>{{ $quize->created_at }}</span></li>
                                            <li>Latest Updated: <span id="updated_at">{{ $quize->updated_at }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a  class="btn-primary"
                                   href="{{route('Course.show',$quize->course->id)}}" data-bs-target="#editquize">
                               Back Quiz
                            </a>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li>

                                            <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#editquize">
                                                <h5 class="modal-title">Edit Quiz</h5>
                                            </button>
                                        </li>
                                        <br>
                                    </ul>
                                </div>
                            </div>

                            <div class="card tab-box">
                                <div class="row user-tabs">

                                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item"><button class="nav-link active" id="Quizzes-tab" data-bs-toggle="tab" data-bs-target="#Quizzes" type="button" role="tab" aria-controls="Quizzes" aria-selected="true">Quizzes</button></li>
                                        </ul>




                                    </div>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                                            <div id="Quizzes" role="tabpanel" aria-labelledby="Quizzes-tab" class="pro-overview tab-pane fade show active">
                                                                <div class="row">
                                                                    <div class="col-md-12 d-flex">
                                                                        <div class="card profile-box flex-fill">
                                                                            <div class="card-body">
                                                                                <div id="alreat"  >

                                                                                </div>
                                                                                <h3 class="card-title">Quizzes</h3>

                                                                                <br>
                                                                                <div id="alreattruefalse"  >

                                                                                </div>
                                                                                <br>
                                                                                <br>
                                                                                <div class="table-responsive">
                                                                                    <table class="table">
                                                                                        <thead class="thead-dark">
                                                                                        <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th scope="col">Qustaion</th>
                                                                                            <th scope="col">Answer</th>
                                                                                            <th scope="col">Type</th>
                                                                                            <th scope="col">Action</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @foreach($quize->truefalse as $item)

                                                                                            <tr id="rowquize{{$item->id}}">
                                                                                                <th scope="row">{{$item->id}}</th>
                                                                                                <td id="rowqustion{{$item->id}}">{{$item->qusation}}</td>
                                                                                                <td id="rowanser{{$item->id}}">{{$item->answre}}</td>
                                                                                                <td>TrueOrFalse</td>
                                                                                                <td>
                                                                                                    <div class="">
                                                                                                        <div class="btn-group me-1 mt-2">
                                                                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                                                                    aria-expanded="false">
                                                                                                                <i class="mdi mdi-chevron-down"></i></button>
                                                                                                            <div class="dropdown-menu">

                                                                                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                                                                                        data-bs-target="#edittruefalse{{$item->id}}">
                                                                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                                                                    <span>Edit Qusation</span>
                                                                                                                </button>
                                                                                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                                                                                        data-bs-target="#delete{{$item->id}}">
                                                                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                                                                    <span>Delete Qusation</span>
                                                                                                                </button>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>


                                                                                            <div class="modal fade" id="delete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            Do you want to delete the qustion  with all the courses above it?
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                            <form data-action="{{route('deletetruefalse',$item->id)}}" id="formquize">
                                                                                                                <button type="button" class="btn btn-primary"  onclick="Destroytruefasle({{$item->id}})">Sure</button>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="modal fade" id="edittruefalse{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <form  id="formtruefalse" data-action="{{route('edittruefalse')}}" >
                                                                                                                <div class="row_data">
                                                                                                                    <div class="row mb-3">
                                                                                                                        <div class="col-md-11">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-md-3">
                                                                                                                                    <input id="qusation{{$item->id}}" value="{{$item->qusation}}" name="qusation{{$item->id}}" type="text" class="form-control"  placeholder="qusation">
                                                                                                                                </div>
                                                                                                                                <div  class="col-md-5" data-select2-id="select2-data-11-lw53">

                                                                                                                                    <select name="answer{{$item->id}}" id="answer{{$item->id}}"
                                                                                                                                            class="select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                                                                                                                            tabindex="-1" aria-hidden="true">
                                                                                                                                        <option selected disabled>Select answer</option>
                                                                                                                                        <option value="true"  {{($item->answre=='true')?'selected':''}} > True </option>
                                                                                                                                        <option value="false" {{($item->answre=='false')?'selected':''}} > false </option>
                                                                                                                                        </option>

                                                                                                                                    </select>
                                                                                                                                </div>

                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                    </div>


                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                                                                                    <button type="button"
                                                                                                                         onclick="edittruefalse({{$item->id}})"
                                                                                                                            class="btn btn-primary">Add</button>
                                                                                                                </div>
                                                                                                            </form>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>


                                                                                        @endforeach
                                                                                        </tbody>
                                                                                    </table>

                                                                                    <table class="table">
                                                                                        <thead class="thead-light">
                                                                                        <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th scope="col">Qustaion</th>
                                                                                            <th scope="col">Check1</th>
                                                                                            <th scope="col">Check2</th>
                                                                                            <th scope="col">Check3</th>
                                                                                            <th scope="col">Check4</th>
                                                                                            <th scope="col">Answer</th>
                                                                                            <th scope="col">Type</th>
                                                                                            <th scope="col">Action</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @foreach($quize->check as $item)

                                                                                            <tr id="rowcheck{{$item->id}}">
                                                                                                <th scope="row">{{$loop->index+1}}</th>
                                                                                                <td id="name{{$item->id}}">{{$item->name}}</td>
                                                                                                <td id="check11{{$item->id}}">{{$item->check1}}</td>
                                                                                                <td id="check22{{$item->id}}">{{$item->check2}}</td>
                                                                                                <td id="check33{{$item->id}}">{{$item->check3}}</td>
                                                                                                <td id="check44{{$item->id}}">{{$item->check4}}</td>
                                                                                                <td id="aanswer{{$item->id}}">{{$item->answer}}</td>
                                                                                                <td>Check</td>
                                                                                                <td>
                                                                                                    <div class="">
                                                                                                        <div class="btn-group me-1 mt-2">
                                                                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                                                                    aria-expanded="false">
                                                                                                                <i class="mdi mdi-chevron-down"></i></button>
                                                                                                            <div class="dropdown-menu">

                                                                                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                                                                                        data-bs-target="#editcheck{{$item->id}}">
                                                                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                                                                    <span>Edit Qusation</span>
                                                                                                                </button>
                                                                                                                <button class="dropdown-item" data-bs-toggle="modal"
                                                                                                                        data-bs-target="#deletecheck{{$item->id}}">
                                                                                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                                                                                    <span>Delete Qusation</span>
                                                                                                                </button>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <div class="modal fade" id="deletecheck{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            Do you want to delete the qustion  with all the courses above it?
                                                                                                        </div>
                                                                                                        <div class="modal-footer">
                                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                            <form data-action="{{route('deletecheck',$item->id)}}" id="formquizee">
                                                                                                                <button type="button" class="btn btn-primary"  onclick="Destroycheck({{$item->id}})">Sure</button>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal fade" id="editcheck{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                                                <div class="modal-dialog">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                            <form    data-action="{{route('editcheck',$item->id)}}" id="formcheck">
                                                                                                                @csrf
                                                                                                                {{--                        <div class="text-right mb-2">--}}
                                                                                                                {{--                            <button onclick="addrow()" type="button" class="add_row btn btn-sm btn-dark">Add Row</button>--}}
                                                                                                                {{--                        </div>--}}
                                                                                                                <div class="row_data">
                                                                                                                    <div class="row mb-3">
                                                                                                                        <div class="col-md-11">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-md-8">
                                                                                                                                    <label class="col-lg-3 col-form-label">Quiz
                                                                                                                                        Name</label>
                                                                                                                                    <input id="qusationn{{$item->id}}" value="{{$item->name}}" name="qusationn{{$item->id}}" type="text" class="form-control"  placeholder="qusation">
                                                                                                                                    <label class="col-lg-3 col-form-label">Answer
                                                                                                                                    </label>
                                                                                                                                    <input id="answerr{{$item->id}}" value="{{$item->answer}}" name="answerr{{$item->id}}" type="text" class="form-control"  placeholder="qusation">

                                                                                                                                </div>
                                                                                                                                <br>
                                                                                                                                <div class="col-md-3">
                                                                                                                                    <input id="check1{{$item->id}}" value="{{$item->check1}}" name="check1{{$item->id}}" type="text" class="form-control"  placeholder="qusation">
                                                                                                                                    <input id="check2{{$item->id}}" value="{{$item->check2}}" name="check2{{$item->id}}" type="text" class="form-control"  placeholder="qusation">
                                                                                                                                    <input id="check3{{$item->id}}" value="{{$item->check3}}" name="check3{{$item->id}}" type="text" class="form-control"  placeholder="qusation">
                                                                                                                                    <input id="check4{{$item->id}}" value="{{$item->check4}}" name="check4{{$item->id}}" type="text" class="form-control"  placeholder="qusation">
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div>
                                                                                                                <div class="modal-footer">
                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                                                                                    <button type="button"
                                                                                                                            onclick="editcheck({{$item->id}})"
                                                                                                                            class="btn btn-primary">Add</button>
                                                                                                                </div>
                                                                                                            </form>

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        @endforeach

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                            </div>
                          </div>



                        <div  class="modal fade" id="editquize" tabindex="-1" aria-labelledby="editquize" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Quize {{$quize->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form data-action="{{route('quizze.update',$quize->id)}}" class="well form-horizontal" id="contact_form">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Quize
                                                            Name</label>
                                                        <div class="col-lg-9">
                                                            <input  style="text-transform: capitalize"
                                                                   name="name" id="name" type="text"
                                                                   class="form-control" value="{{$quize->name}}" >

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Quize
                                                            Time</label>
                                                        <div class="col-lg-9">
                                                            <input  style="text-transform: capitalize"
                                                                    name="time" id="time" type="number"
                                                                    class="form-control" value="{{$quize->time}}" >

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">Section
                                                        Name</label>
                                                    <div class="col-lg-9">
                                                        <select id="quiz_section_id"
                                                                name="quiz_section_id"
                                                                class="select select2-hidden-accessible">
                                                            <option selected disabled>Add to Section
                                                            </option>

                                                            @foreach ($sections as $item)
                                                                <option value="{{$item->id}}" id="sec" data-action="{{$item->section_name}}" {{($item->id==$quize->section_id)?'section_id':''}} >
                                                                    {{$item->section_name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group text-right " id="update_id">
                                                <button type="button" class="btn btn-primary" onclick="editquize({{$quize->id}})">Update</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    </div>
                </div>
             </div>
        </div>
    </div>


    <script>
        function editquize(id){
            var name=$('#name').val();
            var section=$('#quiz_section_id').val();
            var time=$('#time').val();
            var url = $('#contact_form').attr('data-action');
            var sectionname = $('#sec').attr('data-action');

            $.ajax({
                type: 'put',
                url:url,
                data: {
                    _token: '{{csrf_token()}}',
                    section_id: section,
                    name:name,
                    time:time,
                },
                success: function (res) {

                    $("#editquize").modal('hide');
                    $('#alreatquizze').text('Updated succesfully').addClass('alert alert-success');
                    $('#time-quize').text(time);
                    $('#section-name').text(sectionname);
                    $('#namee').text( 'View Quize '+ name);
                    $('#updated_at').text( res.message.updated_at);
                    console.log(res.message.updated_at);
                },
                error: function (data) {
                    $('#alreatquizze').text('Updated Fail').addClass('alert alert-danger');
                }
            });
        }
        function Destroytruefasle(id) {
            var url = $('#formquize').attr('data-action');

            var number= $('#number').html();

            $.ajax({
                type:'delete',
                url: url,
                data: {
                    _token: '{{csrf_token()}}',
                    id:id
                },
                success: function (res) {

                    $("#delete"+id).modal('hide');
                    $('#rowquize'+id).remove();
                    $('#alreat').text('Deleted succesfully').addClass('alert alert-success');
                    $('#number').text(parseInt(number)-1);



                },
                error: function (error) {
                    $('#alreat').text('Deleted Fail').addClass('alert alert-danger');
                }
            });


        }
        function Destroycheck(id) {
            var url = $('#formquizee').attr('data-action');
            var number= $('#number').html();
            $.ajax({
                type:'delete',
                url: url,
                data: {
                    _token: '{{csrf_token()}}',
                    id:id
                },
                success: function (res) {

                    $("#deletecheck"+id).modal('hide');
                    $('#rowcheck'+id).remove();
                    $('#alreat').text('Deleted succesfully').addClass('alert alert-success');
                    $('#number').text(parseInt(number)-1);


                },
                error: function (error) {
                    $('#alreat').text('Deleted Fail').addClass('alert alert-danger');
                }
            });


        }
        function edittruefalse(id) {
            var qusation=$('#qusation'+id).val();
            var answer=$('#answer'+id).val();
            var url = $('#formtruefalse').attr('data-action');
console.log(qusation);
            console.log(answer);
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    _token: '{{csrf_token()}}',
                    qusation: qusation,
                    answer:answer,
                    id:id
                },
                success: function (res) {

                    $("#edittruefalse"+id).modal('hide');
                    $('#alreattruefalse').text('Updated succesfully').addClass('alert alert-success');
                    $('#rowanser'+id).text(answer);
                    $('#rowqustion'+id).text(qusation);

                    console.log(res)


                },
                error: function (data) {
                    $('#alreattruefalse').text('Updated Fail').addClass('alert alert-danger');
                }
            });


        }
        function editcheck(id) {
            var qusationn=$('#qusationn'+id).val();
            var answerr=$('#answerr'+id).val();
            var check1=$('#check1'+id).val();
            var check2=$('#check2'+id).val();
            var check3=$('#check3'+id).val();
            var check4=$('#check4'+id).val();
            var url = $('#formcheck').attr('data-action');
            console.log(qusationn);
            console.log(answerr);
            console.log(check1);
            console.log(check2);
            console.log(check3);
            console.log(check4);

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    _token: '{{csrf_token()}}',
                    name: qusationn,
                    answer:answerr,
                    check1:check1,
                    check2:check2,
                    check3:check3,
                    check4:check4,
                    id:id
                },
                success: function (res) {

                    $("#editcheck"+id).modal('hide');
                    $('#alreattruefalse').text('Updated succesfully').addClass('alert alert-success');
                    $('#name'+id).text(qusationn);
                    $('#check11'+id).text(check1);
                    $('#check22'+id).text(check2);
                    $('#check33'+id).text(check3);
                    $('#check44'+id).text(check4);
                    $('#aanswer'+id).text(answerr);
                    console.log(res)


                },
                error: function (data) {
                    $('#alreattruefalse').text('Updated Fail').addClass('alert alert-danger');
                }
            });


        }
    </script>
@endsection

