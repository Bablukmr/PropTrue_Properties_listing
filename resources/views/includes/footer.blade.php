<!-- Footer -->
<footer class="relative bg-gray-800 text-white bg-[url('/assets/images/footerimg.jpg')] bg-cover bg-center">
    <div class="absolute inset-0 bg-black opacity-80"></div>
    <!-- Fixed WhatsApp & Call Buttons -->
    <div class="fixed left-4 bottom-20 flex flex-col items-center gap-3 z-50">

        <!-- WhatsApp Button -->

        @php
            $contact = \App\Models\ContactDetail::first();
        @endphp
        <!-- Call Button -->
        <a href="tel:+91{{ $contact->phone_contact }}" aria-label="Call Now"
            class="bg-blue-500 hover:bg-blue-600 text-white p-3 rounded-full shadow-lg transition duration-300">
            <img src="https://img.icons8.com/ios-filled/24/ffffff/phone.png" alt="Call" class="w-6 h-6" />
        </a>

    </div>
    <div class="fixed left-4 bottom-6 flex flex-col items-center gap-3 z-50">

        <!-- WhatsApp Button -->
        <a href="https://wa.me/91{{ $contact->phone_whatsapp }}" target="_blank" aria-label="WhatsApp Chat"
            class="bg-green-500 hover:bg-green-600 text-white p-3 rounded-full shadow-lg transition duration-300">
            <img src="https://img.icons8.com/ios-filled/24/ffffff/whatsapp.png" alt="WhatsApp" class="w-6 h-6" />
        </a>

    </div>


    <!-- Main Footer Content -->
    <div class="container mx-auto px-6 py-12 relative ">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12">
            <!-- Logo and Brand -->
            <div class="flex flex-col">
                {{-- <span class="text-4xl font-bold text-teal-500 cursor-pointer">PropTru</span> --}}
                <a href="/" class="flex items-center ">
                    <img src="{{ asset('assets/images/logo_proptru1.png') }}" class="h-12 bg-white p-1 rounded-md"
                        alt="Property Image 1" />
                </a>
                <p class="text-gray-400 mt-4">
                    A trusted platform for seamless property buying and selling. Empowering buyers and sellers with
                    expert guidance and reliable service since over a decade.
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/facebook.png" alt="Facebook"
                            class="w-6 h-6">
                    </a>
                    <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/instagram.png" alt="Instagram"
                            class="w-6 h-6">
                    </a>
                    <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/twitter.png" alt="Twitter"
                            class="w-6 h-6">
                    </a>
                    <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
                        <img src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png" alt="LinkedIn"
                            class="w-6 h-6">
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="flex flex-col">
                <h3 class="font-semibold text-lg text-gray-300 mb-4">Quick Links</h3>
                <a href="/" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Home</a>
                <a href="/search" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Projects</a>
                <a href="/search" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Resale
                    Properties</a>
                <a href="/sell" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Sell
                    Properties</a>
                <a href="/blogs" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Blog</a>
                {{-- <a href="/join-us" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Join US</a> --}}
            </div>



            <!-- Company -->
            <div class="flex flex-col">
                <h3 class="font-semibold text-lg text-gray-300 mb-4">Company</h3>
                <a href="/about-us" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">About Us</a>
                <a href="/our-team" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Our Team</a>
                <a href="/join-us" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Join Us</a>
                <a href="/associates-us"
                    class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Associates Us</a>
                <a href="/contact" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Contact</a>
                {{-- <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Contact</a> --}}
            </div>

            <!-- Legal -->
            <div class="flex flex-col">
                <h3 class="font-semibold text-lg text-gray-300 mb-4">Legal</h3>
                <a href="/privacy-policy" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Privacy
                    Policy</a>
                <a href="/rera-disclaimer" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">RERA
                    Disclaimer</a>
                <a href="/terms-condition" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Terms
                    & Conditions</a>
                {{-- <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Cookie Policy</a> --}}
                {{-- <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Accessibility Statement</a> --}}
                {{-- <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Sitemap</a> --}}
            </div>

            <!-- Newsletter -->
            <div class="flex flex-col">
                <h3 class="font-semibold text-lg text-gray-300 mb-4">Get Property Alerts</h3>
                <p class="text-gray-400 mb-4">
                    Get the latest handpicked property listings delivered straight to your inbox.
                </p>
                <div class="flex flex-col space-y-3">
                    <input type="email" placeholder="Your email address"
                        class="p-3 rounded-md bg-gray-700 text-white focus:outline-none" />
                    <button class="bg-teal-500 text-white p-3 rounded-md hover:bg-teal-600 transition duration-300">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
        <!-- SEO Keyword Anchor Links -->
        <div class="mt-12 border-t border-gray-700 pt-8">
            <div class="text-gray-400 text-sm">
                <h4 class="text-xl font-semibold text-gray-300 mb-4">Explore Properties:</h4>
                <p class="mb-2 leading-relaxed">
                    <a href="/search?keyword=best-property-in-patna" class="hover:text-teal-400">Best Property in
                        Patna</a> |
                    <a href="/search?keyword=best-plot-in-bihar" class="hover:text-teal-400">Best Plot in Bihar</a> |
                    <a href="/search?keyword=residential-property-in-patna" class="hover:text-teal-400">Residential
                        Property in Patna</a> |
                    <a href="/search?keyword=commercial-space-patna" class="hover:text-teal-400">Commercial Space in
                        Patna</a> |
                    <a href="/search?keyword=flats-in-kankarbagh" class="hover:text-teal-400">Flats in Kankarbagh</a> |
                    <a href="/search?keyword=plots-in-danapur" class="hover:text-teal-400">Plots in Danapur</a> |
                    <a href="/search?keyword=property-for-sale-boring-road" class="hover:text-teal-400">Property for
                        Sale in Boring Road</a>
                    <a href="/search?search=best%20property" class="hover:text-teal-400">Best Property Listings</a> |
                    <a href="/search?search=plots&property_type=plot" class="hover:text-teal-400">Residential
                        Plots</a> |
                    <a href="/search?search=flat&property_type=flat&listing_type=sale"
                        class="hover:text-teal-400">Flats for Sale</a> |
                    <a href="/search?search=rent&listing_type=rent" class="hover:text-teal-400">Rental Properties</a>
                    |
                    <a href="/search?search=commercial&property_type=commercial"
                        class="hover:text-teal-400">Commercial Properties</a> |
                    <a href="/search?search=shop&property_type=shop" class="hover:text-teal-400">Shops for Sale</a> |
                    <a href="/search?search=luxury&property_type=flat" class="hover:text-teal-400">Luxury
                        Apartments</a> |
                    <a href="/search?search=budget%20flats&listing_type=sale" class="hover:text-teal-400">Budget
                        Flats</a> |
                    <a href="/search?search=2bhk&property_type=flat" class="hover:text-teal-400">2BHK Apartments</a> |
                    <a href="/search?search=ready%20to%20move" class="hover:text-teal-400">Ready-to-Move
                        Properties</a> |
                    <a href="/search?search=investment%20property" class="hover:text-teal-400">Investment
                        Properties</a> |
                    <a href="/search?search=studio%20apartment" class="hover:text-teal-400">Studio Apartments</a>

                </p>
            </div>
        </div>

        <!-- SEO Content Section -->
        <div class="mt-16 border-t border-gray-700 pt-8">
            <h3 class="text-xl font-semibold text-gray-300 mb-4">About PropTru Patna Real Estate</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-400">
                <div>
                    <p class="mb-4">
                        PropTru is a leading real estate platform headquartered in Patna, Bihar, connecting home buyers,
                        investors, and property dealers with a wide range of options—including residential plots,
                        villas, flats, and commercial spaces.
                    </p>
                    <p class="mb-4">
                        With an extensive inventory of verified listings, we provide complete property details,
                        high-quality images, and pricing insights to help you make informed and confident decisions.
                    </p>
                </div>
                <div>
                    <p class="mb-4">
                        Whether you're buying or selling, PropTru combines powerful tools with local expertise to guide
                        you at every step. Our network of trusted agents and experienced consultants ensures a smooth,
                        transparent, and hassle-free experience.
                    </p>
                    <p>
                        We proudly serve the entire Patna region and surrounding districts, offering wide coverage,
                        local expertise, and unmatched convenience for every client.
                    </p>
                </div>
            </div>
        </div>


        <!-- Legal Disclaimers -->
       <div class="mt-12 border-t border-gray-700 pt-8">
    <div class="text-gray-400 text-sm">
        <h4 class="font-semibold text-gray-300 mb-2">Legal Disclaimer:</h4>
        <p class="mb-4">
            The content provided on this website is for general informational purposes only and should not be construed as legal, financial, or professional real estate advice. While all property listings are presented as reliable, PropTru does not guarantee the accuracy of details such as area, pricing, or availability. All information should be independently verified before making any decisions. All measurements are approximate.
        </p>

        <h4 class="font-semibold text-gray-300 mb-2">Fair Housing Policy:</h4>
        <p class="mb-4">
            PropTru is firmly committed to providing equal housing opportunities to all individuals. We deliver unbiased real estate services without discrimination based on religion, caste, gender, disability, marital or family status, ethnicity, or background, in full compliance with applicable housing and anti-discrimination laws.
        </p>

        <h4 class="font-semibold text-gray-300 mb-2">Licensing Information:</h4>
        <p>
            PropTru operates through a registered real estate sales and marketing entity in Bihar under RERA Registration No: BRERAA0004/004/A-04/2018. All affiliated agents and partners are certified and conduct business in full compliance with applicable regulatory standards.
        </p>
    </div>
</div>

        <!-- Copyright -->
        <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-400 text-sm">
            <p>&copy; {{ date('Y') }} PropTru, All rights reserved. Various trademarks held by their respective
                owners.</p>
            <p class="mt-2">Design and Develop By: <a href="https://filliptechnologies.com/" target="_blank"
                    class="font-semibold hover:text-teal-400">Fillip Technologies</a></p>
        </div>

    </div>
</footer>
