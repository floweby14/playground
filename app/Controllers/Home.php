<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

use TCPDF;

class Home extends BaseController{

    public function index() {

        if (session() -> get('id') == NULL) {

            return view('/layout/login');

        } else if (session() -> get('id') > 0) {

            return redirect() -> to('/home/user');

        }

    }

    // ================================================================================================================================ // - Login System

    public function aksi_login() {

        $Schema = new Schema();

        $username = $this -> request -> getPost('username');
        $password = $this -> request -> getPost('password');

        $data = array(
            'username' => $username,
            'password' => md5($password)
        );

        $session = $Schema -> getWhere2('user', $data);

        if ($session > 0) {

            session() -> set('id', $session['id_user']);
            session() -> set('username', $session['username']);
            session() -> set('level', $session['level']);

            return redirect() -> to('/home/user');

        } else {

            return redirect() -> to('/home/');

        }

    }

    public function logout() {

        session() -> destroy();

        return redirect() -> to('/home/');

    }   

    public function user() {

        if (session() -> get('id') == NULL) {

            return redirect() -> to('/home/');

        } else if (session() -> get('id') > 0) {

            $Schema = new Schema();

                // Fetching data

            $on = 'user.level = level.id_level';

            $_fetch['userData'] = $Schema -> visual_table_join2('user', 'level', $on);

            echo view('layout/_heading');
            echo view('pages/data_user', $_fetch);
            echo view('layout/_menu');
            echo view('layout/_footer');

        }

    }

    public function pelanggan() {

        if (session() -> get('id') == NULL) {

            return redirect() -> to('/home/pelanggan');

        } else if (session() -> get('id') > 0) {

            $Schema = new Schema();

                    // Fetching data

                    // $on = 'user.level = level.id_level';

                    // $_fetch['pemasukanData'] = $Schema -> visual_table_join2('user', 'level', $on);
            $_fetch['pelangganData'] = $Schema -> visual_table('pelanggan');

            echo view('layout/_heading');
            echo view('pages/data_pelanggan', $_fetch);
            echo view('layout/_menu');
            echo view('layout/_footer');

        }
        
    }

    public function tambah_data_pelanggan() {

        if(in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();
            
            echo view('layout/_heading');
            echo view('layout/_menu');
            echo view('forms/tambah_data_pelanggan');
            echo view('layout/_footer');

        } else {

            return redirect()->to('/home/');

        }

    }

    public function aksi_tambah_pelanggan() {

        if (in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();
            $nama = $this->request->getPost('nama');
            $tanggal_lahir = $this->request->getPost('tanggal_lahir');
            $tanggal = $this->request->getPost('tanggal');
            
            $masukData = array(
                'nama' => $nama,
                'tanggal_lahir' => $tanggal_lahir,
                'tanggal' => $tanggal,
                
                
            );
            $Schema -> insert_data('data_pelanggan', $pelangganData);
            return redirect()->to('/home/data_pelanggan');

        } else {

            return redirect()->to('/home/');

        }
        
    }

    public function edit_data_pelanggan($id) {

        if(in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();
            $id_pelanggan = array('id_pelanggan' => $id);
            $_fetch['pelangganData'] = $Schema -> getWhere('data_pelanggan', $id_pelanggan);

            echo view('layout/_heading');
            echo view('layout/_menu');
            echo view('forms/edit_data_pelanggan', $_fetch);
            echo view('layout/_footer');

        } else {

            return redirect()->to('/home/');

        }

    }

    public function aksi_edit_data_pelanggan() {

        if (in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();
            $nama = $this->request->getPost('nama');
            $tanggal_lahir = $this->request->getPost('tanggal_lahir');
            $tanggal = $this->request->getPost('tanggal');
           
            

            $where = array('id_pelanggan' => $id_pelanggan);
            $pelangganData = array(
                'nama' => $nama,
                'tanggal_lahir' => $tanggal_lahir,
                'tanggal' => $tanggal,

            );

            if (in_array(session() -> get('level'), [1])) {

                $Schema -> edit_data('data_pelanggan', $pelangganData, $where);

            }

            return redirect()->to('/home/pelanggan');

        } else {

            return redirect()->to('/home/');

        }

    }

