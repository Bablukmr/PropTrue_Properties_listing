@extends('layout.layout')

@section('title', 'Sell Your Property')
@section('description', 'List your property with us for a quick and easy selling process.')
@section('keywords', 'sell property, list property, real estate')
@section('author', 'Your Name')
@section('og_title', 'Sell Your Property')
@section('og_description', 'Get the best value for your property with our expert services.')
@section('og_image', asset('images/sell-property.jpg'))
@section('og_url', url()->current())
@section('og_type', 'website')
@section('twitter_card', 'summary_large_image')
@section('twitter_title', 'Sell Your Property')
@section('twitter_description', 'List your property with us for maximum exposure.')
@section('twitter_image', asset('images/sell-property.jpg'))
@section('twitter_site', '@yourtwitterhandle')
@section('twitter_creator', '@yourtwitterhandle')
@section('canonical', url()->current())


@section('content')

<style>
  :root {
    /* Primary Colors */
    --primary:#d33593;
    --primary-dark: #48254a;
    --primary-darker: #000000;

    /* Neutral Colors */
    --gray-dark: #717271;
    --gray-light: #b1b2b1;
    --white: #ffffff;

    /* Additional Colors */
    --teal: #38b2ac; /* Keeping teal for some elements as accent */
    --red: #e53e3e;
    --yellow: #f6e05e;
    --purple: #805ad5;
    --blue: #4299e1;
    --green: #48bb78;
  }

  /* Text Colors */
  .text-primary { color: var(--primary); }
  .text-primary-dark { color: var(--primary-dark); }
  .text-primary-darker { color: var(--primary-darker); }
  .text-gray-dark { color: var(--gray-dark); }
  .text-gray-light { color: var(--gray-light); }

  /* Background Colors */
  .bg-primary { background-color: var(--primary); }
  .bg-primary-dark { background-color: var(--primary-dark); }
  .bg-primary-darker { background-color: var(--primary-darker); }
  .bg-gray-dark { background-color: var(--gray-dark); }
  .bg-gray-light { background-color: var(--gray-light); }

  /* Gradient Backgrounds */
  .bg-gradient-primary { background-image: linear-gradient(to right, var(--primary), var(--primary-dark)); }
  .bg-gradient-primary-dark { background-image: linear-gradient(to right, var(--primary-dark), var(--primary-darker)); }

  /* Border Colors */
  .border-primary { border-color: var(--primary); }
  .border-primary-dark { border-color: var(--primary-dark); }

  /* Hover States */
  .hover\:bg-primary:hover { background-color: var(--primary); }
  .hover\:bg-primary-dark:hover { background-color: var(--primary-dark); }
  .hover\:text-primary:hover { color: var(--primary); }

  /* Focus States */
  .focus\:ring-primary:focus { --tw-ring-color: var(--primary); }
</style>

