<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/data.php';

// Filtrare simplă după categorie
$selectedCategory = isset($_GET['categorie']) ? trim($_GET['categorie']) : 'Toate';
$categories = ['Toate', 'Patiserie', 'Restaurant', 'Sănătos'];

$filteredOffers = array_filter($offers, function ($offer) use ($selectedCategory) {
    if ($selectedCategory === 'Toate') {
        return true;
    }
    return $offer['category'] === $selectedCategory;
});

// Simulare rezervare rapidă pachet (fără bază de date)
$reservationMessage = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['offer_id'])) {
    $offerId = (int) $_POST['offer_id'];
    $customerName = htmlspecialchars(trim($_POST['customer_name'] ?? 'Client'));
    foreach ($offers as $item) {
        if ($item['id'] === $offerId) {
            $pickupCode = 'FF-' . rand(1000, 9999);
            $savedMoney = $item['old_price'] - $item['new_price'];
            $reservationMessage = "Rezervare confirmată pentru {$customerName}! Pachetul „{$item['title']}” de la {$item['partner']} te așteaptă între {$item['pickup_time']}. Cod ridicare: {$pickupCode} (Ai economisit {$savedMoney} " . CURRENCY . ").";
            break;
        }
    }
}

require_once __DIR__ . '/header.php';
?>

<main class="container">
    <!-- Statistici Impact Anti-Risipă -->
    <section class="stats-bar">
        <div class="stat-item">
            <span class="stat-num"><?= $stats['meals_saved'] ?>+</span>
            <span class="stat-label">Porții salvate de la risipă</span>
        </div>
        <div class="stat-item">
            <span class="stat-num"><?= $stats['co2_saved_kg'] ?> kg</span>
            <span class="stat-label">Emisii CO₂ evitate</span>
        </div>
        <div class="stat-item">
            <span class="stat-num"><?= $stats['partners_count'] ?></span>
            <span class="stat-label">Localuri partenere în <?= CITY ?></span>
        </div>
    </section>

    <?php if ($reservationMessage): ?>
        <div class="alert-success">
            ✅ <?= $reservationMessage ?>
        </div>
    <?php endif; ?>

    <!-- Filtru Categorii -->
    <section class="filter-bar">
        <span>Filtrează ofertele serii:</span>
        <div class="filter-buttons">
            <?php foreach ($categories as $cat): ?>
                <a href="?categorie=<?= urlencode($cat) ?>"
                   class="filter-btn <?= $selectedCategory === $cat ? 'active' : '' ?>">
                    <?= htmlspecialchars($cat) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Lista Ofertelor de Seară -->
    <section class="offers-grid">
        <?php foreach ($filteredOffers as $offer): ?>
            <?php $saving = $offer['old_price'] - $offer['new_price']; ?>
            <article class="offer-card">
                <div class="card-top">
                    <span class="category-tag"><?= htmlspecialchars($offer['category']) ?></span>
                    <span class="discount-badge"><?= htmlspecialchars($offer['badge']) ?></span>
                </div>
                <h3><?= htmlspecialchars($offer['title']) ?></h3>
                <p class="partner-name">📍 <?= htmlspecialchars($offer['partner']) ?></p>
                <p class="pickup-info">🕒 Ridicare azi: <strong><?= htmlspecialchars($offer['pickup_time']) ?></strong></p>
                <p class="portions-left">🔥 Mai sunt <strong><?= (int) $offer['portions_left'] ?></strong> pachete disponibile</p>

                <div class="price-box">
                    <div>
                        <span class="old-price"><?= $offer['old_price'] ?> <?= CURRENCY ?></span>
                        <span class="new-price"><?= $offer['new_price'] ?> <?= CURRENCY ?></span>
                    </div>
                    <span class="saving-pill">Economisești <?= $saving ?> <?= CURRENCY ?></span>
                </div>

                <form method="POST" class="reserve-form">
                    <input type="hidden" name="offer_id" value="<?= (int) $offer['id'] ?>">
                    <input type="text" name="customer_name" placeholder="Numele tău pentru ridicare" required>
                    <button type="submit">Rezervă pachetul</button>
                </form>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php require_once __DIR__ . '/footer.php'; ?>
