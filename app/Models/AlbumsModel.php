<?php
namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model

{

    public function listarNombres(){
        $Nombres = $this->db->query("SELECT * FROM albums");
        return $Nombres->getResult();
    }
    
    protected $table         = 'albums';
    protected $message        = 'mensaje';

    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name'];
    protected $allowedFieldsA = ['author'];
    protected $foreingKey = ['genre_id'];
    protected $returnType    = \App\Entities\Album::class;
    //Asignar la variable en false, para evitar created, updated
    protected $useTimestamps = false;

    public function actualizar($data, $id){
        $Nombres = $this->db->table('albums');
        $Nombres->set($data);
        $Nombres->where('id', $id);
        return $Nombres->update();  
    }
    public function insertar($datos){
        $Nombres = $this->db->table('albums');
        $Nombres->insert($datos);

        return $this->db->insertID();
    }
    public function eliminar($data){
        $Nombres = $this->db->table('albums');
        $Nombres->where($data); 
        return $Nombres->delete();                           
    }
}