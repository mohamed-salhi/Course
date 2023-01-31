@foreach ($massage as $student)
    <tr>
        <td>{{ $loop->index+1 }}</td>
        <td>
            {{--                                                                                                    <h2 class="table-avatar">--}}
            {{--                                                                                                        <a href="{{ route('student.show', $student->user->id) }}"--}}
            {{--                                                                                                           class="avatar"> <img width="100%"--}}
            {{--                                                                                                                                height="100%"--}}
            {{--                                                                                                                                src="{{ asset('requirement/uploads/photo/' . $student->user->photo) }}"></a>--}}
            {{--                                                                                                        <a href="{{ route('student.show', $student->user->id) }}"--}}
            {{--                                                                                                           style="text-transform: capitalize;font-weight: 600">--}}
            {{--                                                                                                            <label for=""class="name_en"--}}
            {{--                                                                                                                   style="cursor: pointer">{{ $student->user->name_en }}</label>--}}
            {{--                                                                                                            <span--}}
            {{--                                                                                                                style="font-weight: 600">Student</span></a>--}}
            {{--                                                                                                    </h2>--}}
            {{$student->user->name}}
        </td>

        <td><i class="las la-calendar"></i> <span
                class="date">{{ $student->created_at->isoFormat('LLLL') }}</span>
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
                                data-bs-target="#editsection{{$student->id}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Edit</span>
                        </button>
                        <button class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#delete{{$student->id}}">
                            <i data-feather="edit-2" class="mr-50"></i>
                            <span>Delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </td>
        <td hidden>
                                                                                                        <span
                                                                                                            class="address">{{ $student->user->address }}</span>
        </td>
        {{--                                                                                                <td hidden>--}}
        {{--                                                                                                        <span--}}
        {{--                                                                                                            class="code">{{ $student->user->code }}</span>--}}
        {{--                                                                                                </td>--}}
        {{--                                                                                                <td hidden>--}}
        {{--                                                                                                        <span--}}
        {{--                                                                                                            class="phone">{{ $student->user->phone_number }}</span>--}}
        {{--                                                                                                </td>--}}
        <td hidden>
                                                                                                        <span
                                                                                                            class="email">{{ $student->user->email }}</span>
        </td>
    </tr>
@endforeach


