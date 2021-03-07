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
            width: 500px;
            height: 20px;
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

    @foreach($ass as $a)
    <div class="classes">
        <p style="border: 2px solid grey; border-radius:15px; height:80px;"><br>
            click here to download assignment_file<br>
            <?php $file_name='upload_files/'.$a->assignment_file ?>
            <a href="{{asset($file_name)}}" download>
                click
            </a>
        @endforeach
    </div>
  </div>
    </body>
</html>