<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- ------------croiser--------- -->
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
                        <?php foreach ($data['croisier'] as $c) : ?>
                            <tr>
                                <th scope="row"><?= $c->id ?></th>
                                <th><?= $c->name ?></th>

                                <td><?= $c->prix ?></td>
                                <td><img src="<?php echo URLROOT; ?>/img/<?= $c->image ?>" style="width:50px;" alt=""></td>
                                <td><?= $c->nombre_nuit ?></td>
                                <td><?= $c->date_depart ?></td>
                                <td><?= $c->ship_id ?></td>
                                <td><?= $c->id_port_depart ?></td>
                                <td><?php foreach ($c->iténairaire as $i) : ?>
                                        <?= $i->nom ?>/
                                    <?php endforeach; ?></td>
                                <td>
                                    <form action="<?php echo URLROOT; ?>/dashboard/deleteCroisier" method="post">
                                        <input type="hidden" name="id" value="<?php echo $c->id ?>">
                                        <button class='btn btn-sm btn-danger' name="deleteC" value="deleteC"> <i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
                <form method="POST" action="<?php echo URLROOT; ?>/dashboard/addcroisier" class="mx-auto w-50">

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
                        <input type="file" class="form-control" id="Image" name="Image" placeholder="Image" required>
                    </div>
                    <div class="form-group">
                        <label for="NightsNumber">Nights Number</label>
                        <input type="number" class="form-control" id="NightsNumber" name="NightsNumber" placeholder="Nights Number" min="1" required>
                    </div>

                    <div class="form-group">
                        <label for="StartingDate">Starting Date</label>
                        <input type="date" class="form-control" id="StartingDate" name="StartingDate" placeholder="Starting Date" required>
                    </div>
                    <div class="form-group">
                        <label for="ShipID">Ship</label><br>
                        <select name="navireId" id="">
                            <?Php foreach ($data['Navure'] as $row) : ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="port">Port</label><br>
                        <select name="portID" id="port_d">
                            <?Php foreach ($data['port'] as $row) : ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->nom ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <section>

                            <div class="container  rounded mt-5 pb-3 mb-3">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>iténairaire  <button id="donnee-iténairaire-new"  class="btn btn-success" type="button">new</button>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Num port</td>
                                            <td>port </td>

                                        </tr>
                                    </thead>
                                    <tbody id="donnee-iténairaire">
                                    </tbody>
                                </table>

                            </div>

                        </section>
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
<script>
  // Get the current date in ISO format (YYYY-MM-DD)
  const currentDate = new Date().toISOString().split('T')[0];
  // Get a reference to the date input element
  const cruiseDateInput = document.getElementById('StartingDate');
  // Set the minimum date for the date input to the current date
  cruiseDateInput.min = currentDate;

    var max;
    var countt = 0

    document.getElementById("donnee-iténairaire-new").addEventListener('click', function() {
        document.getElementById("donnee-iténairaire").outerHTML +=
            `<tr >
                    <td>
                    <input type="text" id='iténairaire_port_num_${countt}'  name="iténairairePortNum[${countt}]" value="${countt + 1}" readonly >
                    </td>
                    <td>
                    <select id='chambre_port_${countt}' name="iténairairePort[${countt}]" >
                    <?Php foreach ($data['port'] as $row) : ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->nom ?>  <?php echo $row->pays ?></option>
                            <?php endforeach; ?>
    
    
    
    </select>
    </td>
                    </tr>
                    
                    
                    `;
        countt++;

    });
</script>






<!-- ------------navire--------- -->

<div class="container ">
    <div class="row">
        <div class="col-ms-8 mx-auto">
            <h4 class="text-center">navire</h4>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">rooms</th>
                        <th scope="col">places</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['Navure'] as $rowN) : ?>
                        <tr>
                            <th scope="row"><?php

                                            echo $rowN->id
                                            ?></th>
                            <td><?php

                                echo $rowN->nom
                                ?></td>
                            <td><?php
                                echo $rowN->nombre_chambre
                                ?></td>
                            <td><?php
                                echo $rowN->nombre_place
                                ?></td>
                            <td>
                                <form action="<?php echo URLROOT; ?>/dashboard/deletenavire" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rowN->id ?>">
                                    <button class='btn btn-sm btn-danger' name="deleteN" value="deleteN"> <i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php

                    endforeach;

                    ?>
                    <tr>
                        <td colspan="5">
                            <!-- Button trigger modal -->
                            <button class="btn btn-sm btn-success" type="submit" name="navire" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#navire">
                                <i class="fas fa-plus m-1"></i>ajouter</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal navire -->
<div class="modal fade" id="navire" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URLROOT; ?>/dashboard/addnavire" class="mx-auto w-50">
                    <div class="form-group">
                        <label for="name">Nom du navire</label>
                        <input type="text" class="form-control" id="name" name="shipName" placeholder="Entrez le nom du navire" required>
                    </div>
                    <section>

                        <div class="container  rounded mt-5 pb-3 mb-3">
                            <table>
                                <button id="donnee-produit2-new"  class="btn btn-success"  type="button">new</button>
                                
                                <thead>
                                    <tr>
                                        <th>Num Chambre</th>
                                        <th>Type Chambre</th>
                                    </tr>
                                </thead>
                                <tbody id="donnee-produit2">

                                </tbody>
                            </table>

                        </div>

                    </section>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addship" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
    </form>

</div>
<!-- add chambre -->
<script>
    var max;
    var count = 0
    document.getElementById("donnee-produit2-new").addEventListener('click', function() {
        document.getElementById("donnee-produit2").outerHTML +=
            `<tr >
                    <td>
                    <input type="text" id='chambre_num_${count}'  name="chambreNum[${count}]" value="${count + 1}" >
                    </td>
                    <td>
                    <select id='chambre_type_${count}' name="chambreType[${count}]" >
                    <option value="1" >solo</option> 
                    <option value="2" >2_people</option>
                    <option value="3" >family</option>
    
    
    
    </select>
    </td>
                    </tr>
                    
                    
                    `;
        count++;

    });
</script>

<!-- ------------port--------- -->
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
                    foreach ($data['port'] as $row) : ?>

                        <tr>
                            <th scope="row"><?php echo $row->id ?></th>
                            <td><?php echo $row->nom ?></td>
                            <td><?php echo $row->pays ?></td>
                            <td>
                                <form action="<?php echo URLROOT; ?>/dashboard/deleteport" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <button class='btn btn-sm btn-danger' name="delete" value="delete"> <i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    <tr>
                        <td colspan="4">
                            <!-- Button trigger modal -->
                            <button class="btn btn-sm btn-success" type="submit" name="Port" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Port">
                                <i class="fas fa-plus m-1"></i>ajouter</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal port  -->
<div class="modal fade" id="Port" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo URLROOT; ?>/dashboard/addPort" class="mx-auto w-50">
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

<?php require APPROOT . '/views/inc/footer.php'; ?>