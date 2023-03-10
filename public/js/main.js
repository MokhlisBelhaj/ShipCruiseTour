var number = document.getElementById("nombre");
var fields = document.getElementById("donnee-produit");


var max;

number.addEventListener('input', function () {
  if (number.value !== "") {
    fields.innerHTML = "";
    max = number.value


    for (let i = 1; i <= max; i++) {
      console.log(max);
      fields.innerHTML +=
        `
       
        <p class="text-white text-center pt-3">hambre ${i}: </p>
          <form action="" method="post">
              <div class="form-group">
                  <label class="mb-1">num_chambre</label>
                  <input type="text" class="form-control" id="num_chambre${i}" name="num_chambre" required>
              </div>
              <div class="form-group">
                  <label class="mb-1">id_typechambre</label>
                  <input type="text" class="form-control" id="id_typechambre" name="id_typechambre${i}" required>
              </div>
          </form>
      
        `
    }
  } else {
    fields.innerHTML = "";
  };
});
