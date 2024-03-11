@extends('layouts.master')

@section('content')

 <!-- Contact Section Begin -->
 <section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Contacte Info</h2>
                    <p>Besoin d'aide ou avez-vous des questions ? Nous sommes là 
                        pour vous aider ! Contactez-nous dès maintenant et nous vous répondrons dans les plus brefs délais.</p>
                    <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Adresse:</td>
                                <td>cotonou,Bénin</td>
                            </tr>
                            <tr>
                                <td class="c-o">Téléphone:</td>
                                <td>(229) 40735335</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email:</td>
                                <td>ahehehinnou31@gmail.com</td>
                            </tr>
                            {{-- <tr>
                                <td class="c-o">Fax:</td>
                                <td>+(12) 345 67890</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">
                <form action="#" class="contact-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Votre nom">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" placeholder="Votre Email">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Votre Message"></textarea>
                            <button type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.0606825994123!2d-72.8735845851828!3d40.760690042573295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b24c9274c91%3A0xf310d41b791bcb71!2sWilliam%20Floyd%20Pkwy%2C%20Mastic%20Beach%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1578582744646!5m2!1sen!2sbd"
                height="470" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>
<!-- Contact Section End -->

@endsection