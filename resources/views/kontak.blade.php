<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Nasi Karak Pak Nara</title>
    
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
    </style>
</head>

<body class="bg-brand-bg text-brand-dark antialiased font-sans overflow-x-hidden flex flex-col min-h-screen">

    <nav class="flex items-center justify-between px-6 md:px-12 py-6 max-w-7xl mx-auto w-full relative z-20">
        <div class="flex items-center gap-2">
            <div class="h-10 w-10 bg-brand-dark rounded-full"></div>
            <div class="h-10 w-4 bg-brand-dark"></div> 
        </div>

        <div class="hidden md:flex items-center gap-8 font-medium text-[#5D4037] text-sm tracking-wide">
            <a href="/" class="hover:text-brand-dark font-bold transition">Daftar Menu</a>
            <a href="#" class="text-brand-dark font-bold transition border-b-2 border-brand-dark">Kontak</a>
            <a href="#" class="hover:text-brand-dark font-bold transition">Customer Support</a>
        </div>

        <button class="bg-brand-dark text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-opacity-90 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 duration-200">
            Pesan
        </button>
    </nav>

    <main class="flex-grow flex flex-col justify-center mb-12">
        
        <section class="max-w-7xl mx-auto px-6 md:px-12 w-full">
            
            <h1 class="font-serif text-3xl md:text-4xl font-bold text-[#2b1d1a] text-center mb-10 mt-4">
                Hubungi Kami
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 items-stretch h-auto md:h-[380px]">
                
                <div class="bg-[#F2EFE9] rounded-[2.5rem] flex flex-col items-center justify-center text-center p-8 h-[350px] md:h-full shadow-sm hover:shadow-md transition">
                    
    <div class="mb-5">
        <svg class="w-14 h-14 text-[#2b1d1a]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
        </svg>
    </div>
    
    <p class="text-xl text-gray-500 font-medium mb-8 tracking-wider">
        +62 8233 0389 398
    </p>

    <a href="https://wa.me/6282140399150?text=Saya%20ingin%20pesan%20nasi%20karak%20apakah%20masih%20tersedia" 
       target="_blank"
       class="bg-[#2b1d1a] text-white px-8 py-3 rounded-full text-sm font-bold hover:bg-opacity-90 transition shadow-md flex items-center gap-2">
        Buka WhatsApp
    </a>
</div>


                <div class="rounded-[2.5rem] overflow-hidden h-[350px] md:h-full border border-gray-100">
                    <img src="{{ asset('Asset/Images/Nasi Karak Spesial.jpg') }}" alt="Nasi Kotak" class="object-cover w-full h-full hover:scale-105 transition duration-700">
                </div>

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

</body>
</html>