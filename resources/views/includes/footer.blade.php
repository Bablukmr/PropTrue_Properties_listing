<!-- Footer -->
<footer class="bg-gray-800 text-white">
  <!-- Main Footer Content -->
  <div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12">
      <!-- Logo and Brand -->
      <div class="flex flex-col">
        {{-- <span class="text-4xl font-bold text-teal-500 cursor-pointer">PropTru</span> --}}
        <a href="/" class="flex items-center ">
                    <img src="{{ asset('assets/images/logo_proptru1.png') }}" class="h-12 bg-white p-1 rounded-md" alt="Property Image 1" />
                </a>
        <p class="text-gray-400 mt-4">
          Your trusted platform for finding and listing commercial properties nationwide.
          Connecting buyers, sellers, and renters since 2015.
        </p>
        <div class="flex space-x-4 mt-6">
          <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/facebook.png" alt="Facebook" class="w-6 h-6">
          </a>
          <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/instagram.png" alt="Instagram" class="w-6 h-6">
          </a>
          <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/twitter.png" alt="Twitter" class="w-6 h-6">
          </a>
          <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300">
            <img src="https://img.icons8.com/ios-filled/50/ffffff/linkedin.png" alt="LinkedIn" class="w-6 h-6">
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="flex flex-col">
        <h3 class="font-semibold text-lg text-gray-300 mb-4">Quick Links</h3>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Home</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Commercial Properties</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Office Spaces</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Retail Locations</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Industrial Properties</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Agents Directory</a>
      </div>

      <!-- Company -->
      <div class="flex flex-col">
        <h3 class="font-semibold text-lg text-gray-300 mb-4">Company</h3>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">About Us</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Careers</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Press</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Blog</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Testimonials</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Contact</a>
      </div>

      <!-- Legal -->
      <div class="flex flex-col">
        <h3 class="font-semibold text-lg text-gray-300 mb-4">Legal</h3>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Privacy Policy</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Terms of Service</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Cookie Policy</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">GDPR Compliance</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Accessibility Statement</a>
        <a href="#" class="text-gray-400 hover:text-teal-500 transition duration-300 mb-2">Sitemap</a>
      </div>

      <!-- Newsletter -->
      <div class="flex flex-col">
        <h3 class="font-semibold text-lg text-gray-300 mb-4">Get Property Alerts</h3>
        <p class="text-gray-400 mb-4">
          Receive the latest commercial property listings directly to your inbox.
        </p>
        <div class="flex flex-col space-y-3">
          <input
            type="email"
            placeholder="Your email address"
            class="p-3 rounded-md bg-gray-700 text-white focus:outline-none"
          />
          <button class="bg-teal-500 text-white p-3 rounded-md hover:bg-teal-600 transition duration-300">
            Subscribe
          </button>
        </div>
      </div>
    </div>

    <!-- SEO Content Section -->
    <div class="mt-16 border-t border-gray-700 pt-8">
      <h3 class="text-xl font-semibold text-gray-300 mb-4">About PropTru Commercial Real Estate</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-gray-400">
        <div>
          <p class="mb-4">
            PropTru is the leading commercial real estate marketplace connecting business owners, investors, and real estate professionals with premium office spaces, retail locations, industrial properties, and land for sale or lease across the United States.
          </p>
          <p class="mb-4">
            Our comprehensive database features thousands of commercial listings with detailed property information, high-resolution images, virtual tours, and market analytics to help you make informed real estate decisions.
          </p>
        </div>
        <div>
          <p class="mb-4">
            Whether you're looking to buy, sell, or lease commercial property, PropTru provides the tools and resources you need. Our network of licensed commercial real estate brokers and agents are available to assist with your transaction.
          </p>
          <p>
            PropTru serves major markets including New York, Los Angeles, Chicago, Houston, Phoenix, Philadelphia, San Antonio, San Diego, Dallas, and San Jose, with expanding coverage nationwide.
          </p>
        </div>
      </div>
    </div>

    <!-- Legal Disclaimers -->
    <div class="mt-12 border-t border-gray-700 pt-8">
      <div class="text-gray-400 text-sm">
        <h4 class="font-semibold text-gray-300 mb-2">Legal Disclaimer:</h4>
        <p class="mb-4">
          The information provided on this website does not constitute legal, financial, or professional real estate advice. All property information is deemed reliable but not guaranteed and should be independently verified. PropTru does not guarantee the accuracy of listing information, including but not limited to square footage, pricing, or availability. All property measurements are approximate.
        </p>

        <h4 class="font-semibold text-gray-300 mb-2">Equal Housing Opportunity:</h4>
        <p class="mb-4">
          PropTru is committed to compliance with all federal, state, and local fair housing laws. We provide equal professional service to all persons without regard to race, color, religion, sex, handicap, familial status, national origin, sexual orientation, or gender identity.
        </p>

        <h4 class="font-semibold text-gray-300 mb-2">Licensing Information:</h4>
        <p>
          PropTru, Inc. is a licensed real estate brokerage in all 50 states (License #1234567). Brokerage services are provided by PropTru Realty Services, LLC. All agents listed on this site are licensed professionals.
        </p>
      </div>
    </div>

    <!-- Copyright -->
    <div class="mt-12 border-t border-gray-700 pt-6 text-center text-gray-400 text-sm">
      <p>&copy; 2025 PropTru, Inc. All rights reserved. Various trademarks held by their respective owners.</p>
      <p class="mt-2">Design and Develop By: Fillip Technologies</p>
    </div>
  </div>
</footer>
