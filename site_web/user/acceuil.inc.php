<?php session_start();?>

<div class="portal-page-column column-1 col-md-12     col-md-100 container">
  <h3>Bonjour <?= $_SESSION['Nom'];?>,</h3><br>
  <div class="row">
    <div class="col-sm-4" name="table">
        <span>Vos pret en Cours :</span>
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>