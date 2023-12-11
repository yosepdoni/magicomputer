<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 100;
        }

        .login-card {
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.10);
            /* Add shadow */
            background-color: rgba(169, 169, 169, 0.7);
            /* Transparent gray background */
            color: black;
            /* Text color */
            margin-top: 180px;
            margin: auto;
            max-width: 370px;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 login-card">

            <!-- <div class="text-center mb-4">
                    <img src="https://img.icons8.com/ios-filled/2x/user-male-circle.png" alt="">
                </div> -->
            <h4 class="text-center mb-3">Form Login</h4>
            <form action="plog.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="surel" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukan Email" required>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="sandi" class="form-control" id="pwd" placeholder="Masukan Password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="eyeIcon">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in-alt"></i> Login</button>
                </div>
                <div class="mb-3">
                    <!-- <a href="" onclick="window.open('Lupa password'); return false;" style="text-decoration:none; color:blue;"><i>Forget your password?</i></a><br> -->
                    Belum punya akun?<a href="/magicomputer/register" style="text-decoration:none; color:blue;"> <i>Registrasi</i></a>
                </div>
            </form>
        </div>
    </div>
    <br>

    <script type="text/javascript">
        var lihat = document.getElementById('pwd');
        var eyeIcon = document.getElementById('eyeIcon');

        eyeIcon.addEventListener('click', function() {
            if (lihat.type === 'password') {
                lihat.type = 'text';
                eyeIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
            } else {
                lihat.type = 'password';
                eyeIcon.innerHTML = '<i class="fa fa-eye"></i>';
            }
        });
    </script>
</body>

</html>