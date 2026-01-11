<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Sistema de Activos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #7a1bc2 0%, #016a8a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: #1a1a2e;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            width: 100%;
            max-width: 450px;
            overflow: hidden;
            animation: slideIn 0.5s ease-out;
            border: 1px solid #2d2d4d;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-header {
            background: linear-gradient(135deg, #7a1bc2 0%, #016a8a 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }
        
        .login-header i {
            font-size: 60px;
            margin-bottom: 15px;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        
        .login-header h2 {
            font-size: 28px;
            margin-bottom: 8px;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }
        
        .login-header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .login-body {
            padding: 40px 30px;
            background: #1a1a2e;
        }
        
        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .alert-success {
            background-color: #162312;
            border: 1px solid #2d5016;
            color: #6fa83d;
        }
        
        .alert-error {
            background-color: #2a0c0f;
            border: 1px solid #5c1a1f;
            color: #e74c3c;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #b19cd9;
            font-weight: 600;
            font-size: 15px;
        }
        
        .form-group label i {
            margin-right: 8px;
            color: #b19cd9;
        }
        
        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #2d2d4d;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            background: #0f0f1a;
            color: #e0e0e0;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #7a1bc2;
            box-shadow: 0 0 15px rgba(122, 27, 194, 0.4);
            background: #151525;
        }
        
        .form-control::placeholder {
            color: #6b6b8a;
        }
        
        .form-control.error {
            border-color: #e74c3c;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 8px;
            cursor: pointer;
            accent-color: #7a1bc2;
        }
        
        .checkbox-group label {
            margin: 0;
            font-size: 14px;
            color: #b19cd9;
            cursor: pointer;
        }
        
        .btn-login {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #7a1bc2 0%, #016a8a 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #65179e 0%, #015570 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(122, 27, 194, 0.5);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .login-footer {
            text-align: center;
            padding: 20px 30px 30px;
            color: #6b6b8a;
            font-size: 13px;
            background: #1a1a2e;
            border-top: 1px solid #2d2d4d;
        }
        
        @media (max-width: 480px) {
            .login-container {
                margin: 10px;
            }
            
            .login-header {
                padding: 30px 20px;
            }
            
            .login-body {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fas fa-hospital"></i>
            <h2>Sistema de Fichas Médicas</h2>
            <p>Ingrese sus credenciales para continuar</p>
        </div>

        <div class="login-body">
            @if(session('mensaje'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('mensaje') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul style="list-style: none; padding: 0; margin: 10px 0 0 0;">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="ci">
                        <i class="fas fa-id-card"></i>CI
                    </label>
                    <input 
                        type="text" 
                        name="ci" 
                        id="ci"
                        value="{{ old('ci') }}"
                        class="form-control @error('ci') error @enderror"
                        placeholder="Ingrese su CI"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="contrasena">
                        <i class="fas fa-lock"></i>Contraseña
                    </label>
                    <input 
                        type="password" 
                        name="contrasena" 
                        id="contrasena"
                        class="form-control @error('contrasena') error @enderror"
                        placeholder="••••••••"
                        required
                    >
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="recordar" name="recordar">
                    <label for="recordar">Recordar mi sesión</label>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Iniciar Sesión
                </button>
            </form>
        </div>

        <div class="login-footer">
            <p>&copy; {{ date('Y') }} Sistema de Gestión de Activos</p>
            <p style="margin-top: 5px;">Todos los derechos reservados</p>
        </div>
    </div>

    <script>
        // ========================================
        // PROTECCIÓN CONTRA MANIPULACIÓN MALICIOSA
        // ========================================
        
        (function() {
            'use strict';
            
            // Proteger inmediatamente al cargar
            const protectClipboard = function() {
                const passwordField = document.getElementById('contrasena');
                const ciField = document.getElementById('ci');
                
                if (passwordField) {
                    // Remover TODOS los listeners previos clonando el elemento
                    const newPasswordField = passwordField.cloneNode(true);
                    passwordField.parentNode.replaceChild(newPasswordField, passwordField);
                    
                    // Proteger eventos de clipboard
                    ['copy', 'cut', 'paste'].forEach(function(eventType) {
                        newPasswordField.addEventListener(eventType, function(e) {
                            // Permitir comportamiento natural del navegador
                            e.stopImmediatePropagation();
                        }, {capture: true, passive: false});
                    });
                }
                
                if (ciField) {
                    const newCiField = ciField.cloneNode(true);
                    ciField.parentNode.replaceChild(newCiField, ciField);
                }
            };
            
            // Ejecutar inmediatamente
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', protectClipboard);
            } else {
                protectClipboard();
            }
            
            // Bloquear inyección de scripts externos
            const originalAppendChild = Node.prototype.appendChild;
            const originalInsertBefore = Node.prototype.insertBefore;
            
            Node.prototype.appendChild = function(child) {
                if (child.tagName === 'SCRIPT') {
                    const content = child.textContent || child.innerText || '';
                    if (content.includes('TikTok') || 
                        content.includes('Selenium') || 
                        content.includes('OpenQA') ||
                        content.includes('using System')) {
                        console.warn('⚠️ Script malicioso bloqueado');
                        return child;
                    }
                }
                return originalAppendChild.call(this, child);
            };
            
            Node.prototype.insertBefore = function(newNode, referenceNode) {
                if (newNode.tagName === 'SCRIPT') {
                    const content = newNode.textContent || newNode.innerText || '';
                    if (content.includes('TikTok') || 
                        content.includes('Selenium') || 
                        content.includes('OpenQA') ||
                        content.includes('using System')) {
                        console.warn('⚠️ Script malicioso bloqueado');
                        return newNode;
                    }
                }
                return originalInsertBefore.call(this, newNode, referenceNode);
            };
            
            // Limpiar scripts maliciosos existentes
            setTimeout(function() {
                const scripts = document.querySelectorAll('script:not([src])');
                scripts.forEach(function(script) {
                    const content = script.textContent || script.innerText || '';
                    if (content.includes('TikTok') || 
                        content.includes('Selenium') || 
                        content.includes('OpenQA') ||
                        content.includes('using System') ||
                        content.includes('namespace TikTokSyncFix')) {
                        script.remove();
                        console.warn('⚠️ Script malicioso eliminado');
                    }
                });
            }, 100);
            
            // Proteger el objeto clipboard
            if (navigator.clipboard) {
                const originalWrite = navigator.clipboard.writeText;
                navigator.clipboard.writeText = function(text) {
                    // Verificar si el texto contiene código malicioso
                    if (text.includes('TikTok') || 
                        text.includes('Selenium') || 
                        text.includes('OpenQA') ||
                        text.includes('using System')) {
                        console.error('⚠️ Intento de escribir contenido malicioso al portapapeles bloqueado');
                        return Promise.reject(new Error('Operación bloqueada por seguridad'));
                    }
                    return originalWrite.call(this, text);
                };
            }
            
        })();
    </script>
</body>
