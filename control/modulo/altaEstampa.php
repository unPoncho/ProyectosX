<h2>Alta de estampa</h2>
<?php

if(!empty($_POST['titulo']))
{





 $sql = "INSERT INTO `estampa` (`id`, `id_usuario`, `id_usuario_admin`, `titulo`, `categoria`, `urlPortada`, `urlCupon`, `visitas`, `tiraje`, `tipo`, `momento`, `estado`) 
VALUES (null,".$_POST['id_usuario'].",".datoUsuario($_AS['clave'], 'id', $db).",'".$_POST['titulo']."','".$_POST['categoria']."','".as_subirImagen($_FILES['urlPortada'])."','".as_subirImagen($_FILES['urlCupon'])."',0,'".$_POST['tiraje']."','".$_POST['tipo']."',NOW(),'AC')";

$result= mysqli_query ($db,$sql);
?>

<div class="alert alert-success" role="alert">La estampa fue dado de alta con éxito</div>

<?php
}
else
{

?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<input type="hidden" value="<?php echo $_GET["id"] ?>" name="id_usuario" id="id_usuario">  
<h3>Diseño</h3>

  <div class="form-group">
    <label for="titulo" class="col-sm-3 control-label">Titulo</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="titulo" name="titulo">
    </div>
  </div>

  <div class="form-group">
    <label for="tipo" class="col-sm-3 control-label">Tipo</label>
    <div class="col-sm-9">
      <select name="tipo" id="tipo" class="form-control">
        <option value="RG">Regalo</option>
        <option value="RM">Remate</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="categoria" class="col-sm-3 control-label">Categoría</label>
    <div class="col-sm-9">
      <select name="categoria" id="categoria" class="form-control">
        <option>RESTAURANTES, ANTROS Y MAS</option>
        <option>VIAJES</option>
        <option>EXCLUSIVO MUJERES</option>
        <option>TODO PARA AUTOS</option>
        <option>SALUD</option>
        <option>DIVERSOS</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="urlPortada" class="col-sm-3 control-label">Diseño pùblico</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="urlPortada" name="urlPortada">
    </div>
  </div>

  <div class="form-group">
    <label for="urlCupon" class="col-sm-3 control-label">Diseño para e-mail</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" id="urlCupon" name="urlCupon">
    </div>
  </div>

<h3>Configuración del pedido</h3>

  <div class="form-group">
    <label for="tiraje" class="col-sm-3 control-label">Tiraje máximo</label>
    <div class="col-sm-9">
      <input type="number" class="form-control" id="tiraje" name="tiraje">
    </div>
  </div>

    <div class="form-group">
    <label for="tiraje" class="col-sm-3 control-label">Paquete contratado.</label>
    <div class="col-sm-9">

      <select name="id_paquete" id="id_paquete" class="form-control">
<?php
  $sql="SELECT * FROM `paquete` WHERE estado='AC' AND claveProducto='RYR'";
  $result= mysqli_query ($db,$sql);
  while($fl=mysqli_fetch_array($result))
  {
?>
        <option>Vigencia de <?php echo $fl['diasVigencia'] ?> días por $<?php echo $fl['precio'] ?></option>
<?php
  }
?>
      </select>
    </div>
  </div>





    <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary">Dar de alta pedido</button>
    </div>
  </div>
</form>
<?php  
}
?>


 