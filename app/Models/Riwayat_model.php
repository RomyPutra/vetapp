<?php namespace App\Models;
use CodeIgniter\Model;
 
class Riwayat_model extends Model
{
    protected $table = 'riwayat';
     
    public function getRiwayat($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['RiwayatId' => $id]);
        }  
    }
 
    public function insertRiwayat($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateRiwayat($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['RiwayatId' => $id]);
    }

    public function deleteRiwayat($id)
    {
        return $this->db->table($this->table)->delete(['RiwayatId' => $id]);
    } 

    public function getNewRiwayat()
    {
        $list = '';
        $i = 0;
        $query = $this->db->query("SELECT DISTINCT RiwayatId FROM riwayatpasien")->getResultArray();
        foreach ($query as $key => $value) {
            if ($i == 0)
            {
               $list .= $value['RiwayatId'];
            }
            else 
            {
                $list .= '\',\'';
                $list .= $value['RiwayatId'];
            }
            $i++;
        }
        $result = $this->db->query("SELECT * FROM riwayatpasien WHERE RiwayatId NOT IN ('".$list."')")->getResultArray();
        log_message("info", "User Log: ".$this->db->getLastQuery());
        return $result;
    }
 
}