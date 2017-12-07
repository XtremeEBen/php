  $result = dbReturn::query("SELECT id_Estado, str_Estado_Desc FROM estados ORDER BY str_Estado_Desc ASC");

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['id_Estado'], "val" => Encoding::toUTF8($row['str_Estado_Desc']));
  }

  $query = "SELECT id_Cidades, str_Cidades FROM cidades";
  $result = dbReturn::query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['id_Cidades']][] = array("id" => $row['id_Cidades'], "val" => Encoding::toUTF8($row['str_Cidades']));
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);

?>
<script type='text/javascript'>
  <?php
    echo "var categories = $jsonCats; \n";
    echo "var subcats = $jsonSubCats; \n";
  ?>
  function loadCategories(){
    alert('teste');
    var select = document.getElementById("categoriesSelect");
    select.onchange = updateSubCats;
    for(var i = 0; i < categories.length; i++){
      select.options[i] = new Option(categories[i].val,categories[i].id);
    }
  }
  function updateSubCats(){
    var catSelect = this;
    var catid = this.value;
    var subcatSelect = document.getElementById("subcatsSelect");
    subcatSelect.options.length = 0; //delete all options if any present
    for(var i = 0; i < subcats[catid].length; i++){
      subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
    }
  }
</script>

<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<p><h3 class="panel-title">Estado</h3><br>
				<select id='categoriesSelect'>
				</select>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-body">
				<p><h3 class="panel-title">Estado</h3><br>
				<select id='subcatsSelect'>
				</select>
				<!-- <input type="text" class="form-control" name="Distribuidores[atividade]"  placeholder="Celular" value="<?php ?>"></p> -->
			</div>
		</div>
	</div>
</div>

<script>
window.onload(loadCategories());
</script>