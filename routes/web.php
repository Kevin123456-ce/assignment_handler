<?php

use Illuminate\Support\Facades\Route;
use App\Models\class_details;
use App\Models\assignment_details;
use App\Models\user_class_details;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/teacher_home',function()
{   
    $user_id=auth()->user()->id;
    $clsses=class_details::all()->where('user_id',$user_id);
    $clsses2=user_class_details::all()->where('user_id',$user_id);
    $array;
    $count=0;
    foreach($clsses as $c)
    {
        $array[$count]=$c;
        $count++;
    }
    foreach($clsses2 as $c)
    {
        $temp=class_details::all()->where('id',$c->class_code);
        foreach($temp as $t)
        {
            $array[$count]=$t;
            $count++;
        }
        
    }
    return view('home/view_class')->with('classes',$array);
});
Route::get('/create_class',function()
{
    return view('home/create_class');
});
Route::post('/create_class',function()
{
    $clss=new class_details;
    $clss->class_name=request('name');
    $clss->class_description=request('description');
    $clss->user_id=auth()->user()->id;
    $clss->participants=1;
    $clss->save();
    return redirect('/teacher_home');
});
Route::get('/class_home/{slug}',function()
{
    $id=request('slug');
    $assigmets=assignment_Details::all()->where('id', $id);
    $c = class_details::where(['id'=>$id])->get();
    return view('home/class_home')->with('ass',$assigmets)->with('class',$c['0']);
});
Route::get('/create_assignment/{slug}',function()
{
    $id=request('slug');
    return view('home/create_assignment')->with('id',$id);
});
Route::get('/join_class',function()
{
    return view('home/joinClass');
});
Route::post('/join_class',function()
{
    $cls_code=request('code');
    $user_id=auth()->user()->id;
    $cls=class_details::where('id',$cls_code)->get();
    if(isset($cls))
    {
        $alred=user_class_details::where('user_id',$user_id)->where('class_code',$cls_code)->get();
        if(isset($alred))
        {
            $clss=new user_class_details;
            $clss->user_id=auth()->user()->id;
            $clss->class_code=$cls_code;
            $clss->save();   
            
        }
        return redirect('teacher_home');
    }
    else{
        return redirect('join_class');
        
    }
    
});
Route::post('/create_assignment/{slug}',function()
{
    $ass=new assignment_details;
    $file=request('assignment_file');
    if($file!=null){
        $file_name=$file->getClientOriginalName();
        $file->move('upload_files',$file_name);
        $ass->assignment_file=$file_name;
    } 
    $ass->class_code=request('slug');
    $ass->assignment_title = request('title');
    $ass->assignment_description = request('description');
    $ass->due_Date=request('due_Date');
    $ass->save();
    return redirect('/teacher_home');
});
Route::get('/show_assignment/{slug}',function()
{
    $code=request('slug');
    $assigmets=assignment_Details::all()->where('class_code', $code);
    return view('home/show_assignment')->with('ass',$assigmets);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('teacher_home');
})->name('dashboard');
Route::get('/logout',function()
{
    session()->flush();
    auth()->logout();
    return redirect('/');
}
);
// Route::get('sendbasicemail','MailController@basic_email');
Route::post('/invite/{slug}',function()
{
    $emails=request('invite_email');
    $data = array('code'=>request('slug'));
    Mail::send('mail',$data,function($message) use ($emails){
        $message->to($emails)->subject
           ('You are invited to join the class ');
        $message->from('bkevin6566@gmail.com','class Invitation');
     });
     echo "Basic Email Sent. Check your inbox.";
     return ;
}
);
