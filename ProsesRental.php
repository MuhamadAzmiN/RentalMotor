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
