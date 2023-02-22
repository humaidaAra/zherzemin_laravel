<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload</title>
</head>
<body>
    <form action={{ route('articleUpload') }} method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="img" id="nasd">
        <input type="submit">
    </form>
</body>
</html>