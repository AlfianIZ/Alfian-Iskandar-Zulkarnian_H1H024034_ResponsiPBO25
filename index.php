<?php

require_once 'ninetales.php'; 
session_start(); 

if (!isset($_SESSION['myPokemon'])) {
    $_SESSION['myPokemon'] = new Ninetales();
}

$pokemon = $_SESSION['myPokemon'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokéCare - Ninetales Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; padding: 20px; }
        .card { background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 450px; margin: 20px auto; text-align: center; }
        
        /* Style untuk gambar */
        .pokemon-img { 
            max-width: 80%; 
            height: auto; 
            display: block; 
            margin: 15px auto; /* Posisi tengah */
            border-radius: 10px; 
            /* filter: drop-shadow(0 0 10px rgba(255, 165, 0, 0.5)); Optional: efek bersinar */
        }

        .stats { text-align: left; margin: 20px 0; padding: 15px; background: #fff8e1; border-left: 5px solid #ffc107; border-radius: 5px; }
        h1 { color: #d35400; margin-bottom: 5px; }
        h3 { color: #555; margin-top: 0; }
        .btn { display: inline-block; padding: 12px 25px; text-decoration: none; color: white; border-radius: 25px; margin: 10px 5px; font-weight: bold; transition: opacity 0.3s; }
        .btn:hover { opacity: 0.9; }
        .btn-train { background: linear-gradient(to right, #e74c3c, #c0392b); box-shadow: 0 4px 6px rgba(192, 57, 43, 0.3); }
        .btn-history { background: linear-gradient(to right, #3498db, #2980b9); box-shadow: 0 4px 6px rgba(41, 128, 185, 0.3); }
        p { margin: 8px 0; color: #444; }
    </style>
</head>
<body>

<div class="card">
    <h1>PokéCare Dashboard</h1>
    <h3><?php echo $pokemon->getNama(); ?></h3>
    
    <img src="ninetales.png" alt="Ninetales" class="pokemon-img">
    
    <div class="stats">
        <p><strong>Tipe:</strong> <?php echo $pokemon->getTipe(); ?></p>
        <p><strong>Level Saat Ini:</strong> <?php echo $pokemon->getLevel(); ?></p>
        <p><strong>HP Saat Ini:</strong> <?php echo $pokemon->getHp(); ?></p>
        <p><strong>Jurus Spesial:</strong> <br><?php echo $pokemon->specialMove(); ?></p>
    </div>

    <div>
        <a href="train.php" class="btn btn-train">🔥 Mulai Latihan</a>
        <a href="history.php" class="btn btn-history">📋 Riwayat Latihan</a>
    </div>
</div>

</body>
</html>