<?php namespace App\Models;

use CodeIgniter\Model;

class Schema extends Model {

	// Notes: If you change the files name, make sure to also change class name.

	/* ---------------------------------------------------------------------- */

		public function visual_table($table) {

			return $this -> db -> table($table) -> get() -> getResult();

		}

		public function visual_table_join2($table1, $table2, $on) {

			return $this -> db -> table($table1) -> join($table2, $on, 'left') -> get() -> getResult();
		
		}

		public function visual_table_join3($table1, $table2, $table3, $on1, $on2) {

			return $this -> db -> table($table1) -> join($table2, $on1, 'left') -> join($table3, $on2, 'left') -> get() -> getResult();
			
		}

		public function visual_table_join4($table1, $table2, $table3, $table4, $on1, $on2, $on3) {

			return $this -> db -> table($table1) -> join($table2, $on1, 'left') -> join($table3, $on2, 'left') -> join($table4, $on3, 'left') -> get() -> getResult();
			
		}

	/* ---------------------------------------------------------------------- */

		public function insert_data($table, $data) {

			return $this -> db -> table($table) -> insert($data);
		
		}
		
		public function edit_data($table, $data, $where) {
		
			return $this -> db -> table($table) -> update($data, $where);

		}
		
		public function delete_data($table, $where) {
		
			return $this -> db -> table($table) -> delete($where);
		
		}

	/* ---------------------------------------------------------------------- */

		public function getWhere($table, $where) {

			return $this -> db -> table($table) -> getWhere($where) -> getRow();
		
		}
		
		public function getWhere2($table, $where) {
		
			return $this -> db -> table($table) -> getWhere($where) -> getRowArray();
		
		}

	/* ---------------------------------------------------------------------- */

		public function getWhere_table_join_2($table1, $table2, $on, $where) {

			return $this -> db -> table($table1) -> join($table2, $on, 'left') -> getWhere($where) -> getRow();
			
		}

		public function getData()
    {
        $query = $this->db->table('user')
			// ->select('user.id_user, user.username, user.email, user.password, level.nama_level, user._CreatedAt, user._CreatedBy')
            ->join('level', 'user.level = level.id_level', 'left')
            ->groupBy('user.id_user')
            ->get();
    
        return $query->getResultArray();
    }

    	public function filter($table, $awal, $akhir)
	{
		if (!empty($awal) && !empty($akhir)) {
			return $this->db->table($table)
			->where('tanggal >=', $awal)
			->where('tanggal <=', $akhir)
			->get()
			->getResult();
		} else {
			return [];
		}
	}

	// public function filterTransaksi($table1, $table2, $table3, $awal, $akhir)
	// {
	//     $data['table1'] = $this->db->query(
	//         "SELECT *
	//         FROM $table1
	//         WHERE $table1.tanggal BETWEEN '$awal' AND '$akhir'
	//         ORDER BY $table1.tanggal ASC
	//         "
	//     )->getResult();

	//     $data['table2'] = $this->db->query(
	//         "SELECT *
	//         FROM $table2
	//         WHERE $table2.tanggal BETWEEN '$awal' AND '$akhir'
	//         ORDER BY $table2.tanggal ASC
	//         "
	//     )->getResult();

	//     $data['table3'] = $this->db->query(
	//         "SELECT *
	//         FROM $table3
	//         WHERE $table3.tanggal BETWEEN '$awal' AND '$akhir'
	//         ORDER BY $table3.tanggal ASC
	//         "
	//     )->getResult();

	//     return $data;
	// }

	public function filterTransaksi($table1, $table2, $table3, $awal, $akhir)
	{
	    $orderByClause = "ORDER BY tanggal ASC";

	    $data['table1'] = $this->db->query(
	        "SELECT *
	        FROM $table1
	        WHERE tanggal BETWEEN '$awal' AND '$akhir'
	        $orderByClause"
	    )->getResult();

	    $data['table2'] = $this->db->query(
	        "SELECT *
	        FROM $table2
	        WHERE tanggal BETWEEN '$awal' AND '$akhir'
	        $orderByClause"
	    )->getResult();

	    $data['table3'] = $this->db->query(
	        "SELECT *
	        FROM $table3
	        WHERE tanggal BETWEEN '$awal' AND '$akhir'
	        $orderByClause"
	    )->getResult();

	    return $data;
	}

}