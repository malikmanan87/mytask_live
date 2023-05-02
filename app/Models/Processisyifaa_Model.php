<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Processisyifaa_model extends Model
{
    protected $table      = 'newisyifaa';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['locationisyifaa', 'userisyifaa', 'descriptionisyifaa', 'status', 'created_by', 'created_at', 'updated_at', 'deleted_at'];
    
    
    // public function getRecords($id = false)
    // {
    //     if ($id === false) {
    //         return $this->findAll();
    //     } else {
    //         return $this->find($id);
    //     }
    // }

    // public function getStat($id)
    // {
    //     if ($this->where('status', $id)->findColumn('status')) {
    //         return count($this->where('status', $id)->findColumn('status'));
    //     } else return '0';
    // }

    // public function countAllRecord()
    // {
    //     return count($this->findAll());
    // }

    // public function getStatus($id)
    // {
    //     if ($id == 0) {
    //         return $this->where('status', 0)->findAll();
    //     } elseif ($id == 1) {
    //         return $this->whereIn('status', [1, 11])->findAll();
    //     } elseif ($id == 2) {
    //         return $this->where('status', 2)->findAll();
    //     } elseif ($id == 3) {
    //         return $this->where('status', 3)->findAll();
    //     } else
    //         return;
    // }

    // public function changeStatus1($id, $emailattendee)
    // {
    //     $now = new Time('now');
    //     return $this->update($id, ['status' => 1, 'attendee' => $emailattendee, 'updated_at' => $now]);
    // }

    // public function getReport($email = false)
    // {
    //     if ($email === false) {

    //         $queryawi = "select DISTINCT newcomplain.attendee,table1.cur_month, table1.cur_year, table1.cur_ticket, table2.cum_ticket from newcomplain
    //         left join (
    //             select DISTINCT attendee, month(created_at) as cur_month, year(created_at) as cur_year, count(ticket_id) as cur_ticket
    //             from newcomplain
    //             where month(created_at) = month(CURRENT_DATE) and year(created_at) = year(CURRENT_DATE)
    //             GROUP BY attendee, month(created_at), year(created_at)
    //         ) as table1 on table1.attendee = newcomplain.attendee
    //         left join (
    //             select DISTINCT attendee, COUNT(ticket_id) as cum_ticket
    //             FROM newcomplain
    //             group by attendee
    //         ) as table2 on table2.attendee = newcomplain.attendee
    //         where newcomplain.attendee != ''
    //         order by table2.cum_ticket desc";

    //         $db = db_connect();
    //         $query = $db->query($queryawi);
    //         $query = $query->getResultArray();
    //         return $query;
    //     } else {
    //         return $this->where('attendee', $email)->findAll();
    //     }
    // }

    // public function getMonthly($a, $b)
    // {
    //     return $this->where('attendee', $a)->where('month(created_at)', $b)->findAll();
    // }

    // public function getCumulative($a)
    // {
    //     return $this->where('attendee', $a)->findAll();
    // }

    // public function toUpdate($id, $u1, $u2, $u3, $u4, $u5, $u6, $u7)
    // {
    //     return $this->update($id, ['cat_device' => $u1, 'cat_problem' => $u2, 'location' => $u3, 'temp_user' => $u4, 'phone' => $u5, 'description' => $u6, 'progress' => $u7]);
    // }

    // public function getChart1($id)
    // {
    //     return $this->where('cat_device', $id)->find();
    // }
    // public function getChart2($id)
    // {
    //     return $this->where('cat_device', $id)->findAll();
    // }
    // public function getChart3($id)
    // {
    //     return $this->where('cat_device', $id)->findAll();
    // }
    // public function getChart4($id)
    // {
    //     return $this->where('cat_device', $id)->findAll();
    // }
    // public function getChart5($id)
    // {
    //     return $this->where('cat_device', $id)->findAll();
    // }
    // public function getChart6($id)
    // {
    //     return $this->where('cat_device', $id)->findAll();
    // }
    // public function getChart7($id)
    // {
    //     return $this->where('cat_device', $id)->findAll();
    // }

    // public function getRank1(Type $var = null)
    // {
    //     $rank1 = ("select * from (SELECT DISTINCT attendee,COUNT(ticket_id) as cum_ticket FROM newcomplain group by attendee) as table1 where table1.cum_ticket = (
    //         select max(tbl2.cum_ticket) 
    //             from (
    //                 SELECT DISTINCT attendee,COUNT(ticket_id) as cum_ticket FROM newcomplain group by attendee) as tbl2
    //                 );");

    //     $db = db_connect();
    //     $query = $db->query($rank1);
    //     $query = $query->getResultArray();
    //     return $query;
    // }

    // public function getRank2(Type $var = null)
    // {
    //     $rank2 = ("
    //     select * from 
    //         (
    //             SELECT DISTINCT attendee,COUNT(ticket_id) as cum_ticket FROM newcomplain group by attendee
    //         ) as table1 where table1.cum_ticket
    //     = 
    //     (
    //         select max(tbl3.cum_ticket) 
    //         from 
    //         (
    //             select * from (SELECT DISTINCT attendee,COUNT(ticket_id) as cum_ticket FROM newcomplain group by attendee) 
    //             as table1 
    //             where 
    //             table1.cum_ticket <  
    //                 (
    //                     select max(tbl2.cum_ticket) from 
    //                     (
    //                         SELECT DISTINCT attendee,COUNT(ticket_id) 
    //                         as cum_ticket 
    //                         FROM 
    //                         newcomplain group by attendee
    //                     ) 
    //                     as tbl2
    //                 )
    //         ) 
    //         as tbl3
    //     );");

    //     $db = db_connect();
    //     $query = $db->query($rank2);
    //     $query = $query->getResultArray();
    //     return $query;
    // }

    // public function getRank3(Type $var = null)
    // {
    //     $rank3 = ("
    //         select * from 
    //         (SELECT DISTINCT attendee,COUNT(ticket_id) as cum_ticket FROM newcomplain group by attendee) 
    //         as table1 where table1.cum_ticket
    //         = 
    //         (select max(tbl4.cum_ticket) from 
    //             (SELECT * FROM
    //                 (SELECT DISTINCT attendee, COUNT(ticket_id) AS cum_ticket FROM newcomplain GROUP BY attendee) AS table1
    //             WHERE
    //             table1.cum_ticket <
    //                 ( select max(tbl3.cum_ticket) 
    //                 from 
    //                     ( select * from (SELECT DISTINCT attendee,COUNT(ticket_id) as cum_ticket FROM newcomplain group by attendee) as table1 
    //                     where 
    //                     table1.cum_ticket <  
    //                         ( select max(tbl2.cum_ticket) from ( SELECT DISTINCT attendee,COUNT(ticket_id) as cum_ticket FROM newcomplain group by attendee ) as tbl2 )
    //                     ) 
    //                 as tbl3
    //                 )
    //             ) as tbl4 
    //         )
    //     ");
    //     $db = db_connect();
    //     $query = $db->query($rank3);
    //     $query = $query->getResultArray();
    //     return $query;
    // }
}
