@extends('layout.layout')

@section('title', 'Contact Us')
@section('description', 'Contact us for any inquiries or support.')
@section('keywords', 'contact, support, inquiries')
@section('author', 'Your Name')
@section('og_title', 'Contact Us')
@section('og_description', 'Get in touch with us for any questions or support.')
@section('og_image', asset('images/contact.jpg'))
@section('og_url', url()->current())
@section('og_type', 'website')
@section('twitter_card', 'summary_large_image')
@section('twitter_title', 'Contact Us')
@section('twitter_description', 'Reach out to us for any inquiries or support.')
@section('twitter_image', asset('images/contact.jpg'))
@section('twitter_site', '@yourtwitterhandle')
@section('twitter_creator', '@yourtwitterhandle')
@section('canonical', url()->current())

@section('content')

    <style>
        :root {
            /* Primary Colors */
            --primary: #d33593;
            --primary-dark: #48254a;
            --primary-darker: #000000;
<<<<<<< HEAD

            /* Neutral Colors */
            --gray-dark: #717271;
            --gray-light: #b1b2b1;
            --white: #ffffff;

            /* Additional Colors */
            --teal: #38b2ac;
            --red: #e53e3e;
            --yellow: #f6e05e;
            --purple: #805ad5;
            --blue: #4299e1;
            --green: #48bb78;
        }

        /* Text Colors */
        .text-primary {
            color: var(--primary);
        }

        .text-primary-dark {
            color: var(--primary-dark);
        }

        .text-primary-darker {
            color: var(--primary-darker);
        }

        .text-gray-dark {
            color: var(--gray-dark);
        }

        .text-gray-light {
            color: var(--gray-light);
        }

        /* Background Colors */
        .bg-primary {
            background-color: var(--primary);
        }

        .bg-primary-dark {
            background-color: var(--primary-dark);
        }

        .bg-primary-darker {
            background-color: var(--primary-darker);
        }

        .bg-gray-dark {
            background-color: var(--gray-dark);
        }

        .bg-gray-light {
            background-color: var(--gray-light);
        }

        /* Gradient Backgrounds */
        .bg-gradient-primary {
            background-image: linear-gradient(to right, var(--primary), var(--primary-dark));
        }

        .bg-gradient-primary-dark {
            background-image: linear-gradient(to right, var(--primary-dark), var(--primary-darker));
        }

        /* Border Colors */
        .border-primary {
            border-color: var(--primary);
        }

        .border-primary-dark {
            border-color: var(--primary-dark);
        }

        /* Hover States */
        .hover\:bg-primary:hover {
            background-color: var(--primary);
        }

        .hover\:bg-primary-dark:hover {
            background-color: var(--primary-dark);
        }

        .hover\:text-primary:hover {
            color: var(--primary);
        }

        /* Focus States */
        .focus\:ring-primary:focus {
            --tw-ring-color: var(--primary);
        }

        /* Alert Animation */
        .alert-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            animation: slideIn 0.5s forwards, fadeOut 0.5s 4.5s forwards;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        /* Validation Styles */
        .is-invalid {
            border-color: var(--red);
            --tw-ring-color: var(--red);
        }

        .invalid-feedback {
            color: var(--red);
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }

        .is-invalid + .invalid-feedback {
            display: block;
        }

        .was-validated .form-control:invalid, 
        .form-control.is-invalid {
            border-color: var(--red);
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23e53e3e'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e53e3e' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .was-validated .form-control:invalid:focus, 
        .form-control.is-invalid:focus {
            border-color: var(--red);
            box-shadow: 0 0 0 0.25rem rgba(229, 62, 62, 0.25);
        }
    </style>

    <div class="min-h-screen bg-gray-50">
        <!-- Alert Popups -->
        @if (session('success'))
            <div class="alert-popup">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-md" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/>
                        </svg>
                    </span>
                </div>
            </div>
            
            <script>
                setTimeout(function() {
                    document.querySelector('.alert-popup').remove();
                }, 5000);
            </script>
        @endif

        @if (session('error'))
            <div class="alert-popup">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-md" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/>
                        </svg>
                    </span>
                </div>
            </div>
            
            <script>
                setTimeout(function() {
                    document.querySelector('.alert-popup').remove();
                }, 5000);
            </script>
        @endif

        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-[#d33593] to-[#48254a] py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Our Real Estate Team</h1>
                <p class="text-xl max-w-2xl mx-auto">Whether you're buying, selling, or just exploring options, we're here to
                    help with all your property needs.</p>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="space-y-6" novalidate>
                        @csrf
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Full Name *</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition form-control">
                            <div class="invalid-feedback">Please provide your full name.</div>
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">Email Address *</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition form-control"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition form-control"
                                minlength="10" maxlength="10">
                            <div class="invalid-feedback">Please provide a valid 10-digit phone number.</div>
                        </div>
                        <input type="hidden" name="enquiry_type" value="contact">
                        <div>
                            <label for="description" class="block text-gray-700 mb-2">Your Message *</label>
                            <textarea id="description" name="description" rows="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition form-control"></textarea>
                            <div class="invalid-feedback">Please provide your message.</div>
                        </div>
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Contact Information</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Office Address</h3>
                                    <p class="text-gray-600">New Patliputra Colony, Patliputra Colony, Patna, Bihar 800013
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <i class="fas fa-phone-alt text-primary"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Phone Numbers</h3>
                                    <p class="text-gray-600">Sales: (123) 456-7890<br>Support: (123) 456-7891</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <i class="fas fa-envelope text-primary"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Email Addresses</h3>
                                    <p class="text-gray-600">sales@proptru.com<br>support@proptru.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Office Hours</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Monday - Friday</span>
                                <span class="font-medium">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Saturday</span>
                                <span class="font-medium">10:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Sunday</span>
                                <span class="font-medium">Closed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="bg-red-50 border border-red-100 rounded-xl p-6">
                        <div class="flex items-start">
                            <div class="bg-red-100 p-3 rounded-full mr-4">
                                <i class="fas fa-exclamation-triangle text-red-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-red-700 mb-2">Emergency After Hours</h3>
                                <p class="text-red-600 mb-3">For urgent property matters outside office hours</p>
                                <a href="tel:+11234567892" class="font-bold text-red-700 hover:underline">(123) 456-7892</a>
                            </div>
                        </div>
                    </div>
=======

            /* Neutral Colors */
            --gray-dark: #717271;
            --gray-light: #b1b2b1;
            --white: #ffffff;

            /* Additional Colors */
            --teal: #38b2ac;
            /* Keeping teal for some elements as accent */
            --red: #e53e3e;
            --yellow: #f6e05e;
            --purple: #805ad5;
            --blue: #4299e1;
            --green: #48bb78;
        }

        /* Text Colors */
        .text-primary {
            color: var(--primary);
        }

        .text-primary-dark {
            color: var(--primary-dark);
        }

        .text-primary-darker {
            color: var(--primary-darker);
        }

        .text-gray-dark {
            color: var(--gray-dark);
        }

        .text-gray-light {
            color: var(--gray-light);
        }

        /* Background Colors */
        .bg-primary {
            background-color: var(--primary);
        }

        .bg-primary-dark {
            background-color: var(--primary-dark);
        }

        .bg-primary-darker {
            background-color: var(--primary-darker);
        }

        .bg-gray-dark {
            background-color: var(--gray-dark);
        }

        .bg-gray-light {
            background-color: var(--gray-light);
        }

        /* Gradient Backgrounds */
        .bg-gradient-primary {
            background-image: linear-gradient(to right, var(--primary), var(--primary-dark));
        }

        .bg-gradient-primary-dark {
            background-image: linear-gradient(to right, var(--primary-dark), var(--primary-darker));
        }

        /* Border Colors */
        .border-primary {
            border-color: var(--primary);
        }

        .border-primary-dark {
            border-color: var(--primary-dark);
        }

        /* Hover States */
        .hover\:bg-primary:hover {
            background-color: var(--primary);
        }

        .hover\:bg-primary-dark:hover {
            background-color: var(--primary-dark);
        }

        .hover\:text-primary:hover {
            color: var(--primary);
        }

        /* Focus States */
        .focus\:ring-primary:focus {
            --tw-ring-color: var(--primary);
        }
    </style>

    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-[#d33593] to-[#48254a] py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Our Real Estate Team</h1>
                <p class="text-xl max-w-2xl mx-auto">Whether you're buying, selling, or just exploring options, we're here to
                    help with all your property needs.</p>
            </div>
        </div>


        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mx-auto max-w-2xl"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 00-1.414-1.414L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z" />
                    </svg>
                </span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mx-auto max-w-2xl"
                role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 00-1.414-1.414L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z" />
                    </svg>
                </span>
            </div>
        @endif

        <!-- Contact Form Section -->
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
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
                            <input type="tel" id="phone" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                        </div>
                        {{-- <div>
                        <label for="interest" class="block text-gray-700 mb-2">I'm interested in</label>
                        <select id="interest" name="interest"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
                            <option value="buying">Buying a property</option>
                            <option value="selling">Selling a property</option>

                        </select>
                    </div> --}}
                        <input type="hidden" name="enquiry_type" value="contact">
                        <div>
                            <label for="description" class="block text-gray-700 mb-2">Your Message</label>
                            <textarea id="description" name="description" rows="5" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="space-y-8">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Contact Information</h2>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Office Address</h3>
                                    <p class="text-gray-600">New Patliputra Colony, Patliputra Colony, Patna, Bihar 800013
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <i class="fas fa-phone-alt text-primary"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Phone Numbers</h3>
                                    <p class="text-gray-600">Sales: (123) 456-7890<br>Support: (123) 456-7891</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <i class="fas fa-envelope text-primary"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Email Addresses</h3>
                                    <p class="text-gray-600">sales@proptru.com<br>support@proptru.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Office Hours</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-700">Monday - Friday</span>
                                <span class="font-medium">9:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Saturday</span>
                                <span class="font-medium">10:00 AM - 4:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-700">Sunday</span>
                                <span class="font-medium">Closed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <div class="bg-red-50 border border-red-100 rounded-xl p-6">
                        <div class="flex items-start">
                            <div class="bg-red-100 p-3 rounded-full mr-4">
                                <i class="fas fa-exclamation-triangle text-red-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-red-700 mb-2">Emergency After Hours</h3>
                                <p class="text-red-600 mb-3">For urgent property matters outside office hours</p>
                                <a href="tel:+11234567892" class="font-bold text-red-700 hover:underline">(123) 456-7892</a>
                            </div>
                        </div>
                    </div>
>>>>>>> c064af744503fdee7092411cf6609f224464ed1d
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="container mx-auto px-4 pb-16">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.283926553456!2d85.1064779!3d25.6287006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed5975083c7597%3A0xd3c6a051cc317723!2sProptru!5e0!3m2!1sen!2sin!4v1747730492952!5m2!1sen!2sin"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    class="rounded-xl"></iframe>
<<<<<<< HEAD
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            
            // Real-time validation for phone number (only digits)
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                validatePhone();
            });
            
            // Validate email format
            const emailInput = document.getElementById('email');
            emailInput.addEventListener('blur', validateEmail);
            
            // Validate all fields on form submission
            form.addEventListener('submit', function(event) {
                // Validate all fields
                const isNameValid = validateField('name', 'Please provide your full name');
                const isEmailValid = validateEmail();
                const isPhoneValid = validatePhone();
                const isMessageValid = validateField('description', 'Please provide your message');
                
                // If any field is invalid, prevent submission
                if (!isNameValid || !isEmailValid || !isPhoneValid || !isMessageValid) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                // Add was-validated class to show error messages
                form.classList.add('was-validated');
            });
            
            // Field validation functions
            function validateField(fieldId, errorMessage) {
                const field = document.getElementById(fieldId);
                const feedback = field.nextElementSibling;
                
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    feedback.textContent = errorMessage;
                    return false;
                } else {
                    field.classList.remove('is-invalid');
                    return true;
                }
            }
            
            function validateEmail() {
                const email = emailInput.value.trim();
                const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
                const feedback = emailInput.nextElementSibling;
                
                if (!email) {
                    emailInput.classList.add('is-invalid');
                    feedback.textContent = 'Please provide an email address';
                    return false;
                } else if (!emailPattern.test(email)) {
                    emailInput.classList.add('is-invalid');
                    feedback.textContent = 'Please provide a valid email address';
                    return false;
                } else {
                    emailInput.classList.remove('is-invalid');
                    return true;
                }
            }
            
            function validatePhone() {
                const phone = phoneInput.value.trim();
                const feedback = phoneInput.nextElementSibling;
                
                if (!phone) {
                    phoneInput.classList.add('is-invalid');
                    feedback.textContent = 'Please provide a phone number';
                    return false;
                } else if (phone.length !== 10) {
                    phoneInput.classList.add('is-invalid');
                    feedback.textContent = 'Phone number must be 10 digits';
                    return false;
                } else {
                    phoneInput.classList.remove('is-invalid');
                    return true;
                }
            }
            
            // Validate fields on blur
            document.getElementById('name').addEventListener('blur', function() {
                validateField('name', 'Please provide your full name');
            });
            
            document.getElementById('description').addEventListener('blur', function() {
                validateField('description', 'Please provide your message');
            });
        });
    </script>
@endsection
=======


            </div>
        </div>
    </div>
@endsection
>>>>>>> c064af744503fdee7092411cf6609f224464ed1d
