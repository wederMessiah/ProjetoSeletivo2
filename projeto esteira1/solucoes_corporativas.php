<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soluções Corporativas - ENIAC LINK+</title>
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
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
    }

    nav a:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
      color: #ffffff;
    }

    /* Main Container */
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

    /* Hero Section */
    .hero-section {
      text-align: center;
      margin-bottom: 4rem;
      position: relative;
    }

    .hero-section h1 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(3rem, 5vw, 4rem);
      font-weight: 800;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1.5rem;
    }

    .hero-section p {
      font-size: 1.3rem;
      color: var(--text-secondary);
      max-width: 800px;
      margin: 0 auto 3rem;
      line-height: 1.8;
    }

    /* Solutions Grid */
    .solutions-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 2rem;
      margin-bottom: 4rem;
    }

    .solution-card {
      background: white;
      border-radius: var(--border-radius-xl);
      padding: 3rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      transition: var(--transition-smooth);
      position: relative;
      overflow: hidden;
    }

    .solution-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: var(--success-gradient);
    }

    .solution-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .solution-icon {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      background: var(--success-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 2rem;
      margin-bottom: 2rem;
    }

    .solution-card h3 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .solution-card p {
      color: var(--text-secondary);
      margin-bottom: 2rem;
      line-height: 1.8;
    }

    .solution-features {
      list-style: none;
      margin-bottom: 2rem;
    }

    .solution-features li {
      padding: 0.5rem 0;
      display: flex;
      align-items: center;
      gap: 0.8rem;
      color: var(--text-secondary);
    }

    .solution-features li i {
      color: #4facfe;
      font-size: 1.1rem;
    }

    .btn-solution {
      background: var(--success-gradient);
      color: white;
      padding: 1rem 2rem;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: var(--transition-smooth);
    }

    .btn-solution:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(79, 172, 254, 0.4);
      color: white;
      text-decoration: none;
    }

    /* CTA Section */
    .cta-section {
      background: var(--primary-gradient);
      color: white;
      padding: 4rem 2rem;
      border-radius: var(--border-radius-xl);
      text-align: center;
      margin: 4rem 0;
    }

    .cta-section h2 {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 1rem;
    }

    .cta-section p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      opacity: 0.9;
    }

    .cta-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-cta {
      padding: 1.2rem 2.5rem;
      border-radius: var(--border-radius-lg);
      font-weight: 700;
      text-decoration: none;
      transition: var(--transition-smooth);
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
    }

    .btn-cta.primary {
      background: white;
      color: var(--text-primary);
    }

    .btn-cta.secondary {
      background: rgba(255, 255, 255, 0.2);
      color: white;
      border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .btn-cta:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    /* Stats Section */
    .stats-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      margin: 4rem 0;
    }

    .stat-card {
      background: white;
      padding: 2rem;
      border-radius: var(--border-radius-lg);
      text-align: center;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .stat-number {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      background: var(--success-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: block;
      margin-bottom: 0.5rem;
    }

    .stat-label {
      color: var(--text-secondary);
      font-weight: 600;
    }

    /* Responsividade */
    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        gap: 1rem;
      }

      nav {
        flex-wrap: wrap;
      }

      .solutions-grid {
        grid-template-columns: 1fr;
      }

      .solution-card {
        padding: 2rem;
      }

      .cta-buttons {
        flex-direction: column;
        align-items: center;
      }

      .stats-section {
        grid-template-columns: repeat(2, 1fr);
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="header-container">
      <div class="logo-section">
        <img src="imagens/Logoindex.jpg" alt="ENIAC LINK+" class="logo-header">
      </div>
      <nav>
        <a href="index.php"><i class="fas fa-home"></i>Início</a>
        <a href="vagas.php"><i class="fas fa-briefcase"></i>Vagas</a>
        <a href="cadastro.php"><i class="fas fa-user-plus"></i>Cadastrar</a>
        <a href="curriculos.php"><i class="fas fa-file-alt"></i>Currículos</a>
        <a href="admin.php"><i class="fas fa-cog"></i>Admin</a>
      </nav>
    </div>
  </header>

  <div class="main-container">
    <section class="hero-section">
      <h1>Soluções Corporativas</h1>
      <p>Transforme seu processo de recrutamento com nossas soluções tecnológicas avançadas. Otimize custos, acelere contratações e encontre os melhores talentos para sua empresa.</p>
    </section>

    <!-- Estatísticas -->
    <section class="stats-section">
      <div class="stat-card">
        <span class="stat-number">85%</span>
        <span class="stat-label">Redução no Tempo de Contratação</span>
      </div>
      <div class="stat-card">
        <span class="stat-number">60%</span>
        <span class="stat-label">Economia em Custos de RH</span>
      </div>
      <div class="stat-card">
        <span class="stat-number">95%</span>
        <span class="stat-label">Taxa de Retenção</span>
      </div>
      <div class="stat-card">
        <span class="stat-number">350+</span>
        <span class="stat-label">Empresas Parceiras</span>
      </div>
    </section>

    <!-- Grid de Soluções -->
    <section class="solutions-grid">
      <div class="solution-card">
        <div class="solution-icon">
          <i class="fas fa-robot"></i>
        </div>
        <h3>Recrutamento Inteligente</h3>
        <p>IA avançada para triagem automática de currículos, matching de candidatos e análise preditiva de fit cultural.</p>
        <ul class="solution-features">
          <li><i class="fas fa-check"></i>Triagem automática com IA</li>
          <li><i class="fas fa-check"></i>Matching de habilidades</li>
          <li><i class="fas fa-check"></i>Análise de fit cultural</li>
          <li><i class="fas fa-check"></i>Relatórios preditivos</li>
        </ul>
        <a href="#" class="btn-solution">
          Saiba Mais <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="solution-card">
        <div class="solution-icon">
          <i class="fas fa-users-cog"></i>
        </div>
        <h3>Gestão de Talentos</h3>
        <p>Plataforma completa para gerenciar todo ciclo de vida do colaborador, desde a contratação até desenvolvimento.</p>
        <ul class="solution-features">
          <li><i class="fas fa-check"></i>Onboarding automatizado</li>
          <li><i class="fas fa-check"></i>Avaliações de performance</li>
          <li><i class="fas fa-check"></i>Planos de carreira</li>
          <li><i class="fas fa-check"></i>Feedback 360°</li>
        </ul>
        <a href="#" class="btn-solution">
          Saiba Mais <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="solution-card">
        <div class="solution-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <h3>Analytics & BI</h3>
        <p>Dashboards inteligentes com métricas de RH, KPIs de recrutamento e insights estratégicos para tomada de decisão.</p>
        <ul class="solution-features">
          <li><i class="fas fa-check"></i>Dashboards em tempo real</li>
          <li><i class="fas fa-check"></i>KPIs personalizados</li>
          <li><i class="fas fa-check"></i>Relatórios automatizados</li>
          <li><i class="fas fa-check"></i>Insights preditivos</li>
        </ul>
        <a href="#" class="btn-solution">
          Saiba Mais <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="solution-card">
        <div class="solution-icon">
          <i class="fas fa-video"></i>
        </div>
        <h3>Entrevistas Digitais</h3>
        <p>Plataforma de entrevistas por vídeo com IA para análise comportamental e avaliação técnica automatizada.</p>
        <ul class="solution-features">
          <li><i class="fas fa-check"></i>Entrevistas por vídeo</li>
          <li><i class="fas fa-check"></i>Análise comportamental IA</li>
          <li><i class="fas fa-check"></i>Testes técnicos integrados</li>
          <li><i class="fas fa-check"></i>Gravação e revisão</li>
        </ul>
        <a href="#" class="btn-solution">
          Saiba Mais <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="solution-card">
        <div class="solution-icon">
          <i class="fas fa-shield-alt"></i>
        </div>
        <h3>Compliance & Segurança</h3>
        <p>Garanta conformidade com LGPD, auditorias automáticas e segurança enterprise para dados sensíveis.</p>
        <ul class="solution-features">
          <li><i class="fas fa-check"></i>Conformidade LGPD</li>
          <li><i class="fas fa-check"></i>Auditorias automáticas</li>
          <li><i class="fas fa-check"></i>Criptografia avançada</li>
          <li><i class="fas fa-check"></i>Backup seguro</li>
        </ul>
        <a href="#" class="btn-solution">
          Saiba Mais <i class="fas fa-arrow-right"></i>
        </a>
      </div>

      <div class="solution-card">
        <div class="solution-icon">
          <i class="fas fa-plug"></i>
        </div>
        <h3>Integrações Empresariais</h3>
        <p>Conecte com seus sistemas existentes: ERP, CRM, HRIS e outras ferramentas através de APIs robustas.</p>
        <ul class="solution-features">
          <li><i class="fas fa-check"></i>API REST completa</li>
          <li><i class="fas fa-check"></i>Integração ERP/CRM</li>
          <li><i class="fas fa-check"></i>SSO empresarial</li>
          <li><i class="fas fa-check"></i>Webhooks em tempo real</li>
        </ul>
        <a href="#" class="btn-solution">
          Saiba Mais <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
      <h2>Pronto para Revolucionar seu RH?</h2>
      <p>Agende uma demonstração personalizada e descubra como nossas soluções podem transformar seus processos de recrutamento.</p>
      <div class="cta-buttons">
        <a href="#" class="btn-cta primary">
          <i class="fas fa-calendar"></i>
          Agendar Demo
        </a>
        <a href="#" class="btn-cta secondary">
          <i class="fas fa-phone"></i>
          Falar com Consultor
        </a>
      </div>
    </section>
  </div>

  <script>
    // Animações de entrada
    window.addEventListener('load', function() {
      const cards = document.querySelectorAll('.solution-card, .stat-card');
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 100);
      });
    });
  </script>
</body>
</html>
