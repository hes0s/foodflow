<?php
// Ofertele serii disponibile spre salvare (fără bază de date)
$offers = [
    [
        'id' => 1,
        'title' => 'Coș Surpriză Patiserie & Croissante',
        'partner' => 'Brutăria Artizanală Centru',
        'category' => 'Patiserie',
        'old_price' => 120,
        'new_price' => 55,
        'portions_left' => 4,
        'pickup_time' => '19:30 - 21:00',
        'badge' => '-54%'
    ],
    [
        'id' => 2,
        'title' => 'Meniu Sushi Roll Mix (16 buc.)',
        'partner' => 'Sakura Sushi Bar',
        'category' => 'Restaurant',
        'old_price' => 260,
        'new_price' => 130,
        'portions_left' => 2,
        'pickup_time' => '20:30 - 22:00',
        'badge' => '-50%'
    ],
    [
        'id' => 3,
        'title' => 'Pizza Margherita & Focaccia Caldă',
        'partner' => 'Trattoria Verde',
        'category' => 'Restaurant',
        'old_price' => 150,
        'new_price' => 75,
        'portions_left' => 5,
        'pickup_time' => '20:00 - 21:30',
        'badge' => '-50%'
    ],
    [
        'id' => 4,
        'title' => 'Bowl Sănătos cu Quinoa, Pui și Avocado',
        'partner' => 'GreenBistro Bio',
        'category' => 'Sănătos',
        'old_price' => 140,
        'new_price' => 65,
        'portions_left' => 3,
        'pickup_time' => '19:00 - 20:30',
        'badge' => '-53%'
    ],
    [
        'id' => 5,
        'title' => 'Cutie Deserturi & Tarte de Casă (3 buc.)',
        'partner' => 'Cofetăria Dulce Seară',
        'category' => 'Patiserie',
        'old_price' => 110,
        'new_price' => 50,
        'portions_left' => 6,
        'pickup_time' => '19:00 - 21:00',
        'badge' => '-55%'
    ]
];

// Statistici impact anti-risipă
$stats = [
    'meals_saved' => 1500,
    'co2_saved_kg' => 3100,
    'partners_count' => 18
];
