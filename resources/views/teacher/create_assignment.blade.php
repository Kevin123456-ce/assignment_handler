<!DOCTYPE html>
<html>
<title>Assignment Page</title>
<head>Assignment Home Page</head>
<body>
    <form action="/create_assignment/{{$id}}" method="post" enctype="multipart/form-data">
    @csrf
        <input type="file" name="assignment_file"><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>