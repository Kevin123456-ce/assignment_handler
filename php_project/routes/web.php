<?php

use Illuminate\Support\Facades\Route;
use App\Models\class_details;
use App\Models\assignment_details;
use Illuminate\Support\Facades\DB;
use App\Models\user_class_details;

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
Route::get('/home',function()
{   
    $create=class_details::all()->where('user_id',auth()->user()->id);
    $join = user_class_details::all()->where('user_id',auth()->user()->id);
    $array;
    $count=0;
    foreach($create as $c){
        $array[$count]=$c;
        $count++;
    }
    foreach($join as $j)
    {
        $cls = class_details::all()->where('id',$j->class_code);
        foreach($cls as $t)
        {
            $array[$count]=$t;
            $count++;
        }
    }
    if(isset($array))
        return view('home/view_class')->with('classes',$array);
    else
        return view('home/view_class');
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
    return redirect('/home');
});
Route::get('/class_home/{slug}',function()
{
    $id=request('slug');
    $assigmets=assignment_Details::all()->where('class_code', $id);
    $c = class_details::where(['id'=>$id])->get();
    return view('home/class_home')->with('ass',$assigmets)->with('class',$c['0']);
   # return view('teacher/class_home')->with('id',$id);
});
Route::get('/create_assignment/{slug}',function()
{
    $id=request('slug');
    return view('home/create_assignment')->with('id',$id);
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
    $ass->due_Date = request('due_Date');
    $ass->class_code=request('slug');
    $ass->assignment_title = request('title');
    $ass->assignment_description = request('description');
    $ass->save();
    return redirect('/home');
});
Route::get('/show_assignment/{slug}',function()
{
    $code=request('slug');
    $assigmets=assignment_Details::all()->where('class_code', $code);
    return view('home/class_home')->with('ass',$assigmets);
});
Route::get('/join_class',function()
{
    return view('home/joinClass');
});

Route::post('/join_class',function(){
    $cls_code=request('class_code');
    $user_id=auth()->user()->id;
    $cls=class_details::where('id',$cls_code)->where('user_id','!=',$user_id)->get();
    if(isset($cls['0']))
    {
        $alred=user_class_details::where('user_id',$user_id)->where('class_code',$cls_code)->get();
        if(!sizeof($alred))
        {
            $clss=new user_class_details;
            $clss->user_id=auth()->user()->id;
            $clss->class_code=$cls_code;
            $clss->save();     
        }
        return redirect('/home');
    }
    else{
        return redirect('/join_class')->withErrors(['Please Provide correct class code']);
    }
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/home');
})->name('dashboard');

Route::get('/logout',function()
{
    session()->flush();
    auth()->logout();
    return redirect('/');
}
);
Route::post('/invite/{slug}',function()
{
    $emails=request('invite_email');
    $data = array('code'=>request('slug'));
    Mail::send('mail',$data,function($message) use ($emails){
        $message->to($emails)->subject
           ('You are invited to join the class ');
        $message->from('jaydevbambhaniya45@gmail.com','class Invitation');
     });
     echo "Basic Email Sent. Check your inbox.";
     return ;
}
);