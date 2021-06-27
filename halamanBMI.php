<?php
class bMIPasien {
    public $nama;
    public $berat;
    public $tinggi;
    public $umur;
    public $jenis_kelamin;
    public $BMIres;
    public $BMIstatus = '';

    function __construct($nama, $berat, $tinggi, $umur, $jenis_kelamin)
    {
        $this->nama = $nama;
        $this->berat = $berat;
        $this->tinggi = $tinggi;
        $this->umur = $umur;
        $this->jenis_kelamin = $jenis_kelamin;
    }

    public function hasilBMI() {
        $this->tinggi = $this->tinggi / 100;
        $this->BMIres = $this->berat / ($this->tinggi * $this->tinggi);
        return $this->BMIres;
    }

    public function statusBMI() {
        if($this->BMIres < 18.5) {
            return $this->BMIstatus = 'Kekurangan berat badan';
        } else if ($this->BMIres >= 18.5 && $this->BMIres <= 24.9) {
            return $this->BMIstatus = 'Berat Normal';
        } else if ($this->BMIres >= 25.0 && $this->BMIres <= 29.9) {
            return $this->BMIstatus = 'Kelebihan berat badan';
        } else {
            return $this->BMIstatus = 'Kegemukan (Obesitas)';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
<div class="container mt-5 mb-5 p-5 shadow" style="background: #F0F8FF">
<h3 align='center'><b>HASIL INDEKS</b></h3>
      <br>
      <?php 
        if(isset($_POST['proses'])) {
            $nama = $_POST['nama_lengkap'];
            $berat = $_POST['berat_'];
            $tinggi = $_POST['tinggi_'];
            $umur = $_POST['umur_'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $pasien1 = new BMIPasien($nama, $berat, $tinggi, $umur, $jenis_kelamin);
                
                
            echo 'Nama : ' . $pasien1->nama . '</br>';
            echo 'Berat Badan : ' . $pasien1->berat . '</br>';
            echo 'Tinggi Badan : ' . $pasien1->tinggi . '</br>' ;
            echo 'Umur : ' . $pasien1->umur. '</br>';
            echo 'Gender : ' . $pasien1->jenis_kelamin . '</br>';
            echo 'BMI : ' . round($pasien1->hasilBMI()) . '</br>';
            echo 'Status : ' . $pasien1->statusBMI() . '</br>';
            }
            ?>
  </div>
</body>
</html>