<?php
namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
    

    public function listarNombres(){
        $Nombres = $this->db->query("SELECT * FROM genres");
        return $Nombres->getResult();
    }
    protected $table         = 'genres';
    
    protected $message        = 'mensaje';
    protected $primaryKey    = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name'];

    protected $returnType    = \App\Entities\Genre::class;
    //Asignar la variable en false, para evitar created, updated
    protected $useTimestamps = false;
}
