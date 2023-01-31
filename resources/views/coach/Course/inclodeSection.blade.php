@foreach ($massage as $section)
    <tr id="row{{$section->id}}">

        <td>{{$loop->index+1}}</td>
        <td>
            <h2 class="table-avatar">
                <a href="#"
                   style="text-transform: capitalize;font-weight: 600">
                    <label id="lable{{$section->id}}" for=""class="sect_name"
                           style="cursor: pointer">{{ $section->section_name }} </label><span
                        style="font-weight: 600">  Section</span></a>
            </h2>
        </td>
        <td>
            <h2 class="table-avatar">
                <a href="#"
                   style="text-transform: capitalize;font-weight: 600">{{ $section->course->name }}
                    <span
                        style="font-weight: 600">Course</span></a>
            </h2>
        </td>

        <td>
            <div class="">
                <div class="btn-group me-1 mt-2">
                    <button type="button" class="btn btn-primary dropdown-toggle"
                            data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#editsection{{$section->id}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Edit</span>
                        </button>
                        <button class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#delete{{$section->id}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </td>

    </tr>

    <div  class="modal fade" id="editsection{{$section->id}}" tabindex="-1" aria-labelledby="editsection" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Section</h5>
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
                                        <input id="namesec{{$section->id}}" style="text-transform: capitalize"
                                               name="sec_name" id="{{$section->id}}" type="text"
                                               class="form-control" value="{{$section->section_name}}">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group text-right " id="update_id">
                            <button type="button" class="btn btn-primary" onclick="editsection({{$section->id}})">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete{{$section->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete the section {{$section->section_name}} with all the courses above it?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{route('Course.destroy',$section->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-primary"  onclick="deletesection({{$section->id}})">Sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endforeach


