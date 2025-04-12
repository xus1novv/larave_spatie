@extends('base.base')

@section('title', 'Contact')

@section('content')

    <body>
        <!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Biz bilan bog'lanish</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container">
                <div class="section-header text-center mb-5">
                    <p>Biz bilan bog'laning</p>
                    <h2>Har qanday so'rov uchun murojaat qiling</h2>
                </div>
                <div class="row">
                    <!-- Contact Form -->
                    <div class="col-md-6">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="control-group mb-3">
                                    <input type="text" class="form-control" name="name" placeholder="Ismingiz" required="required" />
                                </div>
                                <div class="control-group mb-3">
                                    <input type="email" class="form-control" name="email" placeholder="Email manzilingiz" required="required" />
                                </div>
                                <div class="control-group mb-3">
                                    <input type="text" class="form-control" name="subject" placeholder="Mavzu" required="required" />
                                </div>
                                <div class="control-group mb-3">
                                    <textarea class="form-control" name="message" placeholder="Xabar" required="required"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary w-100" type="submit">Xabarni yuborish</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                    <!-- Google Map -->
                    <div class="col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1600663868074!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="w-100" height="400"></iframe>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact End -->
    </body>

@endsection