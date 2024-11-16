@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')
    <main>
        <section class="contact">
            <h1>Contact Us</h1>
            <p>Have questions? We're here to help. Reach out to us by filling out the form below.</p>
            <div class="contact-form">
                <form action="#" method="post" class="formClass">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Submit</button>
                </form>
            </div>
        </section>
    </main>


@endsection