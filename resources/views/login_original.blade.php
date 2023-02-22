<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.2/css/all.css">
    <title>ZherzaminAdminPanel</title>
</head>

<body class="">
    <section class="loginSection">
        <img src="zherzamin.svg" alt="Zherzamin Logo" class="zherzaminIcon">
        <div class="formSection">
            <form action="/login" id="loginfrm" class="loginSection" method="POST">
                <input type="text" placeholder="Username" id="username" class="" required/>
                <input type="password" placeholder="Password" id="password" class="" required/>
                <div class="btnContainer">
                    <button class="bttn" type="submit">Login</button>
                </div>
                {{-- <a class="forgotPassLink" href="#!">Forgot password?</a> --}}
            </form>
        </div>
    </section>
    {{-- <script type="module" src="./login.bundle.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @vite('resources/css/style.scss')
</body>

</html>