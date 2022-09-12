<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activate Your Account</title>
</head>
<body class="body">
    <div class="header">Action<span style="color: #FD7014">Point</span> </div>
    <p class="text">Hola {{$user->name}}</p>
    <br>
    <p class="text">Thanks for joining ActionPoint! We really appreciate it. Please click the button below to verify your account:</p>
    <a href="{{$url}}"><button class="button">Verify Account</button></a>
    <br><br>
    <p class="text">If clicking doesn't work, you can try copying and pasting it to your browser:</p>
    <br>
    <p class="link">{{$url}}</p>
    <br>
    <p class="text">If clicking doesn't work, you can try copying and pasting it to your browser:</p>
    <br>
</body>
</html>

<style>
    .body {
        background-color: #181623;
        padding: 40px;
    }
    .text {
        color: white;
    }
    .header {
        width: 100%;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #DDCCAA;
        font-size: 60px;
    }
    .button {
        width: 128px;
        height: 38px;
        background-color: #FD7014;
        border: none;
        color: white;
        border-radius: 10px;
    }
    .link {
        color: #DDCCAA;
    }
</style>
