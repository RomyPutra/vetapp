<?php namespace App\Models;
use CodeIgniter\Model;
 
class Pasien_model extends Model
{
    protected $table = 'pasien';
     
    public function getPasien($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['PasienId' => $id]);
        }  
    }
 
    public function insertPasien($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePasien($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['PasienId' => $id]);
    }

    public function deletePasien($id)
    {
        return $this->db->table($this->table)->delete(['PasienId' => $id]);
    } 

    public function getNewPasien()
    {
        $list = '';
        $i = 0;
        $query = $this->db->query("SELECT DISTINCT PasienId FROM pasien")->getResultArray();
        foreach ($query as $key => $value) {
            if ($i == 0)
            {
               $list .= $value['PasienId'];
            }
            else 
            {
                $list .= '\',\'';
                $list .= $value['PasienId'];
            }
            $i++;
        }
        $result = $this->db->query("SELECT * FROM pasien WHERE PasienId NOT IN ('".$list."')")->getResultArray();
        log_message("info", "User Log: ".$this->db->getLastQuery());
        return $result;
    }
 
}