<?php
/*
this model is commonly used for all pages..
like index page, sign in etc.
*/

class Common_model extends CI_Model
{
	function __construct()
    {
         parent::__construct();
    }

	public function get_single_record($table, $id, $where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($id, $where);
		$query = $this->db->get();
		return $row = $query->row_array();
	}

	// this function returns table data.
	function getRecords($table, $fields="", $condition="", $orderby="", $single_row=false, $groupby="", $count="") //$condition is array
	{
		if($fields != "")
		{
			$this->db->select($fields);
		}

		if($orderby != "")
		{
			$this->db->order_by($orderby);
		}

		if($groupby != "")
		{
			$this->db->group_by($groupby);
		}

		if($condition != "")
		{
			$rs = $this->db->get_where($table,$condition);
		}
		else
		{
			$rs = $this->db->get($table);
		}

		if($single_row)
		{
			return $rs->row_array();
		}
		return $rs->result_array();

	}


	// this function is to add/edit data into table .
	// this function is to add/edit data in only one table at a time.
	function addEditRecords($table_name, $data_array, $where='', $unique='')
	{
		if($table_name && is_array($data_array))
		{
			$columns = $this->getTableFields($table_name);
			foreach($columns as $coloumn_data)
						  $column_name[]=$coloumn_data['Field'];

			foreach($data_array as $key=>$val)
			{
				if(in_array(trim($key),$column_name))
				{
					$data[$key] = $val;
				}
			 }

			if($where == "")
			{
				if(is_array($unique))
				{
					$this->db->select('*');
					$this->db->from($table_name);
					$this->db->where($unique['field'], $unique['value']);

					$query = $this->db->get();

					if ($query->num_rows() > 0)
					{
						return "unique";
					}
					else
					{
						$query = $this->db->insert_string($table_name, $data);
						$this->db->query($query);
						return  $this->db->insert_id();
					}
				}
				else
				{
					$query = $this->db->insert_string($table_name, $data);
					$this->db->query($query);
					return  $this->db->insert_id();
				}
			}
			else
			{
				$query = $this->db->update_string($table_name, $data, $where);
				$this->db->query($query);
				return  $this->db->affected_rows();
			}
		}
	}

	function getNumRecords($table, $fields="", $condition="")
	{
		if($fields != "")
		{
			$this->db->select($fields);
		}
		if($condition != "")
		{
			$rs = $this->db->get_where($table,$condition);
		}
		else
		{
			$rs = $this->db->get($table);
		}
		return $rs->num_rows();
	}

	// function for deleting records by condition.
	function deleteRecords($table, $where)
	{
		$this->db->delete($table, $where);
		return $this->db->affected_rows();
	}

	// this function is used to get all the fields of a table.
	function getTableFields($table_name)
	{
		$query = "SHOW COLUMNS FROM ".$this->db->dbprefix($table_name);
		$rs = $this->db->query($query);
		return $rs->result_array();
	}

	// This function is used to set up mail configuration..
	function setMailConfig()
	{
		$config['smtp_host'] = SMTP_HOST;
		$config['smtp_user'] = SMTP_USER;
		$config['smtp_pass'] = SMTP_PASS;
		$config['smtp_port'] = SMTP_PORT;
		$config['protocol'] = PROTOCOL;
		$config['mailpath'] = MAILPATH;
		$config['mailtype'] = MAILTYPE;
		$config['charset'] = CHARSET;
		$config['wordwrap'] = WORD_WRAP;
		$config['newline'] = WORD_WRAP;
		$config['crlf'] = WORD_WRAP;

		$this->email->initialize($config);
		$this->load->library('email', $config);
	}

	function sendEmail()
	{
		$this->email->send();
		// if($this->email->send()){
	    //   echo 'Email sent.';
		//  	}else{
	    //  show_error($this->email->print_debugger());
	    // }
	}

	//Related functon
	public function get_userid_by_username($email)
	{
		$details=  $this->common_model->getRecords('admin','admin_id', array('email'=>$email),'', true);
		if($details)
		{
			return $details['admin_id'];
		}
	}

	function Datatables($dt)
    {
		$columns = implode(', ', $dt['col_display']) . ', ' . $dt['id_table'];

		$join = $dt['join'];

        $sql  = "SELECT {$columns} FROM {$dt['table']} {$join}";

        $data = $this->db->query($sql);

        $rowCount = $data->num_rows();

        $data->free_result();

        // conditioning as next action , search and limit
        $columnd = $dt['col_display'];
        $count_c = count($columnd);

        // search
        $search = $dt['search']['value'];

        /**
         * Search Global
         * global search at the top right corner
         */
        $where = '';
        if ($search != '') {
            for ($i=0; $i < $count_c ; $i++) {
                $where .= $columnd[$i] .' LIKE "%'. $search .'%"';

                if ($i < $count_c - 1) {
                    $where .= ' OR ';
                }
            }
        }

        /**
         * Search Individual Columns
         * search under column
         */
        for ($i=0; $i < $count_c; $i++) {
            $searchCol = $dt['columns'][$i]['search']['value'];
            if ($searchCol != '') {
                $where = $columnd[$i] . ' LIKE "%' . $searchCol . '%" ';
                break;
            }
        }

        /**
         *Form checking search
         * active search if no characters entered in the search field .
         */
		if ($where != '') {
            $sql .= " WHERE " . $where;

        }

        // sorting
        $sql .= " ORDER BY {$columnd[$dt['order'][0]['column']]} {$dt['order'][0]['dir']}";

        // limit
        $start  = $dt['start'];
        $length = $dt['length'];

        $sql .= " LIMIT {$start}, {$length}";

        $list = $this->db->query($sql);
		$list->result();

        /**
         * convert to json
         */
        $option['draw']            = $dt['draw'];
        $option['recordsTotal']    = $rowCount;
        $option['recordsFiltered'] = $rowCount;
        $option['data']            = array();
		$option['data']            = $list->result();

		return $option;
		//
		// //print_r($list->result());die;
		//
        // foreach ($list->result() as $row) {
		//
        // //Custom use
        // //  $option['data'][] = array(
		// // 					$row->columnd[0],
		// // 					$row->columnd[1],
		// // 					$row->columnd[2],
		// // 			);
		//
        //    $rows = array();
        //    for ($i=0; $i < $count_c; $i++) {
        //        $rows[] = $row->$columnd[$i];
        //    }
        //    $option['data'][] = $rows;
        // }
        // // execution json
        // return $option;
    }

}
