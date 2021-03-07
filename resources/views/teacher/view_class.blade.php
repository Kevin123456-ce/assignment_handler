<!DOCTYPE html>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<html lang="en">
<style>
    a{
      float: right;
      color: #f2f2f2;
      margin-right: 10px;
    }
    a:hover{
      background-color: #ddd;
      color: black
    }
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
            background-image: url("{{ asset('bg1.jfif') }}");
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
        .classes{
            display: inline-block;
            padding-right: 50px;
            padding-bottom: 50px;
            margin-top: 50px;
            width: 330px;
            height: 200px;
        }
        .temp
        {
            margin-top: 5px;
        }
        img{
            border-radius: 15px;
            width: 328px;
            height: 130px;
            
        }
        a{
           border: 1px;
           text-decoration: none;
           color: blue;
           
        }
        a:hover{
            color: white;
            background-color: black;
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
        <p style="border: 2px solid grey; border-radius:15px; height:250px;"><img src="{{ asset('class_bg.jfif')}}"><br>
            Class Name:-<strong>{{$cls->class_name}}</strong></br>
           Class Code:-<strong>{{$cls->class_code}}</strong><br><br><br><a href="class_home/{{$cls->class_code}}" style="margin-left: 100px;">Open</a></p></div>
        @endforeach
    </div>
  </div>
    </body>
</html>