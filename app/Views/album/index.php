<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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
    <title></title>
    
   
  </head>
  <body>

  <nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="http://localhost/proyecto/public/">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Itunes-music-app-icon.png/800px-Itunes-music-app-icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Crud Music
  </a>
    <form class="form-inline my-2 my-lg-0">
    
    <a href="http://localhost/proyecto/public/album" style="color:white; border-color:transparent;" class="btn btn-outline-primary">Álbum</a>
    <a href="http://localhost/proyecto/public/genre" style="color:white; border-color:transparent;" class="btn btn-outline-primary">Genéro</a>
    </form>
  
  </nav>
 


  
    <div class="container">
    
      <p><h1>Album</h1>
      <p><form class=""  method="post">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Agregar nuevo género
      </button>
    </form>
      <p><table class="table table-striped">
        <thead>
        <th>ID</th><th>Name</th><th>Author</th><th>ID Genéro</th><th colspan="2">Options</th>
        </thead>
        <?php foreach ($albums as $key => $album):?>
          <tr>
          <td><?=$album->id?></td><td><?=$album->name?></td>
          <td><?=$album->author?></td>
          <td><?=$album->genre_id?></td>
          <td><a href="album/edit/<?=$album->id?>">Edit</a> 
          <a href="album/delete/<?=$album->id?>">Eliminar</a> </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresa Nuevo Album</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <p><form class="modal-body" action="album/save" method="post">
      <div class="class="form-group"">
        <label for="name">Name:</label>
        <input type="text" class="form-control"  name="name" id="name" value="" placeholder="Name">
        <label for="name">Author:</label>
        <input type="text" class="form-control"  name="author" id="author" value="" placeholder="Author">
        <label for="name">Genere_id:</label>
       
        <select class="custom-select mr-sm-2" name="genre_id" id="genre_id" value="" placeholder="Genre_id">
        <?php foreach ($genres as $key => $genre): ?>
        
          <option value=<?=$genre->id?>><?=$genre->name?></option>
          <?php endforeach;?>
          </select>
       
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <h1><button type="submit" class="btn btn-primary" name="button">Save</button>
        
      </div>
      </form>
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        let mensaje = '<?php echo $mensaje ?>';

        if (mensaje == '1') {
            swal('ÁLBUM','Registro exitoso','success');
        } else if (mensaje == '0'){
            swal('ÁLBUM','Registro fallido','error');
        } else if (mensaje == '2'){
            modal('ÁLBUM','Actualización exitosa','success');
        } else if (mensaje == '3'){
            swal('ÁLBUM','Actualización fallida','error');
        } else if (mensaje == '4'){
            swal('ÁLBUM','Eliminado exitoso','success');
        } else if (mensaje == '5'){
            swal('ÁLBUM','Eliminado fallido','error');
        }
    </script>
  </body>
</html>

