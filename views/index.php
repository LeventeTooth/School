<?php require_once 'header.php'; ?>
<!-- Main Content Div után-->

<h1>Főoldal</h1>
<div id="content">
  <div class="container">
    <div class="row" id="row">
      <?php
      // A külső PHP fájl beillesztése
      include '../controllers/webshopItems.php';
      ?>
    </div>
  </div>
</div>
<p><?php var_dump($_SESSION);?></p>

<!-- END Main Content Div lezárás előtt-->
<?php require_once 'footer.php'; ?>