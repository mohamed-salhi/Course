<?php

namespace App\Http\Controllers\inst;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SectionController extends Controller
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
            'section_name'=>'required',
            'course_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\Course,id'
                ],


        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        $data=$request->except('_token');
       $sec= Section::create($data);
       if ($sec) {
           $massage=Section::where('course_id',$request->course_id)->get();
           return view('coach.Course.inclodeSection', compact('massage'))->render();

       }else{
           return response()->json([
               'message' => $sec ? "Created Successfully" : "Failed to Create"
           ], $sec ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
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
    public function updatee(Request $request)
    {
        $validator = Validator($request->all(),[
            'section_name'=>'required',
            'course_id' =>
                [
                    'required',
                    'integer',
                    'in:0,1',
                    'exists:App\Models\Course,id'
                ],


        ]);
        if ($validator->fails()){

            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        $section=Section::findOrFail($request->id);
        $section->update([
            'section_name'=>$request->section_name
        ]);

            return response()->json([
                'message' => $section ? "Updated Successfully" : "Failed to Update"
            ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletee(Request $request)
    {
        $sec=Section::destroy($request->id);
        return response()->json([
            'message' => $sec ? "Deleted Successfully" : "Failed to Deleted"
        ]);
    }
}
