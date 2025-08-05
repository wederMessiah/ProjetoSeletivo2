<?php
// Configuração da base de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eniac_link";

// Verificar se há um ID de vaga específico na URL
$vaga_id = isset($_GET['vaga_id']) ? (int)$_GET['vaga_id'] : null;
$mostrar_alerta_vaga = false;
$vaga = null;

// Se há um ID de vaga, buscar informações da vaga
if ($vaga_id) {
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("SELECT * FROM vagas WHERE id = ?");
        $stmt->execute([$vaga_id]);
        $vaga = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($vaga) {
            $mostrar_alerta_vaga = true;
        }
    } catch(PDOException $e) {
        // Em caso de erro, continuar sem o alerta da vaga
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro Premium - ENIAC LINK+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    /* CSS Variables Premium */
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --premium-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
      --text-primary: #2c3e50;
      --text-secondary: #7f8c8d;
      --border-radius-sm: 8px;
      --border-radius-md: 12px;
      --border-radius-lg: 16px;
      --border-radius-xl: 24px;
      --shadow-premium: 0 20px 60px rgba(0, 0, 0, 0.15);
      --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Reset Global */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      line-height: 1.6;
      color: var(--text-primary);
      background: var(--primary-gradient);
      min-height: 100vh;
      position: relative;
      overflow-x: hidden;
    }

    /* Floating Background Elements */
    .floating-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
    }

    .floating-element {
      position: absolute;
      width: 300px;
      height: 300px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent 70%);
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }

    /* Header Premium */
    header {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      padding: 0;
      color: white;
      position: relative;
      z-index: 1000;
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.5rem 2rem;
    }

    .logo-section {
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }

    .logo-header {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
      border: 3px solid rgba(255, 255, 255, 0.4);
      transition: var(--transition-smooth);
      position: relative;
    }

    .logo-header::after {
      content: '';
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      border-radius: 50%;
      background: var(--premium-gradient);
      z-index: -1;
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .logo-header:hover {
      transform: scale(1.1) rotate(5deg);
      box-shadow: 0 12px 35px rgba(255, 255, 255, 0.4);
    }

    .logo-header:hover::after {
      opacity: 1;
    }

    nav {
      display: flex;
      gap: 0.3rem;
      position: relative;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 25px;
      padding: 0.5rem;
      border: 1px solid rgba(255, 255, 255, 0.2);
      flex-wrap: nowrap;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      padding: 1rem 1.8rem;
      border-radius: 20px;
      transition: var(--transition-smooth);
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      backdrop-filter: blur(10px);
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
    }

    nav a::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
      transition: left 0.6s ease;
    }

    nav a:hover::before {
      left: 100%;
    }

    nav a:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
      color: #ffffff;
    }

    nav a.active {
      background: var(--success-gradient);
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
      transform: translateY(-2px);
    }

    nav a i {
      transition: var(--transition-smooth);
      font-size: 1.1rem;
    }

    /* Main Container Premium */
    .main-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 3rem 2rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
      margin-top: 2rem;
      position: relative;
      z-index: 10;
      min-height: calc(100vh - 120px);
    }

    /* Hero Section do Cadastro */
    .cadastro-hero {
      text-align: center;
      margin-bottom: 4rem;
      position: relative;
    }

    .cadastro-hero::before {
      content: '';
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 4px;
      background: var(--primary-gradient);
      border-radius: 2px;
    }

    .cadastro-hero h1 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(2.5rem, 4vw, 3.5rem);
      font-weight: 800;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
    }

    .cadastro-hero p {
      font-size: 1.2rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto 2rem;
      line-height: 1.8;
    }

    /* Alerta de Vaga */
    .vaga-info-alert {
      background: var(--success-gradient);
      color: white;
      padding: 2rem;
      border-radius: var(--border-radius-xl);
      margin-bottom: 3rem;
      text-align: center;
      box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);
      position: relative;
      overflow: hidden;
    }

    .vaga-info-alert::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      animation: shine 3s infinite;
    }

    @keyframes shine {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    .vaga-info-alert h3 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    /* Formulário Premium */
    .form-container {
      display: grid;
      grid-template-columns: 1fr 400px;
      gap: 4rem;
      align-items: start;
    }

    .form-main {
      background: white;
      padding: 3rem;
      border-radius: var(--border-radius-xl);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      position: relative;
    }

    .form-main::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: var(--primary-gradient);
      border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
    }

    .form-sidebar {
      background: white;
      padding: 2.5rem;
      border-radius: var(--border-radius-xl);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      position: sticky;
      top: 2rem;
    }

    .form-group {
      margin-bottom: 2rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.8rem;
      font-weight: 600;
      color: var(--text-primary);
      font-size: 1rem;
      font-family: 'Poppins', sans-serif;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 1.2rem 1.5rem;
      border: 2px solid rgba(102, 126, 234, 0.1);
      border-radius: var(--border-radius-lg);
      font-size: 1rem;
      font-family: 'Inter', sans-serif;
      transition: var(--transition-smooth);
      background: rgba(102, 126, 234, 0.02);
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
      background: white;
    }

    .form-group textarea {
      min-height: 120px;
      resize: vertical;
    }

    /* Arquivo Upload Premium */
    .file-upload {
      position: relative;
      display: block;
      width: 100%;
      padding: 2rem;
      border: 2px dashed rgba(102, 126, 234, 0.3);
      border-radius: var(--border-radius-lg);
      text-align: center;
      cursor: pointer;
      transition: var(--transition-smooth);
      background: rgba(102, 126, 234, 0.02);
    }

    .file-upload:hover {
      border-color: #667eea;
      background: rgba(102, 126, 234, 0.05);
    }

    .file-upload input[type="file"] {
      position: absolute;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .file-upload-content {
      pointer-events: none;
    }

    .file-upload i {
      font-size: 3rem;
      color: #667eea;
      margin-bottom: 1rem;
      display: block;
    }

    /* Botão Premium */
    .btn-primary {
      background: var(--success-gradient);
      color: white;
      padding: 1.5rem 3rem;
      border: none;
      border-radius: var(--border-radius-lg);
      font-size: 1.1rem;
      font-weight: 700;
      cursor: pointer;
      transition: var(--transition-smooth);
      position: relative;
      overflow: hidden;
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-family: 'Poppins', sans-serif;
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
      width: 100%;
      justify-content: center;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s ease;
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    .btn-primary:hover {
      transform: translateY(-3px) scale(1.02);
      box-shadow: 0 15px 35px rgba(79, 172, 254, 0.6);
    }

    /* Sidebar Premium */
    .benefits-list {
      list-style: none;
    }

    .benefits-list li {
      padding: 1rem 0;
      border-bottom: 1px solid rgba(102, 126, 234, 0.1);
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .benefits-list li:last-child {
      border-bottom: none;
    }

    .benefits-list i {
      color: #667eea;
      font-size: 1.2rem;
      width: 20px;
    }

    .security-badge {
      background: var(--premium-gradient);
      color: white;
      padding: 1.5rem;
      border-radius: var(--border-radius-lg);
      text-align: center;
      margin-top: 2rem;
      box-shadow: var(--shadow-premium);
    }

    .security-badge i {
      font-size: 2rem;
      margin-bottom: 1rem;
      display: block;
    }

    /* Responsividade Premium */
    @media (max-width: 1024px) {
      .form-container {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
      
      .form-sidebar {
        position: static;
      }
      
      .header-container {
        padding: 1rem;
        flex-wrap: wrap;
      }
      
      nav {
        flex-wrap: wrap;
        gap: 0.2rem;
      }
      
      nav a {
        padding: 0.8rem 1.2rem;
        font-size: 0.85rem;
      }
    }

    @media (max-width: 768px) {
      .logo-header {
        width: 60px;
        height: 60px;
      }
      
      .main-container {
        padding: 2rem 1rem;
        margin-top: 1rem;
      }
      
      .form-main,
      .form-sidebar {
        padding: 2rem 1.5rem;
      }
      
      .cadastro-hero h1 {
        font-size: 2rem;
      }
      
      .cadastro-hero p {
        font-size: 1rem;
      }
      
      nav {
        width: 100%;
        margin-top: 1rem;
        justify-content: center;
      }
      
      .header-container {
        flex-direction: column;
        text-align: center;
      }
    }

    @media (max-width: 480px) {
      nav a {
        padding: 0.6rem 1rem;
        font-size: 0.8rem;
      }
      
      .btn-primary {
        padding: 1.2rem 2rem;
        font-size: 1rem;
      }
      
      .form-group input,
      .form-group select,
      .form-group textarea {
        padding: 1rem;
      }
    }
  </style>
</head>

<body>
  <!-- Floating Background Elements -->
  <div class="floating-bg">
    <div class="floating-element" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
    <div class="floating-element" style="top: 20%; right: 10%; animation-delay: 2s;"></div>
    <div class="floating-element" style="bottom: 30%; left: 20%; animation-delay: 4s;"></div>
    <div class="floating-element" style="bottom: 10%; right: 20%; animation-delay: 6s;"></div>
  </div>

  <header>
    <div class="header-container">
      <div class="logo-section">
        <img src="imagens/Logoindex.jpg" alt="ENIAC LINK+" class="logo-header">
      </div>
      <nav>
        <a href="index.php"><i class="fas fa-home"></i>Início</a>
        <a href="vagas.php"><i class="fas fa-briefcase"></i>Vagas</a>
        <a href="cadastro.php" class="active"><i class="fas fa-user-plus"></i>Cadastrar</a>
        <a href="curriculos.php"><i class="fas fa-file-alt"></i>Currículos</a>
        <a href="admin.php"><i class="fas fa-cog"></i>Admin</a>
      </nav>
    </div>
  </header>

  <div class="main-container">
    <div class="cadastro-hero">
      <h1>Cadastre-se Agora</h1>
      <p>Junte-se a milhares de profissionais que encontraram suas oportunidades ideais através da nossa plataforma premium de recrutamento.</p>
    </div>

    <?php if ($mostrar_alerta_vaga): ?>
    <div class="vaga-info-alert">
      <h3><i class="fas fa-star"></i> Candidatura para: <?php echo htmlspecialchars($vaga['titulo']); ?></h3>
      <p><?php echo htmlspecialchars($vaga['descricao']); ?></p>
    </div>
    <?php endif; ?>

    <div class="form-container">
      <div class="form-main">
        <form method="POST" action="processar_cadastro.php" enctype="multipart/form-data">
          <?php if ($mostrar_alerta_vaga): ?>
          <input type="hidden" name="vaga_id" value="<?php echo $vaga_id; ?>">
          <?php endif; ?>
          
          <div class="form-group">
            <label for="nome"><i class="fas fa-user"></i> Nome Completo *</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite seu nome completo">
          </div>

          <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email *</label>
            <input type="email" id="email" name="email" required placeholder="seu@email.com">
          </div>

          <div class="form-group">
            <label for="telefone"><i class="fas fa-phone"></i> Telefone *</label>
            <input type="tel" id="telefone" name="telefone" required placeholder="(11) 99999-9999">
          </div>

          <div class="form-group">
            <label for="idade"><i class="fas fa-calendar"></i> Idade *</label>
            <select id="idade" name="idade" required>
              <option value="">Selecione sua idade</option>
              <?php for($i = 16; $i <= 70; $i++): ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?> anos</option>
              <?php endfor; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="experiencia"><i class="fas fa-briefcase"></i> Experiência Profissional</label>
            <textarea id="experiencia" name="experiencia" placeholder="Descreva sua experiência profissional, principais cargos e responsabilidades..."></textarea>
          </div>

          <div class="form-group">
            <label for="curriculo"><i class="fas fa-file-upload"></i> Currículo (PDF) *</label>
            <div class="file-upload">
              <input type="file" id="curriculo" name="curriculo" accept=".pdf" required>
              <div class="file-upload-content">
                <i class="fas fa-cloud-upload-alt"></i>
                <h4>Clique ou arraste seu currículo aqui</h4>
                <p>Apenas arquivos PDF (máximo 5MB)</p>
              </div>
            </div>
          </div>

          <button type="submit" class="btn-primary">
            <i class="fas fa-paper-plane"></i>
            Finalizar Cadastro
          </button>
        </form>
      </div>

      <div class="form-sidebar">
        <h3><i class="fas fa-star"></i> Por que se cadastrar?</h3>
        <ul class="benefits-list">
          <li><i class="fas fa-check"></i> Acesso às melhores vagas</li>
          <li><i class="fas fa-check"></i> Perfil profissional destacado</li>
          <li><i class="fas fa-check"></i> Notificações personalizadas</li>
          <li><i class="fas fa-check"></i> Suporte especializado</li>
          <li><i class="fas fa-check"></i> Processo seletivo facilitado</li>
        </ul>

        <div class="security-badge">
          <i class="fas fa-shield-alt"></i>
          <h4>100% Seguro</h4>
          <p>Seus dados estão protegidos com criptografia de ponta</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // JavaScript Premium para Interações
    document.addEventListener('DOMContentLoaded', function() {
      // Animação de entrada
      const elements = document.querySelectorAll('.form-main, .form-sidebar, .cadastro-hero');
      elements.forEach((el, index) => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
          el.style.opacity = '1';
          el.style.transform = 'translateY(0)';
        }, index * 200);
      });

      // Preview do arquivo selecionado
      const fileInput = document.getElementById('curriculo');
      fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const uploadContent = document.querySelector('.file-upload-content');
        
        if (file) {
          uploadContent.innerHTML = `
            <i class="fas fa-check-circle" style="color: #4facfe;"></i>
            <h4 style="color: #4facfe;">Arquivo Selecionado!</h4>
            <p>${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)</p>
          `;
        }
      });

      // Efeito de foco nos inputs
      const inputs = document.querySelectorAll('input, select, textarea');
      inputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.parentNode.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
          this.parentNode.style.transform = 'scale(1)';
        });
      });

      // Validação em tempo real
      const form = document.querySelector('form');
      form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
          if (!field.value.trim()) {
            field.style.borderColor = '#e74c3c';
            isValid = false;
          } else {
            field.style.borderColor = '#4facfe';
          }
        });

        if (!isValid) {
          e.preventDefault();
          alert('Por favor, preencha todos os campos obrigatórios.');
        }
      });
    });
  </script>
</body>
</html>
