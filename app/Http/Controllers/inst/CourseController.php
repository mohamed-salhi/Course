<?php

namespace App\Http\Controllers\inst;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $Course=Course::latest()->paginate(20);
        return view('coach.Course.index',compact('Course','categories'));

    }
    public function create()
    {
        $categories = Category::all();
        return view('coach.Course.add',compact('categories'));

    }
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name' => 'required|string',
            'detail' => 'required|string',
            'imagee' => 'required',
            'price'=> 'required|integer',
//            'instructor_id' =>
//                [
//                    'required',
//                    'integer',
//                    'exists:user,id'],

            'category_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\Category,id'
                ],
        ]);

        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Course');
            return redirect()->route('Course.index');
        }
        $imagename='course'.rand().time().$request->file('imagee')->getClientOriginalName();
        $request->file('imagee')->move(public_path('upload/images/courses'),$imagename);
        $request->merge([
            'photo'=>$imagename,
            'instructor_id'=>auth('web')->user()->id
        ]);

        Course::create($request->except('imagee'));
        toastr()->success('Data has been saved successfully!', 'Course');
        return redirect()->route('Course.index');

    }
    public function show($id)
    {
       $user=User::select(['name','id'])->get();
        $course=Course::where('id',$id)->with('category')->with('section')->first();
        $categories=Category::all();
        return view('coach.Course.view-course',compact('course','categories','user'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'name' => 'required|string',
            'detail' => 'required|string',
            'imagee' => 'nullable',
            'price'=> 'required|integer',
//            'instructor_id' =>
//                [
//                    'required',
//                    'integer',
//                    'exists:App\Models\User,id'
//                ],

            'category_id' =>
                [
                    'required',
                    'integer',
                    'exists:App\Models\Category,id'
                ],
        ]);
        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Course');
            return redirect()->route('Course.index');
        }
        $course=Course::findOrFail($id);
        $imagename=$course->photo;
        if($request->hasFile('imagee')){
            File::delete(public_path('upload/images/courses/'.$course->image));
            $imagename='course'.rand().time().$request->file('imagee')->getClientOriginalName();
            $request->file('imagee')->move(public_path('upload/images/courses'),$imagename);
        }

        $request->merge([
            'photo'=>$imagename,
            'instructor_id'=>auth('web')->user()->id

        ]);
        if(!$request->has('status')){
            $request->merge([
                'status'=>'Inactive'
            ]);
        }

        $course->update($request->except('imagee'));
        toastr()->success('Data has been saved successfully!', 'Course');
        return redirect()->route('Course.index');
    }
    public function destroy($id)
    {
        $Course=Course::findOrFail($id);
        if ($Course){
            File::delete(public_path('upload/images/courses/'.$Course->image));
            $Course->delete();
            toastr()->success('Data has been Deleted successfully!', 'Course');
            return redirect()->route('Course.index');
        }else{
            toastr()->success('Data has been Deleted Faild!', 'Course');
            return redirect()->route('Course.index');
        }
    }
}
