<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class TabelIndikator extends Model
{
    protected $table         = 'indikator_dinas';
    protected $primaryKey    = 'indikator_dinas';
    protected $allowedFields = ['indikator_dinas', 'divisi_indikator', 'target_indikator', 'triwulan_1', 'triwulan_2', 'triwulan_3', 'triwulan_4'];
    protected $column_order  = ['', 'indikator_dinas', 'divisi_indikator', 'target_indikator', 'triwulan_1', 'triwulan_2', 'triwulan_3', 'triwulan_4', '',];
    protected $column_search = ['indikator_dinas', 'divisi_indikator', 'target_indikator', 'triwulan_1', 'triwulan_2', 'triwulan_3', 'triwulan_4'];
    protected $order         = ['divisi_indikator' => 'ASC'];
    protected $request;
    protected $db;
    protected $builder;

    public function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->builder = $this->db->table($this->table);
    }

    public function countUniqueValues()
    {
        $this->db->distinct();
        $this->db->select("divisi_indikator");
        $this->db->from($this->table);

        $query = $this->db->get();

        return $query->num_rows();
    }

    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->builder->groupStart();
                    $this->builder->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->builder->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->builder->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->builder->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->builder->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($this->request->getPost('length') != -1)
            $this->builder->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->builder->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->builder->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
}
