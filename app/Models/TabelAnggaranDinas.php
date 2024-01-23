<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class TabelAnggaranDinas extends Model
{
    protected $table         = 'anggaran_dinas';
    protected $primaryKey    = 'tahun_ag_dinas';
    protected $allowedFields = ['tahun_ag_dinas', 'pagu_dinas', 'realisasi_dinas_tw1', 'realisasi_dinas_tw2', 'realisasi_dinas_tw3', 'realisasi_dinas_tw4'];
    protected $column_order  = ['tahun_ag_dinas', 'pagu_dinas', 'realisasi_dinas_tw1', 'realisasi_dinas_tw2', 'realisasi_dinas_tw3', 'realisasi_dinas_tw4', ''];
    protected $column_search = ['tahun_ag_dinas', 'pagu_dinas', 'realisasi_dinas_tw1', 'realisasi_dinas_tw2', 'realisasi_dinas_tw3', 'realisasi_dinas_tw4'];
    protected $order         = ['tahun_ag_dinas' => 'ASC'];
    protected $returnType    = 'array';
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
