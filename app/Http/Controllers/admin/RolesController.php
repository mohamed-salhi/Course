<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class RolesController extends Controller
{
   public function index(){

       $role=Role::all();
       return view('admin.role.index',compact('role'));
   }
    public function create(){


        return view('admin.role.add',[
            'role'=>new Role(),
        ]);
    }
    public function store(Request $request){
        $validator=  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'abilities' => 'required|array',

        ]);
        if ($validator->fails()){
            toastr()->error($validator->getMessageBag()->first(), 'Admin');
            return redirect()->route('admin.index');
        }
        Role::createWithAbilities($request);
        toastr()->success('Data has been ADD successfully!', 'Roles');

        return redirect()
            ->route('role.index');
   }
    public function edit(Role $role){

        $role_abilities = $role->abilities()->pluck('type', 'ablity')->toArray();
        return view('admin.role.edit',compact('role','role_abilities'));

    }
    public function update(Request $request,Role $role){
        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'required|array',
        ]);
        $role->updateWithAbilities($request);
        return redirect()
            ->route('role.index');    }
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()
            ->route('role.index');

    }
}
