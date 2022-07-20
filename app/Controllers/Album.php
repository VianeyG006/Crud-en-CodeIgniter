<?php

namespace App\Controllers;

class Album extends BaseController
{
    public function index()
    {
      $albumModel = new \App\Models\AlbumsModel();
      //Recuperamos todos los registros por medio de la funcion find()
      $data = $albumModel->listarNombres();//Asignamos lo recuperado
      $mensaje = session('mensaje');
      //Accedemos al modelo
      $genreModel = new \App\Models\GenreModel();
      //Recuperamos todos los registros por medio de la funcion find()
       $datag = $genreModel->listarNombres();
      $data = [
          "albums" => $data,
          "genres" => $datag,
          "mensaje" => $mensaje
      ]; 
      //regresamos la vista a mostrar
      return view('album/index',$data);//pasamos como argumento el vector con el indice 'genres'
    }

    //Funcion a invocarse desde la vista index
    //@args id del genre a editar
    public function edit($id){
      //recibimos como argumento del anchor <a></a> el id del genre a modificar
      //Accedemos al modelo
      $albumModel = new \App\Models\AlbumsModel();
      $genreModel = new \App\Models\GenreModel();
      //Recuperamos todos los registros por medio de la funcion find()
       $datag = $genreModel->listarNombres();
       $mensaje = session('mensaje');
      //Recuperamos el registro por medio de la funcion find(), filtrando por $id
      $data1['albums'] = $albumModel->find($id);//Asignamos lo recuperado
      $data=[
        "genres" => $datag,
        "albums" =>$data1['albums'],
        "mensaje" => $mensaje
      ];
      //regresamos la vista a mostrar
      return view('album/edit',$data);//pasamos como argumento el vector con el indice 'genres'
    }

    public function new(){
      return view('album/new');
    }
  //Guardar datos de un nuevo genero
    public function save(){

      $datos = [
        "name" => $_POST['name'],
        "author" => $_POST['author'],
        "genre_id" => $_POST['genre_id']
    ];


    $albumModel = new \App\Models\AlbumsModel();
    $respuesta = $albumModel->insertar($datos);
    if($respuesta > 0){
        return redirect()->to('http://localhost/proyecto/public/album')->with('mensaje', '1');
    }else{
        return redirect()->to('http://localhost/proyecto/public/album')->with('mensaje', '0');
    }

    }

    //Actualizar datos de un nuevo genero
    public function update(){

      $datos = [
        "name" => $_POST['name'],
        "author" => $_POST['author'],
        "genre_id" => $_POST['genre_id']
    ];

    $id = $_POST['id'];
    $albumModel = new \App\Models\AlbumsModel();
    //$Crud = new CrudModel();

    $respuesta = $albumModel->actualizar($datos, $id);

    if($respuesta > 0){
        return redirect()->to('http://localhost/proyecto/public/album')->with('mensaje', '2');
    }else{
        return redirect()->to('http://localhost/proyecto/public/album')->with('mensaje', '3');
    }
     
    }

    public function delete($id = NULL)
    {

      

 
      $albumModel = new \App\Models\AlbumsModel();
 
        if ($albumModel->find($id) == NULL) {
            throw PageNotFoundException::forPageNotFound();
        }
 
        $albumModel->delete($id);
 
        return redirect()->to('http://localhost/proyecto/public/album')->with('mensaje', '4');
    }
    
}
