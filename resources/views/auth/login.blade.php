<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
</head>
<body>
    <form action="" method="POST">
        @csrf
        <label>Email</label>
        <input type="email" name="email">
        <button type="submit">Submit</button>
    </form>
</body>
</html>