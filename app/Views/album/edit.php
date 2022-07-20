<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>
<div class="container">
<p><h1>Edite el album</h1>

    <p><form class="" action="<?=base_url()?>/proyecto/public/album/update" method="post">
      <div class="class="form-group"">
        <label for="name">Name:</label>
        <input type="text" class="form-control"  name="name" id="name" value="<?=$albums->name?>" placeholder="Name">
        
        <label for="name">Author:</label>
        <input type="text" class="form-control"  name="author" id="author" value="<?=$albums->author?>" placeholder="Author">
        <label for="name">Genere_id:</label>

        <select class="custom-select mr-sm-2" name="genre_id" id="genre_id" value="" placeholder="Genre_id">
        <?php foreach ($genres as $key => $genre): ?>
        
          <option value=<?=$genre->id?>><?=$genre->name?></option>
          <?php endforeach;?>
          </select>
        
        <input type="text" class="form-control"  value="<?=$albums->genre_id?>" placeholder="Genre_id">
        <input type="hidden" name="id" value="<?=$albums->id?>">
        <h1><button type="submit" class="btn btn-primary" name="button">Save</button>
      </div>

    </form>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if (mensaje == '1') {
            swal('GENÉRO','Registro exitoso','success');
        } else if (mensaje == '0'){
            swal('GENÉRO','Registro fallido','error');
        } else if (mensaje == '2'){
            modal('GENÉRO','Actualización exitosa','success');
        } else if (mensaje == '3'){
            swal('GENÉRO','Actualización fallida','error');
        } else if (mensaje == '4'){
            swal('GENÉRO','Eliminado exitoso','success');
        } else if (mensaje == '5'){
            swal('GENÉRO','Eliminado fallido','error');
        }
  </body>
</html>