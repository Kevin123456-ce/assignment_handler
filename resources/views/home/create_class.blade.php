<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background-color: white;
}

* {
  box-sizing: border-box;
}


.container {
  margin:auto;
  width:600px;
  background-color: white;
}


input[type=text], input[type=password],textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background:#f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}


hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.cancle{
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin-left: 545px;
  border: none;
  cursor: pointer;
  opacity: 0.9;
  width: 600px;
}
.registerbtn:hover {
  opacity: 1;
}

a {
  color: dodgerblue;
}
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="/create_class" method="post">
    @csrf
  <div class="container">
    <h1 align="center">Create Class</h1>
    <hr>

    <label for="name"><b>Class Name</b></label>
    <input type="text" placeholder="Enter Class Name.." name="name" id="name" required>

    <label for="description"><b>Class Description</b></label>
    <textarea placeholder="Enter Class Description" name="description" placeholder="Enter Class Description"></textarea>
    <hr>

    <button type="submit" class="registerbtn">Create</button>
  </div>

</form>
<button onclick="location.href='/teacher_home'"  class="cancle"><i class="fa fa-cancle" >Cancle</i></button>
</body>
</html>