    public function hapus_data_pelanggan($id)
    {
        if (in_array(session() -> get('level'), [1])) {

            $Model = new Schema();

            $where = array('id_album'=>$id);
            $Model->delete_data('data_pelanggan',$where);

            return redirect()->to('/Home/data_pelanggan/');

        }else{

            return redirect()->to('/Home');
        }

    }

    public function data_pengeluaran() {

        if (session() -> get('id') == NULL) {

            return redirect() -> to('/home/data_pengeluaran');

        } else if (session() -> get('id') > 0) {

            $Schema = new Schema();

                        // Fetching data

                        // $on = 'user.level = level.id_level';

                        // $_fetch['pengeluaranData'] = $Schema -> visual_table_join2('user', 'level', $on);
            $_fetch['pengeluaranData'] = $Schema -> visual_table('data_pengeluaran');

            echo view('layout/_heading');
            echo view('pages/data_pengeluaran', $_fetch);
            echo view('layout/_menu');
            echo view('layout/_footer');

        }

    }

    public function tambah_data_pengeluaran() {

        if(in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();

            echo view('layout/_heading');
            echo view('layout/_menu');
            echo view('forms/tambah_data_pengeluaran');
            echo view('layout/_footer');

        } else {

            return redirect()->to('/home/');

        }
        
    }

    public function aksi_tambah_data_pengeluaran() {

        if (in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();

            $tanggal = $this->request->getPost('tanggal');
            $nama_barang = $this->request->getPost('nama_barang');
            $keterangan = $this->request->getPost('keterangan');
            $total = $this->request->getPost('total');
            $created_by = $this->request->getPost('created_by');
            $created_at = $this->request->getPost('created_at');
            
            $pengeluaranData = array(
                'tanggal' => $tanggal,
                'nama_barang' => $nama_barang,
                'keterangan' => $keterangan,
                'total' => $total,
                'created_by' => $created_by,
                'created_at' => $created_at,
            );
            $Schema -> insert_data('data_pengeluaran', $pengeluaranData);
            return redirect()->to('/home/data_pengeluaran');
            
        } else {

            return redirect()->to('/home/');
            
        }

    }

    public function edit_data_pengeluaran($id) {

        if(in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();

            $id_pengeluaran = array('id_pengeluaran' => $id);
            $_fetch['pengeluaranData'] = $Schema -> getWhere('data_pengeluaran', $id_pengeluaran);

            echo view('layout/_heading');
            echo view('layout/_menu');
            echo view('forms/edit_data_pengeluaran', $_fetch);
            echo view('layout/_footer');

        } else {

            return redirect()->to('/home/');

        }
        
    }
    
    public function aksi_edit_data_pengeluaran() {

        if (in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();

            $tanggal = $this->request->getPost('tanggal');
            $nama_barang = $this->request->getPost('nama_barang');
            $keterangan = $this->request->getPost('keterangan');
            $total = $this->request->getPost('total');
            $id_pengeluaran = $this -> request -> getPost('id_pengeluaran');

            $where = array('id_pengeluaran' => $id_pengeluaran);
            $pengeluaranData = array(
                'tanggal' => $tanggal,
                'nama_barang' => $nama_barang,
                'keterangan' => $keterangan,
                'total' => $total,
            );

            if (in_array(session() -> get('level'), [1])) {

                $Schema -> edit_data('data_pengeluaran', $pengeluaranData, $where);

            }

            return redirect()->to('/home/data_pengeluaran');

        } else {

            return redirect()->to('/home/');

        }
        
    }

