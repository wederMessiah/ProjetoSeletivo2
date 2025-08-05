<?php
require_once 'config.php';
SessionManager::start();

$error_message = '';
$success_message = '';

// Verificar se há mensagem de logout
if (isset($_GET['message'])) {
    $success_message = $_GET['message'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitizeInput($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    
    if (empty($email) || empty($senha)) {
        $error_message = 'Email e senha são obrigatórios.';
    } else {
        try {
            $db = (new Database())->connect();
            
            $stmt = $db->prepare("SELECT id, nome, email, senha_hash, nivel FROM usuarios_admin WHERE email = ? AND ativo = 1");
            $stmt->execute([$email]);
            $usuario = $stmt->fetch();
            
            if ($usuario && password_verify($senha, $usuario['senha_hash'])) {
                // Login bem-sucedido
                SessionManager::set('admin_logged_in', true);
                SessionManager::set('admin_id', $usuario['id']);
                SessionManager::set('admin_nome', $usuario['nome']);
                SessionManager::set('admin_email', $usuario['email']);
                SessionManager::set('admin_nivel', $usuario['nivel']);
                
                // Atualizar último login
                $stmt = $db->prepare("UPDATE usuarios_admin SET ultimo_login = NOW() WHERE id = ?");
                $stmt->execute([$usuario['id']]);
                
                // Registrar atividade
                logActivity($db, 'login_admin', "Login realizado: {$usuario['nome']}", null, null, $usuario['id']);
                
                header('Location: admin.php');
                exit;
            } else {
                $error_message = 'Email ou senha incorretos.';
            }
            
        } catch (Exception $e) {
            $error_message = 'Erro interno. Tente novamente.';
        }
    }
}

// Se já estiver logado, redirecionar
if (SessionManager::has('admin_logged_in')) {
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrativo - ENIAC LINK+</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298, #34609b);
            background-size: 400% 400%;
            animation: gradientShift 12s ease infinite;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            position: relative;
            overflow: hidden;
        }

        /* Elementos flutuantes decorativos */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 60px 60px;
            animation: float 20s linear infinite;
            pointer-events: none;
        }

        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: floatUpDown 6s ease-in-out infinite;
            pointer-events: none;
        }

        .floating-shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-delay: -2s;
        }

        .floating-shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 20%;
            right: 10%;
            animation-delay: -4s;
        }

        .floating-shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: -1s;
        }

        .floating-shape:nth-child(4) {
            width: 100px;
            height: 100px;
            bottom: 10%;
            right: 20%;
            animation-delay: -3s;
        }

        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-100px, -100px) rotate(360deg); }
        }

        @keyframes floatUpDown {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(25px);
            padding: 50px 40px;
            border-radius: 25px;
            box-shadow: 
                0 25px 80px rgba(30, 60, 114, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 10;
            transform: translateY(0);
            animation: slideInUp 0.8s ease;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(135deg, #1e3c72, #2a5298, #34609b);
            border-radius: 25px 25px 0 0;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .logo-admin {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 
                0 15px 35px rgba(30, 60, 114, 0.4),
                0 5px 15px rgba(0, 0, 0, 0.1);
            border: 4px solid rgba(255, 255, 255, 0.8);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 20px;
            position: relative;
        }

        .logo-admin:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 
                0 20px 45px rgba(30, 60, 114, 0.5),
                0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .logo-admin::after {
            content: '';
            position: absolute;
            top: -8px;
            left: -8px;
            right: -8px;
            bottom: -8px;
            border: 2px solid transparent;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e3c72, #2a5298) border-box;
            mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .logo-admin:hover::after {
            opacity: 1;
        }

        .logo-section h1 {
            color: #1e3c72;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo-section p {
            color: #666;
            font-size: 1rem;
            font-weight: 500;
            opacity: 0.8;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #1e3c72;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label i {
            width: 18px;
            text-align: center;
        }

        .form-group input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid rgba(30, 60, 114, 0.1);
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .form-group input:focus {
            outline: none;
            border-color: #2a5298;
            box-shadow: 
                0 0 0 4px rgba(42, 82, 152, 0.1),
                0 8px 25px rgba(30, 60, 114, 0.15);
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 1);
        }

        .btn-login {
            width: 100%;
            padding: 16px 20px;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 25px rgba(30, 60, 114, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #2a5298, #34609b);
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(30, 60, 114, 0.4);
        }

        .btn-login:active {
            transform: translateY(-1px);
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #0056b3;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #004494;
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            transition: all 0.3s ease;
            padding: 5px;
            border-radius: 50%;
        }

        .password-toggle i:hover {
            color: #2a5298;
            background: rgba(42, 82, 152, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                margin: 20px;
                padding: 40px 30px;
                max-width: 100%;
            }

            .logo-section h1 {
                font-size: 1.8rem;
            }

            .logo-admin {
                width: 80px;
                height: 80px;
            }

            .floating-shape {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            .form-group input {
                padding: 12px 15px;
            }

            .btn-login {
                padding: 14px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Elementos flutuantes decorativos -->
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
    <div class="floating-shape"></div>
    
    <div class="login-container">
        <div class="logo-section">
            <img src="./imagens/Logoindex.jpg" alt="Logo da empresa" class="logo-admin">
            <p>Painel Administrativo</p>
        </div>

        <?php if ($error_message): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i>
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <?php if ($success_message): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> Email
                </label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    autocomplete="email"
                    value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                >
            </div>

            <div class="form-group">
                <label for="senha">
                    <i class="fas fa-lock"></i> Senha
                </label>
                <div class="password-toggle">
                    <input 
                        type="password" 
                        id="senha" 
                        name="senha" 
                        required 
                        autocomplete="current-password"
                    >
                    <i class="fas fa-eye" onclick="togglePassword()"></i>
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Entrar
            </button>
        </form>

        <div class="back-link">
            <a href="index.php">
                <i class="fas fa-arrow-left"></i> Voltar ao Site
            </a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('senha');
            const toggleIcon = document.querySelector('.password-toggle i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Auto-focus no primeiro campo
        document.getElementById('email').focus();
    </script>
</body>
</html>
