<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasi Karak Original - Detail Menu</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

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
                        'nutrisi-bg': '#E6F3D3', /* Warna hijau muda di box nutrisi */
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
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        /* Style untuk bintang review */
        .star-filled { color: #FFC107; } /* Warna kuning untuk bintang terisi */

        /* CSS Kustom untuk Tombol Floating Review di Dekat Area Review */
        /* Pastikan elemen review memiliki relative, dan tombol ini memiliki absolute/fixed */
        #review-container {
             /* Gunakan relative pada div pembungkus review */
             position: relative;
        }
    </style>
</head>

<body class="bg-brand-bg text-brand-dark antialiased font-sans overflow-x-hidden flex flex-col min-h-screen">

    <nav class="flex items-center justify-between px-6 md:px-12 py-6 max-w-7xl mx-auto w-full relative z-20">
        <div class="flex items-center gap-2">
            <div class="h-10 w-10 bg-brand-dark rounded-full"></div>
            <div class="h-10 w-4 bg-brand-dark"></div> 
        </div>

        <div class="hidden md:flex items-center gap-8 font-medium text-[#5D4037] text-sm tracking-wide">
            <a href="#" class="font-bold transition border-b-2 border-brand-dark">Daftar Menu</a>
            <a href="#" class="hover:text-brand-dark font-bold transition">Kontak</a>
            <a href="#" class="hover:text-brand-dark font-bold transition">Customer Support</a>
        </div>

        <button class="bg-brand-dark text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-opacity-90 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 duration-200">
            Pesan
        </button>
    </nav>

    <main class="flex-grow">
        
        <section class="max-w-7xl mx-auto px-6 md:px-12 w-full pt-4 pb-16">
            
            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-brand-dark transition mb-8">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                
                <div class="order-1 lg:order-1">
                    <div class="w-[600px] aspect-[3/2] mx-auto lg:mx-0">
        <img 
            src="{{ asset('Asset/Images/Nasi Karak Original.jpg') }}"
            alt="Nasi Karak Original"
            class="w-full h-full object-cover rounded-[3rem] shadow-xl"
        >
    </div>
                </div>

                <div class="order-2 lg:order-2">
                    <div class="flex items-start justify-between mb-4">
                        <h2 class="font-serif text-3xl md:text-4xl font-extrabold text-brand-dark leading-tight">
                            Nasi Karak Original
                        </h2>
                        <span class="font-serif text-3xl md:text-4xl font-bold text-brand-dark ml-4 whitespace-nowrap">
                            Rp 5.000
                        </span>
                    </div>

                    <p class="text-sm text-gray-600 mb-8 max-w-lg">
                        Nasi Karak Gresik adalah hidangan tradisional khas Gresik yang terdiri dari nasi yang dicampur serundeng kelapa, disajikan dengan sambal terasi, tempe kering, dan lauk sederhana namun kaya rasa.
                    </p>

                    <h3 class="font-bold text-lg mb-3">Kandungan Nutrisi</h3>
                    <div class="grid grid-cols-2 gap-4 max-w-md mb-8">
                        
                        <div class="bg-nutrisi-bg p-4 rounded-xl text-center shadow-sm">
                            <p class="text-2xl font-bold">400<sup class="text-sm">cal</sup></p>
                            <p class="text-xs text-gray-600">Kalori</p>
                        </div>
                        <div class="bg-nutrisi-bg p-4 rounded-xl text-center shadow-sm">
                            <p class="text-2xl font-bold">5,5<sup class="text-sm">g</sup></p>
                            <p class="text-xs text-gray-600">Gula</p>
                        </div>
                        <div class="bg-nutrisi-bg p-4 rounded-xl text-center shadow-sm">
                            <p class="text-2xl font-bold">15<sup class="text-sm">g</sup></p>
                            <p class="text-xs text-gray-600">Lemak</p>
                        </div>
                        <div class="bg-nutrisi-bg p-4 rounded-xl text-center shadow-sm">
                            <p class="text-2xl font-bold">500<sup class="text-sm">mg</sup></p>
                            <p class="text-xs text-gray-600">Garam</p>
                        </div>
                    </div>
                    
                    <button class="bg-brand-dark text-white px-8 py-3 rounded-full text-sm font-bold hover:bg-opacity-90 transition shadow-md">
                        Pesan Sekarang
                    </button>
                </div>
            </div>

            <div id="review-area" class="mt-16 pt-8 border-t border-gray-200 relative">
                <h3 class="font-serif text-2xl font-bold flex items-center mb-6">
                    4.9 
                    <svg class="w-6 h-6 star-filled ml-2 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.857 1.416 8.303L12 18.028l-7.415 3.996 1.416-8.303-6.001-5.857 8.332-1.209L12 .587z"/></svg>
                    Penilaian Produk (2,1 RB)
                </h3>

                <div class="rounded-2xl p-6 max-w-4xl">
                    <p class="font-bold text-lg mb-2">Avita Sofia</p>
                    <div class="flex gap-0.5 mb-3">
                        <svg class="w-4 h-4 star-filled" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.857 1.416 8.303L12 18.028l-7.415 3.996 1.416-8.303-6.001-5.857 8.332-1.209L12 .587z"/></svg>
                        <svg class="w-4 h-4 star-filled" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.857 1.416 8.303L12 18.028l-7.415 3.996 1.416-8.303-6.001-5.857 8.332-1.209L12 .587z"/></svg>
                        <svg class="w-4 h-4 star-filled" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.857 1.416 8.303L12 18.028l-7.415 3.996 1.416-8.303-6.001-5.857 8.332-1.209L12 .587z"/></svg>
                        <svg class="w-4 h-4 star-filled" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.857 1.416 8.303L12 18.028l-7.415 3.996 1.416-8.303-6.001-5.857 8.332-1.209L12 .587z"/></svg>
                        <svg class="w-4 h-4 star-filled" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.209-6.001 5.857 1.416 8.303L12 18.028l-7.415 3.996 1.416-8.303-6.001-5.857 8.332-1.209L12 .587z"/></svg>
                    </div>
                    <p class="text-sm text-gray-700 mb-4">
                        Enak bangett ini teh murahh pisannn, pulang kerjaan dari arah petro iseng beli ini ehhh tauunyaaa enak pwolll gesss
                    </p>
                    <div class="flex gap-3">
                        <img src="https://placehold.co/100x100/964B00/FDFBF7?text=Foto+Review+1" class="w-24 h-24 object-cover rounded-lg">
                        <img src="https://placehold.co/100x100/3A3B3C/FDFBF7?text=Foto+Review+2" class="w-24 h-24 object-cover rounded-lg">
                    </div>
                </div>
                
                <button class="absolute top-2 right-6 md:right-12 bg-brand-dark text-white h-12 w-12 rounded-full flex items-center justify-center text-3xl font-light hover:bg-opacity-90 transition shadow-xl transform hover:-translate-y-0.5 duration-200">
                    +
                </button>
            </div>

        </section>

    </main>

    <footer class="bg-[#2b1d1a] text-white pt-12 pb-8 mt-auto">
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

                    <div class="flex gap-2 mt-auto justify-end">
                        <a class="bg-white/10 hover:bg-white/20 h-7 w-7 rounded-full flex items-center justify-center transition">
                            <svg fill="currentColor" class="w-3 h-3 text-[#F2EFE9]" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                            </svg>
                        </a>
                        <a class="bg-white/10 hover:bg-white/20 h-7 w-7 rounded-full flex items-center justify-center transition">
                            <svg fill="currentColor" class="w-3 h-3 text-[#F2EFE9]" viewBox="0 0 24 24">
                                <path d="M12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zM12 2a10 10 0 100 20 10 10 0 000-20zm5.2 2.7c-1.12 0-2.02 0.9-2.02 2.02s0.9 2.02 2.02 2.02 2.02-0.9 2.02-2.02-0.9-2.02-2.02-2.02zM12 8.445a3.555 3.555 0 100 7.11 3.555 3.555 0 000-7.11z"/>
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

</body>
</html>