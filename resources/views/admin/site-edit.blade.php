<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Site - Nasi Karak Pak Nara</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #FDFBF7;
        }
        
        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .form-input {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #8D6E63;
        }
        
        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .btn {
            padding: 0.75rem 2rem;
            background-color: #2b1d1a;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #8D6E63;
        }
        
        .btn-secondary {
            background-color: #6b7280;
        }
        
        .btn-secondary:hover {
            background-color: #4b5563;
        }
        
        .preview-section {
            background: #f9f9f9;
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
            border-left: 4px solid #8D6E63;
        }
        
        .nav-admin {
            background: #2b1d1a;
            color: white;
            padding: 1rem;
        }
        
        .nav-admin a {
            color: #D7CCC8;
            text-decoration: none;
            margin-right: 1rem;
        }
        
        .nav-admin a:hover {
            color: white;
        }
        
        /* Alert styles */
        .alert-success {
            background-color: #d1e7dd;
            border-color: #badbcc;
            color: #0f5132;
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
        
        .alert-error {
            background-color: #f8d7da;
            border-color: #f5c2c7;
            color: #842029;
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar Admin -->
    <div class="nav-admin">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="font-bold">Admin Panel - Nasi Karak Pak Nara</div>
            <div>
                <!-- Gunakan route name yang sudah didefinisikan -->
                <a href="{{ route('landing') }}" target="_blank">Lihat Landing Page</a>
                <a href="{{ route('admin.edit') }}">Edit Konten</a>
            </div>
        </div>
    </div>

    <!-- Form Edit -->
    <div class="form-container">
        <h1 class="text-3xl font-bold mb-6 text-center" style="color: #2b1d1a;">Edit Konten Landing Page</h1>
        
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Gunakan route name untuk form action -->
        <form method="POST" action="{{ route('admin.update') }}">
            @csrf
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="hero_title">
                    Hero Title (Judul Utama)
                </label>
                <input type="text" 
                       name="hero_title" 
                       id="hero_title"
                       value="{{ old('hero_title', $settings->hero_title ?? '') }}" 
                       class="form-input"
                       placeholder="Masukkan judul utama"
                       required>
                <p class="text-gray-500 text-sm mt-1">Judul yang muncul di bagian atas halaman</p>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="hero_subtitle">
                    Hero Subtitle (Deskripsi Singkat)
                </label>
                <textarea name="hero_subtitle" 
                          id="hero_subtitle"
                          class="form-input form-textarea"
                          placeholder="Masukkan deskripsi singkat"
                          required>{{ old('hero_subtitle', $settings->hero_subtitle ?? '') }}</textarea>
                <p class="text-gray-500 text-sm mt-1">Deskripsi yang muncul di bawah judul utama</p>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="stat_percentage">
                    Statistik Persentase
                </label>
                <input type="text" 
                       name="stat_percentage" 
                       id="stat_percentage"
                       value="{{ old('stat_percentage', $settings->stat_percentage ?? '') }}" 
                       class="form-input"
                       placeholder="Contoh: 98%"
                       required>
                <p class="text-gray-500 text-sm mt-1">Persentase statistik yang ditampilkan</p>
            </div>
            
            <div class="mb-8">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="daily_sales">
                    Penjualan Harian
                </label>
                <input type="text" 
                       name="daily_sales" 
                       id="daily_sales"
                       value="{{ old('daily_sales', $settings->daily_sales ?? '') }}" 
                       class="form-input"
                       placeholder="Contoh: 350+"
                       required>
                <p class="text-gray-500 text-sm mt-1">Angka penjualan harian yang ditampilkan</p>
            </div>
            
            <!-- Preview Section -->
            <div class="preview-section mb-8">
                <h3 class="font-bold mb-3" style="color: #8D6E63;">Preview Perubahan:</h3>
                <div class="space-y-3">
                    <p><strong>Judul:</strong> <span id="preview-title">{{ $settings->hero_title ?? '' }}</span></p>
                    <p><strong>Subtitle:</strong> <span id="preview-subtitle">{{ $settings->hero_subtitle ?? '' }}</span></p>
                    <p><strong>Statistik:</strong> <span id="preview-stat">{{ $settings->stat_percentage ?? '' }}</span></p>
                    <p><strong>Penjualan Harian:</strong> <span id="preview-sales">{{ $settings->daily_sales ?? '' }}</span></p>
                </div>
            </div>
            
            <div class="flex gap-4">
                <button type="submit" class="btn">Simpan Perubahan</button>
                <!-- Gunakan route name untuk link -->
                <a href="{{ route('landing') }}" class="btn btn-secondary" target="_blank">Lihat Landing Page</a>
            </div>
        </form>
    </div>
    
    <!-- JavaScript untuk live preview -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update preview secara real-time
            const titleInput = document.getElementById('hero_title');
            const subtitleInput = document.getElementById('hero_subtitle');
            const statInput = document.getElementById('stat_percentage');
            const salesInput = document.getElementById('daily_sales');
            
            const previewTitle = document.getElementById('preview-title');
            const previewSubtitle = document.getElementById('preview-subtitle');
            const previewStat = document.getElementById('preview-stat');
            const previewSales = document.getElementById('preview-sales');
            
            function updatePreview() {
                previewTitle.textContent = titleInput.value || '(kosong)';
                previewSubtitle.textContent = subtitleInput.value || '(kosong)';
                previewStat.textContent = statInput.value || '(kosong)';
                previewSales.textContent = salesInput.value || '(kosong)';
            }
            
            // Event listeners untuk update preview
            [titleInput, subtitleInput, statInput, salesInput].forEach(input => {
                input.addEventListener('input', updatePreview);
            });
            
            // Inisialisasi preview pertama kali
            updatePreview();
        });
    </script>
</body>
</html>