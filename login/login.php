<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container text-center w-50 pt-5">
        <img src="../resources/IntelliSeven_Logo 1.png" alt="" width="154" height="101" class="mt-5">
        <h1>LawChat</h1>
        <div class="d-flex flex-column align-items-center">
            <span id="alert" class="pb-0">


            </span>

            <form id="login_form" class="w-50" onsubmit="return false;">
                <div class="form-floating mt-5 mb-3">
                    <input id="username" name="username" type="email" class="form-control rounded-pill"
                        id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating pb-3">
                    <input id="password" type="password" name="password" class="form-control rounded-pill"
                        id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button id=loginBtn type="button" class="btn btn-lg rounded-pill text-light mt-3 w-100"
                    style="background-color:#FF0000" onclick="login()">Continue</button>

            </form>


            <div class="form-check mt-5">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label text-secondary" for="flexCheckDefault">
                    Keep me signed in
                </label>
            </div>



        </div>

    </div>
    <div id="grad1"></div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="../login/login.js"></script>
</body>

</html>