<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('email', $post['email']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

    // start datatables
    var $column_order = array(null, 'username', 'password', 'email', 'foto', 'level'); //set column field database for datatable orderable
    var $column_search = array('username', 'email'); //set column field database for datatable searchable
    var $order = array('id_user' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('tbl_user');
        return $this->db->count_all_results();
    }
    // end datatables

    public function count()
    {
        $query = $this->db->query("SELECT COUNT(id_user) FROM tbl_user");
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('tbl_user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        
        $params['email'] = $post['email'];
        $params['password'] = md5($post['password']);
        $params['username'] = $post['username'];
        $params['level'] = $post['level'];
        $params['foto'] = $post['foto'];
        $this->db->insert('tbl_user', $params);
    }

    public function edit($post)
    {
        $params['email'] = $post['email'];
        if (!empty($post['password'])) {
            $params['password'] = md5($post['password']);
        }
        $params['username'] = $post['username'];
        if(!empty($post['foto'])){
            $params['foto'] = $post['foto'];
        }        
        $params['level'] = $post['level'];
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('tbl_user', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('tbl_user');
    }
}
