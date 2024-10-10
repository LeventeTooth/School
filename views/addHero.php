<?php require_once 'header.php' ?>
<!-- content -->
<div class="container mt-5">
    <div class="backColor">

        <form method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="">
                <label for="floatingInput">Hős neve</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="">
                <label for="floatingInput">Hős kezdeti életereje </label>
            </div>
            <select class="form-select mb-3" aria-label="Default select example">
                <option selected>Válasz szerepet</option>
                <option value="1">ADC</option>
                <option value="2">Support</option>
                <option value="3">Mid</option>
                <option value="4">Jungle</option>
                <option value="4">Top</option>
            </select>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="floatingInput" placeholder="">
                <label for="floatingInput">Mennyibe kerül a boltban </label>
            </div>
            <button class="btn btn-primary" name="submit" type="submit">Kuldes</button>
        </form>
    </div>
</div>
<!-- end contetnt -->
<?php require_once 'footer.php' ?>