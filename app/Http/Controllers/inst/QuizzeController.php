<?php

namespace App\Http\Controllers\inst;

use App\Http\Controllers\Controller;
use App\Models\check;
use App\Models\Quizze;
use App\Models\Section;
use App\Models\truefalse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuizzeController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name'=>'required',
            'time'=>'int|max:100',
            'course_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\Course,id'
                ],
            'section_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\Section,id'
                ],

        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        $data=$request->except('_token');
        $sec= Quizze::create($data);
        if ($sec) {
            $massage=Quizze::where('course_id',$request->course_id)->get();
            return view('coach.Course.inclodeQuizze', compact('massage'))->render();

        }else{
            return response()->json([
                'message' => $sec ? "Created Successfully" : "Failed to Create"
            ], $sec ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        }

    }
    public function destroy(Request $request)
    {
        $sec=Quizze::destroy($request->id);
        return response()->json([
            'message' => $sec ? "Deleted Successfully" : "Failed to Deleted"
        ]);
    }
    public function truefalse(Request $request,$id)
    {
        $validator = Validator($request->all(), [
            'qusationn' => ['required',],
            'answer' => ['required',],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
            toastr()->success($validator->getMessageBag()->first(), 'Quizee');
            return redirect()->back()->with('quize','quize');
        }

        $i = 0;
        foreach ($request->answer as $item) {
            truefalse::create([
                'qusation' => $request->qusationn[$i],
                'answre' => $request->answer[$i],
                'quizze_id' => $id,

            ]);
            $i++;
        }
        toastr()->success('Data has been saved successfully!', 'Quizee');
        return redirect()->back()->with('quize','quize');
//        return response()->json([
//            'message' => 'tt'
//        ]);
    }
    public function check(Request $request,$id)
    {
        $validator = Validator($request->all(), [
            'qusationn' => ['required',],
            'check1' => ['required',],
            'check2' => ['required',],
            'check3' => ['required',],
            'check4' => ['required',],
            'answer' => ['required',],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
            toastr()->success($validator->getMessageBag()->first(), 'Quizee');
            return redirect()->back()->with('quize','quize');
        }

        $i = 0;
        foreach ($request->answer as $item) {
            check::create([
                'name' => $request->qusationn[$i],
                'check1' => $request->check1[$i],
                'check2' => $request->check2[$i],
                'check3' => $request->check3[$i],
                'check4' => $request->check4[$i],
                'answer' => $request->answer[$i],
                'quizze_id' => $id,

            ]);
            $i++;
        }
        toastr()->success('Data has been saved successfully!', 'Quizee');
        return redirect()->back()->with('quize','quize');
//        return response()->json([
//            'message' => 'tt'
//        ]);
    }
    public function show($id){
        $quize=Quizze::findOrFail($id);
        $sections=Section::select(['section_name','id'])->get();
        $quize->with('check')->with('truefalse')->get();
        return view('coach.Course.view-quize',compact('quize','sections'));
    }
    public function update(Request $request,$id){
        $validator = Validator($request->all(),[
            'name'=>'required',
            'time'=>'int|max:100',
            'section_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\Section,id'
                ],

        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        $quize=Quizze::findOrFail($id);
        $quize->update($request->all());
        return response()->json([
            'message' => $quize
        ]);    }
    public function deletetruefalse(Request $request,)
    {

        $sec=truefalse::destroy($request->id);

        if($sec){
        return response()->json([
            'message' => 'true'
        ]);
        }

    }
    public function edittruefalse(Request $request,)
    {

        $validator = Validator($request->all(), [
            'qusation' => ['required',],
            'answer' => ['required',],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
      $trusefalse=truefalse::findOrFail($request->id);

            $trusefalse->update([
                'qusation' => $request->qusation,
                'answre' => $request->answer,
            ]);
        return response()->json([
            'message' => $trusefalse
        ]);
    }
    public function deletecheck(Request $request,)
    {

        $sec=check::destroy($request->id);

        if($sec){
            return response()->json([
                'message' => 'true'
            ]);
        }

    }
    public function editcheck(Request $request,)
    {

        $validator = Validator($request->all(), [
            'name' => ['required',],
            'answer' => ['required',],
            'check1' => ['required',],
            'check2' => ['required',],
            'check3' => ['required',],
            'check4' => ['required',],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        $check=check::findOrFail($request->id);

        $check->update([
            'name' => $request->name,
            'answer' => $request->answer,

            'check1' => $request->check1,

            'check2' => $request->check2,

            'check3' => $request->check3,

            'check4' => $request->check4,
        ]);
        return response()->json([
            'message' => $check
        ]);
    }


}
