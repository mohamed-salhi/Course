@extends('admin.master')
@section('style')

    <style>

        .accordion .acd-group .acd-heading {
            font-weight: 500;
            font-size: 1.143rem;
            position: relative;
            padding: 12px 0;
            color: #323232;
            line-height: normal;
            cursor: pointer;
            background-color: transparent;
            margin-bottom: 0px;
            display: block;
            border-radius: 3px; }
        .accordion .acd-group .acd-heading:before {
            font-family: fontawesome;
            cursor: pointer;
            position: absolute;
            top: 12px;
            right: 20px;
            display: block;
            padding: 3px 6px 2px;
            content: "\f105";
            font-size: 1.143rem;
            line-height: 1.571rem; }
        .accordion .acd-group .acd-heading:hover {
            color: #84ba3f; }

        .accordion .acd-group .acd-des {
            padding: 0 20px 20px 0; }

        .accordion .acd-active .acd-heading {
            color: #84ba3f; }
        .accordion .acd-active .acd-heading:before {
            content: "\f107"; }

        /*plus-icon*/
        .accordion.plus-icon .acd-group.acd-active .acd-heading:before {
            content: "\f068";
            font-size: 1.143rem; }

        .accordion.plus-icon .acd-group .acd-heading:before {
            content: "\f067";
            font-size: 1.143rem; }

        /*plus-icon.round*/
        .accordion.plus-icon.round .acd-group.acd-active .acd-heading:before {
            content: "\f056";
            font-size: 1.143rem; }

        .accordion.plus-icon.round .acd-group .acd-heading:before {
            content: "\f055";
            font-size: 1.143rem; }

        /*gray*/
        .accordion.gray .acd-heading {
            background-color: #f6f7f8;
            margin-bottom: 20px;
            padding: 12px 24px; }
        .accordion.gray .acd-heading:hover {
            color: #ffffff;
            background: #84ba3f; }

        .accordion.gray .acd-des {
            padding: 0 30px 20px; }

        .accordion.gray .acd-group.acd-active .acd-heading {
            color: #ffffff;
            background: #84ba3f; }

        /*shadow*/
        .accordion.shadow .acd-heading {
            background: #ffffff;
            -webkit-box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 12px 24px; }

        .accordion.shadow .acd-des {
            padding: 0 30px 20px; }

        .accordion.shadow .acd-group.acd-active .acd-heading {
            color: #ffffff;
            background: #84ba3f; }

        .accordion.shadow .acd-group .acd-heading:hover {
            color: #ffffff;
            background: #84ba3f; }

        /*border*/
        .accordion.accordion-border .acd-heading {
            background: transparent;
            border: 1px solid #eeeeee;
            box-shadow: none;
            margin-bottom: 20px;
            padding: 12px 24px; }

        .accordion.accordion-border .acd-des {
            padding: 0 30px 20px; }

        .accordion.accordion-border .acd-group.acd-active .acd-heading {
            color: #ffffff;
            background: #84ba3f; }

        .accordion.accordion-border .acd-group .acd-heading:hover {
            color: #ffffff;
            background: #84ba3f; }

        /*no-radius*/
        .accordion.no-radius .acd-heading {
            border-radius: 0; }


    </style>
@endsection

@section('content')
    <div class="card mb-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="payslip-title">View {{ $course->name}} Course</h4>
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="{{ asset('upload/images/courses/'.$course->photo) }}"
                                         class="inv-logo" alt="" height="200" width="400">
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">{{ $course->name }}</h3>
                                        <ul class="list-unstyled">
                                            <li>Latest Added: <span>{{ $course->created_at }}</span></li>
                                            <li>Latest Updated: <span>{{ $course->updated_at }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5 class="mb-0 cn" style="text-transform: capitalize">
                                                <strong>{{ $course->name }} Course</strong>
                                            </h5>
                                        </li>
                                        <br>
                                    </ul>
                                </div>
                            </div>

                            <div class="card tab-box">
                                <div class="row user-tabs">

                                    <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item"><button class="nav-link {{(!session('lecture')&&!session('quize'))?"active":''}}" id="Informaion-tab" data-bs-toggle="tab" data-bs-target="#Informaion" type="button" role="tab" aria-controls="Informaion" aria-selected="true">Informations</button></li>
                                            <li class="nav-item"><button class="nav-link " id="Sections-tab" data-bs-toggle="tab" data-bs-target="#Sections" type="button" role="tab" aria-controls="Sections" aria-selected="true">Sections</button></li>
                                            <li class="nav-item"><button class="nav-link {{(session('lecture'))?"active":''}}" id="Lectures-tab" data-bs-toggle="tab" data-bs-target="#Lectures" type="button" role="tab" aria-controls="Lectures" aria-selected="true">Lectures</button></li>
                                            <li class="nav-item"><button class="nav-link " id=Students-tab" data-bs-toggle="tab" data-bs-target="#Students" type="button" role="tab" aria-controls="Students" aria-selected="true">Students</button></li>
                                            <li class="nav-item"><button class="nav-link {{(session('quize'))?"active":''}}" id="Quizzes-tab" data-bs-toggle="tab" data-bs-target="#Quizzes" type="button" role="tab" aria-controls="Quizzes" aria-selected="true">Quizzes</button></li>
                                        </ul>




                                    </div>
                                </div>
                            </div>

                            <div class="tab-content" id="myTabContent">
                                 <div id="Informaion" role="tabpanel" aria-labelledby="Informaion-tab" class="pro-overview tab-pane fade show {{(!session('lecture')&&!session('quize'))?"active":''}}">
                                    <div class="row">
                                        <div class="col-md-6 d-flex">
                                            <div class="card profile-box flex-fill">
                                                <div class="card-body">
                                                    <h3 class="card-title">Course Details <button
                                                             data-bs-toggle="modal"
                                                            data-bs-target="#edit"><i class="fa fa-pencil">تعديل</i> </button>
                                                    </h3>

                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">Course Name</div>
                                                            <div class="text csName" style="text-transform: capitalize;">
                                                                {{ $course->name }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Course Detail</div>
                                                            <div class="text csDetail">{{ $course->detail }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Sections</div>
                                                            <div class="text">
{{--                                                   {{($course->sections()->count() >1)?$course->sections()->count().' Sections':$course->sections()->count() .' Section'}}--}}
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Lectures</div>
                                                            <div class="text">

                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title csPrice">Price</div>
                                                            <div class="text" style="text-transform: capitalize">
                                                                ${{ $course->price }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="title csDescription">Description</div>
                                                            <div class="text">{{ $course->description }}</div>
                                                        </li>
                                                        <li>
                                                            <div class="title csDescription">Note</div>
                                                            <div class="text">{{ $course->note }}</div>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </div>
                                        </div>





                                        <div class="col-md-6 d-flex">
                                            <div class="card profile-box flex-fill">
                                                <div class="card-body">
                                                    <h3 class="card-title">Instructor Information
{{--                                                        <a href="#"--}}
{{--                                                                                                     class="edit-icon viewInstructor" data-toggle="modal"--}}
{{--                                                                                                     data-target="#viewInstructor"><i class="fa fa-eye"></i></a>--}}
                                                    </h3>
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">Name</div>
                                                            <div class="text"><a style="text-transform: capitalize"
                                                                                     href="#">{{ $course->user->name }}</a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Email</div>
                                                                <div class="text">{{ $course->user->email }}</div>
                                                        </li>



                                        </ul>
                                        <hr>

                                    </div>
                                </div>
                            </div>

                                                                    <div class="col-md-12 d-flex">
                                                                        <div class="card profile-box flex-fill">
                                                                            <div class="card-body">
                                                                                <h3 class="card-title">Course Price<a href="#"
                                                                                                                      class="edit-icon editPrice" data-toggle="modal"
                                                                                                                      data-target="#editPrice"><i class="fa fa-eye"></i></a>
                                                                                </h3>
                                                                                <br>
                                                                                <ul class="personal-info">
                                                                                    <li>
                                                                                        <div class="title">Course Price</div>
                                                                                        <div class="text">${{ $course->price }}
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                 <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Course.update',$course->id)}}" method="post"   enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Course Name</label>
                                                                <div class="col-lg-9">
                                                                    <input style="text-transform: capitalize;" placeholder="Enter Course Name"
                                                                           name="name" id="name" value="{{$course->name}}" type="text" class="form-control">

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Course Photo</label>
                                                                <div class="col-lg-9">
                                                                    <input class="form-control" name="imagee" id="course_photo" type="file">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Course Detail</label>
                                                                <div class="col-lg-9">
                                                                    <input style="text-transform: capitalize;" placeholder="Enter Course Detail"
                                                                           name="detail" value="{{$course->detail}}" id="detail" type="text" class="form-control">

                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Course Price</label>
                                                                <div class="col-lg-9">
                                                                    <input style="text-transform: capitalize;" placeholder="Enter Course Detail"
                                                                           name="price" value="{{$course->price}}" id="detail" type="number" class="form-control">

                                                                </div>
                                                            </div>
                                                            <div class="form-group row" data-select2-id="select2-data-12-1fss">
                                                                <label class="col-lg-3 col-form-label">Add to Category</label>
                                                                <div class="col-lg-9" data-select2-id="select2-data-11-lw53">
                                                                    <select name="category_id" id="category_id"
                                                                            class="select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                                                            tabindex="-1" aria-hidden="true">
                                                                        <option selected disabled>Select Category</option>
                                                                        @foreach ($categories as $itemm)
                                                                            <option value="{{$itemm->id}}" {{($itemm->id==$course->category_id)? 'selected':''}} > {{$itemm->name}} </option>
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            {{--                                                                        <div class="form-group row">--}}
                                                            {{--                                                                            <label class="col-lg-3 col-form-label">Instructor Name</label>--}}
                                                            {{--                                                                            <div class="col-lg-9">--}}
                                                            {{--                                                                                <select name="instructor_id" id="instructor_id"--}}
                                                            {{--                                                                                        class="select select2-hidden-accessible">--}}
                                                            {{--                                                                                    <option selected disabled>Select Instructor</option>--}}
                                                            {{--                                                                                    @foreach ($instructors as $instructor)--}}
                                                            {{--                                                                                        <option value="{{$instructor->id}}" {{($instructor->id==old('instructor_id',$item->instructor_id))? 'selected':''}} > {{$item->name}} </option>--}}
                                                            {{--                                                                                        </option>--}}
                                                            {{--                                                                                    @endforeach--}}
                                                            {{--                                                                                </select>--}}
                                                            {{--                                                                            </div>--}}
                                                            {{--                                                                        </div>--}}
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Note</label>
                                                                <div class="col-lg-9">
                                                                    <input style="text-transform: capitalize;" placeholder="Wirte a Note"
                                                                           name="note" value="{{$course->note}}" id="note" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-3 col-form-label">Description</label>
                                                                <div class="col-lg-9">
                                                                             <textarea rows="4" cols="5" name="description" id="description" class="form-control"
                                                                                       placeholder="Write a Description">{{$course->description}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="form-label" >Status</label>
                                                        <input name="status" type="checkbox" id="switch1" value="Active" switch="none" {{($course->status =='active')? 'checked':''}}  />
                                                        <label class="form-label form-control mx-3 " for="switch1" data-on-label="On"
                                                               data-off-label="Off"></label>
                                                    </div>

                                                    <br>

                                                    <div class="form-group text-right">
                                                        <button type="submit" class="btn btn-primary" >Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div id="Sections" role="tabpanel" aria-labelledby="Sections-tab" class="pro-overview tab-pane fade show">
                                                                <div class="row">
                                                                    <div class="col-md-12 d-flex">
                                                                        <div class="card profile-box flex-fill">
                                                                            <div class="card-body">
                                                                                <h3 class="card-title"><i class="las la-bars"></i> Sections</h3>
                                                                                <button  class="btn add-btn"data-bs-toggle="modal"
                                                                                         data-bs-target="#addsection" ><i class="fa fa-plus"></i> Add New
                                                                                    Section
                                                                                </button>
                                                                                <br>
                                                                                <br>
                                                                                <div id="alreat"  >

                                                                                </div>
                                                                                <br>
                                                                                <div class="table-responsive">
                                                                                    <table style="width: 100% " id="dataTable"
                                                                                           class="table table-hover text-nowrap table-bordered custom-table table-striped datatable">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th hidden></th>
                                                                                            <th>ID</th>
                                                                                            <th>Section Name</th>
                                                                                            <th>Course Name</th>
                                                                                            <th class="text-right no-sort">Action</th>

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="comment-list">

                                                                                        @include('coach.Course.inclodeSection',['massage' => $course->section])

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <div class="modal fade" id="addsection" tabindex="-1" aria-labelledby="addsection" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Create New Section</h5>
                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="well form-horizontal" id="contact_form">
                                                                                    <div class="row">
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-lg-3 col-form-label">Section
                                                                                                    Name</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input style="text-transform: capitalize"
                                                                                                           name="section_name" id="section_name"
                                                                                                           type="text" class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group text-right">
                                                                                        <button type="button" class="btn btn-primary"
                                                                                                onclick="store()">Create</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                               <div id="Lectures" role="tabpanel" aria-labelledby="Lectures-tab" class="pro-overview tab-pane fade show {{(session('lecture'))?"active":''}}">
                                                                <div class="card card-statistics h-100">
                                                                    <div class="accordion gray plus-icon round">
                                                                        <button  class="btn add-btn"data-bs-toggle="modal"
                                                                                 data-bs-target="#addLectures" ><i class="fa fa-plus"></i> Add New
                                                                            Lectures
                                                                        </button>
                                                                        <div id="alreatlecture"  >

                                                                        </div>
                                                                    <div class="card-body">

                                                                            @foreach ($course->section as $section)

                                                                                <div class="acd-group">
                                                                                    <a href="#" class="acd-heading">{{ $section->section_name }}</a>
                                                                                    <div class="acd-des">

                                                                                        <div class="row">
                                                                                            <div class="col-xl-12 mb-30">
                                                                                                <div class="card card-statistics h-100">
                                                                                                    <div class="card-body">
                                                                                                        <div class="d-block d-md-flex justify-content-between">
                                                                                                            <div class="d-block">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="table-responsive mt-15">
                                                                                                            <table class="table center-aligned-table mb-0">
                                                                                                                <thead>
                                                                                                                <tr class="text-dark">
                                                                                                                    <th>#</th>

                                                                                                                    <th>Lecture Name</th>
                                                                                                                    <th>Hours</th>
                                                                                                                    <th>Minutes</th>
                                                                                                                    <th>Description</th>
                                                                                                                    <th>Video</th>
                                                                                                                    <th>Status</th>
                                                                                                                    <th class="text-right no-sort">Action</th>
                                                                                                                </tr>
                                                                                                                </thead>
                                                                                                                <tbody>

                                                                                                                @foreach ($section->lecture as $lecture)
                                                                                                                    <tr id="roww{{$lecture->id}}">

                                                                                                                        <td>{{ $loop->index+1 }}</td>
                                                                                                                        <td>{{ $lecture->lecture_name }}</td>
                                                                                                                        <td>{{ $lecture->hours }}
                                                                                                                        <td>{{ $lecture->minutes }}
                                                                                                                        <td>{{ $lecture->description }}
                                                                                                                        <td>

                                                                                                                            <video width="320" height="240" controls>
                                                                                                                                <source src="{{asset('upload/images/lecture/video/'.$lecture->video)}}" type="video/ogg">
                                                                                                                                Your browser does not support the video tag.
                                                                                                                            </video>
                                                                                                                        </td>
                                                                                                                        <td>
                                                                                                                            @if ($lecture->status == 'Active')
                                                                                                                                <label
                                                                                                                                    class="badge text-success">{{ $lecture->status }}</label>
                                                                                                                            @else
                                                                                                                                <label
                                                                                                                                    class="badge text-danger">{{ $lecture->status }}</label>
                                                                                                                            @endif

                                                                                                                        </td>
                                                                                                                        <td>

                                                                                                                            <a href="#"
                                                                                                                               class="btn btn-outline-danger btn-sm"
                                                                                                                               data-bs-toggle="modal"
                                                                                                                               data-bs-target="#deletelecturee{{$lecture->id}}">Delete</a>
                                                                                                                            <a href="#"
                                                                                                                               class="btn btn-outline-danger btn-sm"
                                                                                                                               data-bs-toggle="modal"
                                                                                                                               data-bs-target="#editLecture{{$lecture->id}}">Edit</a>
                                                                                                                        </td>
                                                                                                                    </tr>



                                                                                                                    <div class="modal fade" id="deletelecturee{{$lecture->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletelecturee{{ $lecture->id }}" aria-hidden="true">
                                                                                                                        <div class="modal-dialog">
                                                                                                                            <div class="modal-content">
                                                                                                                                <div class="modal-header">
                                                                                                                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                                                                </div>
                                                                                                                                <div class="modal-body">
                                                                                                                                    Do you want to delete the lecture {{$lecture->lecture_name}} with all the courses above it?
                                                                                                                                </div>
                                                                                                                                <div class="modal-footer">
                                                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                                    <form id="idform" data-action="{{route('lecturedestroy')}}"  >
                                                                                                                                        <button type="button" class="btn btn-primary"  onclick="deletelecture({{$lecture->id}})">Sure</button>
                                                                                                                                    </form>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>



                                                                                                                    <div id="editLecture{{$lecture->id}}" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLecture{{$lecture->id}}" aria-hidden="true">
                                                                                                                                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                                                                                                                <div class="modal-content">
                                                                                                                                                                    <div class="modal-header">
                                                                                                                                                                        <h5 class="modal-title">Edit Lecture</h5>
                                                                                                                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                                                                                                                aria-label="Close">
                                                                                                                                                                            <span aria-hidden="true">&times;</span>
                                                                                                                                                                        </button>
                                                                                                                                                                    </div>
                                                                                                                                                                    <div class="modal-body">
                                                                                                                                                                        <form method="POST" action="{{route('editlecture',$lecture->id)}}" class="well form-horizontal" >
                                                                                                                                                                            @csrf
                                                                                                                                                                            <div class="row">
                                                                                                                                                                                <div class="col-xl-12">
                                                                                                                                                                                    <div class="form-group row">
                                                                                                                                                                                        <label class="col-lg-3 col-form-label">Lecture
                                                                                                                                                                                            Name</label>
                                                                                                                                                                                        <div class="col-lg-9">
                                                                                                                                                                                            <input style="text-transform: capitalize"
                                                                                                                                                                                                   placeholder="Enter Lecture Name"
                                                                                                                                                                                                   name="lecture_name" id="lec_name" type="text"
                                                                                                                                                                                                   class="form-control" value="{{$lecture->lecture_name}}">
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="form-group row">
                                                                                                                                                                                        <label class="col-lg-3 col-form-label">Section
                                                                                                                                                                                            Name</label>
                                                                                                                                                                                        <div class="col-lg-9">
                                                                                                                                                                                            <select id="sect_id" name="section_id"
                                                                                                                                                                                                    class="select select2-hidden-accessible">
                                                                                                                                                                                                <option selected disabled>Add to Section
                                                                                                                                                                                                </option>
                                                                                                                                                                                                @foreach ($course->section as $lecturee)
                                                                                                                                                                                                    <option value="{{ $lecturee->id }}" {{($lecturee->id==$section->id)?'selected':''}}>
                                                                                                                                                                                                        {{ $lecturee->section_name }}
                                                                                                                                                                                                    </option>
                                                                                                                                                                                                @endforeach
                                                                                                                                                                                            </select>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>

                                                                                                                                                                                    <div class="form-group row">
                                                                                                                                                                                        <label class="col-lg-3 col-form-label">Lecture
                                                                                                                                                                                            Video</label>
                                                                                                                                                                                        <div class="col-lg-9">
                                                                                                                                                                                            <input name="videoo" id="vid"
                                                                                                                                                                                                   type="file">
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="form-group row">
                                                                                                                                                                                        <label
                                                                                                                                                                                            class="col-lg-3 col-form-label">Description</label>
                                                                                                                                                                                        <div class="col-lg-9">
                                                                                                    <textarea rows="4" cols="5" name="description" id="description" class="form-control"
                                                                                                              placeholder="Lecture Description">{{$lecture->description}}</textarea>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                        <label class="form-label" >Status</label>
                                                                                                                                                                                        <input name="status" type="checkbox" id="switch1" value="Active" switch="none" {{($lecture->status =='Active')? 'checked':''}}  />
                                                                                                                                                                                        <label class="form-label form-control mx-3 " for="switch1" data-on-label="On"
                                                                                                                                                                                               data-off-label="Off"></label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                </div>
                                                                                                                                                                                    <br>

                                                                                                                                                                                    <div class="modal-footer">
                                                                                                                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                                                                                                                            <button type="submit" class="btn btn-primary" >Sure</button>

                                                                                                                                                                                    </div>
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
                                                                                    @endforeach
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                <div class="modal fade" id="addLectures" tabindex="-1" aria-labelledby="addLectures" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Create New Lecture</h5>
                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{ route('lecturestore') }}" enctype="multipart/form-data" method="POST" class="well form-horizontal" id="laravel-image-upload">>
                                                                                    @csrf
                                                                                    <div class="row">
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-lg-3 col-form-label">Lecture
                                                                                                    Name</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input style="text-transform: capitalize"
                                                                                                           placeholder="Enter Lecture Name"
                                                                                                           name="lecture_name" id="lecture_name"
                                                                                                           type="text" class="form-control">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-lg-3 col-form-label">Section
                                                                                                    Name</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <select id="section_id" name="section_id"
                                                                                                            class="select select2-hidden-accessible">
                                                                                                        <option selected disabled>Add to Section
                                                                                                        </option>
                                                                                                        @foreach ($course->section as $sections)
                                                                                                            <option value="{{ $sections->id }}">
                                                                                                                {{ $sections->section_name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>

                                                                                            </div>

                                                                                            <div class="form-group row">
                                                                                                <label
                                                                                                    class="col-lg-3 col-form-label">Description</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <textarea rows="4" cols="5" name="description" id="description" class="form-control"
                                                                                                              placeholder="Lecture Description"></textarea>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group row">
                                                                                                <label class="col-lg-3 col-form-label">Lecture
                                                                                                    Video</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input name="videoo" id="video"
                                                                                                           type="file">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="progress" id="progress_bar">
                                                                                                <div class="progress-bar progress-bar-striped bg-danger"
                                                                                                     id="progress_bar_process" role="progressbar"
                                                                                                     style="width: 0%" aria-valuenow="100"
                                                                                                     aria-valuemin="0" aria-valuemax="100">50%</div>
                                                                                            </div>
                                                                                            <div class="row mt-5" id="uploaded_image"></div>
                                                                                            <br>
                                                                                            <br>
                                                                                            <div class="form-group text-right">
                                                                                                <button  type="submit" class="btn btn-primary"
{{--                                                                                                  onclick="addlecturse()" --}}
                                                                                                >Create</button>
                                                                                            </div>
                                                                                        </div>

                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                            </div>
                                <div id="Students" role="tabpanel" aria-labelledby="Students-tab" class="pro-overview tab-pane fade show">
                                                                <div class="row">
                                                                    <div class="col-md-12 d-flex">
                                                                        <div class="card profile-box flex-fill">
                                                                            <div class="card-body">
                                                                                <h3 class="card-title">Students</h3>
                                                                                <button  class="btn add-btn" data-bs-toggle="modal"
                                                                                         data-bs-target="#addstudent" ><i class="fa fa-plus"></i> Add New
                                                                                    Section
                                                                                </button>
                                                                                <br>
                                                                                <br>
                                                                                <div id="alreatstudent"  >

                                                                                </div>
                                                                                <br>
                                                                                <div class="table-responsive">
                                                                                    <table style="width: 100%"
                                                                                           class="table table-hover text-nowrap table-bordered custom-table table-striped datatable">
                                                                                        <thead>
                                                                                        <tr style="text-align: center">
                                                                                            <th>ID</th>
                                                                                            <th>Student Name</th>
                                                                                            <th>Date of Join</th>
                                                                                            <th class="text-right no-sort">Action</th>

                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="comment-listt">
                                                                                        @include('coach.Course.inclodeStudent',['massage' => $course->student])


                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                    <div  class="modal fade" id="addstudent" tabindex="-1" aria-labelledby="addstudent" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Add New Student</h5>
                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="well form-horizontal" id="contact_form">
                                                                                    <div class="row">
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-lg-3 col-form-label">Student
                                                                                                    Name</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <select id="user_id" name="user_id"
                                                                                                            class="select select2-hidden-accessible">
                                                                                                        <option selected disabled>Select Student
                                                                                                        </option>
                                                                                                        @foreach ($user as $userr)
                                                                                                            <option value="{{ $userr->id }}">
                                                                                                                {{ $userr->name }}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group text-right">
                                                                                                <button type="button" class="btn btn-primary"
                                                                                                        onclick="addStudent({{$course->id}})">Store</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                    <div id="Quizzes" role="tabpanel" aria-labelledby="Quizzes-tab" class="pro-overview tab-pane fade show {{(session('quize'))?"active":''}}">
                                                                <div class="row">
                                                                    <div class="col-md-12 d-flex">
                                                                        <div class="card profile-box flex-fill">
                                                                            <div class="card-body">
                                                                                <h3 class="card-title">Quizzes</h3>
                                                                                <button  class="btn add-btn" data-bs-toggle="modal"
                                                                                         data-bs-target="#addQuiz" ><i class="fa fa-plus"></i> Add New
                                                                                    Quizze
                                                                                </button>
                                                                                <br>
                                                                                <div id="alreatquizze"  >

                                                                                </div>
                                                                                <br>
                                                                                <br>
                                                                                <div class="table-responsive">
                                                                                    <table style="width: 100%"
                                                                                           class="table table-hover text-nowrap table-bordered custom-table table-striped datatable">
                                                                                        <thead>
                                                                                        <tr style="text-align: center">
                                                                                            <th hidden></th>
                                                                                            <th>ID</th>
                                                                                            <th>Quiz Name</th>
                                                                                            <th>Quiz Section</th>
                                                                                            <th>Quiz Time</th>
                                                                                            <th>Number Quiz Questions</th>
                                                                                            <th>Added Date</th>
                                                                                            <th class="text-right no-sort">Action</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody id="list-quizze">

                                                                                        @include('coach.Course.inclodeQuizze',['massage' => $course->quizze])

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <div  class="modal fade" id="addQuiz" tabindex="-1" aria-labelledby="addQuiz" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Add New Quiz</h5>
                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="well form-horizontal" id="contact_form">
                                                                                    <div class="row">
                                                                                        <div class="col-xl-12">
                                                                                            <div class="form-group row">
                                                                                                <label class="col-lg-3 col-form-label">Quiz
                                                                                                    Name</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input type="text" class="form-control"
                                                                                                           name="name" id="namequizze">
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
                                                                                                        @foreach ($course->section as $section)
                                                                                                            <option value="{{ $section->id }}">
                                                                                                                {{ $section->section_name }}
                                                                                                            </option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group row">
                                                                                                <label class="col-lg-3 col-form-label">Time
                                                                                                    Quize</label>
                                                                                                <div class="col-lg-9">
                                                                                                    <input type="number" class="form-control"
                                                                                                           name="time" id="timequizze">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group text-right">
                                                                                                <button type="button" class="btn btn-primary"
                                                                                                        onclick="addQuiz({{$course->id}})">Create Quiz</button>
                                                                                            </div>
                                                                                        </div>
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
        </div>
    </div>






<script>


        function addrow(id){
            // var currentRow=$('#rowquize4').closest("tr");
            //
            // var col1=currentRow.find("td:eq(4)").html(6);
            // console.log(col1);
        // var a=    $('#list-quizze').find("rowquize4").find("num4").html();

//('#table1') - table Name
// tr:eq(2) - table ROW
// td:eq(1) - table COLUMN

        const row = `

   <div class="row mb-3">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input id="qusationn" name="qusationn" type="text" class="form-control"  placeholder="qusation">
                                            </div>
                                            <div  class="col-md-5" data-select2-id="select2-data-11-lw53">

                                                <select name="answer" id="answer"
                                                        class="select select2-hidden-accessible" data-select2-id="select2-data-1-bgy2"
                                                        tabindex="-1" aria-hidden="true">
                                                    <option selected disabled>Select answer</option>
                                                    <option value="true"> True </option>
                                                    <option value="false"> false </option>

                                                    </option>

                                                </select>
                                            </div>
                                            <div class="col-md-8">
                                                <button onclick="deleterow()" class="btn btn-danger  remove_row">delete</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>`;


        $('.row_data').append(row);


    }
        function deleterow(){
            $('body').on('click', '.remove_row', function(e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
            })


        }
        function deleteroww(){
            $('body').on('click', '.remove_roww', function(e) {
                e.preventDefault();
                $(this).parent().parent().parent().remove();
            })


        }

    function store() {
        var name=$('#section_name').val();
            $.ajax({
                type: 'post',
                url: '{{route("section.store")}}',
                data: {
                    _token: '{{csrf_token()}}',
                    section_name: name,
                    course_id:{{$course->id}},
                },
                success: function (res) {

                    $("#addsection").modal('hide');
                    $('#comment-list').html(res);
                    $('#alreat').text('Add succesfully').addClass('alert alert-success');
                },
                error: function (data) {
                    $('#alreat').text('Add Filed').addClass('alert alert-danger');
                }
            });


        }
    function editsection(id) {
        var name=$('#namesec').val();

        $.ajax({
            type: 'post',
            url: '{{route("updatesection")}}',
            data: {
                _token: '{{csrf_token()}}',
                section_name: name,
                course_id:{{$course->id}},
                id:id
            },
            success: function (res) {

                $("#editsection"+id).modal('hide');
                $('#alreat').text('Updated succesfully').addClass('alert alert-success');
                $('#lable'+id).text(name);


            },
            error: function (data) {
                $('#alreat').text('Updated Fail').addClass('alert alert-danger');
            }
        });


    }
    function deletesection(id) {


        $.ajax({
            type: 'post',
            url: '{{route("deletesection")}}',
            data: {
                _token: '{{csrf_token()}}',
                id:id
            },
            success: function (res) {

                $("#delete"+id).modal('hide');
                $('#row'+id).remove();
                $('#alreat').text('Deleted succesfully').addClass('alert alert-success');



            },
            error: function (error) {
                $('#alreat').text('Deleted Fail').addClass('alert alert-danger');
            }
        });


    }
function addlecturse(){
    $('#laravel-image-upload').on('submit', function(event){
        event.preventDefault();

        var url = $('#laravel-image-upload').attr('data-action');
        {{--let formData = new FormData();--}}
        {{--formData.append("course_id", {{$course->id}})--}}
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                // $('#image').attr('src', response.image).show();

                alert(response.message)
            },
            error: function(response) {
                $('.error').remove();
                // $.each(response.responseJSON.errors, function(k, v) {
                //     $('[name=\"image\"]').after('<p class="error">'+v[0]+'</p>');
                // });
            }
        });
    });
}
    function deletelecture(id) {

        var url = $('#idform').attr('data-action');

        $.ajax({
            type: 'post',
            url: url,
            data: {
                _token: '{{csrf_token()}}',
                id:id
            },
            success: function (res) {
                $('#roww'+id).remove();
                $('#alreatlecture').text('Deleted succesfully').addClass('alert alert-success');
                $("#deletelecturee"+id).modal('hide');

            },
            error: function (error) {
                $('#alreatlecture').text('Deleted Fail').addClass('alert alert-danger');
            }
        });


    }


    function addStudent(id) {
        var user_id=$('#user_id').val();
        $.ajax({
            type: 'post',
            url: '{{route("student.store")}}',
            data: {
                _token: '{{csrf_token()}}',
                user_id:user_id,
                course_id:id
            },
            success: function (res) {

                $("#addstudent").modal('hide');
                $('#comment-listt').html(res);
                $('#alreatstudent').text('Add succesfully').addClass('alert alert-success');
            },
            error: function (data) {
                $('#alreatstudent').text('Add Filed').addClass('alert alert-danger');
            }
        });


    }

    function addQuiz(id) {
        var name=$('#namequizze').val();
        var secionID=$('#quiz_section_id').val();
        var time=$('#timequizze').val();
        $.ajax({
            type: 'post',
            url: '{{route("quizze.store")}}',
            data: {
                _token: '{{csrf_token()}}',
                name:name,
                section_id:secionID,
                time:time,
                course_id:id
            },
            success: function (res) {

                $("#addQuiz").modal('hide');
                $('#list-quizze').html(res);
                $('#alreatquizze').text('Add succesfully').addClass('alert alert-success');
            },
            error: function (data) {
                console.log('dd');
                $('#alreatquizze').text('Add Filed').addClass('alert alert-danger');
            }
        });


    }
    function DestroyQuiz(id) {
        var url = $('#formquize').attr('data-action');

        $.ajax({
            type:'delete',
            url: url,
            data: {
                _token: '{{csrf_token()}}',
                id:id
            },
            success: function (res) {

                $("#deleteqize"+id).modal('hide');
                $('#rowquize'+id).remove();
                $('#alreatquizze').text('Deleted succesfully').addClass('alert alert-success');



            },
            error: function (error) {
                $('#alreatquizze').text('Deleted Fail').addClass('alert alert-danger');
            }
        });


    }

        function addtruefalse(id) {

                    var url = $('#formtruefalse').attr('data-action');
                    // var qusation = $("input[name='qusationn']")
                    //     .map(function(){return $(this).val();}).get();
                    var answer = $("select[name='answer']")
                        .map(function(){return $(this).val();}).get();

                    var currentRow=$('#rowquize'+id).closest("tr");

                     var col11=currentRow.find("td:eq(4)").text();
                    var col1=currentRow.find("td:eq(4)").html(parseInt(col11)+answer.length);



                    // var answer=[];
                    //
            var qusation=[];
                    $("input[name='qusationn']").each(function(){
                        qusation.push(this.value);
                    });
            console.log(qusation);

                    // $("#answer").each(function(){
                    //     answer.push(this.value);
                    // });

                    console.log(answer);

                    $.ajax({
                        type: 'post',
                        url: url,
                        data:{
                           _token: '{{csrf_token()}}',
                            answer:answer,
                            qusation:qusation
                        },


                        success: function (res) {
                            answer.length = 0;
                            qusation.length = 0;
                            $("#addtruefasle"+id).modal('hide');
                            $('#alreatquizze').text('Add succesfully').addClass('alert alert-success');
                        },
                        error: function (data) {
                            answer.length = 0;
                            qusation.length = 0;
                            $('#alreatquizze').text('Add Filed').addClass('alert alert-danger');
                        }


        }
            )
        }

</script>



@endsection