    public function hapus_data_pengeluaran($id) {

        if (in_array(session() -> get('level'), [1])) {

            $Model = new Schema();

            $where = array('id_pengeluaran'=>$id);

            $Model->delete_data('data_pengeluaran',$where);

            return redirect()->to('/Home/data_pengeluaran/');

        }else{

            return redirect()->to('/Home');
        }

    }

    public function data_gaji() {

        if (session() -> get('id') == NULL) {

            return redirect() -> to('/home/data_gaji');
            
        } else if (session() -> get('id') > 0) {

            $Schema = new Schema();
            
                            // Fetching data
            
                            // $on = 'user.level = level.id_level';

                            // $_fetch['pengeluaranData'] = $Schema -> visual_table_join2('user', 'level', $on);
            $_fetch['gajiData'] = $Schema -> visual_table('data_gaji');
            
            echo view('layout/_heading');
            echo view('pages/data_gaji', $_fetch);
            echo view('layout/_menu');
            echo view('layout/_footer');
            
        }

    }

    public function tambah_data_gaji() {

        if(in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();
            
            echo view('layout/_heading');
            echo view('layout/_menu');
            echo view('forms/tambah_data_gaji');
            echo view('layout/_footer');
            
        } else {

            return redirect()->to('/home/');
            
        }

    }

    public function aksi_tambah_data_gaji() {

        if (in_array(session() -> get('level'), [1])) {

            $Schema = new Schema();

            $nama = $this->request->getPost('nama');
            $tanggal = $this->request->getPost('tanggal');
            $keterangan = $this->request->getPost('keterangan');
            $total = $this->request->getPost('total');

            $gajiData = array(
                'nama' => $nama,
                'tanggal' => $tanggal,
                'keterangan' => $keterangan,
                'total' => $total,
            );
            $Schema -> insert_data('data_gaji', $gajiData);
            return redirect()->to('/home/data_gaji');

        } else {

            return redirect()->to('/home/');

        }

    }

    public function hapus_data_gaji($id) {

        if (in_array(session() -> get('level'), [1])) {

            $Model = new Schema();

            $where = array('id_gaji'=>$id);

            $Model->delete_data('data_gaji',$where);

            return redirect()->to('/Home/data_gaji/');

        }else{

            return redirect()->to('/Home');
        }

    }

    public function laporan()
    {
        $Model = new Schema();
        $kui['kunci']='view_lpk';

        // $id=session()->get('id');
        // $where=array('id_user'=>$id);
        // $kui['foto']=$model->getRow('user',$where);

        echo view('layout/_heading',$kui);
        echo view('layout/_menu');
        echo view('laporan/filter');
        echo view('layout/_footer');
    }

    public function print_laporan_keuangan()
    {
        $model=new Schema();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $kui['duar']=$model->filterTransaksi('data_pemasukan', 'data_pengeluaran', 'data_gaji',$awal,$akhir);

        echo view('laporan/laporan_keuangan',$kui);
    }

