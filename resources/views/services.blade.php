<x-app-layout>
    <x-slot name="title">Our Services | Titan & Equity Resources Ltd.</x-slot>

    <x-slot name="meta">
        <meta name="description" content="Explore Titan & Equity Resources Ltd. services — Property Sales, Shortlet Apartments, Land Investments, and Property Management across Nigeria.">
        <meta name="keywords" content="real estate, property sales, shortlet apartments, land investments, property management, titan resources, nigeria properties">
        <meta property="og:title" content="Our Services | Titan & Equity Resources Ltd.">
        <meta property="og:description" content="Discover our professional property and real estate services in Nigeria — from sales to management.">
        <meta property="og:image" content="{{ asset('images/titan-services-banner.jpg') }}">
        <meta property="og:type" content="website">
    </x-slot>

    {{-- Hero Section --}}
    <section class="relative bg-gray-900 text-white py-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://cdn.businessday.ng/wp-content/uploads/2025/02/Real-Estate.png" 
                 alt="Titan Services Banner" 
                 class="w-full h-full object-cover opacity-30">
        </div>
        <div class="relative container mx-auto text-center px-6">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 animate__animated animate__fadeInDown">
                Our Services
            </h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto animate__animated animate__fadeInUp">
                We provide premium real estate solutions — connecting clients to dream homes, 
                lucrative land investments, and trusted property management.
            </p>
        </div>
    </section>

    {{-- Services Grid --}}
    <section class="py-20 bg-white text-gray-800">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">What We Offer</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Explore a range of real estate services tailored to your lifestyle and investment goals.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- Property Sales --}}
                <div class="bg-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 p-8 text-center">
                    <img src="https://media.istockphoto.com/id/1481193734/photo/close-up-of-a-house-sold-sign-on-a-lawn-in-front-of-a-big-modern-house-with-traditional.jpg?s=612x612&w=0&k=20&c=vFzyamkT0vVtn5chCUWibUmeq-R-9C8FsELkB4FeTkA=" alt="Property Sales" class="w-20 h-20 mx-auto mb-6 rounded-full object-cover">
                    <h3 class="text-xl font-semibold mb-3">Property Sales</h3>
                    <p class="text-gray-600">
                        Buy or sell verified properties with transparency, expert advice, and a smooth process from start to finish.
                    </p>
                </div>

                {{-- Shortlet Apartments --}}
                <div class="bg-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 p-8 text-center">
                    <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/629601569.jpg?k=711d702f63ae9db49dd018f1d5a7e9663bf30b53475667024dd9e94ad12b11e2&o=" alt="Shortlet Apartments" class="w-20 h-20 mx-auto mb-6 rounded-full object-cover">
                    <h3 class="text-xl font-semibold mb-3">Shortlet Apartments</h3>
                    <p class="text-gray-600">
                        Experience luxury and comfort with our fully serviced shortlet apartments across major Nigerian cities.
                    </p>
                </div>

                {{-- Land Investments --}}
                <div class="bg-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 p-8 text-center">
                    <img src="https://godslandempire.com/wp-content/uploads/2023/11/Land-sizes-and-measurements-in-Lagos.jpg" alt="Land Investments" class="w-20 h-20 mx-auto mb-6 rounded-full object-cover">
                    <h3 class="text-xl font-semibold mb-3">Land Investments</h3>
                    <p class="text-gray-600">
                        Grow your wealth with our curated list of secure, appreciating land options in prime and developing locations.
                    </p>
                </div>

                {{-- Property Management --}}
                <div class="bg-gray-50 rounded-2xl shadow-md hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 p-8 text-center">
                    <img src="https://p48inv.com/wp-content/uploads/2024/04/Property-Management.jpg" alt="Property Management" class="w-20 h-20 mx-auto mb-6 rounded-full object-cover">
                    <h3 class="text-xl font-semibold mb-3">Property Management</h3>
                    <p class="text-gray-600">
                        Let us handle your property’s day-to-day operations — from tenant care to maintenance and rental oversight.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-gray-900 text-white py-20 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('{{ asset('images/cta-bg.jpg') }}')] bg-cover bg-center opacity-20"></div>
        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 animate__animated animate__fadeInUp">
                Ready to Begin Your Real Estate Journey?
            </h2>
            <p class="text-lg mb-8 max-w-2xl mx-auto animate__animated animate__fadeInUp animate__delay-1s">
                Partner with Titan & Equity Resources Ltd. for a seamless, professional, and trustworthy real estate experience.
            </p>
            <a href="{{ route('contact') }}" 
               class="bg-green-600 hover:bg-blue-700 transition-all duration-300 px-8 py-4 rounded-full font-semibold inline-block">
                Contact Us
            </a>
        </div>
    </section>
</x-app-layout>
