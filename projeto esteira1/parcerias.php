<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parcerias Estratégicas - ENIAC LINK+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    /* CSS Variables Premium */
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --premium-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
      --partnership-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
      --enterprise-gradient: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%);
      --text-primary: #2c3e50;
      --text-secondary: #7f8c8d;
      --border-radius-lg: 16px;
      --border-radius-xl: 24px;
      --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: var(--primary-gradient);
      color: var(--text-primary);
      min-height: 100vh;
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
    }

    .logo-header {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
      border: 3px solid rgba(255, 255, 255, 0.4);
    }

    nav {
      display: flex;
      gap: 0.3rem;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 25px;
      padding: 0.5rem;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      padding: 1rem 1.8rem;
      border-radius: 20px;
      transition: var(--transition-smooth);
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-family: 'Poppins', sans-serif;
    }

    nav a:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
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
      min-height: calc(100vh - 120px);
    }

    /* Hero Section */
    .hero-section {
      text-align: center;
      margin-bottom: 4rem;
      padding: 3rem 0;
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
      border-radius: var(--border-radius-xl);
      border: 1px solid rgba(102, 126, 234, 0.2);
    }

    .hero-section h1 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(2.5rem, 4vw, 3.5rem);
      font-weight: 800;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
    }

    .hero-section p {
      font-size: 1.3rem;
      color: var(--text-secondary);
      max-width: 700px;
      margin: 0 auto 2rem;
      line-height: 1.6;
    }

    .hero-stats {
      display: flex;
      justify-content: center;
      gap: 3rem;
      margin-top: 2rem;
    }

    .hero-stat {
      text-align: center;
    }

    .hero-stat-number {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      background: var(--premium-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-stat-label {
      color: var(--text-secondary);
      font-weight: 600;
      margin-top: 0.5rem;
    }

    /* Partnership Types */
    .partnership-types {
      margin-bottom: 4rem;
    }

    .section-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .section-title {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .section-subtitle {
      font-size: 1.1rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
    }

    .types-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .type-card {
      background: white;
      padding: 2.5rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      position: relative;
      overflow: hidden;
      transition: var(--transition-smooth);
      text-align: center;
    }

    .type-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
    }

    .type-card.tech::before { background: var(--success-gradient); }
    .type-card.enterprise::before { background: var(--premium-gradient); }
    .type-card.strategic::before { background: var(--warning-gradient); }

    .type-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .type-icon {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 2rem;
      margin: 0 auto 1.5rem;
    }

    .type-icon.tech { background: var(--success-gradient); }
    .type-icon.enterprise { background: var(--premium-gradient); }
    .type-icon.strategic { background: var(--warning-gradient); }

    .type-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .type-description {
      color: var(--text-secondary);
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .type-benefits {
      list-style: none;
      text-align: left;
    }

    .type-benefits li {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: var(--text-secondary);
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }

    .type-benefits li::before {
      content: '✓';
      color: #27ae60;
      font-weight: bold;
    }

    /* Partners Showcase */
    .partners-showcase {
      margin-bottom: 4rem;
      padding: 3rem 0;
      background: linear-gradient(135deg, rgba(168, 237, 234, 0.1), rgba(254, 214, 227, 0.1));
      border-radius: var(--border-radius-xl);
    }

    .partners-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .partner-card {
      background: white;
      padding: 2rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: var(--transition-smooth);
      border: 1px solid rgba(168, 237, 234, 0.3);
    }

    .partner-card:hover {
      transform: translateY(-5px);
    }

    .partner-logo {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: var(--partnership-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      color: white;
      font-size: 1.5rem;
      font-weight: bold;
    }

    .partner-name {
      font-family: 'Poppins', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .partner-category {
      color: var(--text-secondary);
      font-size: 0.9rem;
      margin-bottom: 1rem;
    }

    .partner-description {
      color: var(--text-secondary);
      font-size: 0.9rem;
      line-height: 1.5;
    }

    /* Benefits Section */
    .benefits-section {
      margin-bottom: 4rem;
    }

    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 2rem;
    }

    .benefit-card {
      background: white;
      padding: 2rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      display: flex;
      gap: 1.5rem;
      transition: var(--transition-smooth);
    }

    .benefit-card:hover {
      transform: translateY(-3px);
    }

    .benefit-icon {
      width: 60px;
      height: 60px;
      border-radius: 15px;
      background: var(--enterprise-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.3rem;
      flex-shrink: 0;
    }

    .benefit-content h3 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .benefit-content p {
      color: var(--text-secondary);
      line-height: 1.6;
    }

    /* CTA Section */
    .cta-section {
      background: var(--primary-gradient);
      color: white;
      padding: 4rem 3rem;
      border-radius: var(--border-radius-xl);
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .cta-section::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% { transform: translate(0, 0) rotate(0deg); }
      50% { transform: translate(-20px, -20px) rotate(5deg); }
    }

    .cta-content {
      position: relative;
      z-index: 2;
    }

    .cta-title {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 1rem;
    }

    .cta-description {
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
      padding: 1rem 2rem;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      font-weight: 600;
      transition: var(--transition-smooth);
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-family: 'Poppins', sans-serif;
    }

    .btn-white {
      background: white;
      color: var(--text-primary);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-outline {
      background: transparent;
      color: white;
      border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .btn-cta:hover {
      transform: translateY(-3px);
      text-decoration: none;
    }

    .btn-white:hover {
      color: var(--text-primary);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
    }

    .btn-outline:hover {
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }

    /* Responsividade */
    @media (max-width: 768px) {
      .hero-stats {
        flex-direction: column;
        gap: 1.5rem;
      }
      
      .types-grid {
        grid-template-columns: 1fr;
      }
      
      .partners-grid {
        grid-template-columns: 1fr;
      }
      
      .benefits-grid {
        grid-template-columns: 1fr;
      }
      
      .cta-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .header-container {
        flex-direction: column;
        gap: 1rem;
      }
      
      nav {
        flex-wrap: wrap;
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
    <!-- Hero Section -->
    <div class="hero-section">
      <h1>Parcerias Estratégicas</h1>
      <p>Conectamos empresas visionárias e profissionais excepcionais através de parcerias que geram resultados extraordinários e transformam o mercado de trabalho</p>
      
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="hero-stat-number">250+</div>
          <div class="hero-stat-label">Empresas Parceiras</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-number">98%</div>
          <div class="hero-stat-label">Taxa de Sucesso</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-number">15k+</div>
          <div class="hero-stat-label">Conexões Realizadas</div>
        </div>
      </div>
    </div>

    <!-- Partnership Types -->
    <div class="partnership-types">
      <div class="section-header">
        <h2 class="section-title">Tipos de Parcerias</h2>
        <p class="section-subtitle">Oferecemos diferentes modalidades de parceria para atender às necessidades específicas de cada empresa e maximizar os resultados</p>
      </div>

      <div class="types-grid">
        <div class="type-card tech">
          <div class="type-icon tech">
            <i class="fas fa-rocket"></i>
          </div>
          <h3 class="type-title">Parceria Tecnológica</h3>
          <p class="type-description">Integração completa com sistemas de RH e ATS para otimização de processos e automação inteligente</p>
          <ul class="type-benefits">
            <li>Integração API completa</li>
            <li>Automação de processos</li>
            <li>Dashboard personalizado</li>
            <li>Suporte técnico especializado</li>
            <li>Updates e melhorias contínuas</li>
          </ul>
        </div>

        <div class="type-card enterprise">
          <div class="type-icon enterprise">
            <i class="fas fa-handshake"></i>
          </div>
          <h3 class="type-title">Parceria Empresarial</h3>
          <p class="type-description">Soluções customizadas para grandes corporações com volume elevado de contratações e necessidades específicas</p>
          <ul class="type-benefits">
            <li>Account Manager dedicado</li>
            <li>SLA personalizado</li>
            <li>Relatórios executivos</li>
            <li>Treinamento de equipes</li>
            <li>Consultoria estratégica</li>
          </ul>
        </div>

        <div class="type-card strategic">
          <div class="type-icon strategic">
            <i class="fas fa-chart-line"></i>
          </div>
          <h3 class="type-title">Parceria Estratégica</h3>
          <p class="type-description">Alianças de longo prazo focadas em crescimento mútuo, inovação e transformação digital do RH</p>
          <ul class="type-benefits">
            <li>Co-desenvolvimento de soluções</li>
            <li>Acesso a beta features</li>
            <li>Marketing conjunto</li>
            <li>Participação em roadmap</li>
            <li>Exclusividade de mercado</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Partners Showcase -->
    <div class="partners-showcase">
      <div class="section-header">
        <h2 class="section-title">Nossos Parceiros</h2>
        <p class="section-subtitle">Empresas líderes que confiam em nossa plataforma para transformar seus processos de recrutamento</p>
      </div>

      <div class="partners-grid">
        <div class="partner-card">
          <div class="partner-logo">TI</div>
          <div class="partner-name">TechInnovate Corp</div>
          <div class="partner-category">Tecnologia</div>
          <p class="partner-description">Líder em soluções de IA e machine learning com foco em transformação digital empresarial</p>
        </div>

        <div class="partner-card">
          <div class="partner-logo">GF</div>
          <div class="partner-name">Global Finance Ltd</div>
          <div class="partner-category">Serviços Financeiros</div>
          <p class="partner-description">Instituição financeira internacional especializada em soluções corporativas e investimentos</p>
        </div>

        <div class="partner-card">
          <div class="partner-logo">HS</div>
          <div class="partner-name">HealthSystem Pro</div>
          <div class="partner-category">Saúde</div>
          <p class="partner-description">Rede de hospitais e clínicas com tecnologia avançada em cuidados médicos especializados</p>
        </div>

        <div class="partner-card">
          <div class="partner-logo">EC</div>
          <div class="partner-name">EduConnect</div>
          <div class="partner-category">Educação</div>
          <p class="partner-description">Plataforma educacional que conecta instituições de ensino com profissionais qualificados</p>
        </div>

        <div class="partner-card">
          <div class="partner-logo">RS</div>
          <div class="partner-name">RetailSolutions</div>
          <div class="partner-category">Varejo</div>
          <p class="partner-description">Cadeia de varejo omnichannel com presença nacional e estratégia digital avançada</p>
        </div>

        <div class="partner-card">
          <div class="partner-logo">ML</div>
          <div class="partner-name">ManufacturingLeader</div>
          <div class="partner-category">Indústria</div>
          <p class="partner-description">Indústria 4.0 especializada em automação e processos sustentáveis de manufatura</p>
        </div>
      </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits-section">
      <div class="section-header">
        <h2 class="section-title">Benefícios da Parceria</h2>
        <p class="section-subtitle">Vantagens exclusivas que nossas parcerias proporcionam para impulsionar o crescimento do seu negócio</p>
      </div>

      <div class="benefits-grid">
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fas fa-users-cog"></i>
          </div>
          <div class="benefit-content">
            <h3>Acesso a Talentos Premium</h3>
            <p>Base exclusiva de candidatos pré-qualificados e talentos raros do mercado, com avaliação técnica e comportamental completa</p>
          </div>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fas fa-clock"></i>
          </div>
          <div class="benefit-content">
            <h3>Redução de Time-to-Hire</h3>
            <p>Processos otimizados e automação inteligente que reduzem em até 70% o tempo de contratação sem comprometer a qualidade</p>
          </div>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fas fa-chart-bar"></i>
          </div>
          <div class="benefit-content">
            <h3>Analytics Avançado</h3>
            <p>Dashboards personalizados com métricas de performance, previsões de tendências e insights estratégicos para RH</p>
          </div>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <div class="benefit-content">
            <h3>Compliance e Segurança</h3>
            <p>Conformidade total com LGPD, ISO 27001 e melhores práticas de segurança de dados e processos de recrutamento</p>
          </div>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fas fa-handshake"></i>
          </div>
          <div class="benefit-content">
            <h3>Suporte Especializado</h3>
            <p>Equipe dedicada de consultores em RH e tecnologia para garantir o sucesso contínuo da sua estratégia de talentos</p>
          </div>
        </div>

        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="fas fa-cog"></i>
          </div>
          <div class="benefit-content">
            <h3>Integração Personalizada</h3>
            <p>APIs robustas e integrações customizadas com seus sistemas existentes para fluxo de trabalho sem interrupções</p>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
      <div class="cta-content">
        <h2 class="cta-title">Pronto para Transformar seu RH?</h2>
        <p class="cta-description">Junte-se às empresas líderes que já revolucionaram seus processos de recrutamento através de nossas parcerias estratégicas</p>
        
        <div class="cta-buttons">
          <a href="#" class="btn-cta btn-white">
            <i class="fas fa-calendar-alt"></i>
            Agendar Apresentação
          </a>
          <a href="#" class="btn-cta btn-outline">
            <i class="fas fa-download"></i>
            Baixar Proposta
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Animações de entrada
    window.addEventListener('load', function() {
      const elements = document.querySelectorAll('.type-card, .partner-card, .benefit-card');
      elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
          element.style.opacity = '1';
          element.style.transform = 'translateY(0)';
        }, index * 100);
      });

      // Animação dos números das estatísticas
      const numbers = document.querySelectorAll('.hero-stat-number');
      numbers.forEach(number => {
        const text = number.textContent;
        const isPercentage = text.includes('%');
        const hasPlus = text.includes('+');
        const finalValue = parseInt(text.replace(/[^0-9]/g, ''));
        
        let currentValue = 0;
        const increment = finalValue / 50;
        
        const updateNumber = () => {
          if (currentValue < finalValue) {
            currentValue += increment;
            let displayValue = Math.floor(currentValue);
            if (isPercentage) displayValue += '%';
            if (hasPlus) displayValue += '+';
            number.textContent = displayValue;
            requestAnimationFrame(updateNumber);
          } else {
            number.textContent = text;
          }
        };
        
        setTimeout(updateNumber, 500);
      });
    });

    // Intersection Observer para animações
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
        }
      });
    }, { threshold: 0.1 });

    document.querySelectorAll('.hero-section, .section-header').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'all 0.8s ease';
      observer.observe(el);
    });
  </script>
</body>
</html>
