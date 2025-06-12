@extends('layout.layout')

@section('title', 'RERA Disclaimer')
@section('description', 'Important RERA compliance information for Proptrure users.')
@section('keywords', 'RERA disclaimer, real estate regulation, compliance')
@section('author', 'Proptrure')
@section('og_title', 'RERA Disclaimer')
@section('og_description', 'Important RERA compliance information for our users.')
@section('og_image', asset('images/rera-disclaimer.jpg'))
@section('og_url', url()->current())
@section('og_type', 'website')
@section('twitter_card', 'summary_large_image')
@section('twitter_title', 'RERA Disclaimer')
@section('twitter_description', 'RERA compliance information for Proptrure users.')
@section('twitter_image', asset('images/rera-disclaimer.jpg'))
@section('twitter_site', '@proptrure')
@section('twitter_creator', '@proptrure')
@section('canonical', url()->current())

@section('content')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-[#d33593] to-[#48254a] py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">RERA Disclaimer</h1>
                <p class="text-xl max-w-2xl mx-auto">Important compliance information under the Real Estate (Regulation and Development) Act, 2016</p>
            </div>
        </div>

        <!-- Disclaimer Content -->
        <div class="container mx-auto px-4 py-16">
<<<<<<< HEAD
            <div class="max-w-4xl mx-auto p-8 md:p-12">
            </div>
            {!! $legal->content !!}
=======
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8 md:p-12">
                <div class="prose max-w-none">
                    <p class="mb-6"><strong>Proptrure</strong> complies with the Real Estate (Regulation and Development) Act, 2016 (RERA) and rules established by respective state authorities. This page contains important disclaimers regarding our services under RERA regulations.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">1. RERA Registration</h3>
                    <p class="mb-6">Proptrure is registered under RERA in the states where we operate. Our registration numbers are available upon request. All real estate projects promoted on our platform are registered with their respective state RERA authorities unless explicitly stated otherwise.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">2. Project Information</h3>
                    <p class="mb-4">All project information displayed on our platform:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Is sourced from developers, builders, or their authorized representatives</li>
                        <li>Includes RERA registration numbers where applicable</li>
                        <li>Should be verified independently before making any purchase decisions</li>
                        <li>May be subject to change by the developer without notice</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">3. Brokerage Services</h3>
                    <p class="mb-6">Our brokerage services are provided by RERA-certified professionals. All agreements between buyers and sellers are executed as per RERA guidelines, and we ensure transparency in all transactions.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">4. Property Listings</h3>
                    <p class="mb-4">While we strive for accuracy:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>We do not guarantee the completeness or accuracy of listing information</li>
                        <li>All measurements (carpet area, super area, etc.) are as provided by the seller/developer</li>
                        <li>Images may be representative and not reflect current conditions</li>
                        <li>Prices are subject to change without notice</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">5. Due Diligence</h3>
                    <p class="mb-6">We strongly recommend that users:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Verify all project approvals and RERA registration independently</li>
                        <li>Review builder credentials and track record</li>
                        <li>Consult legal professionals before executing any agreements</li>
                        <li>Physically visit properties before making purchase decisions</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">6. State-Specific Compliance</h3>
                    <p class="mb-4">RERA implementation varies by state. Users are advised to:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Check the respective state RERA website for project details</li>
                        <li>Understand state-specific rules and regulations</li>
                        <li>Be aware of their rights under the applicable state RERA</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">7. Liability Disclaimer</h3>
                    <p class="mb-6">Proptrure acts as an intermediary platform and is not liable for:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>Delays or defaults by developers or other parties</li>
                        <li>Discrepancies between promised and delivered projects</li>
                        <li>Any financial losses incurred by users</li>
                        <li>Disputes between buyers and sellers/developers</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">8. Advertising Standards</h3>
                    <p class="mb-6">All advertisements on our platform comply with RERA advertising guidelines. We ensure that:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>All claims are substantiated with verifiable evidence</li>
                        <li>RERA registration numbers are displayed where required</li>
                        <li>No misleading information is presented</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">9. Grievance Redressal</h3>
                    <p class="mb-4">For any RERA-related concerns:</p>
                    <ul class="list-disc pl-6 mb-6">
                        <li>First contact our Grievance Officer at <a href="mailto:grievance@proptrure.com" class="text-gray-800 hover:underline">grievance@proptrure.com</a></li>
                        <li>If unresolved, you may approach the appropriate state RERA authority</li>
                        <li>We commit to resolving complaints within timelines specified under RERA</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">10. Updates to This Disclaimer</h3>
                    <p class="mb-6">This disclaimer may be updated periodically to reflect changes in RERA regulations or our business practices. Users are encouraged to review this page regularly.</p>

                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Contact Information</h3>
                    <p class="mb-2"><strong>RERA Compliance Officer:</strong></p>
                    <p class="mb-2">Proptrure Realty Services Pvt. Ltd.</p>
                    <p class="mb-2">New Patliputra Colony, Patliputra Colony, Patna, Bihar 800013</p>
                    <p class="mb-2"><strong>Email:</strong> rera@proptrure.com</p>
                    <p class="mb-6"><strong>Phone:</strong> (123) 456-7890</p>

                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                        <p class="text-yellow-700"><strong>Important Note:</strong> This disclaimer does not constitute legal advice. For specific legal questions regarding RERA compliance, please consult a qualified legal professional.</p>
                    </div>
                </div>
>>>>>>> c064af744503fdee7092411cf6609f224464ed1d
            </div>
        </div>
    </div>
@endsection
