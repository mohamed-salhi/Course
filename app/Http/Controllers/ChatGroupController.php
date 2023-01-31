<?php

namespace App\Http\Controllers;

use App\Events\chat;
use App\Models\ChatAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ChatGroupController extends Controller
{
   public function index(Request $request){
       Gate::authorize('chat.view');
       $message=ChatAdmin::orderBy('id','desc')->paginate(20);

       $data = '';
       if ($request->ajax()) {

           for($i=19;$i>=0;$i--) {
if ($message[$i]->admin->id!=Auth::id()){
    $data.='  <li class="d-flex justify-content-between mb-4">
                                                <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="fw-bold mb-0"> '.$message[$i]->admin->name.'</p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i>'. $message[$i]->created_at->diffForHumans().'</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                            '.$message[$i]->message.'
                                                        </p>
                                                    </div>
                                                </div>
                                                <img src="http://127.0.0.1:8000/upload/images/admin/'.$message[$i]->admin->image.'" alt="avatar"
                                                     class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                            </li>';
}else{
    $data.='  <li class="d-flex justify-content-between mb-4">
   <img src="http://127.0.0.1:8000/upload/images/admin/'.$message[$i]->admin->image.'" alt="avatar"
                                                     class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                                                <div class="card w-100">
                                                    <div class="card-header d-flex justify-content-between p-3">
                                                        <p class="fw-bold mb-0"> '.$message[$i]->admin->name.'</p>
                                                        <p class="text-muted small mb-0"><i class="far fa-clock"></i>'. $message[$i]->created_at->diffForHumans().'</p>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="mb-0">
                                                            '.$message[$i]->message.'
                                                        </p>
                                                    </div>
                                                </div>

                                            </li>';
}

}


           return $data;
       }
       return view('admin.Chat.index',compact('message'));
   }

    public function massage(Request $request){
        Gate::authorize('chat.view');
        $validator = Validator($request->all(),[
            'message' =>
                [
                    'required',
                ],
        ]);
        if ($validator->fails()){
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
       $message= ChatAdmin::create([
            'message' =>$request->message,
            'admin_id'=>Auth::id()
        ]);
        event(new chat($message));
//        return view('admin.Chat.index');


    }
    public function loadMore(Request $request)
    {
        $users = User::paginate(5);
        $data = '';
        if ($request->ajax()) {
            foreach ($users as $user) {
                $data.='<li>'.'Name:'.' <strong>'.$user->name.'</strong><br> Email: '.$user->email.'</li>';
			}
            return $data;
        }

        return view('user',compact('users'));
    }

}