    public function pdf_laporan_keuangan()
    {
        $model=new Schema();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');

        $kui['duar']=$model->filterTransaksi('data_pemasukan', 'data_pengeluaran', 'data_gaji',$awal,$akhir);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->loadHtml(view('laporan/laporan_keuangan',$kui));
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>false));
        exit();
    }

    public function excel_laporan_keuangan()
    {
        $model = new Schema();
        $awal = $this->request->getPost('awal');
        $akhir = $this->request->getPost('akhir');

        $duar = $model->filterTransaksi('data_pemasukan', 'data_pengeluaran', 'data_gaji', $awal, $akhir);

        if (isset($duar['table1'], $duar['table2']) && is_iterable($duar['table1']) && is_iterable($duar['table2'])) {
            $debit = $duar['table1'];
            $kredit = $duar['table2'];
            $gaji = $duar['table3'];

            $spreadsheet = new Spreadsheet();
            $spreadsheet->setActiveSheetIndex(0);

            $sheet = $spreadsheet->getActiveSheet();

            $sheet->setCellValue('A1', 'Tanggal');
            $sheet->setCellValue('B1', 'Keterangan');
            $sheet->setCellValue('C1', 'Nama Barang / Transaksi');
            $sheet->setCellValue('D1', 'Debit');
            $sheet->setCellValue('E1', 'Kredit');

            $cellRange = 'A1:E1';
            $sheet->getStyle($cellRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('eae657');

            $row = 2;

            $totalDebit = 0;
            $totalKredit = 0;
            $totalKreditt = 0;

            foreach ($debit as $entry) {
                $sheet->setCellValue('A' . $row, date('j-F-Y', strtotime($entry->tanggal)));
                $sheet->setCellValue('B' . $row, 'Data Pemasukan');
                $sheet->setCellValue('C' . $row, $entry->nama_transaksi);

                $debitCellValue = "Rp. " . number_format($entry->total, 0, ',', ',');
                $sheet->setCellValue('D' . $row, $debitCellValue);

                $sheet->setCellValue('E' . $row, '');

                $cellRange = "C{$row}:D{$row}";
                $sheet->getStyle($cellRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('eae657');

                $totalDebit += $entry->total;

                $row++;
            }

            foreach ($kredit as $entry) {
                if (is_numeric($entry->total) && strpos($entry->keterangan, '-') === false && strpos($entry->keterangan, '~') === false) {
                    $sheet->setCellValue('A' . $row, date('j-F-Y', strtotime($entry->tanggal)));
                    $sheet->setCellValue('B' . $row, 'Data Pengeluaran');
                    $sheet->setCellValue('C' . $row, $entry->nama_barang . ' ' . $entry->keterangan);

                    $kreditCellValue = "Rp. " . number_format($entry->total, 0, ',', ',');
                    $sheet->setCellValue('E' . $row, $kreditCellValue);

                    $totalKredit += $entry->total;

                    $row++;
                }
            }

            foreach ($gaji as $entry) {
                if (strpos($entry->keterangan, '-') === false && strpos($entry->keterangan, '~') === false) {
                    $sheet->setCellValue('A' . $row, date('j-F-Y', strtotime($entry->tanggal)));
                    $sheet->setCellValue('B' . $row, 'Data Gaji');
                    $sheet->setCellValue('C' . $row, $entry->nama . ' ' . $entry->keterangan);
                    $sheet->setCellValue('D' . $row, '');

                    $gajiCellValue = "Rp. " . number_format($entry->total, 0, ',', ',');
                    $sheet->setCellValue('E' . $row, $gajiCellValue);

                    $totalKreditt += $entry->total;

                    $row++;
                }
            }

            $sheet->setCellValue('A' . $row, '');
            $sheet->setCellValue('B' . $row, '');
            $sheet->setCellValue('C' . $row, 'Jumlah');
            $sheet->setCellValue('D' . $row, $totalDebit); 
            $sheet->setCellValue('E' . $row, $totalKredit + $totalKreditt); 

            $debitRange = 'D2:D' . $row;
            $kreditRange = 'E2:E' . $row;

            $currencyFormat = '"Rp."#,##0';
            $sheet->getStyle($debitRange)->getNumberFormat()->setFormatCode($currencyFormat);
            $sheet->getStyle($kreditRange)->getNumberFormat()->setFormatCode($currencyFormat);

            $sheet->getStyle('A1:E' . $row)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
            $sheet->getStyle('A1:E1')->getFont()->setBold(true);
            $sheet->getStyle('A' . $row . ':E' . $row)->getFont()->setBold(true);
            $sheet->getStyle('A' . $row . ':E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $fileName = 'Laporan Keuangan Tuan Muda.xlsx';

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename=' . $fileName);
            header('Cache-Control: max-age=0');

            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        } else {
            return redirect()->to('/home/laporan_keuangan')->with('error', 'Invalid data structure');
        }
    }
}

