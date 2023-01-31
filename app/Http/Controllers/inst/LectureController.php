<?php

namespace App\Http\Controllers\inst;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LectureController extends Controller
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
        $validator = Validator::make($request->all(), [
            'lecture_name' => 'required|string',
            'section_id' => 'required',
            'videoo' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
//            return response()->json([
//                'message' => $validator->getMessageBag()->first()
//            ]);
            toastr()->success($validator->getMessageBag()->first(), 'Lecture');
            return redirect()->back()->with('lecture','lecture');
        } else {
            if ($video = $request->file('videoo')) {
                $newfile =  Str::random(5) . '.' . $video->getClientOriginalName();
                $Path = 'upload/images/lecture/video';
                $video->move($Path, $newfile);
                $getID3 = new \getID3;
                $video_file = $getID3->analyze($Path.'/'.$newfile);
// Get the duration in string, e.g.: 4:37 (minutes:seconds)
                $duration_string = $video_file['playtime_string'];
                $arr0 = str_split($duration_string);

                if (count($arr0)==3||count($arr0)==4){
                    $request->merge([
                        'hours'=>'0:'.$duration_string
                    ]);
                }else{
                    $request->merge([
                        'hours'=>$duration_string
                    ]);
                }
                $request->merge([
                    'video'=>$newfile
                ]);
            }


// Get the duration in seconds, e.g.: 277 (seconds)
//            $duration_seconds = $video_file['playtime_seconds'];
            $course =  Lecture::create($request->except('videoo'));
//            return response()->json([
//                'message' => $course ? "Created Successfully" : "Failed to Create"
//            ]);
            toastr()->success('Data has been Updated successfully!', 'Lecture');

            return redirect()->back()->with('lecture','lecture');
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
        $validator = Validator::make($request->all(), [
            'lecture_name' => 'required|string',
            'section_id' => 'required',
            'videoo' => 'nullable',
            'description' => 'required',
            'status'=>'nullable'
        ]);
        if ($validator->fails()) {
            toastr()->success($validator->getMessageBag()->first(), 'Lecture');
            return redirect()->back()->with('lecture','lecture');
        } else {

            $lecture=Lecture::findOrFail($id);
            $videooo=$lecture->video;
            if ($request->hasFile('videoo')) {
                $newfile =  Str::random(5) . '.' . $request->file('videoo')->getClientOriginalName();
                $Path = 'upload/images/lecture/video';
                $request->file('videoo')->move($Path, $newfile);
                $getID3 = new \getID3;
                $video_file = $getID3->analyze($Path.'/'.$newfile);
// Get the duration in string, e.g.: 4:37 (minutes:seconds)
                $duration_string = $video_file['playtime_string'];
                $arr0 = str_split($duration_string);

                if (count($arr0)==3||count($arr0)==4){
                    $request->merge([
                        'hours'=>'0:'.$duration_string
                    ]);
                }else{
                    $request->merge([
                        'hours'=>$duration_string
                    ]);
                }
                $request->merge([
                    'video'=>$newfile
                ]);
            }
            $request->merge([
                'video'=>$videooo
            ]);
            $lecture->update($request->except('videoo'));
            toastr()->success("add successfully", 'Lecture');
            return redirect()->back()->with('lecture','lecture');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $lect= Lecture::findOrFail($request->id);
        File::delete(public_path('upload/images/lecture/video/'.$lect->video));
        $lect->delete();
//        return response()->json([
//                'message' => $course ? "Created Successfully" : "Failed to Create"
//            ]);
//        toastr()->success('Data has been Deleted successfully!', 'Lecture');
//        return redirect()->back();

    }
}
