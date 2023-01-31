<?php

namespace App\Http\Controllers\inst;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'user_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\User,id'
                ],
              'course_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\Course,id'
                ],

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }


            $student= Student::updateOrCreate($request->except('_token'));
            if ($student) {
                $massage=Student::where('course_id',$request->course_id)->get();
                return view('coach.Course.inclodeStudent', compact('massage'))->render();

            }else{
                return response()->json([
                    'message' => $student ? "Created Successfully" : "Failed to Create"
                ], $student ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
            }









    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
