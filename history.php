<?php

require_once 'ninetales.php'; 
session_start();

if (!isset($_SESSION['myPokemon'])) {
    header("Location: index.php");
    exit;
}

$pokemon = $_SESSION['myPokemon'];
$history = $pokemon->getHistory();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Latihan</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f2f5; padding: 20px; }
        .container { background: white; padding: 25px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); max-width: 800px; margin: auto; }
        .header-section { display: flex; align-items: center; justify-content: center; gap: 20px; margin-bottom: 20px; }
        .pokemon-mini {
            width: 80px;
            height: 80px;
            object-fit: cover;
            object-position: top;
            border-radius: 50%;
            border: 3px solid #3498db;
        }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; overflow: hidden; border-radius: 8px; box-shadow: 0 0 5px rgba(0,0,0,0.05); }
        th, td { padding: 15px; text-align: center; border-bottom: 1px solid #eee; }
        th { background-color: #34495e; color: white; text-transform: uppercase; font-size: 0.85em; letter-spacing: 1px; }
        tr:nth-child(even) { background-color: #f8f9fa; }
        tr:hover { background-color: #e8f4fc; transition: 0.2s; }
        
        .badge { padding: 5px 10px; border-radius: 15px; font-size: 0.8em; font-weight: bold; color: white; }
        .bg-attack { background-color: #e74c3c; }
        .bg-defense { background-color: #27ae60; }
        .bg-speed { background-color: #f1c40f; color: #333; }

        .nav { margin-top: 30px; text-align: center; }
        a.btn-back { display: inline-block; padding: 10px 20px; background-color: #95a5a6; color: white; text-decoration: none; border-radius: 20px; font-weight: bold; transition: 0.3s; }
        a.btn-back:hover { background-color: #7f8c8d; }
    </style>
</head>
<body>

<div class="container">
    
    <div class="header-section">
        <img src="ninetales.png" alt="Ninetales" class="pokemon-mini">
        <div>
            <h2 style="margin:0; color:#2c3e50;">Log Latihan</h2>
            <p style="margin:5px 0 0 0; color:#7f8c8d;">Catatan Aktivitas <?php echo $pokemon->getNama(); ?></p>
        </div>
    </div>
    
    <?php if (empty($history)): ?>
        <div style="text-align:center; padding: 40px; color: #999;">
            <p>Belum ada sesi latihan yang dilakukan.</p>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Jenis Latihan</th>
                    <th>Intensitas</th>
                    <th>Level</th>
                    <th>HP</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($history as $log): ?>
                
                <?php 
                    $badgeClass = '';
                    if($log['jenis'] == 'Attack') $badgeClass = 'bg-attack';
                    elseif($log['jenis'] == 'Defense') $badgeClass = 'bg-defense';
                    else $badgeClass = 'bg-speed';
                ?>

                <tr>
                    <td style="font-size: 0.9em; color: #666;"><?php echo $log['waktu']; ?></td>
                    <td><span class="badge <?php echo $badgeClass; ?>"><?php echo $log['jenis']; ?></span></td>
                    <td><strong><?php echo $log['intensitas']; ?></strong></td>
                    <td><?php echo $log['level_sebelum']; ?> <span style="color:#aaa">→</span> <strong><?php echo $log['level_setelah']; ?></strong></td>
                    <td><?php echo $log['hp_sebelum']; ?> <span style="color:#aaa">→</span> <strong><?php echo $log['hp_setelah']; ?></strong></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <div class="nav">
        <a href="index.php" class="btn-back">Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>