<!DOCTYPE html>
<style>
    table{
        margin-top: 100px;
    }
    body{
            background-color:white;
            background-image: url("{{ asset('bg2.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
    }
    input,button{
        border-radius: 15px;
        border-color: black;
    }
    textarea{
        border-radius: 15px;
        border-color: black;
    }
    tr{
        height: 40px;
    }
</style>
<html>
<title>create class Page</title>
<head><h1 align="center">Enter Class Details:</h1></head>
<body >
    
    <form action="/create_class" method="POST">
        @csrf
        
    <table align="center" style="border: 2px solid black; border-radius:15px; height:250px;"  >
        <tr >
            <td >
                <strong><font size=5>Class Name:</font></strong>
            </td>
            <td>
                <input type="text" name="name" maxlength="20">
            </td>
        </tr>
        <tr>
            <td >
                <strong><font size=5>Class Description:</font></strong>
            </td>
            <td>
                <textarea name="description"></textarea>
            </td>
        </tr>
        <tr >
            <td colspan="2" align="center"><input type="submit" value="Create" ></td>
            
        </tr>
    </table>
</form>

<button onclick="location.href='/teacher_home'" style="margin-left:735px; margin-top:10px;border-radius=15px;" ><i class="fa fa-cancle" >Home</i></button>
</body>
</html>