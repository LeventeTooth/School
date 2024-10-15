<?php require_once 'header.php'; ?>
<!-- Main Content Div után-->
<h1>Szallitasi adatok</h1>

<form action="../controllers/cartUpload.php" method="POST">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="fullName" name="fullName" placeholder=""
                value="<?php if(isset($_SESSION['fullName'])) echo $_SESSION['fullName'] ?>">
            <label for="fullName">Teljes nev</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder=""
                value="<?php if(isset($_SESSION['email']))echo $_SESSION['email'] ?>">
            <label for="email">Email cim</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="phoneNumer" name="phoneNumer" placeholder="">
            <label for="phoneNumer">Telefonszam</label>
        </div>

        <div class="class">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="">
                        <label for="zipcode">Iranyitoszam</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="city" name="city" placeholder="">
                        <label for="city">Varos</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="street" name="street" placeholder="">
                        <label for="street">Utca</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="houseNumber" name="houseNumber" placeholder="">
                        <label for="houseNumber">Hazszam</label>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="addressCheckbox">
            <label class="form-check-label" for="addressCheckbox">
                Másik szállítási cím
            </label>
        </div>


        <div class="class" id="AnotherAddress">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="Deliveryzipcode" name="Deliveryzipcode"
                            placeholder="">
                        <label for="Deliveryzipcode">Szallitasi Iranyitoszam</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Deliverycity" name="Deliverycity" placeholder="">
                        <label for="Deliverycity">Szallitasi Varos</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="Deliverystreet" name="Deliverystreet"
                            placeholder="">
                        <label for="Deliverystreet">Szallitasi Utca</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="DeliveryhouseNumber" name="DeliveryhouseNumber"
                            placeholder="">
                        <label for="DeliveryhouseNumber">Szalliatasi Hazszam</label>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div class="mb-3 text-center">
            <button class="btn btn-primary" name="submit" id="submit" type="submit">Megrendel</button>
        </div>



</form>
<script>
    document.getElementById('addressCheckbox').addEventListener('change', function () {
        var anotherAddressDiv = document.getElementById('AnotherAddress');
        if (this.checked) {
            anotherAddressDiv.style.display = 'block';
        } else {
            anotherAddressDiv.style.display = 'none';
        }
    });
</script>
<!-- END Main Content Div lezárás előtt-->
<?php require_once 'footer.php'; ?>