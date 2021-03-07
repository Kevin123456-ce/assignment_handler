<!DOCTYPE html>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<html lang="en">
<style>
    button{
        border-radius: 15px;
        border-color: black;
    }
    .nav{
      color: black;
      float: right;
    }
    body{
            background-color:white;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
    }
block{
  background-color: lightgrey;
  width: 300px;
  border: 15px solid green;
  padding: 50px;
  margin: 20px;
}
a{
    padding-left: 300px;
    text-decoration: none;
}
a:hover{
    text-decoration: underline;
    color: black;
}
.classes{
    display: inline-block;
    margin-right: 35px;
}
.temp{
    margin-top: 30px;
}
img{
  border-radius: 15px;
  width: 376px;
  height: 130px;          
}
p{
    font-size: 18px;
    color:black;
}

    </style>
<head><button onclick="location.href='create_class'" style="margin-left: 1250px; border-radius=15px;" ><i class="fa fa-plus-circle" >Create Class</i></button></head>
<body >
</div>
<div class="temp">
    @foreach($classes as $cls)
    <div class="classes">
        <p style="border: 2px solid grey; border-radius:15px; height:250px;"><img src="{{ asset('bg3.jfif')}}"><br>
            Class Name:-<strong>{{$cls->class_name}}</strong></br>
                        {{$cls->class_description}}</br>
           Class Code:-<strong>{{$cls->class_code}}</strong><br><a href="class_home/{{$cls->class_code}}">Open</a></p></div>
        @endforeach
  </div>
    </body>
</html>