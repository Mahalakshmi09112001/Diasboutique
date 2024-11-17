@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Frequently Asked Questions</h1>
    <div id="faqAccordion" class="accordion">
        <!-- FAQ 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    What is the return policy?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We accept returns within 30 days of purchase. Items must be in their original condition with tags intact. For more details, visit our <a href="{{ route('terms') }}">Returns & Refunds</a> page.
                </div>
            </div>
        </div>
        <!-- FAQ 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How can I track my order?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Once your order is shipped, you will receive a tracking number via email. You can also track your order in the "My Orders" section of your account.
                </div>
            </div>
        </div>
        <!-- FAQ 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    What payment methods do you accept?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="faqThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We accept all major credit cards, PayPal, and Apple Pay. For COD (Cash on Delivery) orders, additional charges may apply.
                </div>
            </div>
        </div>
        <!-- FAQ 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Can I change my shipping address after placing an order?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, you can update your shipping address within 24 hours of placing your order. Please contact our support team for assistance.
                </div>
            </div>
        </div>
        <!-- FAQ 5 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faqFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    How can I contact customer support?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="faqFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    You can reach our customer support team via email at support@example.com or by calling us at (123) 456-7890. Our working hours are Monday to Friday, 9 AM to 6 PM.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
