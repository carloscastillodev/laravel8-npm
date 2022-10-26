@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="bi bi-bootstrap-fill"></i> {{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1 class="card-title text-center mb-4">Ejemplos de mensajes de alerta usando <a href="https://sweetalert2.github.io/" target="_blank" rel="noreferrer noopener" tabindex="-1" class="nowrap">SweetAlert2 <i class="fa fa-external-link"></i></a></h1>
                    <div class="container">
                        <div class="row mb-2 mt-2">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta simple</h5>
                                        <button id="btn-simple-alert" class="btn btn-primary">Probar!</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta de error</h5>
                                        <button id="btn-error-alert" class="btn btn-danger">Probar!</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta de éxito</h5>
                                        <button id="btn-success-alert" class="btn btn-success">Probar!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta con posición personalizada</h5>
                                        <button id="btn-custom-position-alert" class="btn btn-success">Probar!</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta con animación usando <a href="https://animate.style/" target="_blank" rel="noreferrer noopener" tabindex="-1" class="nowrap">Animate.css <i class="fa fa-external-link"></i></a></h5>
                                        <button id="btn-animation-alert" class="btn btn-warning">Probar!</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta con temporizador de cierre automático</h5>
                                        <button id="btn-auto-close-timer-alert" class="btn btn-dark">Probar!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2 mt-2">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta con HTML personalizado</h5>
                                        <button id="btn-custom-html-alert" class="btn btn-secondary">Probar!</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta con diálogo de confirmación</h5>
                                        <button id="btn-dialog-alert" class="btn btn-info">Probar!</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alerta con validación de campo de texto</h5>
                                        <button id="btn-validation-alert" class="btn btn-warning">Probar!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                {{ __('You are logged in!') }} <i class="fa-solid fa-circle-check"></i>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="module">
    $(document).ready(function () {
        $('#btn-simple-alert').click(function () {
            Swal.fire('Esta es una alerta simple...');
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-error-alert').click(function () {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salió mal!',
                confirmButtonText: 'Aceptar',
                footer: '<a href="{{ route('welcome') }}">¿Por qué tengo este problema?</a>'
            });
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-success-alert').click(function () {
            Swal.fire({
                icon: 'success',
                title: 'Bienvenido al sistema',
                text: 'Usuario: {{ Auth::user()->name }}',
                timer: 4000,
                showConfirmButton: false    
            });
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-custom-position-alert').click(function () {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El producto ha sido registrado satisfactoriamente.',
                showConfirmButton: false,
                timer: 1500
            });
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-animation-alert').click(function () {
            Swal.fire({
                title: 'Animación personalizada con Animate.css',
                showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
            });
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-auto-close-timer-alert').click(function () {
            let timerInterval
            Swal.fire({
                title: '¡Alerta de cierre automático!',
                html: 'Esta alerta se cerrará en <b></b> milisegundos...',
                timer: 2000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('Alerta cerrada por el temporizador...')
                }
            });
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-custom-html-alert').click(function () {
            Swal.fire({
                html:  '<h2>Estudiante matriculado</h2><p>ID <strong>12345678</strong></p><p><a href="{{ route('welcome') }}">Enviar correo</a></p>',
                confirmButtonText: 'Aceptar',
            });
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-dialog-alert').click(function () {
            Swal.fire({
                title: '¿Está seguro de eliminar el producto?',
                text: "¡No podrá revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6edf',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '!Sí, eliminar!',
                cancelButtonText: 'No, cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    '¡Eliminado!',
                    'El producto ha sido eliminado con éxito.',
                    'success'
                    )
                }
            });
        });
    });
</script>

<script type="module">
    $(document).ready(function () {
        $('#btn-validation-alert').click(function () {
            Swal.fire({
                title: 'Ingresa tu nombre',
                input: 'text',
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                inputValidator: name => {
                    // Si el valor del campo de texto es válido, se regresa "undefined", caso contrario se regresa una cadena.
                    if ( !name ) {
                        return 'Por favor escribe tu nombre...';
                    } else {
                        return undefined;
                    }
                }
            })
            .then(result => {
                if ( result.value ) {
                    let name = result.value;
                    Swal.fire({
                        icon: 'success',
                        title: 'Bienvenido al sistema',
                        text: 'Usuario: ' + name,
                        timer: 4000,
                        showConfirmButton: false    
                    });
                    console.log('Bienvenido ' + name);
                }
            });
        });
    });
</script>
@endsection