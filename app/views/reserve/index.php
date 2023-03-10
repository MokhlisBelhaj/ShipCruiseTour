<?php require APPROOT . '/views/inc/header.php';
$cr = $data['croisier'];
$chambre1 = $data['chambre1'];
$chambre2 = $data['chambre2'];
$chambre3 = $data['chambre3'];

// echo '<pre>';
//         // var_dump($chambre3);
//         print_r($chambre3[0]['id']);
//         echo '<pre>';
//                 die; 
?>

<div class="king">
    <div class="container a1 align-items-start justify-content-center">
        <form id="booking-form" action="<?=URLROOT?>/reserve/reserveCR" method="POST" >
            <div class="form-group  ">
                <div class="form-date-from ">
                    <label>name</label>
                    <input type="text" id="date_from" name="name" class="form-control" value="<?= $cr[0]->name ?>"readonly />
                    <input type="text" id="date_from" name="id" class="form-control" value="<?= $cr[0]->id ?>" />
                    <input type="text" id="date_from" name="user_id" class="form-control" value="<?= $_SESSION['user_id'] ?>" />
                </div>
                <div class="form-date-to ">
                    <label>date depart</label>
                    <input type="date" id="date_to" name="date_depart" class="form-control" value="<?= $cr[0]->date_depart ?>" readonly />
                </div>
                <div class="form-quantity">
                    <label>itenairaire</label>
                    <input type="text" name="itenairaire" class="form-control" name="useritenairaire" value="<?php foreach ($cr[0]->iténairaire as $i) {
                                                                                                echo $i->nom . "/";
                                                                                            } ?>" readonly />
                </div>
                <div class="form-quantity mt-1 ">
                    <label>chambre type</label>
                    <select id='chambre_type' onchange="switchchmber()" name="chambreType" required> 
                        
                        <option value="0" selected>choisir type de chambre</option>
                        <option value="1" >solo</option>
                        <option value="2">2_people</option>
                        <option value="3">family</option>
                    </select>
                    <div id="msg" class="text-danger">

                    </div>
                </div>
                <div class="form-quantity mt-1 " id="num_chambre">
                    <!-- chambre num -->
                </div>
                <div class="form-quantity mt-1   "id="prix">
                    <!-- prix  -->
                </div>
                <div class="form-submit mt-1 d-block mx-auto ">
                    <input  onclick="validateForm()" id='boton' name="book" class="btn btn-primary " value="Book now" />
                </div>
            </div>

        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<style>
    .king {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(https://images.pexels.com/photos/635512/pexels-photo-635512.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
        background-size:  100% 100vh;
    }

    .a1 {
        background-color:white ;
        box-shadow: -18px 13px 0px #1b838d;
        border-radius: 16px;
        width: 30%;
    }
</style>
<script>
       function validateForm() {
  let chambreType = document.getElementById("chambre_type");
  let form = document.getElementById("booking-form");
  let msg = document.getElementById("msg");
  if (chambreType.value !== "0") {
    form.submit();
  } else {
    msg.innerHTML ="Veuillez choisir un type de chambre!";
  }
}
function switchchmber() {
    let type = document.getElementById('chambre_type').value;
    

    let options = '';
    let prix='';
    <?php if (!empty($chambre1)) : ?>
        if (type == 1) {
            prix= <?= $cr[0]->prix ?>+200
            <?php foreach ($chambre1 as $ch1) : ?>
                options += `<option value="<?= $ch1->id ?>"><?= $ch1->num_chambre ?></option>`;
            <?php endforeach; ?>
            document.getElementById('boton').hidden=false
        }
    <?php else: ?>
        document.getElementById('boton').hidden=true

    <?php endif; ?>

    <?php if (!empty($chambre2)) : ?>
        if (type == 2) {
            prix= <?= $cr[0]->prix ?>+300
            <?php foreach ($chambre2 as $ch2) : ?>
                options += `<option value="<?= $ch2->id ?>"><?= $ch2->num_chambre ?></option>`;
            <?php endforeach; ?>
            document.getElementById('boton').hidden=false

        }
    <?php endif; ?>

    <?php if (!empty($chambre3)) : ?>
        if (type == 3) {
            prix= <?= $cr[0]->prix ?>+400
            <?php foreach ($chambre3 as $ch3) : ?>
                options += `<option value="<?= $ch3->id ?>"><?= $ch3->num_chambre ?></option>`;
            <?php endforeach; ?>
            document.getElementById('boton').hidden=false

        }
    <?php endif; ?>

    if (options !== '') {
        document.getElementById('num_chambre').innerHTML = `
            <label>chambre num</label>
            <select name="chambre" class="form-control">${options}</select>
           
        `;
        document.getElementById('prix').innerHTML = `
        <label>prix en DH </label>
        <input type="text"  name="prix" class="form-control " value=" ${prix}"  readonly />
        `

    } else {
        document.getElementById('num_chambre').innerHTML = '';
        document.getElementById('prix').innerHTML ='';
    }
}



</script>