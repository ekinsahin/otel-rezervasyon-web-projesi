<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Arama Sonuçları | Hotel Booking</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;800&display=swap" rel="stylesheet">


  <style>
    body {
      background: linear-gradient(to right, #eae1fb, #f1e9ee, #fcfadd);
      font-family: 'Sansation', Arial, sans-serif;
      margin: 0;
    }
    header {
      width: %100;
    }

    header h1 {
      color: #d63384;
      margin-bottom: 24px;
      font-size: 28px;
      font-weight: 800;
    }

    .search-summary {
      font-size: 16px;
      font-weight: 500;
      background: linear-gradient(to right, #f43b47, #453a94);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 20px;
    }

    .hotel-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
      padding: 20px;
    }

    .hotel-card {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.08);
      overflow: hidden;
      transition: transform 0.2s ease;
      position: relative;
    }

    .hotel-card:hover {
      transform: translateY(-5px);
    }

    .hotel-card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .hotel-content {
      padding: 16px;
    }

    .hotel-name {
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }

    .hotel-location {
      font-size: 14px;
      color: #888;
      margin-top: 4px;
    }

    .hotel-rating {
      margin-top: 10px;
      font-size: 13px;
      color: #555;
    }

    .hotel-rating span {
      background-color: #4CAF50;
      color: white;
      border-radius: 4px;
      padding: 2px 6px;
      font-weight: bold;
      margin-right: 6px;
    }

    .hotel-price {
      font-size: 16px;
      color: #e91e63;
      font-weight: bold;
      margin-top: 12px;
    }

    .hotel-price del {
      color: #888;
      font-size: 14px;
      margin-left: 10px;
    }

    .discount-badge {
      position: absolute;
      right: 16px;
      top: 16px;
      background: #dc3545;
      color: white;
      padding: 4px 8px;
      font-size: 12px;
      border-radius: 4px;
    }

    .wishlist-icon {
      position: absolute;
      right: 16px;
      bottom: 16px;
      font-size: 22px;
      color: #e91e63;
      cursor: pointer;
    }

    /* Filtre Butonu */
    .filter-btn {
      position: fixed;
      top: 30px;
      right: 30px;
      z-index: 1000;
      background: #d63384;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 30px;
      font-weight: bold;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    /* Filtre Paneli */
    /* Paneli yumuşak degrade arka planla sar */
  .filter-panel {
   position: fixed;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
   width: 320px;
   background: linear-gradient(to bottom right, #fff0f5, #ffe6f0);
   border-radius: 24px;
   box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
   padding: 24px;
   z-index: 9999;
   display: none;
   transition: all 0.4s ease;
}

.filter-panel.open {
  display: block;
}


/* Açıldığında kaymasını sağla */
.filter-panel.open {
  right: 30px;
}

/* Başlık kısmı - modern stiller */
.filter-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.filter-header h2 {
  font-size: 22px;
  font-weight: 800;
  color: #d63384;
  margin: 0;
}

.filter-header button {
  background: none;
  border: none;
  font-size: 18px;
  color: #333;
  cursor: pointer;
}

/* Filtre alanları */
.filter-section {
  margin-bottom: 20px;
}

.filter-section label {
  display: block;
  font-weight: 600;
  margin-bottom: 6px;
  color: #444;
}

.filter-section select,
.filter-section input[type="range"] {
  width: 100%;
  padding: 10px;
  border-radius: 12px;
  border: 1px solid #ccc;
  font-size: 14px;
  background-color: white;
}

/* Apply Button - pembe ve yumuşak köşeli */
.apply-btn {
  width: 100%;
  padding: 12px 0;
  background: linear-gradient(to right, #ff4da6, #e63384);
  border: none;
  border-radius: 30px;
  font-weight: bold;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: opacity 0.3s ease;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.apply-btn:hover {
  opacity: 0.9;
}


.filter-section input[type="range"] {
  accent-color: deeppink;
}

  </style>
</head>
<body>

<header style="background: linear-gradient(to right, #ded4f7, #f4c9d6, #fbb4b4); padding: 12px 32px; display: flex; justify-content: space-between; align-items: center; height: 80px;">
  <div style="height: 80px; padding: 12px 32px; display: flex; align-items: center; justify-content: space-between;">
  <img src="{{ asset('images/oteligo-icon.png') }}" alt="Oteligo Logo" style="height: 250px;">
  
  </div>


  <nav style="display: flex; gap: 24px; font-size: 16px;">
    <a href="/" style="color: white; text-decoration: none;">Ana Menü</a>
    <a href="/reservation" style="color: deeppink; text-decoration: none; font-weight: bold;">Rezervasyon</a>
    <a href="/blog" style="color: white; text-decoration: none;">Blog</a>
    <a href="/contact" style="color: white; text-decoration: none;">İletişim</a>
    <i id="userIcon" class="fas fa-user" style="font-size: 24px; color: white; cursor: pointer;"></i>
  </nav>
</header>


    <div style="margin-bottom: 20px;">
  <p style="margin: 0; font-weight: 500; color: deeppink;">
  2 yetişkin, 1 çocuk, 1 oda için sonuçlar listeleniyor
  </p>

  <button onclick="toggleFilter()" style="
  margin-top: 10px;
  padding: 8px 16px;
  background-color: deeppink;
  color: white;
  border: none;
  border-radius: 24px;
  font-weight: bold;
  box-shadow: 0 4px 6px rgba(0,0,0,0.2);
  cursor: pointer;
">
  🔍 Filtrele
</button>

  
</div>






    <div class="hotel-list">
      @foreach($hotels as $hotel)

        <div class="hotel-card">
          <img src="{{ $hotel['image'] ?? 'https://via.placeholder.com/400x300' }}" alt="Otel Fotoğrafı">
          <div class="hotel-content">
            <div class="hotel-name">{{ $hotel['name'] }}</div>
            <div class="hotel-location">{{ $hotel['location'] ?? 'Konum bilgisi yok' }}</div>

            <div class="hotel-rating">
              <span>{{ $hotel['rating'] ?? '8.0' }}</span>
              {{ $hotel['reviews'] ?? 0 }} yorum
            </div>

            <div class="hotel-price">
              {{ number_format($hotel['discount_price'] ?? $hotel['price'], 0, ',', '.') }} TL
              @if(isset($hotel['discount_price']))
                <del>{{ number_format($hotel['price'], 0, ',', '.') }} TL</del>
              @endif
            </div>

            @if(isset($hotel['discount']))
              <div class="discount-badge">%{{ $hotel['discount'] }} indirim</div>
            @endif

            <div class="wishlist-icon" onclick="this.classList.toggle('active')">
              <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                <path
                  d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z">
                </path>
              </svg>
            </div>
            <div class="wishlist-icon" onclick="this.classList.toggle('active')">
  <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2"
    stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart heart-icon">
    <path
      d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z">
    </path>
  </svg>
</div>

          </div>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Filtre Paneli -->
  <div id="filterPanel" class="filter-panel">
    <div class="filter-header">
      <h2>Filtreler</h2>
      <button onclick="toggleFilter()">✖</button>
    </div>

    <div class="filter-section">
      <label for="sort">Sıralama</label>
      <select id="sort" name="sort">
        <option value="">Seçiniz</option>
        <option value="rating">Puan (yüksekten düşüğe)</option>
        <option value="price_asc">Fiyat (artan)</option>
        <option value="price_desc">Fiyat (azalan)</option>
        <option value="reviews">Yorum Sayısı</option>
        <option value="favorites">Favorilenme</option>
      </select>
    </div>

    <div class="filter-section">
      <label>Fiyat Aralığı</label>
      <input type="range" min="1000" max="10000" value="2500" id="minPrice">
      <input type="range" min="1000" max="10000" value="7500" id="maxPrice">
      <div style="display: flex; justify-content: space-between; font-size: 14px; color: #666;">
        <span id="minPriceVal">₺2500</span>
        <span id="maxPriceVal">₺7500</span>
      </div>
    </div>

    <button class="apply-btn" onclick="toggleFilter()">Uygula</button>
  </div>

  <script>
    function toggleFilter() {
      const panel = document.getElementById('filterPanel');
      panel.classList.toggle('open');
    }

    const minRange = document.getElementById('minPrice');
    const maxRange = document.getElementById('maxPrice');
    const minVal = document.getElementById('minPriceVal');
    const maxVal = document.getElementById('maxPriceVal');

    minRange.oninput = () => minVal.textContent = '₺' + minRange.value;
    maxRange.oninput = () => maxVal.textContent = '₺' + maxRange.value;
  </script>

</body>
</html>