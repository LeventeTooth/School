<?php
require_once 'header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Registration</h4>
                <p class="card-text text-danger">Input fields with * shall be field</p>
                <hr class="mb-3">
                <form action="../controllers/register.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
                            placeholder="" requied />
                        <small id="helpId" class="form-text text-muted">Used to log in to the system</small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <div id="passwordContainer">
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId"
                                placeholder="" requied  onkeyup="validate(this)"/>
                            <i class="fa-solid fa-eye" id="eyeIcon" onclick="showContent('password', this)"></i>
                        </div>
                        <ul id="pwreq">
                            <li><small id="help8" class="form-text text-muted">Min. 8 charchter </small></li>
                            <li><small id="helpN" class="form-text text-muted">Min. 1 numberr </small></li>
                            <li><small id="helpC" class="form-text text-muted">Min. 1 capitalcharacter </small></li>
                            <li><small id="helpS" class="form-text text-muted">Min. 1 specialcharcter </small></li>
                        </ul>

                    </div>
                    <div class="mb-3">
                        <label for="passwordConfirm" class="form-label">Password Again</label>
                        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"
                            aria-describedby="helpId" placeholder="" requied />
                        <small id="helpId" class="form-text text-muted">Please confirm your password</small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId"
                            placeholder="" requied />
                        <small id="helpId" class="form-text text-muted">Email address</small>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" name="submit" id="submit">Registre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<script>
    let showContent = (id, eye) => {
        let input = document.getElementById(id)
        let hidden =input.getAttribute("type")
        if(hidden === "password"){
            input.setAttribute("type", "text")
            eye.setAttribute("class", "fa-solid fa-eye-slash")
        }
        else{
            input.setAttribute("type", "password")
            eye.setAttribute("class", "fa-solid fa-eye")
        }
    }

    const validate = (input) => {
        let password =input.value
        let help8 =document.getElementById("help8")
        let helpN =document.getElementById("helpN")
        let helpC =document.getElementById("helpC")
        let helpS =document.getElementById("helpS")
        let pattern = /[A-Z]/

        /* 8 karakter */
        if(password.length>=8){
            help8.setAttribute("class", "form-text text-muted")
            help8.classList.add("text-success")
            help8.classList.add("fw-bold")
            help8.classList.remove("text-muted")
            help8.style.display="block"
            if(document.getElementById("a1")==null){
                help8.innerHTML+=`<i id="a1" class="fa-solid fa-check"></i>`
            }
        }
        else if(password.length<8 && password.length>0){
            help8.setAttribute("class", "form-text text-muted")
            help8.classList.add("text-danger")
            help8.classList.add("fw-bold")
            help8.classList.remove("text-muted")
            if(document.getElementById("a1")!=null){
                document.getElementById("a1").remove()
            }
        }
        else{
            if(document.getElementById("a1")!=null){
                document.getElementById("a1").remove()
            }
            help8.setAttribute("class", "form-text text-muted")

        }

        /* Nagy betu */
        if(pattern.test(password)){
            helpC.setAttribute("class", "form-text text-muted")
            helpC.classList.add("text-success")
            helpC.classList.add("fw-bold")
            helpC.classList.remove("text-muted")
            helpC.style.display="block"
            if(document.getElementById("a2")==null){
                helpC.innerHTML+=`<i id="a2" class="fa-solid fa-check"></i>`
            }
        }
        else if(password.length>0){
            helpC.setAttribute("class", "form-text text-muted")
            helpC.classList.add("text-danger")
            helpC.classList.add("fw-bold")
            helpC.classList.remove("text-muted")
            if(document.getElementById("a2")!=null){
                document.getElementById("a2").remove()
            }
        }
        else{
            if(document.getElementById("a2")!=null){
                document.getElementById("a2").remove()
            }
            helpC.setAttribute("class", "form-text text-muted")

        }
        /* Szamot tartalmaz-e */
        pattern = /[0-9]/
        if(pattern.test(password)){
            helpN.setAttribute("class", "form-text text-muted")
            helpN.classList.add("text-success")
            helpN.classList.add("fw-bold")
            helpN.classList.remove("text-muted")
            helpN.style.display="block"
            if(document.getElementById("a3")==null){
                helpN.innerHTML+=`<i id="a3" class="fa-solid fa-check"></i>`
            }
        }
        else if(password.length>0){
            helpN.setAttribute("class", "form-text text-muted")
            helpN.classList.add("text-danger")
            helpN.classList.add("fw-bold")
            helpN.classList.remove("text-muted")
            if(document.getElementById("a3")!=null){
                document.getElementById("a3").remove()
            }
        }
        else{
            if(document.getElementById("a3")!=null){
                document.getElementById("a3").remove()
            }
            helpN.setAttribute("class", "form-text text-muted")
    
        }

        /* Special karakter tartalmaz-e */
        pattern = /['"+!%/=()~ˇ^˘°˛`˙´#&@{}łŁ€ÄäđĐ|<>]/
        if(pattern.test(password)){
            helpS.setAttribute("class", "form-text text-muted")
            helpS.classList.add("text-success")
            helpS.classList.add("fw-bold")
            helpS.classList.remove("text-muted")
            helpS.style.display="block"
            if(document.getElementById("a4")==null){
                helpS.innerHTML+=`<i id="a4" class="fa-solid fa-check"></i>`
            }
        }
        else if(password.length>0){
            helpS.setAttribute("class", "form-text text-muted")
            helpS.classList.add("text-danger")
            helpS.classList.add("fw-bold")
            helpS.classList.remove("text-muted")
            if(document.getElementById("a4")!=null){
                document.getElementById("a4").remove()
            }
        }
        else{
            if(document.getElementById("a4")!=null){
                document.getElementById("a4").remove()
            }
            helpS.setAttribute("class", "form-text text-muted")
    
        }
    }

</script>
<?php
require_once 'footer.php';
?>