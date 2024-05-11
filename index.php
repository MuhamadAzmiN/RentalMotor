<?php 

class Rental {
    public $nama,
           $diskon,
           $hargaRental,
           $pajak,
           $namaMamber,
           $waktuHari;

    public function __construct($nama, $waktuHari, $diskon = 5, $hargaRental = 700000, $pajak = 100000, $namaMamber = ["azmi", "udin", "asep"])
    {
        $this->nama = $nama;
        $this->diskon = $diskon;
        $this->hargaRental = $hargaRental;
        $this->pajak = $pajak;
        $this->namaMamber = $namaMamber;
        $this->waktuHari = $waktuHari;    
    }

    public function setHarga()
    {
        return $this->hargaRental * $this->waktuHari;
    }

    public function setDiskon()
    {
       return ($this->diskon / 100) * $this->setHarga(); 
    }

    public function isMember()
    {
        return in_array($this->nama, $this->namaMamber);
    }



    public function setPajak()
    {
        if ($this->isMember()) {
            return ($this->setHarga() + $this->pajak) - $this->setDiskon();
        } else {
            return $this->setHarga() + $this->pajak;
        }
    }  
}

if(isset($_POST["btn"])){
    $nama = $_POST["nama"];
    $waktuHari = $_POST["waktuJam"];
    $rental = new Rental($nama, $waktuHari);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="nama"></label>
        <input type="text" name="nama" placeholder="Nama">
        <label for="waktuHari"></label>
        <input type="number" name="waktuJam" placeholder="Berapa hari">
        <button type="submit" name="btn">Sewa Sekarang</button>
    </form>

    <?php if($rental->isMember()) :?>

        <h1>Hai <?= $nama ;?> Terimakasih Telah Menjadi Member Dirental AzmiRentalMotor , Karna anda member anda mendapatkan diskon sebesar 5% Jadi total yang harus kalian bayar adalah <?= $rental->setPajak();?></h1>

    <?php else :?>

        <h1>Hai <?= $nama ;?> Total yang harus di bayar adalah <?= $rental->setPajak();?> </h1>

    <?php endif ;?>
   
</body>
</html>
