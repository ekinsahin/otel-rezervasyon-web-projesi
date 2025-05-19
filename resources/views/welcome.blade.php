<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Reservation | Hotel</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    .close-btn {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 24px;
      font-weight: bold;
      color: #888;
      cursor: pointer;
      z-index: 10000;
    }

    .close-btn:hover {
      color: #f43f5e;
    }
  </style>

</head>

<style>
    .close-btn {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 24px;
      font-weight: bold;
      color: #888;
      cursor: pointer;
      z-index: 10000;
    }

    .close-btn:hover {
      color: #f43f5e;
    }
  </style

<body style="margin: 0; font-family: 'Open Sans', sans-serif; background-color: #1a1a1a; color: white;">

  <!-- ✅ HEADER BAŞLANGIÇ -->
  <header style="background-color: #111;">
    <div class="container header-top"
         style="display: flex; align-items: center; justify-content: space-between; padding: 12px 32px; height: 80px;">
      
      <!-- Sol: Logo ve Yazı -->
      <div style="display: flex; align-items: center; gap: 12px;">
        <img src="{{ asset('images/oteligo-icon.png') }}" alt="Oteligo Logo" style="height: 250px;">
        <div class="logo" style="font-weight: bold; font-size: 24px; color: white;">
        </div>
      </div>

      <!-- Sağ: Menü -->
      <ul style="display: flex; gap: 24px; list-style: none; margin: 0; padding: 0; font-size: 16px;">
        <li><a href="/" style="color: white; text-decoration: none;">Ana Menü</a></li>
        <li><a href="/gallery" style="color: white; text-decoration: none;">Galeri</a></li>
        <li><a href="/reservation" style="color: deeppink; font-weight: bold; text-decoration: none;">Rezervasyon</a></li>
        <li><a href="/blog" style="color: white; text-decoration: none;">Blog</a></li>
        <li><a href="/contact" style="color: white; text-decoration: none;">Bizimle İletişime Geçin</a></li>
        <li>
        <div class="user-menu" style="position: relative;">
  <i id="userIcon" class="fas fa-user" style="font-size: 20px; color: white; cursor: pointer;"></i>
  <div id="userDropdown" style="
    display: none;
    right: 0;
    background-color: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    border-radius: 6px;
    overflow: hidden;
    z-index: 100;
    min-width: 140px;
  ">
   <a href="javascript:void(0);" onclick="showLoginModal()" style="display: block; padding: 10px 16px; text-decoration: none; color: black;">Giriş Yap</a>

   <a href="javascript:void(0);" onclick="showRegisterModal()" style="display: block; padding: 10px 16px; text-decoration: none; color: black;">Üye Ol</a>



  </div>
