<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ReqestRnstructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequstInstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requstinst()
    {
        $id=Auth::guard('web')->user()->id;
        ReqestRnstructor::updateOrCreate([
           'user_id'=>$id
        ]);
       return redirect()->route('user');
    }


}
