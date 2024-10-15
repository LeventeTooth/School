<?php require_once 'header.php'; ?>
<!-- Main Content Div után-->

<h1>Kosar</h1>
<div id="content">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Termek</th>
                <th scope="col">Egysegar</th>
                <th scope="col">Mennyiseg</th>
                <th scope="col">Ar</th>
            </tr>
        </thead>
        <tbody id="tbody">
        </tbody>
    </table>
</div>
<a href="deliveryAdress.php">
    <button type="button" class="btn btn-secondary" name="submit" id="rendel">Megrendeles</button>
</a>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        alert(cart[0])
    });
</script>
<!-- END Main Content Div lezárás előtt-->
<?php require_once 'footer.php'; ?>