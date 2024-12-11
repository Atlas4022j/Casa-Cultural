@extends('layouts.main')
@section('title','Hospedaje | Contactanos')
@section('content')
<main>
    <!-- Contact Section Begin -->
<section class="contact-section spad">
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="contact-text">
                <h2>Contactanos</h2>
                <p>Para mas informacion por favor contactanos, estaremos con gusto de atenderte.</p>
                <table>
                    <tbody>
                        <tr>
                            <td class="c-o">Address:</td>
                            <td>Chachapoyas</td>
                        </tr>
                        <tr>
                            <td class="c-o">Phone:</td>
                            <td>(+51) 916 410 461</td>
                        </tr>
                        <tr>
                            <td class="c-o">Email:</td>
                            <td>infoelmirador@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-7 offset-lg-1">
            <form action="#" class="contact-form">
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" placeholder="Tu Nombre">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Tu Correo">
                    </div>
                    <div class="col-lg-12">
                        <textarea placeholder="Dejanos Un Mensaje"></textarea>
                        <button type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
<!-- Contact Section End -->

</main>
@endsection