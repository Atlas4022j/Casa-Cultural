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
            <form action="{{ route('reseñas.store') }}" method="POST" class="contact-form">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" name="nombre" placeholder="Tu Nombre" required>
                </div>
                <div class="col-lg-6">
                    <input type="email" name="email" placeholder="Tu Correo" required>
                </div>
                <div class="col-lg-12">
                    <textarea name="reseña" placeholder="Déjanos un mensaje" required></textarea>
                    <button type="submit">Enviar</button>
                </div>
            </div>

            @if (session('success'))
                <p style="color: green; font-weight: bold; margin-top: 10px;">
                    {{ session('success') }}
                </p>
            @endif
        </form>
        </div>
    </div>
</div>
</section>
<!-- Contact Section End -->

</main>
@endsection