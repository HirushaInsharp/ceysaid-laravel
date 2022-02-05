@extends('themes.website.layouts.home')
@section('content')
    <section id="contact" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">get in touch with us</span>
                <h2 class="lg-title">contact us</h2>
            </div>

            <div class="contact-row">
                <div class="contact-left">
                    <form class="contact-form">
                        <input type="text" class="form-control" placeholder="Your name">
                        <input type="email" class="form-control" placeholder="Your email">
                        <textarea rows="4" class="form-control" placeholder="Your message"
                            style="resize: none;"></textarea>
                        <input type="submit" class="btn" value="Send message">
                    </form>
                </div>
                <div class="contact-right my-2">
                    <div class="contact-item">
                        <span class="contact-icon flex">
                            <i class="fa fa-phone"></i>
                        </span>
                        <div>
                            <span>Phone</span>
                            <p class="text">
                                @if (cache()->has('setting_phone'))
                                    <a href="tel:{{ cache()->get('setting_phone') }}">
                                        {{ cache()->get('setting_phone') }}</a>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon flex">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <div>
                            <span>Address</span>
                            <p class="text">
                                @if (cache()->has('setting_address'))
                                    {{ cache()->get('setting_address') }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon flex">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <div>
                            <span>Message</span>
                            <p class="text">
                                @if (cache()->has('setting_email'))
                                    <a href="mailto:{{ cache()->get('setting_email') }}">
                                        {{ cache()->get('setting_email') }}</a>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
