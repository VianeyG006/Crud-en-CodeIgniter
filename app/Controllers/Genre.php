<?php

namespace App\Controllers;

class Genre extends BaseController
{
    public function index()
    {
      //Accedemos al modelo
      $genreModel = new \App\Models\GenreModel();
      //Recuperamos todos los registros por medio de la funcion find()
      $data = $genreModel->listarNombres();
      $mensaje = session('mensaje');
      //Asignamos lo recuperado
      $data = [
        "genres" => $data,
        "mensaje" => $mensaje
    ];
      //regresamos la vista a mostrar
      return view('genre/index',$data);//pasamos como argumento el vector con el indice 'genres'
    }

    //Funcion a invocarse desde la vista index
    //@args id del genre a editar
    public function edit($id){
      //recibimos como argumento del anchor <a></a> el id del genre a modificar
      //Accedemos al modelo
      $genreModel = new \App\Models\GenreModel();
      //Recuperamos el registro por medio de la funcion find(), filtrando por $id
      $data['genre'] = $genreModel->find($id);//Asignamos lo recuperado
      //regresamos la vista a mostrar
      return view('genre/edit',$data);//pasamos como argumento el vector con el indice 'genres'
    }

    public function new(){
      return view('genre/new');
    }
  //Guardar datos de un nuevo genero
    public function save(){

      $genreModel = new \App\Models\GenreModel();

      $genre = $this->request->getPost();

      // Create
      $g = new \App\Entities\Genre();
      $g->name = $genre['name'];
      
        
      $genreModel->save($g);
       return redirect()->to('http://localhost/proyecto/public/genre')->with('mensaje', '1');
      
      
      //redicteccionar al controlador/funcion
     
    }

    //Actualizar datos de un nuevo genero
    public function update(){
      //Instanciar modelo
      $genreModel = new \App\Models\GenreModel();
      //Recuperar valores del FORM por POST
      $genre_name = $this->request->getPost('name');
      $genre_id = $this->request->getPost('id');
      //Buscar en la DB el registro filtrando por ID
      $genreUpdate = $genreModel->find($genre_id);//Asignamos lo recuperado
      //Asignar valores a cambiar al registro recuperado de la DB
      $genreUpdate->name = $genre_name;
      $genreUpdate->id = $genre_id;
      //Actualizar registro ($id,[data])
      $genreModel->update($genreUpdate->id, $genreUpdate);
      return redirect()->to('http://localhost/proyecto/public/genre')->with('mensaje', '2');
      //redicteccionar al controlador/funcion
      
    }

    public function delete($id = NULL)
    {
 
      $genreModel = new \App\Models\GenreModel();
 
        if ($genreModel->find($id) == NULL) {
            throw PageNotFoundException::forPageNotFound();
        }
 
        $genreModel->delete($id);
 
        return redirect()->to('http://localhost/proyecto/public/genre')->with('mensaje', '4');
    }
    
}
