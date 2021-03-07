<?php

use Illuminate\Support\Facades\Route;
use App\Models\class_details;
use App\Models\assignment_details;
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
    $clsses=class_details::all();
    return view('teacher/view_class')->with('classes',$clsses);
});
Route::get('/create_class',function()
{
    return view('teacher/create_class');
});
Route::post('/create_class',function()
{
    $clss=new class_details;
    $clss->class_name=request('name');
    $clss->class_description=request('description');
    $clss->user_id=1234;
    $clss->participants=1;
    $clss->save();
    return redirect('/teacher_home');
});
Route::get('/class_home/{slug}',function()
{
    $id=request('slug');
    $assigmets=assignment_Details::all()->where('class_code', $id);
    $c = class_details::where(['class_code'=>$id])->get();
    return view('teacher/class_home')->with('ass',$assigmets)->with('class',$c['0']);
   # return view('teacher/class_home')->with('id',$id);
});
Route::get('/create_assignment/{slug}',function()
{
    $id=request('slug');
    return view('teacher/create_assignment')->with('id',$id);
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
    $ass->save();
    return redirect('/teacher_home');
});
Route::get('/show_assignment/{slug}',function()
{
    $code=request('slug');
    $assigmets=assignment_Details::all()->where('class_code', $code);
    return view('teacher/class_home')->with('ass',$assigmets);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
