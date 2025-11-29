<?php

require_once 'ninetales.php'; 
session_start();

if (!isset($_SESSION['myPokemon'])) {
    header("Location: index.php");
    exit;
}

$pokemon = $_SESSION['myPokemon'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['training_type'];
    $intensity = $_POST['intensity'];

    $result = $pokemon->train($type, $intensity);
    $_SESSION['myPokemon'] = $pokemon;

    $message = "<div class='success-box'>
                    <h3>✅ Latihan Selesai!</h3>
                    <p><strong>+{$result['level_gain']} Level</strong> & <strong>+{$result['hp_gain']} HP</strong></p>
                    <p style='font-size:0.9em; color:#d35400'><i>" . ($result['bonus'] ?? '') . "</i></p>
                    <hr style='border: 0; border-top: 1px dashed #ccc;'>
                    <p>Ninetales menggunakan: " . $pokemon->specialMove() . "</p>
                </div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan - Ninetales</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; padding: 20px; }
        .container { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); max-width: 500px; margin: auto; }
        
        /* Style Gambar Kecil (Avatar) */
        .pokemon-thumb {
            width: 120px;
            height: 120px;
            object-fit: cover; /* Agar gambar tidak gepeng */
            object-position: top; /* Fokus ke wajah */
            border-radius: 50%;
            display: block;
            margin: 0 auto 15px auto;
            border: 4px solid #e67e22;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        h2 { text-align: center; color: #333; margin-bottom: 5px; }
        p.subtitle { text-align: center; color: #666; margin-top: 0; }
        
        input, select { width: 100%; padding: 12px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 8px; font-size: 16px; }
        button { width: 100%; padding: 12px; background: linear-gradient(to right, #e67e22, #d35400); color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; font-weight: bold; margin-top: 10px; transition: transform 0.2s; }
        button:hover { transform: scale(1.02); }
        
        .success-box { background: #dff0d8; color: #3c763d; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #d6e9c6; text-align: center; animation: fadeIn 0.5s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        
        .nav { margin-top: 25px; text-align: center; border-top: 1px solid #eee; padding-top: 15px; }
        a { color: #555; text-decoration: none; margin: 0 10px; font-size: 0.9em; }
        a:hover { color: #e67e22; }
    </style>
</head>
<body>

<div class="container">
    <h2>Pusat Latihan PRTC</h2>
    
    <img src="ninetales.png" alt="Ninetales" class="pokemon-thumb">
    
    <p class="subtitle">Target: <strong><?php echo $pokemon->getNama(); ?></strong> (Lvl <?php echo $pokemon->getLevel(); ?>)</p>

    <?php echo $message; ?>

    <form method="POST">
        <label><strong>Jenis Latihan:</strong></label>
        <select name="training_type">
            <option value="Attack">Attack (Kekuatan Api)</option>
            <option value="Defense">Defense (Ketahanan Fisik)</option>
            <option value="Speed">Speed (Kecepatan Gerak)</option>
        </select>

        <label><strong>Intensitas (1-10):</strong></label>
        <input type="number" name="intensity" min="1" max="10" required placeholder="Contoh: 5">

        <button type="submit">MULAI LATIHAN</button>
    </form>

    <div class="nav">
        <a href="index.php">← Kembali ke Beranda</a> | 
        <a href="history.php">Lihat Riwayat →</a>
    </div>
</div>

</body>
</html>