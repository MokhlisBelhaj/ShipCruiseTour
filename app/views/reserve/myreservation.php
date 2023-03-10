<?php require APPROOT . '/views/inc/header.php'; 
// echo '<pre>';
//         var_dump($data);
        
//         echo '<pre>';
//                 die;
?>
    </table>
    <div class="container" style="min-height: 45vh;">
        <div class="row">
            <div class="col-ms-8 mx-auto">
                <h4 class="text-center">croiser</h4>
                <div class="table-responsive">
                    <table class=" table table-bordered  text-center">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Nights Number</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ship name</th>
                                <th scope="col">room number</th>
                                <th scope="col">Port name</th>
                                <!-- <th scope="col">iténairaire</th> -->
                                <th scope="col">action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $item): ?>
                                <tr>
                                    <td><?= $item->nom_croisiere ?></td>
                                    <td><?= $item->prix_reservation ?>dh</td>
                                    <td><img src="<?php echo URLROOT; ?>/img/<?= $item->image ?>" style="width:50px;" alt="<?= $item->nom_croisiere ?>"></td>
                                    <td><?= $item->nombre_nuit ?></td>
                                    <td><?= $item->date_depart ?></td>
                                    <td><?= $item->nom_navire ?></td>
                                    <td><?= $item->num_chambre ?></td>
                                    <td><?= $item->nom_port ?></td> 
                                    <td>
                                    <form class="delete-form" action="<?=URLROOT?>/reserve/annulation" method="post">
                                        <input type="hidden" name="id" value="<?= $item->id_reservation?>">
                                        <input type="hidden" name="date" value="<?= $item->date_depart?>">
                                        <button class='btn btn-sm btn-danger'name="annule" value="delete"> <i class="fas fa-trash"></i></button>
                                    </form>
                                    </td>
                                </tr>
                        <?php
                     endforeach;
                      ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

