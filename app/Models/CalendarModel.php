<?php

namespace App\Models;

use CodeIgniter\Model;

class CalendarModel extends Model
{
    protected $table= "calendar";
    protected $primaryKey="id";
    protected $returnType="array";
    protected $allowedFields=['title','start','end'];
    protected $useTimestamps=true;


    public function getEvents($start,$end)  {
        return $this->db->table($this->table)->
        where('start >=',$start)->
        where("end<=",$end)->
        get()->getResult();
    }
}
