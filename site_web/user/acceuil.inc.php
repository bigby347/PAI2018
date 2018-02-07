<?php session_start();?>

<div class="portal-page-column column-1 col-md-12     col-md-100 container">
  <h3>Bonjour <?= $_SESSION['Nom'];?>,</h3><br>
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4"> 
      <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      <p>Project 2</p>    
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p>Some text..</p>
      </div>
      <div class="well">
       <p>Some text..</p>
      </div>
    </div>
  </div>
</div>