<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-[#d33593] to-[#48254a] py-20 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Sell Your Property With Us</h1>
            <p class="text-xl max-w-2xl mx-auto">Get the best value for your property with our expert valuation and marketing services.</p>
        </div>
    </div>
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mx-auto max-w-2xl" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/>
            </svg>
        </span>
    </div>
@endif
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mx-auto max-w-2xl" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/>
            </svg>
        </span>
    </div>
@endif


    <!-- Property Form Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12">
            <!-- Property Form -->
            <div class="bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Property Details</h2>
                <form action="{{ route('property.sell.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                        <input type="text" id="name" name="name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 mb-2">Email Address</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                    <div>
                        <label for="property_type" class="block text-gray-700 mb-2">Property Type</label>
                        <select id="property_type" name="property_type" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                            <option value="">Select Property Type</option>
                            <option value="house">House</option>
                            <option value="apartment">Apartment</option>
                            <option value="condo">Condo</option>
                            <option value="land">Land</option>
                            <option value="commercial">Commercial</option>
                        </select>
                    </div>
                    <div>
                        <label for="address" class="block text-gray-700 mb-2">Property Address</label>
                        <input type="text" id="address" name="address" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="bedrooms" class="block text-gray-700 mb-2">Bedrooms</label>
                            <input type="number" id="bedrooms" name="bedrooms"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                        </div>
                        <div>
                            <label for="bathrooms" class="block text-gray-700 mb-2">Bathrooms</label>
                            <input type="number" id="bathrooms" name="bathrooms"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                        </div>
                    </div>
                    <div>
                        <label for="area" class="block text-gray-700 mb-2">Area (sq ft)</label>
                        <input type="number" id="area" name="area" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                    <div>
                        <label for="price" class="block text-gray-700 mb-2">Asking Price</label>
                        <input type="number" id="price" name="price" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                    </div>
                    <div>
                        <label for="description" class="block text-gray-700 mb-2">Property Description</label>
                        <textarea id="description" name="description" rows="5" required
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"></textarea>
                    </div>
                    <div>
                        <label for="images" class="block text-gray-700 mb-2">Property Images</label>
                        <input type="file" id="images" name="images[]" multiple accept="image/*" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                        <p class="text-gray-500 text-sm mt-1">Upload high-quality images of your property (multiple allowed)</p>
                    </div>
                    <button type="submit"
                            class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                        Submit Property Details
                    </button>
                </form>
            </div>

            <!-- Selling Benefits -->
            <div class="space-y-8">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Why Sell With Us?</h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-primary/10 p-3 rounded-full mr-4">
                                <i class="fas fa-chart-line text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Competitive Pricing</h3>
                                <p class="text-gray-600">We use market analysis to get you the best possible price for your property.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary/10 p-3 rounded-full mr-4">
                                <i class="fas fa-eye text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Maximum Exposure</h3>
                                <p class="text-gray-600">We market your property across multiple platforms to reach the widest audience.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary/10 p-3 rounded-full mr-4">
                                <i class="fas fa-file-signature text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Paperwork Handled</h3>
                                <p class="text-gray-600">We take care of all the legal documentation and paperwork for a smooth transaction.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary/10 p-3 rounded-full mr-4">
                                <i class="fas fa-percentage text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Low Commission</h3>
                                <p class="text-gray-600">Our competitive commission rates mean more money in your pocket.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Selling Process -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Our Selling Process</h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-1 flex-shrink-0">1</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Property Valuation</h3>
                                <p class="text-gray-600">We assess your property's market value.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-1 flex-shrink-0">2</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Marketing Strategy</h3>
                                <p class="text-gray-600">We create a customized marketing plan.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-1 flex-shrink-0">3</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Viewings & Offers</h3>
                                <p class="text-gray-600">We arrange viewings and negotiate offers.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 mt-1 flex-shrink-0">4</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Completion</h3>
                                <p class="text-gray-600">We handle all legal aspects until completion.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fast Track -->
                <div class="bg-green-50 border border-green-100 rounded-xl p-6">
                    <div class="flex items-start">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-bolt text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-green-700 mb-2">Fast Track Service</h3>
                            <p class="text-green-600 mb-3">Need to sell quickly? Our fast track service can help you sell your property in as little as 7 days.</p>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">What Our Sellers Say</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 mr-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Sold my apartment in just 2 weeks for 5% above asking price. The team was professional and made the process so easy."</p>
                    <div class="flex items-center">
                        <div class="bg-primary/10 p-2 rounded-full mr-3">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Rahul Sharma</h4>
                            <p class="text-gray-500 text-sm">Patna</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 mr-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"Excellent service from start to finish. They handled all the paperwork and kept me informed throughout the entire process."</p>
                    <div class="flex items-center">
                        <div class="bg-primary/10 p-2 rounded-full mr-3">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Priya Patel</h4>
                            <p class="text-gray-500 text-sm">Patna</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 mr-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">"I was hesitant to sell my family home, but they made the experience much easier than I expected. Got a great price too!"</p>
                    <div class="flex items-center">
                        <div class="bg-primary/10 p-2 rounded-full mr-3">
                            <i class="fas fa-user text-primary"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Amit Kumar</h4>
                            <p class="text-gray-500 text-sm">Patna</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