</div>
        </li>
      </ul>

      <!-- Kullanıcı ikonu ve açılır menü -->



    </div>
  </header>

  <!-- ✅ REZERVASYON FORMU -->
  <section class="reservation">
    <h1>HOŞGELDİNİZ!</h1>
    <p class="subtitle">Hayalinizdeki konfor bir tık uzağınızda. Muhteşem seyahatleri keşfedin, özel fiyatlarla ayrıcalığı yaşayın!</p>
    <p class="form-subtitle">Rezervasyonunuzu şimdi yapın, lüks konforun tadını çıkarın.</p>

    <form method="POST" action="{{ route('hotels.search') }}">
      @csrf
      <div class="form-row">

        <select name="adults" required>
          <option value="" disabled selected>Yetişkin</option>
          @for ($i = 1; $i <= 10; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>

        <select name="children" required>
          <option value="" disabled selected>Çocuk</option>
          @for ($i = 0; $i <= 10; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>

        <select name="rooms" required>
          <option value="" disabled selected>Oda</option>
          @for ($i = 1; $i <= 10; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>

        <select name="location" required>
          <option value="" disabled selected>Konum Seçin</option>
          <option value="Viyana">Viyana</option>
          <option value="Paris">Paris</option>
          <option value="Gaziantep">Gaziantep</option>
          <option value="Prag">Prag</option>
          <option value="Roma">Roma</option>
          <option value="Budapeşte">Budapeşte</option>
        </select>

        <input type="date" name="checkin" required>
        <input type="date" name="checkout" required>

        <button class="search-btn" type="submit" aria-label="Ara">
          <svg xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 512 512" fill="#fff">
            <path d="M505 442.7L405.3 343c28.4-34.9 45.7-79.2 45.7-127C451 96.5 354.5 0 233.5 0S16 96.5 16 216.5 112.5 433 233.5 433c48.5 0 93.4-17 128.3-45.1L442.7 505c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.3 9.4-24.5.1-33.9zM233.5 384C142.2 384 69 310.8 69 219.5S142.2 55 233.5 55 398 128.2 398 219.5 324.8 384 233.5 384z"/>
          </svg>
        </button>

      </div>
    </form>
  </section>

  <!-- ✅ INFO -->
  <section class="info">
    <h2>HAYALİNİZDEKİ OTELİ KEŞFEDİN, AYRICALIKLI FIRSATLARLA HEMEN YERİNİZİ AYIRTIN.</h2>
    <p>
      Hangi oda tipini seçerseniz seçin, konfor ve rahatlığın en üst düzeyini yaşayacaksınız. 
      Standart odalarımız tek, çift ve aile konfigürasyonlarında sunulmaktadır...
    </p>
  </section>

  <!-- ✅ FOOTER -->
  <footer>
    <div class="container footer-row">
      <div class="logo-column">
        <div class="logo">OTELİ<span style="color: deeppink;">.GO BOOKİNG</span></div>
        <p>Bugün yerinizi ayırtın, sunduğumuz lüks ve konforu deneyimleyin.</p>
      </div>
      <div class="contact-column">
        <p>📞 123-456-7890</p>
        <p>📧 info@oteligo.com</p>
        <p>💬 @staywithcomfort</p>
        <p>📱 850-303-0023</p>
      </div>
      <div class="menu-column">
        <a href="#">Ana Menü</a>
        <a href="#">Blog</a>
        <a href="#">Bizimle İletişime Geçin</a>
      </div>
    </div>
  </footer>

    <script>
  const userIcon = document.getElementById("userIcon");
  const dropdown = document.getElementById("userDropdown");

  

  userIcon.addEventListener("click", () => {
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
  });

  // Menü dışına tıklanınca kapat
  document.addEventListener("click", function(event) {
    if (!event.target.closest(".user-menu")) {
      dropdown.style.display = "none";
    }
  });
</script>


<style>
  #loginModal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.75);
    z-index: 9999;
    justify-content: center;
    align-items: center;
  }

  .login-card {
    display: flex;
    width: 700px;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
  }

  .login-left, .login-right {
    flex: 1;
    padding: 40px;
  }

  .login-left {
    background-color: white;
    color: #1a1a1a;
  }

  .login-right {
    background: linear-gradient(135deg, #ec4899, #f43f5e);
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .login-left input {
    width: 100%;
    margin-bottom: 16px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
  }

  .login-left button {
    background: #ec4899;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
  }

  .login-right button {
    background: white;
    color: #ec4899;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    font-weight: bold;
    cursor: pointer;
    margin-top: 16px;
  }
</style>

<!-- MODAL HTML -->
<div id="loginModal" style="display: none;">

  <div class="login-card">
    <!-- Sol: Giriş Formu -->
    <div class="login-left">
      <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Giriş Yap</h2>
      <p style="font-size: 14px; margin-bottom: 20px;">Yeni rotalar, yeni deneyimler seni bekliyor!</p>
      <input type="email" placeholder="Email">
      <input type="password" placeholder="Şifre">
      <a href="#" style="font-size: 12px; color: gray; display: block; margin-bottom: 16px;">Şifremi unuttum?</a>
      <button>GİRİŞ YAP</button>

      <p style="margin-top: 10px; font-size: 14px; color: #666; text-align: center;">
  Otel sahibi misiniz?
  <a href="javascript:void(0);" onclick="showOwnerLoginModal()" style="color: #ec4899; font-weight: bold; text-decoration: none;">Buradan giriş yapın</a>
</p>

    </div>

    <!-- Sağ: Kayıt -->
    <div class="login-right">
      <h2 style="font-size: 24px; font-weight: bold;">Merhaba!</h2>
      <p style="font-size: 14px; text-align: center; max-width: 200px;">Sana özel fırsatlar ve konforlu tatil için kaydını hemen oluştur</p>
      <button onclick="hideLoginModal(); alert('Kayıt ekranına yönlendirilebilir!')">KAYIT OL</button>
    </div>
  </div>
</div>


<!-- Kayıt Modalı -->
<div id="registerModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); z-index: 9999; justify-content: center; align-items: center;">
  <div class="login-card">
    <!-- Sol: Kayıt Formu -->
    <div class="login-left">
      <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Kayıt Ol</h2>
      <p style="font-size: 14px; margin-bottom: 20px;">Hemen üye olun, fırsatları kaçırmayın</p>
      <input type="text" placeholder="Ad Soyad">
      <input type="email" placeholder="Email">
      <input type="password" placeholder="Şifre">
      <button>KAYIT OL</button>

      <p style="margin-top: 10px; font-size: 14px; color: #666; text-align: center;">
  Otel sahibi misiniz?
  <a href="javascript:void(0);" onclick="showOwnerRegisterModal()" style="color: #ec4899; font-weight: bold; text-decoration: none;">Otelinizi kaydedin</a>




    </div>

    <!-- Sağ: Girişe Dön -->
    <div class="login-right">
      <h2 style="font-size: 24px; font-weight: bold;">Zaten buradaydın!</h2>
      <p style="font-size: 14px; text-align: center; max-width: 200px;">Tekrar giriş yapmak için hemen tıkla</p>
      <button onclick="hideRegisterModal(); showLoginModal()">GİRİŞ YAP</button>
    </div>
  </div>
</div>

<div id="ownerLoginModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); z-index: 9999; justify-content: center; align-items: center;">
  <div class="login-card" style="position: relative;">
    <span class="close-btn" onclick="hideOwnerLoginModal()">&times;</span>
    
    <div class="login-left">
      <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Otel Sahibi Girişi</h2>
      <p style="font-size: 14px; margin-bottom: 20px;">Yönetici paneline erişim için giriş yap</p>
      <input type="email" placeholder="Otel Sicil Numarası">
      <input type="password" placeholder="Şifre">
      <a href="#" style="font-size: 12px; color: gray; display: block; margin-bottom: 16px;">Şifremi unuttum?</a>
      <button style="background: #ec4899; color: white; border: none; padding: 10px; width: 100%; border-radius: 6px; font-weight: bold;">GİRİŞ YAP</button>
    </div>

    <div class="login-right">
      <h2 style="font-size: 24px; font-weight: bold;">Hoş geldiniz!</h2>
      <p style="font-size: 14px; text-align: center; max-width: 200px;">Yetkili girişi ile yönetin</p>
      <button onclick="hideOwnerLoginModal(); showLoginModal()" class="border border-white px-6 py-2 rounded-full hover:bg-white hover:text-pink-600 transition font-medium">
        Misafir Girişine Dön
      </button>
    </div>
  </div>
</div>


<div id="ownerRegisterModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); z-index: 9999; justify-content: center; align-items: center;">
  <div class="login-card" style="position: relative;">
    <span class="close-btn" onclick="hideOwnerRegisterModal()">&times;</span>
    
    <div class="login-left">
      <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">Otelinizi Kaydedin</h2>
      <p style="font-size: 14px; margin-bottom: 20px;">Aşağıdaki bilgileri doldurun, oteli.go ailesine katılın!</p>
      <input type="text" placeholder="Ad Soyad">
      <input type="text" placeholder="Otel Sicil Numarası">
      <input type="password" placeholder="Email">
      <input type="password" placeholder="Şifre">
      <button style="background: #ec4899; color: white; border: none; padding: 10px; width: 100%; border-radius: 6px; font-weight: bold; margin-top: 10px;">KAYIT OL</button>
    </div>

    <div class="login-right">
      <h2 style="font-size: 24px; font-weight: bold;">Hoş geldiniz!</h2>
      <p style="font-size: 14px; text-align: center; max-width: 200px;">Otel sahibi olarak hemen giriş yapabilirsiniz</p>
      <button onclick="hideOwnerRegisterModal(); showLoginModal()" class="border border-white px-6 py-2 rounded-full hover:bg-white hover:text-pink-600 transition font-medium">
        Giriş Yap
      </button>
    </div>
  </div>
</div>


<script>
  function showLoginModal() {
    document.getElementById("loginModal").style.display = "flex";
    document.getElementById("registerModal").style.display = "none";
  }

  function hideLoginModal() {
    document.getElementById("loginModal").style.display = "none";
  }

  function showRegisterModal() {
    document.getElementById("registerModal").style.display = "flex";
    document.getElementById("loginModal").style.display = "none";
  }

  function hideRegisterModal() {
    document.getElementById("registerModal").style.display = "none";
  }

  function showOwnerLoginModal() {
    document.getElementById("ownerLoginModal").style.display = "flex";
    hideLoginModal();
  }

  function hideOwnerLoginModal() {
    document.getElementById("ownerLoginModal").style.display = "none";
  }

  function showOwnerRegisterModal() {
    document.getElementById("ownerRegisterModal").style.display = "flex";
    hideLoginModal(); // varsa diğerlerini kapat
    hideRegisterModal();
  }

  function hideOwnerRegisterModal() {
    document.getElementById("ownerRegisterModal").style.display = "none";
  }

</script>



</body>
</html>
