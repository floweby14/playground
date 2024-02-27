<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-transform: capitalize;
    }

    .container {
      max-width: 8000px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header img {
      width: 100%;
      height: auto;
    }

    .table-container {
      margin-top: 20px;
    }

    table {
      width: 100%; 
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #000;
      padding: 8px;
    }

    th {
      background-color: #eae657;
    }

    td:nth-child(4) {
      text-align: justify;
      text-transform: capitalize;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Laporan Playground</h1>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
              <th rowspan="2" class="text-center">Tanggal</th>
              <th rowspan="2" class="text-center">Keterangan</th>
              <th rowspan="2" class="text-center">Nama Barang / Transaksi</th>
              <th colspan="2" class="text-center">Saldo</th>
          </tr>
          <tr>
              <th class="text-center">Debit</th>
              <th class="text-center">Kredit</th>
          </tr>
          <tr>
              <td class="text-center"></td>
              <td class="text-center"></td>
              <td class="text-center"></td>
              <td class="text-center"></td>
              <td class="text-center"></td>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $debit = $duar['table1'];
          $totalD = 0;

          foreach ($debit as $entry) {
            $totalD += floatval($entry->total);
            ?>
            <tr>
              <td style="text-align: center;"><?php echo date('j-F-Y', strtotime($entry->tanggal)) ?></td>
              <td>Data Pemasukan</td>
              <td style="background-color: #eae657;"><?php echo $entry->nama_transaksi ?></td>
              <td style="text-align: right; background-color: #eae657;">Rp. <?php echo number_format(floatval($entry->total), 0, ',', ',') ?></td>
              <td style="text-align: center;"></td>
            </tr>
            <?php
          }
          ?>
          <?php
          $no = 1;
          $kredit = $duar['table2'];
          $totalK = 0;

          foreach ($kredit as $entry2) {
            $totalK += floatval($entry2->total);
            ?>
            <tr>
              <td style="text-align: center;"><?php echo date('j-F-Y', strtotime($entry2->tanggal)) ?></td>
              <td>Data Pengeluaran</td>
              <td>
                  <?php
                  $nama_barang = $entry2->nama_barang;
                  $keterangan = $entry2->keterangan;

                  echo $nama_barang;

                  if ($keterangan !== '-' && $keterangan !== '~') {
                      echo ' ' . $keterangan;
                  }
                  ?>
              </td>
              <td style="text-align: center;"></td>
              <td style="text-align: right;">Rp. <?php echo number_format(floatval($entry2->total), 0, ',', ',') ?></td>
            </tr>
            <?php
          }
          ?>
          <?php
          $no = 1;
          $gaji = $duar['table3'];
          $totalKK = 0;

          foreach ($gaji as $entry3) {
            $totalKK += floatval($entry3->total);
            ?>
            <tr>
              <td style="text-align: center;"><?php echo date('j-F-Y', strtotime($entry3->tanggal)) ?></td>
              <td>Data Gaji</td>
              <td>
                  <?php
                  $nama = $entry3->nama;
                  $keterangan = $entry3->keterangan;

                  echo $nama;

                  if ($keterangan !== '-' && $keterangan !== '~') {
                      echo ' ' . $keterangan;
                  }
                  ?>
              </td>
              <td style="text-align: center;"></td>
              <td style="text-align: right;">Rp. <?php echo number_format(floatval($entry3->total), 0, ',', ',') ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
        <tr>
          <td colspan="2"></td>
          <td><b>Jumlah</b></td>
          <td style="text-align: right;"><b>Rp. <?php echo number_format($totalD, 0, ',',','); ?></b></td>
          <td style="text-align: right;"><b>Rp. <?php echo number_format($totalK + $totalKK, 0, ',',','); ?></b></td>
        </tr>
      </table>
    </div>
  </div>

  <script>
    window.print();
  </script>
</body>
</html>
