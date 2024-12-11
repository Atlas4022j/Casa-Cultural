<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro e Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login-register.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <!-- Mostrar mensaje de éxito -->
            @if(session('success'))
                <div class="message success">
                    {{ session('success') }}
                </div>
            @endif
        
            <!-- Mostrar mensajes de error -->
            @if($errors->any())
                <div class="message error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <!-- Formulario de Registro -->
            <form id="registerForm" action="{{ route('register') }}" method="POST" class="form">
                @csrf
                <h2>Registrarse</h2>
                <div class="form-group">
                    <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
                    <label for="nombres">Nombres</label>
                    <i class="fas fa-user"></i>
                    @error('nombres')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                    <label for="apellidos">Apellidos</label>
                    <i class="fas fa-user"></i>
                    @error('apellidos')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" id="usuario" name="usuario" value="{{ old('usuario') }}" required>
                    <label for="usuario">Usuario</label>
                    <i class="fas fa-user-circle"></i>
                    @error('usuario')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    <label for="email">Email</label>
                    <i class="fas fa-envelope"></i>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" required>
                    <label for="password">Contraseña</label>
                    <i class="fas fa-lock"></i>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn">Registrarse</button>
                <div class="switch-form">
                    <p>¿Ya tienes una cuenta? <a href="#" id="showLogin">Inicia Sesión</a></p>
                </div>
            </form>

            <!-- Formulario de Inicio de Sesión -->
            <form id="loginForm" action="{{ route('login') }}" method="POST" class="form">
                @csrf
                <h2>Iniciar Sesión</h2>
                @if($errors->has('login'))
                    <div class="login-error">
                        {{ $errors->first('login') }}
                    </div>
                @endif
                <div class="form-group">
                    <input type="text" id="usuario-login" name="usuario" required>
                    <label for="usuario-login">Usuario</label>
                    <i class="fas fa-user-circle"></i>
                    @error('usuario')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" id="password-login" name="password" required>
                    <label for="password-login">Contraseña</label>
                    <i class="fas fa-lock"></i>
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn">Iniciar Sesión</button>
                <div class="switch-form">
                    <p>¿No tienes una cuenta? <a href="#" id="showRegister">Regístrate</a></p>
                </div>
            </form>
        </div>
    </div>
    <div class="background">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <script src="{{ asset('js/login-register.js') }}"></script>
    <script>
        // Usar los datos guardados en la sesión para pre-poblar los formularios si hay errores
        @if(session('old'))
            const oldData = @json(session('old'));
            Object.keys(oldData).forEach(key => {
                const inputElement = document.querySelector(`[name=${key}]`);
                if (inputElement) inputElement.value = oldData[key];
            });
        @endif
        </script>
</body>
</html>