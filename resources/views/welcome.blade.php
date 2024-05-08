<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      


        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.3/dist/flowbite.min.css" />

        <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>





        
    
       
    </head>
    <body class="antialiased">
      

        
     







	<!-- Navbar goes here -->
    <nav class="bg-white shadow-lg">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<div>
							<!-- Website Logo -->
							<a href="#" class="flex items-center py-4 px-2">
								<!--<img src="logo.png" alt="Logo" class="h-8 w-8 mr-2">-->
								
							</a>
						</div>
						<!-- Primary Navbar items -->
						<div class="hidden md:flex items-center space-x-1">
							<a href="" class="py-4 px-2 text-green-500 border-b-4 border-green-500 font-semibold ">Inicio</a>
							<a href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Pasaje</a>
							<a href="" class="py-4 px-2 text-gray-500 font-semibold hover:text-green-500 transition duration-300">Encomiendas</a>
							
						</div>
					</div>
					<!-- Secondary Navbar items -->
					<div class="hidden md:flex items-center space-x-3 ">
                    @if (Route::has('login'))
                      @auth
                       <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                      @else
                        
                        <a href="{{ route('login') }}" class="bg-green-600 mx-1 inline-block border border-green-600   rounded py-1 px-3  text-white">Ingresar</a>
                      @if (Route::has('register'))
                       
                       <a href="{{ route('register') }}" class="bg-green-600 mx-1 inline-block border border-green-600   rounded py-1 px-3  text-white">Registrar</a>
                      @endif
                     @endauth
                    @endif
                    
					</div>
					<!-- Mobile menu button -->
					<div class="md:hidden flex items-center">
						<button class="outline-none mobile-menu-button">
						<svg class=" w-6 h-6 text-gray-500 hover:text-green-500 "
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</button>
					</div>
				</div>
			</div>
			<!-- mobile menu -->
			<div class="hidden mobile-menu">
				<ul class="">
					<li class="active"><a href="index.html" class="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Home</a></li>
					<li><a href="#services" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
					<li><a href="#about" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a></li>
					<li><a href="#contact" class="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact Us</a></li>
				</ul>
			</div>
			<script>
				const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});
			</script>
		</nav>
		

    </body>
</html>





            

         