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
                    <tr>
                        <th scope="row">1</th>
                        <td>100</td>
                        <td>3</td>
                        <td>20</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["idS"] ?>">
                                <button class='btn btn-sm btn-danger' name="delete" value="Delete"> <i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                    <td colspan="5">
                            <!-- Button trigger modal -->
                            <button class="btn btn-sm btn-success" type="submit" name="deletPort" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#navire">
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
<div class="modal fade" id="navire" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="mx-auto w-50">
                    <div class="form-group">
                        <label for="name">Nom du navire</label>
                        <input type="text" class="form-control" id="name" name="portName" placeholder="Entrez le nom du navire" required>
                    </div>
                    <div class="form-group">
                        <label for="rooms">rooms</label>
                        <input type="text" class="form-control" id="rooms" name="rooms" placeholder="rooms" required>
                    </div>
                    <div class="form-group">
                        <label for="places">places</label>
                        <input type="text" class="form-control" id="places" name="places" placeholder="places" required>
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