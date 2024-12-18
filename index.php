<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./assets/css/output.css">
</head>
<body class="font-poppins">
    <!-- Previous header content remains unchanged -->
    <header class="relative">
        <nav class="flex items-center justify-between py-4 sm:px-6 md:px-14">
            <h1 class="font-semibold cursor-pointer">LawyerConnect</h1>
            <ul class="space-x-4 text-sm sm:hidden md:flex">
                <li><a href="#">Home</a></li>
                <li><a href="#">Find lawyer</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="sm:hidden md:flex items-center space-x-4 text-sm">
                <a href="#">Login</a>
                <a href="#" class="text-white bg-black px-4 py-2">Sign up</a>
            </div>
            <img class="sm:block md:hidden cursor-pointer" src="./assets/icons/menu.svg" alt="menu icon">
        </nav>

        <div class="hidden fixed w-[400px] h-screen bg-black text-white top-0 right-0 px-6 py-4">
            <img class="block ml-auto size-8 cursor-pointer" src="./assets/icons/x.svg" alt="x mark">
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6 mt-[80px]">Home</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Find lawyer</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">About</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Contact</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Login</a>
            <a href="#" class="block w-fit mx-auto px-2 pb-1 hover:border-b text-center text-xl font-[200] mb-6">Sign up</a>
        </div>

        <div class="h-[600px] px-6 flex items-center justify-center bg-cover bg-blend-multiply bg-[#00000092] bg-[url('https://images.pexels.com/photos/8112199/pexels-photo-8112199.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2')]">
            <div class="w-fit text-center mx-auto text-white">
                <h1 class="text-4xl mt-4">Trusted legl solutionfor the real world.</h1>
                <p class="mt-4 text-xs">Connect with top lawyers near you and book your consultation with ease—legal help is just a click away!</p>
                <a href="#" class="text-white bg-black px-4 py-2 block w-fit text-xs mt-6 mx-auto">Find Your Lawyer</a>
            </div>
        </div>
    </header>
    <!-- Filters Section -->
    <section class="px-6 md:px-14 py-8 bg-gray-50">
        <section class="px-6 md:px-14 py-12">
<!-- Improved Filters Section -->
<section class="px-6 md:px-14 py-12">
    <!-- Search Bar -->
    <div class="max-w-3xl mx-auto mb-8">
        <div class="relative">
            <input type="text" 
                   placeholder="Search by name, specialization, or location..." 
                   class="w-full px-6 py-4 bg-gray-50 border-none rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-black/5 shadow-sm">
            <button class="absolute right-3 top-1/2 -translate-y-1/2 bg-black text-white px-6 py-2 rounded-lg text-sm hover:bg-black/90 transition-colors">
                Search
            </button>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="max-w-6xl mx-auto mb-12">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div class="flex flex-wrap items-center gap-3">
                <select class="appearance-none px-6 py-2.5 bg-gray-50 border-none rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-black/5 cursor-pointer hover:bg-gray-100 transition-colors">
                    <option value="">Specialization</option>
                    <option value="criminal">Criminal Law</option>
                    <option value="corporate">Corporate Law</option>
                    <option value="family">Family Law</option>
                    <option value="real-estate">Real Estate Law</option>
                    <option value="immigration">Immigration Law</option>
                </select>

                <select class="appearance-none px-6 py-2.5 bg-gray-50 border-none rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-black/5 cursor-pointer hover:bg-gray-100 transition-colors">
                    <option value="">Experience</option>
                    <option value="1-3">1-3 years</option>
                    <option value="3-5">3-5 years</option>
                    <option value="5-10">5-10 years</option>
                    <option value="10+">10+ years</option>
                </select>

                <select class="appearance-none px-6 py-2.5 bg-gray-50 border-none rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-black/5 cursor-pointer hover:bg-gray-100 transition-colors">
                    <option value="">Location</option>
                    <option value="new-york">New York</option>
                    <option value="los-angeles">Los Angeles</option>
                    <option value="chicago">Chicago</option>
                    <option value="houston">Houston</option>
                    <option value="miami">Miami</option>
                </select>

                <select class="appearance-none px-6 py-2.5 bg-gray-50 border-none rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-black/5 cursor-pointer hover:bg-gray-100 transition-colors">
                    <option value="">Price Range</option>
                    <option value="0-100">$0 - $100/hr</option>
                    <option value="100-200">$100 - $200/hr</option>
                    <option value="200-300">$200 - $300/hr</option>
                    <option value="300+">$300+/hr</option>
                </select>

                <!-- Active Filters -->
                <span class="px-4 py-2 bg-black text-white text-sm rounded-full flex items-center gap-2">
                    Criminal Law
                    <svg class="w-4 h-4 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
                <span class="px-4 py-2 bg-black text-white text-sm rounded-full flex items-center gap-2">
                    5+ Years
                    <svg class="w-4 h-4 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        </div>
    </div>
        <!-- Lawyers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Lawyer Card 1 -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.pexels.com/photos/5668869/pexels-photo-5668869.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Lawyer" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Available</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold">Sarah Johnson</h3>
                    <p class="text-sm text-gray-600 mt-1">Corporate Law</p>
                    <div class="flex items-center mt-2">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm text-gray-600 ml-1">4.8 (120 reviews)</span>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-medium">$200/hour</span>
                        <button class="px-4 py-2 bg-black text-white text-sm rounded-lg hover:bg-gray-800">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Lawyer Card 2 -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.pexels.com/photos/5668788/pexels-photo-5668788.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Lawyer" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-red-500 text-white text-xs px-2 py-1 rounded-full">Busy</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold">Michael Chen</h3>
                    <p class="text-sm text-gray-600 mt-1">Criminal Law</p>
                    <div class="flex items-center mt-2">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm text-gray-600 ml-1">4.9 (95 reviews)</span>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-medium">$180/hour</span>
                        <button class="px-4 py-2 bg-black text-white text-sm rounded-lg hover:bg-gray-800">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Lawyer Card 3 -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="relative h-48">
                    <img src="https://images.pexels.com/photos/5668858/pexels-photo-5668858.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Lawyer" class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-xs px-2 py-1 rounded-full">Available</div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold">Emily Rodriguez</h3>
                    <p class="text-sm text-gray-600 mt-1">Family Law</p>
                    <div class="flex items-center mt-2">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm text-gray-600 ml-1">4.7 (85 reviews)</span>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-sm font-medium">$150/hour</span>
                        <button class="px-4 py-2 bg-black text-white text-sm rounded-lg hover:bg-gray-800">Book Now</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-8">
            <button class="px-6 py-2 border-2 border-black text-sm font-medium hover:bg-black hover:text-white transition-colors">
                Load More
            </button>
        </div>
    </section>
</body>
</html>