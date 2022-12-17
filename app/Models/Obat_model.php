<?php namespace App\Models;
use CodeIgniter\Model;
 
class Obat_model extends Model
{
    protected $table = 'obat';
     
    public function getObat($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['ObatId' => $id]);
        }  
    }
 
    public function insertObat($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateObat($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ObatId' => $id]);
    }

    public function deleteObat($id)
    {
        return $this->db->table($this->table)->delete(['ObatId' => $id]);
    } 

    public function getNewObat()
    {
        $list = '';
        $i = 0;
        $query = $this->db->query("SELECT DISTINCT ObatId FROM obat")->getResultArray();
        foreach ($query as $key => $value) {
            if ($i == 0)
            {
               $list .= $value['ObatId'];
            }
            else 
            {
                $list .= '\',\'';
                $list .= $value['ObatId'];
            }
            $i++;
        }
        $result = $this->db->query("SELECT * FROM obat WHERE ObatId NOT IN ('".$list."')")->getResultArray();
        log_message("info", "User Log: ".$this->db->getLastQuery());
        return $result;
    }
 
}