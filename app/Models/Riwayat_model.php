<?php namespace App\Models;
use CodeIgniter\Model;
 
class Riwayat_model extends Model
{
    protected $table = 'riwayatpasien';
     
    public function getRiwayat($id = false)
    {
        $this->join('pasien', 'pasien.PasienId = riwayatpasien.PasienId', 'LEFT');
        $this->select('pasien.PasienName');
        $this->select('riwayatpasien.*');
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
 
    public function get_max($id = NULL, $single = TRUE){
            $idmax = 'MAX(RiwayatId)';    
            $query = $this->db->query("SELECT $idmax AS max FROM riwayatpasien ORDER BY RiwayatId DESC LIMIT 0,1")->getRow()->max;
            // log_message("info", "Riwayat Log: ".$this->db->getLastQuery());
            $thn = date("y");
            $urut = 1;
            if (isset($query)) {
                $exp = explode("VET-HI-", $query);
                $explode = array_pop($exp);
                $tahun = substr($explode, 0, 2);
                $tmpu = (int) substr($explode, 3, 5);
                if ($tahun == $thn) {
                    $urut = $tmpu + 1;
                } else {
                    $urut = 1;
                }
                $kode = "VET-HI-" . $thn . "-" . sprintf("%05s", $urut);
            } else {
                $kode = "VET-HI-" . $thn . "-" . sprintf("%05s", $urut);
            }
            return $kode;
    }
}