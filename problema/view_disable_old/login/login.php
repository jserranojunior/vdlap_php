
<link rel="stylesheet" type="text/css" href="../../../_aplication/view/include/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../_aplication/view/include/css/login.css">

    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="/vdlap/img/header/logovdlap.png" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="../../../_aplication/view/img/header/logovdlap.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="../../../_aplication/model/login/verifica.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>

                <input type="text" id="inputEmail" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
<input type="password" name="senha"  id="inputPassword" class="form-control" placeholder="Senha" required>


                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Logar</button>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->


