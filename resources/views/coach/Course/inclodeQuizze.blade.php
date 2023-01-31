@foreach ($massage as $quiz)
    <tr id="rowquize{{$quiz->id}}">

        <td>{{ $loop->index+1 }}</td>
        <td>
            <h2 class="table-avatar">
                <a href="#"
                   style="text-transform: capitalize;font-weight: 600">
                    <label for=""class="quiz_name"
                           style="cursor: pointer">{{ $quiz->name }}</label>
                    <span
                        style="font-weight: 600">Quiz</span></a>
            </h2>
        </td>

        <td>{{ $quiz->section->section_name }}</td>
        <td>{{ $quiz->time }} <span
                style="font-weight: 100">minute</span></td>
        <td >{{ $quiz->number }}</td>
        <td><i class="las la-calendar"></i> <span
                class="date">{{ $quiz->created_at->isoFormat('LLLL') }}</span>
        </td>
        <td>
            <div class="">
                <div class="btn-group me-1 mt-2">
                    <button type="button" class="btn btn-primary dropdown-toggle"
                            data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <button class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#addtruefasle{{$quiz->id}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Add true/false qusation</span>
                        </button>
                        <button class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#addcheck{{$quiz->id}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Add check qusation</span>
                        </button>
                        <a class="dropdown-item" href="{{route('quizze.show',$quiz->id)}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>View Quize</span>
                        </a>
                        <button class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#deleteqize{{$quiz->id}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </td>

    </tr>
    <div class="modal fade" id="addtruefasle{{$quiz->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="post"  id="formtruefalse" action="{{route('truefalse',$quiz->id)}}" fo>
                        @csrf
                        <div class="text-right mb-2">
                            <button onclick="addrow()" type="button" class="add_row btn btn-sm btn-dark">Add Row</button>
                        </div>
                        <div class="row_data">
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                        </div>
                                        <div  class="col-md-5" data-select2-id="select2-data-11-lw53">

                                            <select name="answer[]" id="answer"
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                        </div>
                                        <div  class="col-md-5" data-select2-id="select2-data-11-lw53">

                                            <select name="answer[]" id="answer"
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                        </div>
                                        <div  class="col-md-5" data-select2-id="select2-data-11-lw53">

                                            <select name="answer[]" id="answer"
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                        </div>
                                        <div  class="col-md-5" data-select2-id="select2-data-11-lw53">

                                            <select name="answer[]" id="answer"
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
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                        </div>
                                        <div  class="col-md-5" data-select2-id="select2-data-11-lw53">

                                            <select name="answer[]" id="answer"
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
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="submit"
                                    {{--                                        onclick="addtruefalse({{$quiz->id}})"--}}
                                    class="btn btn-primary">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addcheck{{$quiz->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="post"   action="{{route('check',$quiz->id)}}" fo>
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
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                            <label class="col-lg-3 col-form-label">Answer
                                            </label>
                                            <input id="answer" name="answer[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
                                        <br>
                                        <div class="col-md-3">
                                            <input id="check1" name="check1[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check2" name="check2[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check3" name="check3[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check4" name="check4[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
<br>
                                        <div class="col-md-8">
                                            <button onclick="deleterow()" class="btn btn-danger  remove_row">delete</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="col-lg-3 col-form-label">Quiz
                                                Name</label>
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                            <label class="col-lg-3 col-form-label">Answer
                                            </label>
                                            <input id="answer" name="answer[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
                                        <br>
                                        <div class="col-md-3">
                                            <input id="check1" name="check1[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check2" name="check2[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check3" name="check3[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check4" name="check4[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
                                        <br>
                                        <div class="col-md-8">
                                            <button onclick="deleterow()" class="btn btn-danger  remove_row">delete</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="col-lg-3 col-form-label">Quiz
                                                Name</label>
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                            <label class="col-lg-3 col-form-label">Answer
                                            </label>
                                            <input id="answer" name="answer[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
                                        <br>
                                        <div class="col-md-3">
                                            <input id="check1" name="check1[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check2" name="check2[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check3" name="check3[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check4" name="check4[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
                                        <br>
                                        <div class="col-md-8">
                                            <button onclick="deleterow()" class="btn btn-danger  remove_row">delete</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-11">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label class="col-lg-3 col-form-label">Quiz
                                                Name</label>
                                            <input id="qusationn" name="qusationn[]" type="text" class="form-control"  placeholder="qusation">
                                            <label class="col-lg-3 col-form-label">Answer
                                            </label>
                                            <input id="answer" name="answer[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
                                        <br>
                                        <div class="col-md-3">
                                            <input id="check1" name="check1[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check2" name="check2[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check3" name="check3[]" type="text" class="form-control"  placeholder="qusation">
                                            <input id="check4" name="check4[]" type="text" class="form-control"  placeholder="qusation">

                                        </div>
                                        <br>
                                        <div class="col-md-8">
                                            <button onclick="deleteroww()" class="btn btn-danger  remove_roww">delete</button>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="submit"
                                    {{--                                        onclick="addtruefalse({{$quiz->id}})"--}}
                                    class="btn btn-primary">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="deleteqize{{$quiz->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete the quizze {{$quiz->name}} with all the courses above it?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form data-action="{{route('quizze.destroy',$quiz->id)}}" method="post" id="formquize">
                        <button type="button" class="btn btn-primary"  onclick="DestroyQuiz({{$quiz->id}})">Sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endforeach

