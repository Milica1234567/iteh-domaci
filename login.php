<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-md">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><img src="./img/logo34.png" alt="" class="logo"></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">dr Jelena Todic</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">dr Jovana Radenovic</a>
        </li>
        </ul>
    </div>
</nav>
<div class="container login-container">
    <div class="login-box">
    <div class="row login-row">
        <div class="col-md-6 login">
            <h2>LOGIN</h2>
            <form action="validation.php" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="doktor" class="form-control" required>
                    <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="loginBtn">LOGIN</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>