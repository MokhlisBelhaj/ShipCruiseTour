<div class="container">
  <div class="row">
    <div class="col-ms-8 mx-auto">
      <h4 class="text-center">croiser</h4>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Nights Number</th>
            <th scope="col">Starting Date</th>
            <th scope="col">Ship ID</th>
            <th scope="col">Port ID</th>
            <th scope="col">action</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>100</td>
            <td><img src="../ShipCruiseTour/views/image/cruise.jpg" style="width:50px;" alt=""></td>
            <td>3</td>
            <td>20</td>
            <td>3</td>
            <td>20</td>
            <td>
              <button class='btn btn-sm btn-danger'> <i class="fas fa-trash"></i></button>
            </td>
          </tr>
          <tr>
            <td colspan="8">
              <input type="hidden" name="id" value="">
              <button class="btn btn-sm btn-success"><i class="fas fa-plus m-1"></i>ajouter</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- ------------navire--------- -->

<!-- ------------port--------- -->
<?php require "./controllers/controllePort.php"
?>
<div class="container ">
    <div class="row">
        <div class="col-ms-8 mx-auto">
            <h4 class="text-center">port</h4>
            <table class="table  table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">country</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                 foreach ($Ports as $row) :?>
                 
                    <tr>
                        <th scope="row"><?php echo $row['id']?></th>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['country']?></td>
                        <td>
                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                            <button class='btn btn-sm btn-danger' name="delete" value="Delete"> <i class="fas fa-trash"></i></button>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <tr>
                        <td colspan="4">
                            <!-- Button trigger modal -->
                            <button class="btn btn-sm btn-success" type="submit" name="deletPort" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Port">
                                <i class="fas fa-plus m-1"></i>ajouter</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Port" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="mx-auto w-50">
                    <div class="form-group">
                        <label for="name">Nom du port</label>
                        <input type="text" class="form-control" id="name" name="portName" placeholder="Entrez le nom du port" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Pays</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Entrez le pays" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addPort" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
    </form>

</div>