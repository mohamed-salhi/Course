<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\acceptinst;
use App\Models\Admin;
use App\Models\ReqestRnstructor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $admins=Admin::all();
       return view('admin.admins',compact('admins'));

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

        $validator=  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('admins','email'),
            ],
            'phone' => [
                'required',
                'int',
                Rule::unique('admins','phone'),
            ],
            'password' =>['required', 'string', new Password, 'confirmed'],

        ]);
        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Admin');
            return redirect()->route('admin.index');
        }
         Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        toastr()->success('Data has been ADD successfully!', 'Admin');

        return redirect()->route('admin.index');
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
        $admin=Admin::findOrFail($id);
        $validator=  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('admins','email')->ignore($admin->id),
            ],
            'phone' => [
                'required',
                'int',
                Rule::unique('admins','phone')->ignore($admin->id),
            ],
            'status'=>'nullable'

        ]);
        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Admin');
            return redirect()->route('admin.index');
        }
if(!$request->has('status')){
    $request->merge([
        'status'=>'Inactive'
    ]);
}


        $admin->update($request->all());
        toastr()->success('Data has been Updated successfully!', 'Admin');

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        toastr()->success('Data has been Deleted successfully!', 'Admin');

        return redirect()->route('admin.index');

    }
    public function requstinst()
    {
        $user=ReqestRnstructor::with('User')->get();
        return view('admin.requstinst',compact('user'));
    }
    public function Accept(Request $request)
    {
        $user=User::findOrFail($request->id);
 Mail::to($user->email)->send(new acceptinst($user->name,'تم قبول طلبك'));
          $user->update([
      'instructors'=>'1'
   ]);
  ReqestRnstructor::where('user_id',$request->id)->delete();
    }
    public function Cancel(Request $request)
    {
        $user=User::findOrFail($request->id);

        Mail::to($user->email)->send(new acceptinst($user->name,'تم رفض طلبك'));

        ReqestRnstructor::where('user_id',$request->id)->delete();
    }
}
