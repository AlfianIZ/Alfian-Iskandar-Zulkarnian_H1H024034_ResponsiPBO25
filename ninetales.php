<?php

require_once "pokemon.php";

class Ninetales extends Pokemon {
    
    public function __construct() {
        parent::__construct("Ninetales", "Fire", 1, 1500);
    }

    public function specialMove() {
        return "<strong>Flamethrower!</strong> Semburan api panas yang membakar musuh.";
    }

    public function train($jenisLatihan, $intensitas) {
        $multiplier = 1;
        
        if ($jenisLatihan == 'Attack') {
            $multiplier = 1.5; // Bonus untuk tipe Fire
        }

        $levelSebelum = $this->level;
        $hpSebelum = $this->hp;

        $levelGain = ceil(($intensitas * 0.5) * $multiplier);
        $hpGain = ($intensitas * 10);

        $this->level += $levelGain;
        $this->hp += $hpGain;

         $log = [
            'jenis' => $jenisLatihan,
            'intensitas' => $intensitas,
            'level_sebelum' => $levelSebelum,
            'level_setelah' => $this->level,
            'hp_sebelum' => $hpSebelum,
            'hp_setelah' => $this->hp,
            'waktu' => date('Y-m-d H:i:s')
        ];

        array_unshift($this->history, $log);

        return [
            'level_gain' => $levelGain,
            'hp_gain' => $hpGain,
            'bonus' => ($multiplier > 1) ? "Bonus Tipe Fire Aktif!" : ""
        ];
    }
}
?>