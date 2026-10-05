<?php
$products = [
    [
        "nama" => "Monitor 24 Inch",
        "kategori" => "Monitor",
        "harga" => 1800000,
        "stok" => 4
    ],
    [
        "nama" => "Laptop Productivity",
        "kategori" => "Laptop",
        "harga" => 8500000,
        "stok" => 3
    ],
    [
        "nama" => "Keyboard Mekanikal",
        "kategori" => "Aksesoris",
        "harga" => 750000,
        "stok" => 12
    ],
    [
        "nama" => "Mouse Wireless",
        "kategori" => "Aksesoris",
        "harga" => 250000,
        "stok" => 0
    ],
    [
        "nama" => "Headset Gaming",
        "kategori" => "Audio",
        "harga" => 1200000,
        "stok" => 5
    ],
    [
        "nama" => "Webcam HD 1080p",
        "kategori" => "Kamera",
        "harga" => 450000,
        "stok" => 8
    ]
];

$total_produk = count($products);

function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f8;
            color: #1c1e21;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .navbar nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #555;
            font-weight: 500;
        }

        .navbar nav a:hover {
            color: #000;
        }

        .hero {
            padding: 40px 8%;
        }

        .hero-card {
            background-color: #18191c;
            color: #ffffff;
            padding: 50px 40px;
            border-radius: 16px;
        }

        .brand-tag {
            font-size: 12px;
            letter-spacing: 1px;
            color: #a0a0a0;
            margin-bottom: 10px;
        }

        .hero-card h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .hero-desc {
            color: #ccc;
            margin-bottom: 25px;
        }

        .btn-hero {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #000000;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn-hero:hover {
            opacity: 0.9;
        }

        .container {
            padding: 20px 8% 60px;
        }

        .catalog-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 30px;
        }

        .sub-title {
            font-size: 12px;
            color: #666;
            letter-spacing: 1px;
        }

        .total-badge {
            background-color: #e9ecef;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .product-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 24px;
            position: relative;
            border: 1px solid #e1e4e8;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
        }

        .badge-discount {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: #e74c3c;
            color: #ffffff;
            font-size: 11px;
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 4px;
        }

        .category {
            font-size: 12px;
            color: #888;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .product-name {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .price-section {
            margin-bottom: 15px;
        }

        .original-price {
            text-decoration: line-through;
            color: #888;
            font-size: 14px;
            margin-right: 8px;
        }

        .final-price {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
        }

        .stock-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }

        .status {
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: 600;
        }

        .status.available {
            background-color: #e8f8f5;
            color: #27ae60;
        }

        .status.out-of-stock {
            background-color: #fadbd8;
            color: #c0392b;
        }

        .buy-button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #18191c;
            color: #ffffff;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .buy-button:hover {
            opacity: 0.85;
        }

        .buy-button.disabled {
            background-color: #cccccc;
            color: #666666;
            cursor: not-allowed;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            color: #777;
            font-size: 14px;
            border-top: 1px solid #e1e4e8;
        }

        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }

            .catalog-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="logo">Cia Store</div>
        <nav>
            <a href="#home">Home</a>
            <a href="#products">Products</a>
            <a href="#about">About</a>
        </nav>
    </header>

    <section id="home" class="hero">
        <div class="hero-card">
            <p class="brand-tag">CIA STORE</p>
            <h1>Perangkat & Aksesoris</h1>
            <p class="hero-desc">Pilihan perangkat teknologi untuk kebutuhan harianmu.</p>
            <a href="#products" class="btn-hero">Lihat Produk</a>
        </div>
    </section>

    <main id="products" class="container">
        <div class="catalog-header">
            <div>
                <p class="sub-title">KATALOG</p>
                <h2>Daftar Produk</h2>
            </div>
            <div class="total-badge">
                Total Produk: <strong><?= $total_produk; ?></strong>
            </div>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <?php 
                    $is_discount = $product['harga'] >= 1000000;
                    $diskon = $is_discount ? 0.10 : 0;
                    $harga_akhir = $product['harga'] - ($product['harga'] * $diskon);
                ?>

                <article class="product-card">
                    <?php if ($is_discount): ?>
                        <span class="badge-discount">DISKON 10%</span>
                    <?php endif; ?>

                    <p class="category"><?= htmlspecialchars($product['kategori']); ?></p>
                    <h3 class="product-name"><?= htmlspecialchars($product['nama']); ?></h3>

                    <div class="price-section">
                        <?php if ($is_discount): ?>
                            <span class="original-price"><?= formatRupiah($product['harga']); ?></span>
                            <span class="final-price"><?= formatRupiah($harga_akhir); ?></span>
                        <?php else: ?>
                            <span class="final-price"><?= formatRupiah($product['harga']); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="stock-info">
                        <span>Stok: <?= $product['stok']; ?></span>
                        <?php if ($product['stok'] > 0): ?>
                            <span class="status available">Tersedia</span>
                        <?php else: ?>
                            <span class="status out-of-stock">Stok Habis</span>
                        <?php endif; ?>
                    </div>

                    <div class="card-action">
                        <?php if ($product['stok'] > 0): ?>
                            <button class="buy-button">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="buy-button disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer id="about">
        <p>&copy; <?= date('Y'); ?> Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>