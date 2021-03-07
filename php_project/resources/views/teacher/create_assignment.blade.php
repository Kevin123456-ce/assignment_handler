<!DOCTYPE html>
<html>
<title>Assignment Page</title>
<head ><p style="margin-left: 700px; margin-top: 50px;"><strong>Create Assignment</strong></p>
<style>
.fd{
    margin-left: 500px;
    margin-top: 100px;
}
</style>
</head>
<body>
    <form action="/create_assignment/{{$id}}" method="post" enctype="multipart/form-data" class="fd">
    @csrf
    <table border="1px solid">
    <tr>
    <th>Enter Assignment Title</th><td> <input type="text" name="title" style="width: 350px;"></td>
    </tr>
    <tr>
    <th>Enter Assignment Description</th><td> <input type="text" name="description" style="width: 350px;"></td>
    </tr>
    <tr>
    <th>Enter Assignment Title</th><td> <input type="file" name="assignment_file"></td>
    </tr>
    <tr>
    <th colspan="2"> <input type="submit" value="Create"></th>
    </tr>
    </table>
    </form>
</body>
</html>