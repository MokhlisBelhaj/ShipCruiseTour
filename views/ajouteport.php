<?php require './controllers/controllerCruise.php' ?>
<?php require "./controllers/controllerShip.php"?>
<?php require "./controllers/controllePort.php"?>
<div class="container">
    <div class="row">
        <div class="col-ms-8 mx-auto">
            <h4 class="text-center">croiser</h4>
            <div class="table-responsive">
                <table class=" table table-bordered  text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nights Number</th>
                            <th scope="col">Starting Date</th>
                            <th scope="col">Ship ID</th>
                            <th scope="col">Port ID</th>
                            <th scope="col">iténairaire id</th>
                            <th scope="col">action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <th>ila amam sir</th>

                            <td>100</td>
                            <td><img src="../ShipCruiseTour/views/image/cruise.jpg" style="width:50px;" alt=""></td>
                            <td>3</td>
                            <td>20</td>
                            <td>3</td>
                            <td>20</td>
                            <td>20</td>
                            <td>
                                <button class='btn btn-sm btn-danger'> <i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <!-- Button trigger modal -->
                                <button class="btn btn-sm btn-success" type="submit" name="Cruise" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Cruise">
                                    <i class="fas fa-plus m-1"></i>ajouter</a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="Cruise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">        
        <!-- name	Price	Image	Nights Number	Starting Date	Ship ID	Port ID	iténairaire id	action -->
                <form method="POST" class="mx-auto w-50">

                    <div class="form-group">
                        <label for="name">Nom du Cruise</label>
                        <input type="text" class="form-control" id="name" name="CruiseName" placeholder="Entrez le nom du Cruise" required>
                    </div>

                    <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="number" class="form-control" id="Price" name="Price" placeholder="Price" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="number" class="form-control" id="Image" name="Image" placeholder="Image" required>
                    </div>
                    <div class="form-group">
                        <label for="NightsNumber">Nights Number</label>
                        <input type="number" class="form-control" id="NightsNumber" name="NightsNumber" placeholder="Nights Number" required>
                    </div>

                    <div class="form-group">
                        <label for="StartingDate"></label>
                        <input type="date" class="form-control" id="StartingDate" name="StartingDate" placeholder="Starting Date" required>
                    </div>
                    <div class="form-group">
                        <label for="ShipID">Ship</label><br>
                        <select name="" id="">
                            <?Php foreach($ships as $row): ?>
                            <option value="<?php echo $row['idS'] ?>"><?php echo $row['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="port">Port</label><br>
                        <select name="" id="">
                            <?Php foreach($Ports as $row): ?>
                            <option value="<?php echo $row['idP'] ?>"><?php echo $row['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addCruise" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
    </form>

</div>