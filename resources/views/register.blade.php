<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/11.7.3/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/11.7.3/firebase-auth.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-red-600">Kayıt Ol</h2>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" id="registerForm">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Ad Soyad</label>
                <input type="text" name="name" id="name" required 
                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-red-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">E-posta</label>
                <input type="email" name="email" id="email" required 
                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-red-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Telefon</label>
                <input type="tel" name="phone" id="phone" 
                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-red-500">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700">Şifre</label>
                <input type="password" name="password" id="password" required 
                    class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:border-red-500">
            </div>

            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
                Kayıt Ol
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-sm text-red-500 hover:underline">
                Zaten hesabın var mı? Giriş Yap
            </a>
        </div>
    </div>

    <script>
        // Firebase configuration
        const firebaseConfig = {
            apiKey: "{{ config('firebase.apiKey') }}",
            authDomain: "{{ config('firebase.authDomain') }}",
            projectId: "{{ config('firebase.projectId') }}",
            storageBucket: "{{ config('firebase.storageBucket') }}",
            messagingSenderId: "{{ config('firebase.messagingSenderId') }}",
            appId: "{{ config('firebase.appId') }}",
            measurementId: "{{ config('firebase.measurementId') }}"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        // Handle form submission
        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const phone = document.getElementById('phone').value;

            try {
                // Create user in Firebase
                const userCredential = await firebase.auth().createUserWithEmailAndPassword(email, password);
                
                // Add a hidden input for Firebase UID
                const firebaseUidInput = document.createElement('input');
                firebaseUidInput.type = 'hidden';
                firebaseUidInput.name = 'firebase_uid';
                firebaseUidInput.value = userCredential.user.uid;
                this.appendChild(firebaseUidInput);

                // Submit the form to Laravel
                this.submit();
            } catch (error) {
                // Handle Firebase errors
                alert('Kayıt işlemi başarısız: ' + error.message);
            }
        });
    </script>
</body>
</html>
