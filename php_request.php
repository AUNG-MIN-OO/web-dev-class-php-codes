<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<ul>
    <li>get</li>
    <li>post</li>
</ul>
<a href="php_respond.php">another file</a>

<a href="php_respond.php?name=hein&age=30&job=programmer">click me</a>

<form action="php_respond.php" method="post">
    <input type="text" name="name" value="hein htet zan">
    <input type="text" name="age" value="22">
    <input type="text" name="job" value="programmer">
    <button>submit</button>
</form>

</body>
</html>