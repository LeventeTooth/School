<?php
require_once 'header.php';
?>
<div class="background-image">
</div>
<div class="container">

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Login</h4>
                    <p class="card-text text-danger">Input fields with * shall be field</p>
                    <hr class="mb-3">
                    <form action="../controllers/register.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                aria-describedby="helpId" placeholder="" requied />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <div id="passwordContainer">
                                <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="helpId" placeholder="" requied />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script>
    let showContent = (id, eye) => {
        let input = document.getElementById(id)
        let hidden = input.getAttribute("type")
        if (hidden === "password") {
            input.setAttribute("type", "text")
            eye.setAttribute("class", "fa-solid fa-eye-slash")
        }
        else {
            input.setAttribute("type", "password")
            eye.setAttribute("class", "fa-solid fa-eye")
        }
    }
</script>
<?php
require_once 'footer.php';
?>