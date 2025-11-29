<?php

date_default_timezone_set('Asia/Jakarta');

abstract class Pokemon{
    protected $nama;
    protected $tipe;
    protected $level;
    protected $hp;
    protected $history = [];

    public function __construct($nama, $tipe, $level, $hp){
        $this->nama = $nama;
        $this->tipe = $tipe;
        $this->level = $level;
        $this->hp = $hp;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getTipe(){
        return $this->tipe;
    }

    public function getLevel(){
        return $this->level;
    }

    public function getHp(){
        return $this->hp;
    }

    public function getHistory(){
        return $this->history;
    }

    abstract public function specialMove();

    public function train($jenisLatihan, $intensitas) {
        // Simpan status sebelum latihan
        $levelSebelum = $this->level;
        $hpSebelum = $this->hp;

        // Intensitas 1-10
        $levelGain = ceil($intensitas * 0.5); 
        $hpGain = $intensitas * 10;

        $this->level += $levelGain;
        $this->hp += $hpGain;

        // Catat riwayat
         $log = [
            'jenis' => $jenisLatihan,
            'intensitas' => $intensitas,
            'level_sebelum' => $levelSebelum,
            'level_setelah' => $this->level,
            'hp_sebelum' => $hpSebelum,
            'hp_setelah' => $this->hp,
            'waktu' => date('Y-m-d H:i:s')
        ];

        // Masukkan ke array history (indeks 0 selalu terbaru)
        array_unshift($this->history, $log);

        return [
            'level_gain' => $levelGain,
            'hp_gain' => $hpGain
        ];
    }
}