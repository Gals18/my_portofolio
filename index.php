<?php 
include 'data.php'; 
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Portofolio - <?php echo $nama; ?></title>
   <script src="https://cdn.tailwindcss.com"></script>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <style>
      body {
         font-family: 'Inter', sans-serif;
         overflow-x: hidden;
      }

      @keyframes float {

         0%,
         100% {
            transform: translateY(0px);
         }

         50% {
            transform: translateY(-15px);
         }
      }

      .animate-float {
         animation: float 4s ease-in-out infinite;
      }

      .reveal {
         opacity: 0;
         transform: translateY(30px);
         transition: all 0.8s ease-out;
      }

      .reveal.active {
         opacity: 1;
         transform: translateY(0);
      }
   </style>
</head>

<body class="bg-slate-50 text-slate-900">

   <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-slate-200">
      <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
         <span class="font-extrabold text-xl tracking-tighter text-blue-600 uppercase italic transition hover:scale-110 cursor-default">GALUH.</span>
         <div class="hidden md:flex space-x-8 text-sm font-semibold text-slate-600">
            <a href="#home" class="hover:text-blue-600 transition">Beranda</a>
            <a href="#kerja" class="hover:text-blue-600 transition">Pengalaman Kerja</a>
            <a href="#freelance" class="hover:text-blue-600 transition">Freelance</a>
            <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
         </div>
      </div>
   </nav>

   <section id="home" class="pt-32 pb-20 px-6 bg-gradient-to-b from-blue-50/50 to-transparent">
      <div class="max-w-6xl mx-auto text-center">
         <div class="mb-8 flex justify-center">
            <div class="animate-float">
               <img src="<?php echo $foto_profil; ?>" class="w-32 h-32 md:w-40 md:h-40 rounded-full object-cover border-4 border-white shadow-2xl bg-white">
            </div>
         </div>
         <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight"><?php echo $nama; ?></h1>
         <p class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-6"><?php echo $jabatan; ?></p>
         <p class="text-lg text-slate-600 max-w-2xl mx-auto mb-8 leading-relaxed"><?php echo $bio; ?></p>

         <div class="flex justify-center gap-4 mb-10">
            <a href="<?php echo $linkedin; ?>" target="_blank" class="p-3 bg-white border border-slate-200 rounded-full text-blue-600 hover:bg-blue-600 hover:text-white transition shadow-sm">
               <i class="fab fa-linkedin-in text-xl"></i>
            </a>
            <a href="<?php echo $github; ?>" target="_blank" class="p-3 bg-white border border-slate-200 rounded-full text-slate-900 hover:bg-slate-900 hover:text-white transition shadow-sm">
               <i class="fab fa-github text-xl"></i>
            </a>
         </div>

         <div class="flex flex-wrap justify-center gap-2 mb-10">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest w-full mb-2">
               Sedang Mendalami:
            </span>
            <?php foreach ($learning as $l): ?>
               <span class="bg-white border border-blue-100 text-blue-700 px-4 py-1.5 rounded-full text-xs font-bold shadow-sm italic transition hover:bg-blue-50">
                  + <?php echo $l; ?>
               </span>
            <?php endforeach; ?>
         </div>
      </div>
   </section>

   <section id="kerja" class="py-20 px-6">
      <div class="max-w-6xl mx-auto">
         <div class="mb-12 reveal">
            <h2 class="text-3xl font-extrabold tracking-tight underline decoration-blue-500 decoration-4 underline-offset-8">Pengalaman Kerja</h2>
         </div>
         <div class="grid md:grid-cols-3 gap-6">
            <?php foreach ($proyek_kerja as $p) : ?>
               <div class="bg-white p-8 rounded-3xl border border-slate-200 hover:border-blue-500 hover:-translate-y-2 transition-all duration-300 shadow-sm reveal group">
                  <div class="flex gap-2 mb-4">
                     <?php foreach ($p['tag'] as $t): ?>
                        <span class="text-[10px] bg-slate-100 px-2 py-0.5 rounded font-bold uppercase"><?php echo $t; ?></span>
                     <?php endforeach; ?>
                  </div>
                  <h3 class="text-xl font-bold mb-3 group-hover:text-blue-600 transition"><?php echo $p['judul']; ?></h3>
                  <p class="text-slate-500 text-sm leading-relaxed mb-6"><?php echo $p['deskripsi']; ?></p>

                  <?php if (!empty($p['link'])): ?>
                     <a href="<?php echo $p['link']; ?>" target="_blank" class="inline-flex items-center gap-2 text-sm font-bold text-blue-600 border-b-2 border-transparent hover:border-blue-600 transition-all pb-1">
                        KUNJUNGI SITUS <i class="fas fa-external-link-alt text-xs"></i>
                     </a>
                  <?php else: ?>
                     <span class="text-[10px] font-bold text-slate-300 tracking-widest uppercase italic select-none">Internal System</span>
                  <?php endif; ?>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>

   <section id="freelance" class="py-20 px-6 bg-slate-100/50">
      <div class="max-w-6xl mx-auto">
         <div class="mb-12 reveal">
            <h2 class="text-3xl font-extrabold tracking-tight underline decoration-indigo-500 decoration-4 underline-offset-8">Projek Freelance</h2>
         </div>
         <div class="grid md:grid-cols-3 gap-6">
            <?php foreach ($proyek_freelance as $f) : ?>
               <div class="bg-white p-8 rounded-3xl border border-dashed border-slate-300 hover:border-indigo-500 hover:scale-[1.02] transition-all duration-300 shadow-sm reveal relative group">
                  <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition">
                     <i class="fas fa-laptop-code text-5xl"></i>
                  </div>
                  <div class="flex gap-2 mb-4">
                     <?php foreach ($f['tag'] as $t): ?>
                        <span class="text-[10px] bg-indigo-50 text-indigo-600 px-2 py-0.5 rounded font-bold uppercase"><?php echo $t; ?></span>
                     <?php endforeach; ?>
                  </div>
                  <h3 class="text-xl font-bold mb-3"><?php echo $f['judul']; ?></h3>
                  <p class="text-slate-500 text-sm leading-relaxed"><?php echo $f['deskripsi']; ?></p>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </section>

   <footer id="kontak" class="py-20 bg-slate-900 text-white">
      <div class="max-w-6xl mx-auto px-6 text-center reveal">
         <h2 class="text-3xl font-extrabold mb-8 uppercase tracking-tighter italic">LET'S CONNECT!</h2>
         <div class="flex flex-wrap justify-center gap-4">
            <a href="mailto:<?php echo $email; ?>" class="bg-white text-slate-900 px-8 py-3 rounded-full font-bold hover:bg-blue-600 hover:text-white transition duration-300">
               <i class="fas fa-envelope mr-2"></i> Email
            </a>
            <a href="https://wa.me/<?php echo $whatsapp; ?>" class="bg-green-500 text-white px-8 py-3 rounded-full font-bold hover:scale-110 transition duration-300">
               <i class="fab fa-whatsapp mr-2"></i> WhatsApp
            </a>
            <a href="<?php echo $linkedin; ?>" target="_blank" class="bg-blue-700 text-white px-8 py-3 rounded-full font-bold hover:bg-blue-500 transition duration-300">
               <i class="fab fa-linkedin mr-2"></i> LinkedIn
            </a>
         </div>
         <p class="mt-16 text-slate-500 text-xs tracking-widest uppercase italic">© <?php echo date("Y"); ?> <?php echo $nama; ?> — Built with PHP & Passion</p>
      </div>
   </footer>

   <script>
      function reveal() {
         var reveals = document.querySelectorAll(".reveal");
         for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            if (elementTop < windowHeight - 100) {
               reveals[i].classList.add("active");
            }
         }
      }
      window.addEventListener("scroll", reveal);
      reveal();
   </script>
</body>

</html>