<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasi Karak Pak Nara - MPTI Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> 
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-bg': '#FDFBF7',      
                        'brand-dark': '#2b1d1a',    
                        'brand-brown': '#8D6E63',   
                        'brand-tan': '#D7CCC8',     
                        'brand-green': '#1B5E20',   
                        'brand-card': '#F5F5F5',    
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    borderRadius: {
                        '4xl': '2.5rem',
                        '5xl': '3rem',
                    }
                }
            }
        }
    </script>
    <style>
        html { scroll-behavior: smooth; }
        html, body { height: 100%; }
        body { display: flex; flex-direction: column; min-height: 100vh; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .page-root { display: flex; flex-direction: column; flex: 1 1 auto; }
        .page-body { flex: 1 1 auto; }
        footer { flex-shrink: 0; }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
        }
        .modal.active {
            display: flex;
        }
        .modal-content {
            background-color: white;
            padding: 2rem;
            border-radius: 1.5rem;
            width: 90%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: modalSlideIn 0.3s ease-out;
        }
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .editable:hover {
            background-color: rgba(139, 110, 99, 0.1);
            outline: 2px dashed #8D6E63;
            outline-offset: 4px;
            cursor: pointer;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }
        .edit-icon {
            display: none;
            position: absolute;
            top: -10px;
            right: -10px;
            background: #2b1d1a;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            z-index: 10;
        }
        .editable:hover .edit-icon {
            display: flex;
        }
        /* Floating Admin Button */
        .admin-float-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            z-index: 999;
            background-color: #2b1d1a;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        .admin-float-btn:hover {
            background-color: #8D6E63;
            transform: scale(1.1);
        }
        .admin-float-btn svg {
            width: 28px;
            height: 28px;
        }
        /* Form Styles */
        .form-input {
            width: 100%;
            padding: 0.875rem;
            margin-bottom: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .form-input:focus {
            outline: none;
            border-color: #8D6E63;
            box-shadow: 0 0 0 3px rgba(139, 110, 99, 0.1);
        }
        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }
        .btn-primary {
            background-color: #2b1d1a;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #8D6E63;
        }
        .btn-secondary {
            background-color: #f3f4f6;
            color: #374151;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }
        .btn-secondary:hover {
            background-color: #e5e7eb;
        }
        /* Success Message */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #10b981;
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
            z-index: 10000;
            animation: slideInRight 0.3s ease-out;
            display: none;
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-brand-bg text-brand-dark antialiased font-sans overflow-x-hidden">
    <!-- Success Message -->
    <div id="successMessage" class="success-message">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
            <span>Perubahan berhasil disimpan!</span>
        </div>
    </div>

    <!-- Floating Admin Button -->
    <div class="admin-float-btn" id="adminBtn" onclick="openFullEdit()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </div>

    <!-- Admin Modal -->
    <div class="modal" id="adminModal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold" style="color: #2b1d1a;">Edit Konten Landing Page</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="adminForm">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="modal_hero_title">Judul Utama</label>
                    <input type="text" 
                           name="hero_title" 
                           id="modal_hero_title"
                           value="{{ $settings->hero_title ?? 'Nasi Karak Pak Nara' }}" 
                           class="form-input"
                           placeholder="Masukkan judul utama">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="modal_hero_subtitle">Deskripsi Singkat</label>
                    <textarea name="hero_subtitle" 
                              id="modal_hero_subtitle"
                              class="form-input form-textarea"
                              placeholder="Masukkan deskripsi singkat">{{ $settings->hero_subtitle ?? 'Tradisi Lokal, Rasa Autentik, dan Hidangan Penuh Cerita.' }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="modal_stat_percentage">Statistik Persentase</label>
                    <input type="text" 
                           name="stat_percentage" 
                           id="modal_stat_percentage"
                           value="{{ $settings->stat_percentage ?? '98%' }}" 
                           class="form-input"
                           placeholder="Contoh: 98%">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="modal_daily_sales">Penjualan Harian</label>
                    <input type="text" 
                           name="daily_sales" 
                           id="modal_daily_sales"
                           value="{{ $settings->daily_sales ?? '350+' }}" 
                           class="form-input"
                           placeholder="Contoh: 350+">
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="btn-primary">Simpan Perubahan</button>
                    <button type="button" onclick="closeModal()" class="btn-secondary">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Slider Modal (Ditambahkan via JS) -->

    <div class="page-root">
        <div class="page-body">
            <!-- NAVBAR -->
            <nav class="flex items-center justify-between px-6 md:px-12 py-6 max-w-7xl mx-auto relative z-20">
                <div class="flex items-center gap-2">
                    <div class="h-10 w-10 bg-brand-dark rounded-full"></div>
                    <div class="h-10 w-4 bg-brand-dark"></div> 
                </div>
                <div class="hidden md:flex items-center gap-8 font-medium text-[#5D4037] text-sm tracking-wide">
                    <a href="#" class="hover:text-brand-dark font-bold transition">Daftar Menu</a>
                    <a href="#" class="hover:text-brand-dark font-bold transition">Kontak</a>
                    <a href="#" class="hover:text-brand-dark font-bold transition">Customer Support</a>
                </div>
                <button class="bg-brand-dark text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-opacity-90 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 duration-200">
                    Pesan
                </button>
            </nav>

            <!-- HEADER -->
            <header class="max-w-7xl mx-auto px-6 md:px-12 pb-16 relative">
                <div class="text-center mb-12 relative pt-6 max-w-3xl mx-auto">
                    <div class="editable relative inline-block" onclick="editField('hero_title')">
                        <h1 class="text-4xl font-bold" id="live_hero_title">{{ $settings->hero_title ?? 'Nasi Karak Pak Nara' }}</h1>
                        <div class="edit-icon">✏️</div>
                    </div>
                    <div class="editable relative inline-block mt-4" onclick="editField('hero_subtitle')">
                        <p class="text-brand-brown text-base md:text-lg font-medium" id="live_hero_subtitle">{{ $settings->hero_subtitle ?? 'Tradisi Lokal, Rasa Autentik, dan Hidangan Penuh Cerita.' }}</p>
                        <div class="edit-icon">✏️</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 items-end h-auto lg:h-[400px]">
                    <div class="bg-white rounded-[2rem] p-5 shadow-sm h-full flex flex-col justify-between border border-gray-100 lg:col-span-1 sm:col-span-2">
                        <div class="mb-2">
                            <div class="editable relative inline-block" onclick="editField('stat_percentage')">
                                <h2 class="text-4xl font-bold" id="live_stat_percentage">{{ $settings->stat_percentage ?? '98%' }}</h2>
                                <div class="edit-icon">✏️</div>
                            </div>
                            <div class="editable relative mt-4" onclick="editField('hero_subtitle')">
                                <p class="text-lg" id="live_hero_subtitle_2">{{ $settings->hero_subtitle ?? 'Pelanggan puas dengan pelayanan dan rasa makanan kami.' }}</p>
                                <div class="edit-icon">✏️</div>
                            </div>
                        </div>
                        <div class="flex-grow w-full bg-gray-200 rounded-[1.5rem] overflow-hidden relative flex items-center justify-center min-h-[140px] group">
                            <img src="{{ asset('Asset/Images/markus-spiske-i5tesTFPBjw-unsplash 1.png') }}" alt="Nasi Kotak" class="object-cover w-full h-full opacity-90 group-hover:scale-110 transition duration-500">
                        </div>
                    </div>
                    <div class="h-[320px] lg:h-full lg:col-span-1 bg-gray-300 rounded-[2rem] overflow-hidden shadow-sm relative group">
                        <img src="{{ asset('Asset/Images/Nasi Karak Original.jpg') }}" alt="Nasi Kotak" class="object-cover w-full h-full group-hover:scale-105 transition duration-700">
                    </div>
                    <div class="flex flex-col gap-4 h-full justify-end lg:col-span-1 sm:col-span-2">
                        <div class="flex flex-col sm:flex-row justify-center gap-2">
                            <button class="border border-brand-dark text-brand-dark px-4 py-2 rounded-full text-xs font-bold hover:bg-brand-dark hover:text-white transition">Video Profil</button>
                            <button class="bg-[#D7CCC8] text-brand-dark px-4 py-2 rounded-full text-xs font-bold hover:bg-[#BCAAA4] transition">Tentang Kami</button>
                        </div>
                        <div class="bg-brand-dark text-white p-5 rounded-[2rem] text-center shadow-lg relative overflow-hidden flex flex-col justify-center h-[200px]">
                            <div class="editable relative" onclick="editField('daily_sales')">
                                <h3 class="font-serif text-4xl font-bold mb-1 text-[#F5F5F5]" id="live_daily_sales">{{ $settings->daily_sales ?? '350+' }}</h3>
                                <div class="edit-icon">✏️</div>
                            </div>
                            <p class="text-xs font-light text-brand-tan uppercase tracking-wider">Penjualan Harian</p>
                            <div class="absolute -top-12 -left-12 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                        </div>
                    </div>
                    <div class="bg-white p-2 rounded-[2rem] shadow-sm h-[280px] lg:h-[320px] lg:self-end lg:col-span-1">
                        <div class="h-full w-full bg-gray-200 rounded-[1.5rem] overflow-hidden relative group">
                            <img src="{{ asset('Asset/Images/Nasi Karak Display.jpg') }}" alt="Nasi Karak" class="object-cover w-full h-full group-hover:scale-105 transition duration-500">
                        </div>
                    </div>
                    <div class="h-[320px] lg:h-full lg:col-span-1 bg-gray-300 rounded-[2rem] overflow-hidden shadow-sm relative group">
                        <img src="{{ asset('Asset/Images/Tentang Kami.jpg') }}" alt="Nasi Kotak" class="object-cover w-full h-full group-hover:scale-105 transition duration-700">
                    </div>
                </div>
            </header>

            <section class="max-w-7xl mx-auto px-6 md:px-12 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="relative">
                <div class="absolute inset-0 border-2 border-dashed border-brand-brown rounded-[3rem] transform -rotate-2 scale-105"></div>
                <div class="h-72 w-full bg-gray-300 rounded-[3rem] flex items-center justify-center relative z-10 shadow-lg overflow-hidden">
                     <img src="https://placehold.co/600x400/png?text=Video+Thumbnail" class="object-cover w-full h-full">
                    <div class="absolute bg-white/90 p-3 rounded-full cursor-pointer hover:scale-110 transition backdrop-blur-sm shadow-md">
                        <svg class="w-8 h-8 text-brand-dark" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/></svg>
                    </div>
                </div>
            </div>
            <div class="text-right md:text-right text-center">
                <h2 class="font-serif text-3xl md:text-4xl leading-tight text-brand-dark mb-4 font-bold">
                    Tradisi <br> Lokal, Rasa <br> Autentik.
                </h2>
                <p class="text-brand-brown text-base">
                    Hidangan penuh cerita dari resep turun temurun.
                </p>
            </div>
        </div>
    </section>

            <!-- Tentang Kami Section -->
            <section id="about-us-section" class="bg-[#F6F6F3] pt-20 pb-1 relative overflow-hidden">
                <div class="max-w-7xl mx-auto px-6 md:px-12">
                    <h2 class="font-serif text-4xl font-normal text-[#1A4B1D] mb-12">Tentang Kami</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
                        <div class="relative z-10">
                            <div id="content-card" class="bg-white p-8 md:p-12 rounded-[2.5rem] shadow-xl transition-all duration-500 ease-in-out w-full lg:max-w-[450px]">
                                <span id="content-number" class="text-3xl font-light text-brand-green mb-3 block transition-opacity duration-300">01</span>
                                <h3 id="content-title" class="text-xl md:text-2xl font-semibold text-brand-green mb-4 transition-opacity duration-300">Asal Usul</h3>
                                <p id="content-text" class="text-brand-green leading-relaxed transition-opacity duration-300 text-sm">
                                    Nasi Karak Pak Nara menghadirkan cita rasa khas Gresik yang telah diwariskan turun-temurun...
                                </p>
                                <div class="flex items-center gap-4 mt-8">
                                    <button id="prev-btn" class="w-10 h-10 rounded-full border border-brand-brown text-brand-brown flex items-center justify-center hover:bg-brand-brown hover:text-white transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                        </svg>
                                    </button>
                                    <button id="next-btn" class="w-10 h-10 rounded-full bg-brand-brown text-white flex items-center justify-center hover:bg-brand-brown/80 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                    <span id="page-indicator" class="text-[#3C3C3C] ml-4 font-medium text-sm">01/03</span>
                                </div>
                            </div>
                        </div>
                        <div class="hidden lg:block relative h-[400px] w-full mt-0" aria-live="polite" aria-atomic="true">
                            <div id="photo-container" class="relative w-full h-full">
                                <div data-index="0" class="photo-card absolute w-[280px] h-[380px] rounded-[2rem] overflow-hidden shadow-2xl transition-all duration-700 ease-in-out" 
                                    style="transform: rotate(5deg) translate(120px, 0px); z-index: 3;">
                                    <img src="{{ asset('Asset/Images/Tentang Kami.jpg') }}" alt="Foto Tentang 1" class="w-full h-full object-cover">
                                </div>
                                <div data-index="1" class="photo-card absolute w-[280px] h-[380px] rounded-[2rem] overflow-hidden shadow-xl transition-all duration-700 ease-in-out" 
                                    style="transform: rotate(-4deg) translate(200px, 20px); z-index: 2; opacity: 0.8;">
                                    <img src="{{ asset('Asset/Images/Nasi Karak Display.jpg') }}" alt="Foto Makanan 2" class="w-full h-full object-cover">
                                </div>
                                <div data-index="2" class="photo-card absolute w-[280px] h-[380px] rounded-[2rem] overflow-hidden shadow-lg transition-all duration-700 ease-in-out" 
                                    style="transform: rotate(2deg) translate(280px, 40px); z-index: 1; opacity: 0.5;">
                                    <img src="{{ asset('Asset/Images/Nasi Karak Spesial.jpg') }}" alt="Foto Makanan 3" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

<section class="max-w-7xl mx-auto px-6 md:px-12 py-16">
    <h2 class="font-serif text-3xl mb-12 text-center md:text-left font-bold text-brand-dark">
        Keunggulan
    </h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        
        <div class="h-[300px] bg-[#B89379] text-brand-dark rounded-full flex flex-col items-center justify-center p-6 text-center shadow-xl transition-transform duration-300 hover:scale-[1.02]">
            <h4 class="font-serif text-2xl font-semibold mb-2 leading-snug">Rasa Autentik <br> Daerah</h4>
            <p class="text-sm opacity-90 leading-relaxed max-w-[80%]">
                Resep asli khas Gresik yang mempertahankan cita rasa tradisional—dari nasi gurih hingga lauk pendampingnya.
            </p>
        </div>
        
        <div class="h-[300px] bg-brand-dark text-white rounded-full flex flex-col items-center justify-center p-6 text-center shadow-xl transition-transform duration-300 hover:scale-[1.02]">
            <h4 class="font-serif text-2xl font-semibold mb-2 leading-snug">Pelayanan <br> Ramah</h4>
            <p class="text-sm opacity-90 leading-relaxed max-w-[80%]">
                Setiap pelanggan adalah keluarga. Kami siap melayani dengan sepenuh hati baik di tempat, bungkus, maupun pesanan online.
            </p>
        </div>
        
        <div class="h-[300px] bg-[#E0E0DB] text-brand-green rounded-full flex flex-col items-center justify-center p-6 text-center shadow-lg transition-transform duration-300 hover:scale-[1.02]">
            <h4 class="font-serif text-2xl font-semibold mb-2 leading-snug">Harga <br> Terjangkau</h4>
            <p class="text-sm opacity-90 leading-relaxed max-w-[80%]">
                Nikmati kelezatan khas Jawa Timur tanpa harus merogoh kocek dalam. Cita rasa premium, harga UMKM.
            </p>
        </div>
        
        <div class="h-[300px] bg-[#B89379] text-brand-dark rounded-full flex flex-col items-center justify-center p-6 text-center shadow-xl transition-transform duration-300 hover:scale-[1.02]">
            <h4 class="font-serif text-2xl font-semibold mb-2 leading-snug">Bahan Pilihan <br> & Segar</h4>
            <p class="text-sm opacity-90 leading-relaxed max-w-[80%]">
                Kami hanya menggunakan bahan lokal terbaik, diolah setiap hari agar selalu hangat dan nikmat saat disajikan.
            </p>
        </div>
        
    </div>
</section>
  <section class="max-w-7xl mx-auto px-6 md:px-12 py-12">
    <h2 class="font-serif text-3xl mb-8 font-bold text-[#2b1d1a]">Menu Andalan</h2>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
        
        <div class="lg:col-span-5 flex flex-col gap-5">
            
            <div class="bg-white border border-[#E5E7EB] rounded-[2.5rem] p-2.5 pl-8 pr-3 flex items-center justify-between shadow-sm hover:shadow-md transition h-[100px] group relative overflow-visible">
                <div class="flex flex-col items-start gap-1.5 z-10">
                    <h3 class="font-sans font-bold text-base text-[#2b1d1a]">Nasi Karak Original</h3>
                    <button class="bg-[#A97C5D] text-white px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wide flex items-center gap-1.5 hover:bg-[#8D6E63] transition shadow-sm">
                        Lihat Detail 
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
                <div class="w-20 h-20 bg-gray-100 rounded-[1.2rem] overflow-hidden shadow-sm shrink-0 border-2 border-white rotate-3 group-hover:rotate-0 transition duration-300">
                     <img src="https://placehold.co/200x200/png?text=Original" class="object-cover w-full h-full">
                </div>
            </div>

            <div class="bg-[#3E2B26] text-white rounded-[2.5rem] p-2.5 pl-8 pr-3 flex items-center justify-between shadow-xl transform md:scale-105 z-20 h-[110px] relative overflow-visible border-2 border-[#FDFBF7]">
                <div class="flex flex-col items-start gap-1.5 z-10">
                    <h3 class="font-sans font-bold text-base">Nasi Karak Spesial</h3>
                    <button class="bg-[#A97C5D] text-white px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wide flex items-center gap-1.5 hover:bg-[#8D6E63] transition shadow-sm border border-white/20">
                        Lihat Detail
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
                <div class="w-24 h-24 bg-[#5D4037] rounded-[1.2rem] overflow-hidden shadow-lg shrink-0 border-2 border-[#A97C5D] -rotate-3 group-hover:rotate-0 transition duration-300">
                     <img src="https://placehold.co/200x200/png?text=Spesial" class="object-cover w-full h-full">
                </div>
            </div>

            <div class="bg-[#F5F5F0] border border-transparent rounded-[2.5rem] p-2.5 pl-8 pr-3 flex items-center justify-between shadow-sm hover:shadow-md transition h-[100px] group relative overflow-visible">
                <div class="flex flex-col items-start gap-1.5 z-10">
                    <h3 class="font-sans font-bold text-base text-[#2b1d1a]">Super Spesial</h3>
                    <button class="bg-[#A97C5D] text-white px-4 py-1.5 rounded-full text-[10px] font-bold tracking-wide flex items-center gap-1.5 hover:bg-[#8D6E63] transition shadow-sm">
                        Lihat Detail
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
                <div class="w-20 h-20 bg-gray-100 rounded-[1.2rem] overflow-hidden shadow-sm shrink-0 border-2 border-white rotate-3 group-hover:rotate-0 transition duration-300">
                     <img src="https://placehold.co/200x200/png?text=Super" class="object-cover w-full h-full">
                </div>
            </div>

        </div>

        <div class="lg:col-span-7 flex flex-col h-full pl-0 lg:pl-4 relative">
            
            <div class="flex justify-between items-end mb-4 px-2">
                <h3 class="font-serif font-bold text-2xl text-[#2b1d1a] leading-none">
                    Jelajahi Menu <br> Lainnya
                </h3>
                
                <button class="w-10 h-10 rounded-full border border-black/80 flex items-center justify-center hover:bg-[#2b1d1a] hover:text-white hover:border-[#2b1d1a] transition duration-300 group bg-transparent">
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>

            <div class="w-full h-[340px] bg-[#8D6E63] rounded-tl-[2rem] rounded-bl-[2rem] rounded-br-[2rem] rounded-tr-[6rem] overflow-hidden shadow-xl relative group border-4 border-white">
                <img src="https://placehold.co/800x600/png?text=Menu+Lengkap+Estetik" class="object-cover w-full h-full group-hover:scale-105 transition duration-700">
                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition"></div>
            </div>

        </div>

    </div>
</section>

    <section class="max-w-7xl mx-auto px-6 md:px-12 py-12">
    <h2 class="font-serif text-3xl mb-2 font-bold text-[#2b1d1a]">Cerita Pelanggan Kami</h2>
    
    <div class="flex flex-nowrap overflow-x-auto gap-6 py-10 px-1 hide-scrollbar snap-x cursor-grab active:cursor-grabbing">
        
        <div class="min-w-[300px] w-[300px] h-[280px] bg-[#F2EFE9] p-8 rounded-[2.5rem] snap-center flex flex-col justify-between relative hover:scale-105 hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100">
            <p class="text-sm font-medium text-[#2b1d1a] leading-relaxed relative z-10">
                "Nasi Karak Pak Nara bikin kangen kampung halaman! Rasanya khas banget, apalagi sambalnya — mantap!"
            </p>
            <div class="absolute right-8 bottom-20 text-6xl font-serif text-[#2b1d1a] opacity-10 leading-none">”</div>
            
            <div class="flex items-center gap-4 mt-auto relative z-10">
                <img src="https://placehold.co/100x100" class="w-12 h-12 rounded-full object-cover grayscale">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-[#2b1d1a]">Dina</span>
                    <span class="text-xs text-gray-500">Mahasiswi</span>
                </div>
            </div>
        </div>

        <div class="min-w-[300px] w-[300px] h-[280px] bg-[#3E2B26] p-8 rounded-[2.5rem] snap-center flex flex-col justify-between relative shadow-xl hover:scale-105 transition duration-300">
            <p class="text-sm font-medium text-white/90 leading-relaxed relative z-10">
                "Murah banget, dengan harga 5.000 saja bisa makan nasi merah dengan lauk yang lumayan banyak."
            </p>
            <div class="absolute right-8 bottom-20 text-6xl font-serif text-[#A97C5D] leading-none">”</div>

            <div class="flex items-center gap-4 mt-auto relative z-10">
                <img src="https://placehold.co/100x100" class="w-12 h-12 rounded-full object-cover border-2 border-[#A97C5D]">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-white">Mark T.</span>
                    <span class="text-xs text-[#A97C5D]">Wiraswasta</span>
                </div>
            </div>
        </div>

        <div class="min-w-[300px] w-[300px] h-[280px] bg-[#F2EFE9] p-8 rounded-[2.5rem] snap-center flex flex-col justify-between relative hover:scale-105 hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100">
            <p class="text-sm font-medium text-[#2b1d1a] leading-relaxed relative z-10">
                "Udah murah dimasaknya juga langsung di tempat jadi rasanya fresh dan mantapbbb poll."
            </p>
            <div class="absolute right-8 bottom-20 text-6xl font-serif text-[#2b1d1a] opacity-10 leading-none">”</div>

            <div class="flex items-center gap-4 mt-auto relative z-10">
                <img src="https://placehold.co/100x100" class="w-12 h-12 rounded-full object-cover grayscale">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-[#2b1d1a]">Sarah J.</span>
                    <span class="text-xs text-gray-500">Ibu Rumah Tangga</span>
                </div>
            </div>
        </div>

        <div class="min-w-[300px] w-[300px] h-[280px] bg-[#F2EFE9] p-8 rounded-[2.5rem] snap-center flex flex-col justify-between relative hover:scale-105 hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100">
            <p class="text-sm font-medium text-[#2b1d1a] leading-relaxed relative z-10">
                "Murah pwollll sangat cocok untuk anak kos, karena dengan harga 5.000 saja."
            </p>
            <div class="absolute right-8 bottom-20 text-6xl font-serif text-[#2b1d1a] opacity-10 leading-none">”</div>

            <div class="flex items-center gap-4 mt-auto relative z-10">
                <img src="https://placehold.co/100x100" class="w-12 h-12 rounded-full object-cover grayscale">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-[#2b1d1a]">Rebecca S.</span>
                    <span class="text-xs text-gray-500">Pelajar</span>
                </div>
            </div>
        </div>

    </div>
</section>

    <section class="max-w-7xl mx-auto px-6 md:px-12 pt-4 pb-12 relative overflow-visible">
        <h2 class="font-serif text-3xl mb-12 font-bold text-[#2b1d1a]">Pertanyaan Umum (FAQ)</h2>
        
        <div class="relative flex flex-col md:flex-row justify-center items-center gap-6">

            <div class="hidden md:block absolute -left-12 top-1/2 -translate-y-1/2 w-40 h-56 rounded-2xl overflow-hidden opacity-90 z-0 shadow-sm rotate-[-5deg]">
                <img src="https://placehold.co/300x400/png?text=Food+1" class="w-full h-full object-cover">
            </div>
            <div class="hidden md:block absolute -right-12 top-1/2 -translate-y-1/2 w-40 h-56 rounded-2xl overflow-hidden opacity-90 z-0 shadow-sm rotate-[5deg]">
                <img src="https://placehold.co/300x400/png?text=Food+2" class="w-full h-full object-cover">
            </div>

            <div class="relative z-10 w-full md:w-[320px] bg-white border border-black rounded-[2rem] p-6 text-center h-auto md:h-[200px] flex flex-col justify-center items-center shadow-sm">
                <h3 class="font-bold text-base mb-2 text-[#2b1d1a]">Apakah bisa pesan dalam jumlah besar?</h3>
                <p class="text-xs text-gray-600 leading-relaxed px-2">
                    Tentu! Kami menerima pesanan untuk acara, rapat, atau hajatan dengan harga khusus.
                </p>
            </div>

            <div class="relative z-20 w-full md:w-[350px] bg-[#A97C5D] rounded-[2rem] p-8 text-center shadow-2xl md:scale-110 border border-[#8D6E63] h-auto md:h-[240px] flex flex-col justify-center items-center mx-2">
                <h3 class="font-bold text-lg mb-3 text-[#2b1d1a]">Apakah bisa antar ke lokasi?</h3>
                <p class="text-xs font-medium text-[#2b1d1a]/80 leading-relaxed px-2">
                    Ya, kami melayani pengantaran ke area sekitar Gresik dengan minimal order tertentu.
                </p>
            </div>

            <div class="relative z-10 w-full md:w-[320px] bg-white border border-black rounded-[2rem] p-6 text-center h-auto md:h-[200px] flex flex-col justify-center items-center shadow-sm">
                <h3 class="font-bold text-base mb-2 text-[#2b1d1a]">Apakah bisa request lauk?</h3>
                <p class="text-xs text-gray-600 leading-relaxed px-2">
                    Bisa banget! Pilih sesuai selera, kami siap menyesuaikan menu Anda.
                </p>
            </div>

        </div>
    </section>

    <section class="bg-[#F2EFE9] pt-12 pb-16 rounded-t-[3rem] mt-12 relative z-10 shadow-[0_-5px_15px_rgba(0,0,0,0.03)]">
        <div class="max-w-7xl mx-auto px-6 md:px-12 text-center">

            <h2 class="font-serif text-3xl mb-6 text-brand-dark text-left font-bold">Lokasi Penjualan</h2>

            <div class="relative w-full h-[400px] md:h-[450px] rounded-[2rem] overflow-hidden shadow-md border border-gray-200">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.056632442236!2d112.6373898!3d-7.1512497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7ff97561955b1%3A0x6b5394200424578e!2sJl.%20Jaksa%20Agung%20Suprapto%2C%20Gresik!5e0!3m2!1sid!2sid!4v1701760000000!5m2!1sid!2sid"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    class="filter grayscale-[10%] rounded-[2rem]">
                </iframe>
            </div>

            <p class="mt-5 text-xs text-gray-600 max-w-xl mx-auto leading-relaxed">
                Jl. Jaksa Agung Suprapto, sebrang Filokopi dan juga Mie Jogja Pak Bayan, dekat dengan lampu merah perlimaan Petro, Gresik, Jawa Timur
            </p>

            <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Jaksa+Agung+Suprapto,+Gresik+(Dekat+Mie+Jogja+Pak+Bayan)" target="_blank" 
               class="mt-4 inline-block bg-[#2b1d1a] text-white px-6 py-2 rounded-full text-xs font-semibold shadow-md hover:scale-105 transition">
                Detail Lokasi
            </a>
        </div>
    </section>

    </div>
    </div>

    <footer class="bg-[#2b1d1a] text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-6 md:px-12">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8 items-start">

                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <div class="h-10 w-10 bg-[#F2EFE9] rounded-full"></div>
                        <div class="h-10 w-3 bg-[#F2EFE9]"></div>
                    </div>
                </div>

                <div class="grid grid-cols-2 text-xs text-[#F2EFE9] gap-x-4 gap-y-3 font-medium tracking-wide">
                    <a href="#" class="underline underline-offset-4 hover:text-white transition decoration-gray-400/50 hover:decoration-white">Video Profil</a>
                    <a href="#" class="underline underline-offset-4 hover:text-white transition decoration-gray-400/50 hover:decoration-white">Keunggulan</a>
                    <a href="#" class="underline underline-offset-4 hover:text-white transition decoration-gray-400/50 hover:decoration-white">Tentang Kami</a>
                    <a href="#" class="underline underline-offset-4 hover:text-white transition decoration-gray-400/50 hover:decoration-white">Menu Andalan</a>
                    <a href="#" class="underline underline-offset-4 hover:text-white transition decoration-gray-400/50 hover:decoration-white">Review</a>
                    <a href="#" class="underline underline-offset-4 hover:text-white transition decoration-gray-400/50 hover:decoration-white">Stok Hari Ini</a>
                </div>

                <div class="text-[10px] md:text-xs text-gray-400 flex flex-col justify-between h-full">
                    <p class="leading-relaxed mb-4 md:mb-0">
                        Jl. Jaksa Agung Suprapto, sebrang Filokopi dan juga Mie Jogja Pak Bayan, dekat dengan lampu merah perlimaan Petro, Gresik, Jawa Timur
                    </p>

                    <div class="flex gap-2 mt-auto">
                        <a class="bg-white/10 hover:bg-white/20 h-7 w-7 rounded-full flex items-center justify-center transition">
                            <svg fill="currentColor" class="w-3 h-3 text-[#F2EFE9]" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                            </svg>
                        </a>
                        <a class="bg-white/10 hover:bg-white/20 h-7 w-7 rounded-full flex items-center justify-center transition">
                            <svg fill="currentColor" class="w-3 h-3 text-[#F2EFE9]" viewBox="0 0 24 24">
                                <path d="M12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27z"/>
                            </svg>
                        </a>
                        <a class="bg-white/10 hover:bg-white/20 h-7 w-7 rounded-full flex items-center justify-center transition">
                            <svg fill="currentColor" class="w-3 h-3 text-[#F2EFE9]" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>

            <div class="border-t border-white/10 pt-4 flex flex-col md:flex-row justify-between items-center text-[10px] text-gray-500 gap-4 md:gap-0">
                <p>© 2024 AIChefMate. All rights reserved.</p>
                <div class="flex gap-4">
                    <a class="hover:text-white transition cursor-pointer">Privacy Policy</a>
                    <a class="hover:text-white transition cursor-pointer">Terms of Use</a>
                </div>
            </div>

        </div>
    </footer>

<script>
    // =============================
    // 1. FUNGSI UNTUK MODAL ADMIN UTAMA (EDIT HERO, STAT, DLL)
    // =============================

    function editField(fieldName) {
        openFullEdit();
    }

    function openFullEdit() {
        const modal = document.getElementById('adminModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Isi form dengan nilai live terkini
        document.getElementById('modal_hero_title').value = document.getElementById('live_hero_title').textContent;
        document.getElementById('modal_hero_subtitle').value = document.getElementById('live_hero_subtitle').textContent;
        document.getElementById('modal_stat_percentage').value = document.getElementById('live_stat_percentage').textContent;
        document.getElementById('modal_daily_sales').value = document.getElementById('live_daily_sales').textContent;
    }

    function closeModal() {
        const modal = document.getElementById('adminModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // =============================
    // 2. SUBMIT FORM ADMIN → KIRIM KE CONTROLLER
    // =============================

    document.getElementById('adminForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const data = {
            hero_title: document.getElementById('modal_hero_title').value.trim(),
            hero_subtitle: document.getElementById('modal_hero_subtitle').value.trim(),
            stat_percentage: document.getElementById('modal_stat_percentage').value.trim(),
            daily_sales: document.getElementById('modal_daily_sales').value.trim()
        };

        saveToDatabase(data)
            .then(response => {
                if (response.success) {
                    updateLiveContent(response.data);
                    document.getElementById('successMessage').style.display = 'block';
                    setTimeout(() => {
                        document.getElementById('successMessage').style.display = 'none';
                    }, 3000);
                    closeModal();
                } else {
                    alert('Gagal menyimpan: ' + (response.message || 'Terjadi kesalahan.'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan. Cek konsol browser.');
            });
    });

    // =============================
    // 3. SLIDER (TETAP DIPERTAHANKAN)
    // =============================

    const slides = [
        {
            number: '01',
            title: 'Asal Usul',
            text: 'Nasi Karak Pak Nara menghadirkan cita rasa khas Gresik yang telah diwariskan turun-temurun. Setiap porsi kami racik dari bahan pilihan—nasi gurih dengan taburan serundeng, lauk khas, dan sambal yang menggugah selera. Kami percaya bahwa setiap hidangan bukan sekadar makanan, tapi bagian dari budaya yang patut dijaga.'
        },
        {
            number: '02',
            title: 'Filosofi Rasa',
            text: 'Kami percaya bahwa kelezatan sejati datang dari kesederhanaan. Menggunakan bumbu alami, tanpa penguat rasa buatan, dan proses masak yang teliti. Setiap gigitan adalah warisan rasa otentik yang kami dedikasikan untuk Anda dan keluarga.'
        },
        {
            number: '03',
            title: 'Komitmen Kami',
            text: 'Lebih dari sekadar nasi karak, kami berkomitmen untuk melestarikan kuliner tradisional. Kami berjanji untuk selalu menggunakan bahan-bahan terbaik dan menjaga kualitas rasa yang sama dari generasi ke generasi.'
        }
    ];

    let currentIndex = 0;
    const totalSlides = slides.length;

    const contentNumber = document.getElementById('content-number');
    const contentTitle = document.getElementById('content-title');
    const contentText = document.getElementById('content-text');
    const pageIndicator = document.getElementById('page-indicator');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    const photoCards = document.querySelectorAll('.photo-card');

    const cardTransforms = [
        ['5deg', '120px', '0px', 3, 1],
        ['-4deg', '200px', '20px', 2, 0.8],
        ['2deg', '280px', '40px', 1, 0.5]
    ];

    const highlightColor = '#1A4B1D';

    function updateContent(index) {
        contentNumber.style.opacity = '0';
        contentTitle.style.opacity = '0';
        contentText.style.opacity = '0';

        setTimeout(() => {
            const slide = slides[index];
            contentNumber.textContent = slide.number;
            contentTitle.textContent = slide.title;
            contentText.textContent = slide.text;
            contentNumber.style.color = highlightColor;

            const currentNum = index + 1;
            const totalNum = totalSlides;
            pageIndicator.textContent = `${String(currentNum).padStart(2, '0')}/${String(totalNum).padStart(2, '0')}`;

            contentNumber.style.opacity = '1';
            contentTitle.style.opacity = '1';
            contentText.style.opacity = '1';
        }, 300);
    }

    function updatePhotoCards(direction) {
        photoCards.forEach((card, i) => {
            const currentIdx = parseInt(card.getAttribute('data-index'));
            let newIndex = direction === 1 ? (currentIdx - 1 + totalSlides) % totalSlides : (currentIdx + 1) % totalSlides;
            const [rotate, x, y, z, opacity] = cardTransforms[newIndex];

            card.style.transform = `rotate(${rotate}) translate(${x}, ${y})`;
            card.style.zIndex = z;
            card.style.opacity = opacity;
            card.setAttribute('data-index', newIndex);
        });
    }

    function navigateSlider(direction) {
        let newIndex = currentIndex + direction;
        if (newIndex < 0) newIndex = totalSlides - 1;
        if (newIndex >= totalSlides) newIndex = 0;
        if (newIndex !== currentIndex) {
            updateContent(newIndex);
            updatePhotoCards(direction);
            currentIndex = newIndex;
        }
    }

    prevBtn?.addEventListener('click', () => navigateSlider(-1));
    nextBtn?.addEventListener('click', () => navigateSlider(1));

    updateContent(currentIndex);

    // =============================
    // 4. MODAL SLIDER (TETAP UNTUK AREA TENTANG KAMI)
    // =============================

    const sliderModalHTML = `
    <div class="modal" id="sliderModal">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold" style="color: #2b1d1a;">Edit Konten Slider</h2>
                <button onclick="closeSliderModal()" class="text-gray-500 hover:text-gray-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="sliderFormContainer"></div>
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="saveSliderChanges()" class="btn-primary">Simpan Perubahan</button>
                <button type="button" onclick="closeSliderModal()" class="btn-secondary">Batal</button>
            </div>
        </div>
    </div>
    `;

    document.body.insertAdjacentHTML('beforeend', sliderModalHTML);

    const sliderContent = document.querySelector('#content-card');
    if (sliderContent) {
        sliderContent.classList.add('editable');
        sliderContent.style.position = 'relative';

        const editIcon = document.createElement('div');
        editIcon.className = 'edit-icon';
        editIcon.innerHTML = '✏️';
        editIcon.onclick = openSliderModal;
        sliderContent.appendChild(editIcon);
    }

    function openSliderModal() {
        const modal = document.getElementById('sliderModal');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        const container = document.getElementById('sliderFormContainer');
        container.innerHTML = '';

        slides.forEach((slide, i) => {
            container.insertAdjacentHTML('beforeend', `
                <div class="mb-6 p-4 border rounded-lg border-gray-200">
                    <h3 class="font-bold text-lg mb-3" style="color: #1A4B1D;">Slide ${i + 1}</h3>
                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Nomor</label>
                        <input type="text" class="form-input" value="${slide.number}" id="slider-number-${i}">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                        <input type="text" class="form-input" value="${slide.title}" id="slider-title-${i}">
                    </div>
                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea class="form-input form-textarea" id="slider-text-${i}">${slide.text}</textarea>
                    </div>
                </div>
            `);
        });
    }

    function closeSliderModal() {
        document.getElementById('sliderModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function saveSliderChanges() {
        for (let i = 0; i < slides.length; i++) {
            slides[i].number = document.getElementById(`slider-number-${i}`).value.trim();
            slides[i].title = document.getElementById(`slider-title-${i}`).value.trim();
            slides[i].text = document.getElementById(`slider-text-${i}`).value.trim();
        }

        const liveData = {
            hero_title: document.getElementById('live_hero_title')?.textContent || '',
            hero_subtitle: document.getElementById('live_hero_subtitle')?.textContent || '',
            stat_percentage: document.getElementById('live_stat_percentage')?.textContent || '',
            daily_sales: document.getElementById('live_daily_sales')?.textContent || '',
            slider: slides
        };

        saveToDatabase(liveData)
            .then(res => {
                if (res.success) {
                    updateLiveContent(res.data);
                    updateContent(currentIndex);
                    showSliderSuccessMessage();
                    setTimeout(closeSliderModal, 1500);
                } else {
                    alert('Gagal menyimpan slider.');
                }
            })
            .catch(() => alert('Error saat simpan slider.'));
    }

    function showSliderSuccessMessage() {
        let msg = document.getElementById('sliderSuccessMessage');
        if (!msg) {
            msg = document.createElement('div');
            msg.id = 'sliderSuccessMessage';
            msg.className = 'success-message';
            msg.innerHTML = `<div class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg><span>Slider berhasil diperbarui!</span></div>`;
            document.body.appendChild(msg);
        }
        msg.style.display = 'block';
        setTimeout(() => msg.style.display = 'none', 3000);
    }

    document.getElementById('sliderModal')?.addEventListener('click', (e) => {
        if (e.target === e.currentTarget) closeSliderModal();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            if (document.getElementById('sliderModal').classList.contains('active')) closeSliderModal();
            if (document.getElementById('adminModal').classList.contains('active')) closeModal();
        }
    });

   // =============================
    // 5. FUNGSI SHARED: KOMUNIKASI DENGAN LARAVEL
    // =============================

    // Fungsi untuk menyimpan data utama (hero, stat, dll.)
    async function saveToDatabase(data) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch("{{ route('admin.update') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        });
        return await response.json();
    }

    // Fungsi KHUSUS untuk menyimpan slider → ke AboutSlideController
    async function saveSliderToDatabase(sliderData) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const response = await fetch("{{ route('admin.about-slides.update') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ slider: sliderData })
        });
        return await response.json();
    }

    function updateLiveContent(data) {
        if (data.hero_title !== undefined) document.getElementById('live_hero_title').textContent = data.hero_title;
        if (data.hero_subtitle !== undefined) document.getElementById('live_hero_subtitle').textContent = data.hero_subtitle;
        if (data.stat_percentage !== undefined) document.getElementById('live_stat_percentage').textContent = data.stat_percentage;
        if (data.daily_sales !== undefined) document.getElementById('live_daily_sales').textContent = data.daily_sales;
    }

    // =============================
    // 6. PERBAIKAN PADA saveSliderChanges()
    // =============================
    function saveSliderChanges() {
        // Update data lokal
        for (let i = 0; i < slides.length; i++) {
            slides[i].number = document.getElementById(`slider-number-${i}`).value.trim();
            slides[i].title = document.getElementById(`slider-title-${i}`).value.trim();
            slides[i].text = document.getElementById(`slider-text-${i}`).value.trim();
        }

        // KIRIM HANYA DATA SLIDER KE CONTROLLER SLIDER
        saveSliderToDatabase(slides)
            .then(res => {
                if (res.success) {
                    // Perbarui tampilan live
                    updateContent(currentIndex);
                    showSliderSuccessMessage();
                    setTimeout(closeSliderModal, 1500);
                } else {
                    alert('Gagal menyimpan slider: ' + (res.message || ''));
                }
            })
            .catch(err => {
                console.error('Error menyimpan slider:', err);
                alert('Error saat simpan slider.');
            });
    }

    function showSliderSuccessMessage() {
        let msg = document.getElementById('sliderSuccessMessage');
        if (!msg) {
            msg = document.createElement('div');
            msg.id = 'sliderSuccessMessage';
            msg.className = 'success-message';
            msg.innerHTML = `<div class="flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg><span>Slider berhasil diperbarui!</span></div>`;
            document.body.appendChild(msg);
        }
        msg.style.display = 'block';
        setTimeout(() => msg.style.display = 'none', 3000);
    }
</script>

</body>
</html>