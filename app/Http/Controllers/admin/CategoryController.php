<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //allows <> denise
//        if (Gate::denies('category.view')){
//            abort(403);
//        }
        //نفس الشي
        Gate::authorize('category.view');

        $category=Category::latest()->paginate(20);
        return view('admin.Category.index',compact('category'));

    }


    public function create()
    {
        return view('admin.Category.add');    }

    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'imagee'=>'required|image',
            'name'=>'required',
            'dest'=>'required',


        ]);
        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Category');
            return redirect()->route('Category.index');
        }
        $imagename='category'.rand().time().$request->file('imagee')->getClientOriginalName();
        $request->file('imagee')->move(public_path('upload/images/category'),$imagename);

        $request->merge([
            'image'=>$imagename
        ]);
        $data=$request->except('imagee');
        Category::create($data);
        toastr()->success('Data has been saved successfully!', 'Category');
        return redirect()->route('Category.index');



    }


    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(),[
            'imagee'=>'nullable|image',
            'name'=>'required',
            'dest'=>'required',
        ]);
        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Category');
            return redirect()->route('Category.index');
        }

        $Category=Category::findOrFail($id);
        $imagename=$Category->image;
        if($request->hasFile('imagee')){
            File::delete(public_path('upload/images/category/'.$Category->image));
            $imagename='category'.rand().time().$request->file('imagee')->getClientOriginalName();
            $request->file('imagee')->move(public_path('upload/images/category'),$imagename);
        }

        $request->merge([
            'image'=>$imagename
        ]);
        $data=$request->except('imagee');
        $Category->update($data);
        toastr()->success('Data has been updated successfully!', 'Category');
        return redirect()->route('Category.index');
    }
    public function destroy($id)
    {
        $Category=Category::findOrFail($id);
        if ($Category){
            File::delete(public_path('upload/images/category/'.$Category->image));
            $Category->delete();
            toastr()->success('Data has been Deleted successfully!', 'Category');
            return redirect()->route('Category.index');
        }else{
            toastr()->success('Data has been Deleted Faild!', 'Category');
            return redirect()->route('Category.index');
        }

    }
}
