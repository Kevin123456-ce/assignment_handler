<!DOCTYPE html>
<html>
<title>Class Page</title>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<style>
img{
    width:700px;
    margin-top: 50px;
    height: 200px;
    margin-left: auto;
    margin-right: auto;
    display: block;
    border-radius: 15px;
}
.container{
  position: relative;
  text-align: center;
}
.top-left{
  position: absolute;
  top: 12px;
  left: 450px;
  font-size: 25px;
}
.assignments{
    margin-top: 30px;
    border: 1px solid;
    border-radius: 15px;
    margin-right: 500px;
}
.temp
{
    margin-top: 5px;
    margin-left: 520px;
}
</style>
<button onclick="location.href='/create_assignment/{{$class->class_code}}'" style="margin-left: 1250px; border-radius=15px;" ><i class="fa fa-plus-circle" >Create Assignment</i></button>
</head>
<body>
</br>
<div class="container">
<img src="{{ asset('bg3.jfif')}}">
<div class="top-left"><strong>{{$class->class_name}}</strong></div>
</div>
<div class="temp">
 @if (!$ass->isEmpty())
    @foreach($ass as $a)
    <div class="assignments">
        <strong><p style="font-size: 15px;"><i class="fas fa-star"></i> {{$a->assignment_title}}</strong></br></p>
        <p style="padding-left: 15px;">@if (isset($a->assignment_description)) 
        {{$a->assignment_description}}</br>
        @endif</p>
        <p>
        @if(isset($a->assignment_file))
            click here to download assignment file<br>
            <?php $file_name='upload_files/'.$a->assignment_file ?>
            <a href="{{asset($file_name)}}" download>
                click
            </a>
            </p>
        @endif
    </div>
    @endforeach
@else
  <p style="margin-left: 180px; margin-top: 20px;"><strong>No assignment yet!!</strong></p>
@endif
  </div>
</body>
</html>