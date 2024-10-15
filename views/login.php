
<?php require_once 'header.php'; ?>
<!-- Main Content Div után-->
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div style="margin: 20px; background-color: beige; height: 80vh; width: 100%; border-radius: 20px; padding: 30px">
                <h1>Belepes</h1>
                <form method="POST" action="../controllers/login.php">
                    <div class="form-floating mb-5 mt-5">
                        <input type="text" class="form-control" id="username" name="username" placeholder="">
                        <label for="username">Felhasznalo nev</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                        <label for="password">Password</label>
                    </div>
                    <div class="mt-5">

                        <button class="btn btn-primary" id="submit" name="submit" type="submit">Belepes</button>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-sm-6">
            <div style="margin: 20px; background-color: beige; height: 80vh; width: 100%; border-radius: 20px; padding: 30px">
                <h1>Regisztracio</h1>
                <form method="POST" action="registration.php">
                    <div class="form-floating mb-5 mt-5">
                        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="">
                        <label for="floatingInput">Email cim</label>
                    </div>
                    <div class="mt-5">
                        <button class="btn btn-primary" id="submit" type="submit" >Regisztracio</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
</div>
<!-- END Main Content Div lezárás előtt-->
<?php require_once 'footer.php'; ?>