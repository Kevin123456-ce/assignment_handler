<!DOCTYPE html>
<html>
<title>Class Page</title>
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<style>
.ass-link{
  text-decoration: none;
}
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
  left: 525px;
  font-size: 25px;
}
.assignments{
    margin-top: 30px;
    border: 1px solid;
    border-radius: 5px;
    margin-right: 500px;
    padding: 12px;
}
.temp
{
    margin-top: 5px;
    margin-left: 520px;
}
.topnav {
  overflow: hidden;
  background-color: #333;
  float: right;
  margin-right: 25px;
  margin-top: 25px;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<div class="topnav">
  <a class="active" href="teacher_home">Home</a>
  <a href="/create_assignment/{{$class->id}}">Create Assignment</a>
  <a href="/logout">Log Out</a>
</div>
</br></br></br>
</br>
<div class="container">
<img src="{{ asset('bg3.jfif')}}">
<div class="top-left"><strong>{{$class->class_name}}</strong></div>
</div>
<form action="/invite/{{$class->id}}" method='post'>
  @csrf
  <input type="text" name="invite_email" placeholder="Enter User's Email address..." style="margin-top:15px; margin-left:535px;width: 300px;">
  <input type="submit" value="invite" align="center">
</form>
<div class="temp">
 @if (!$ass->isEmpty())
    @foreach($ass as $a)
    <div class="assignments">
        <strong><p style="font-size: 15px;"><i class="fas fa-star" style="margin-right: 15px;"></i>{{$author->name}} has posted new Announcement: <a href='/assignment/{{$a->id}}' class="ass-link">{{$a->assignment_title}}</a></strong></br></p>
        <p style="padding-left: 15px;">
        <p>
    </div>
    @endforeach
@else
  <p style="margin-left: 180px; margin-top: 20px;"><strong>No assignment yet!!</strong></p>
@endif
  </div>
</body>
</html>