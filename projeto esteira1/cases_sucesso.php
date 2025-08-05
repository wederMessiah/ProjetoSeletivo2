<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cases de Sucesso - ENIAC LINK+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    /* CSS Variables Premium */
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --premium-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
      --case-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
      --testimonial-gradient: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%);
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

    .hero-metrics {
      display: flex;
      justify-content: center;
      gap: 3rem;
      margin-top: 2rem;
    }

    .hero-metric {
      text-align: center;
    }

    .hero-metric-number {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      background: var(--success-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .hero-metric-label {
      color: var(--text-secondary);
      font-weight: 600;
      margin-top: 0.5rem;
    }

    /* Section Headers */
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

    /* Featured Cases */
    .featured-cases {
      margin-bottom: 4rem;
    }

    .cases-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 2rem;
    }

    .case-card {
      background: white;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      overflow: hidden;
      transition: var(--transition-smooth);
      position: relative;
    }

    .case-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: var(--success-gradient);
    }

    .case-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .case-header {
      padding: 2rem;
      background: linear-gradient(135deg, rgba(79, 172, 254, 0.1), rgba(0, 242, 254, 0.1));
    }

    .case-company {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .company-logo {
      width: 60px;
      height: 60px;
      border-radius: 15px;
      background: var(--case-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
    }

    .company-info h3 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--text-primary);
    }

    .company-info p {
      color: var(--text-secondary);
      font-size: 0.9rem;
    }

    .case-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .case-description {
      color: var(--text-secondary);
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .case-challenge {
      background: rgba(255, 193, 7, 0.1);
      border-left: 4px solid #ffc107;
      padding: 1rem;
      margin: 1.5rem 0;
      border-radius: 0 8px 8px 0;
    }

    .case-challenge h4 {
      color: #856404;
      font-weight: 600;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }

    .case-challenge p {
      color: #856404;
      font-size: 0.9rem;
      line-height: 1.5;
    }

    .case-content {
      padding: 0 2rem 2rem;
    }

    .case-metrics {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      gap: 1rem;
      margin: 1.5rem 0;
    }

    .metric {
      text-align: center;
      padding: 1rem;
      background: rgba(79, 172, 254, 0.05);
      border-radius: var(--border-radius-lg);
    }

    .metric-value {
      font-family: 'Poppins', sans-serif;
      font-size: 1.8rem;
      font-weight: 800;
      background: var(--success-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .metric-label {
      color: var(--text-secondary);
      font-size: 0.8rem;
      font-weight: 600;
      margin-top: 0.3rem;
    }

    .case-solution {
      background: rgba(39, 174, 96, 0.1);
      border-left: 4px solid #27ae60;
      padding: 1rem;
      margin: 1.5rem 0;
      border-radius: 0 8px 8px 0;
    }

    .case-solution h4 {
      color: #1e8449;
      font-weight: 600;
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }

    .case-solution p {
      color: #1e8449;
      font-size: 0.9rem;
      line-height: 1.5;
    }

    /* Testimonials Section */
    .testimonials-section {
      margin-bottom: 4rem;
      padding: 3rem 0;
      background: linear-gradient(135deg, rgba(168, 237, 234, 0.1), rgba(254, 214, 227, 0.1));
      border-radius: var(--border-radius-xl);
    }

    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .testimonial-card {
      background: white;
      padding: 2.5rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(168, 237, 234, 0.3);
      position: relative;
      transition: var(--transition-smooth);
    }

    .testimonial-card::before {
      content: '"';
      position: absolute;
      top: -10px;
      left: 20px;
      font-size: 4rem;
      color: rgba(79, 172, 254, 0.2);
      font-family: serif;
    }

    .testimonial-card:hover {
      transform: translateY(-5px);
    }

    .testimonial-text {
      color: var(--text-secondary);
      font-style: italic;
      line-height: 1.6;
      margin-bottom: 2rem;
      font-size: 1.1rem;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .author-avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: var(--testimonial-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
    }

    .author-info h4 {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      color: var(--text-primary);
    }

    .author-info p {
      color: var(--text-secondary);
      font-size: 0.9rem;
    }

    /* Results Grid */
    .results-section {
      margin-bottom: 4rem;
    }

    .results-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
    }

    .result-card {
      background: white;
      padding: 2rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      border: 1px solid rgba(102, 126, 234, 0.1);
      transition: var(--transition-smooth);
    }

    .result-card:hover {
      transform: translateY(-5px);
    }

    .result-icon {
      width: 60px;
      height: 60px;
      border-radius: 15px;
      margin: 0 auto 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.3rem;
    }

    .result-icon.time { background: var(--success-gradient); }
    .result-icon.cost { background: var(--premium-gradient); }
    .result-icon.quality { background: var(--warning-gradient); }
    .result-icon.satisfaction { background: var(--primary-gradient); }

    .result-number {
      font-family: 'Poppins', sans-serif;
      font-size: 2rem;
      font-weight: 800;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .result-label {
      color: var(--text-secondary);
      font-weight: 600;
      font-size: 0.9rem;
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
      .hero-metrics {
        flex-direction: column;
        gap: 1.5rem;
      }
      
      .cases-grid {
        grid-template-columns: 1fr;
      }
      
      .testimonials-grid {
        grid-template-columns: 1fr;
      }
      
      .results-grid {
        grid-template-columns: repeat(2, 1fr);
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

    @media (max-width: 480px) {
      .results-grid {
        grid-template-columns: 1fr;
      }
      
      .case-metrics {
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
    <!-- Hero Section -->
    <div class="hero-section">
      <h1>Cases de Sucesso</h1>
      <p>Histórias reais de transformação e resultados excepcionais alcançados através de nossa plataforma de recrutamento inovadora</p>
      
      <div class="hero-metrics">
        <div class="hero-metric">
          <div class="hero-metric-number">500+</div>
          <div class="hero-metric-label">Empresas Transformadas</div>
        </div>
        <div class="hero-metric">
          <div class="hero-metric-number">10M+</div>
          <div class="hero-metric-label">Candidatos Conectados</div>
        </div>
        <div class="hero-metric">
          <div class="hero-metric-number">85%</div>
          <div class="hero-metric-label">Redução no Time-to-Hire</div>
        </div>
      </div>
    </div>

    <!-- Featured Cases -->
    <div class="featured-cases">
      <div class="section-header">
        <h2 class="section-title">Cases em Destaque</h2>
        <p class="section-subtitle">Conheça as histórias de sucesso de empresas que revolucionaram seus processos de recrutamento</p>
      </div>

      <div class="cases-grid">
        <div class="case-card">
          <div class="case-header">
            <div class="case-company">
              <div class="company-logo">TI</div>
              <div class="company-info">
                <h3>TechInnovate Solutions</h3>
                <p>Tecnologia • 2.500 funcionários</p>
              </div>
            </div>
            <h2 class="case-title">Transformação Digital Completa do RH</h2>
            <p class="case-description">Como uma empresa de tecnologia reduziu em 75% o tempo de contratação e aumentou a qualidade dos candidatos através da automação inteligente.</p>
          </div>
          
          <div class="case-content">
            <div class="case-challenge">
              <h4>🎯 DESAFIO</h4>
              <p>Processo manual demorado, alta rotatividade de candidatos e dificuldade para encontrar talentos tech especializados em IA e machine learning.</p>
            </div>
            
            <div class="case-metrics">
              <div class="metric">
                <div class="metric-value">75%</div>
                <div class="metric-label">Redução no Tempo</div>
              </div>
              <div class="metric">
                <div class="metric-value">90%</div>
                <div class="metric-label">Qualidade dos Candidatos</div>
              </div>
              <div class="metric">
                <div class="metric-value">60%</div>
                <div class="metric-label">Redução de Custos</div>
              </div>
            </div>
            
            <div class="case-solution">
              <h4>✅ SOLUÇÃO</h4>
              <p>Implementação de IA para triagem automática, integração com GitHub para avaliação técnica e pipeline de entrevistas digitais personalizadas.</p>
            </div>
          </div>
        </div>

        <div class="case-card">
          <div class="case-header">
            <div class="case-company">
              <div class="company-logo">GF</div>
              <div class="company-info">
                <h3>Global Finance Corp</h3>
                <p>Serviços Financeiros • 5.000 funcionários</p>
              </div>
            </div>
            <h2 class="case-title">Expansão Internacional de Talentos</h2>
            <p class="case-description">Estratégia global de recrutamento que permitiu a contratação de 300+ profissionais em 12 países simultaneamente.</p>
          </div>
          
          <div class="case-content">
            <div class="case-challenge">
              <h4>🎯 DESAFIO</h4>
              <p>Necessidade de expansão rápida em mercados internacionais com compliance local e barreiras linguísticas e culturais.</p>
            </div>
            
            <div class="case-metrics">
              <div class="metric">
                <div class="metric-value">300+</div>
                <div class="metric-label">Contratações</div>
              </div>
              <div class="metric">
                <div class="metric-value">12</div>
                <div class="metric-label">Países</div>
              </div>
              <div class="metric">
                <div class="metric-value">95%</div>
                <div class="metric-label">Retenção</div>
              </div>
            </div>
            
            <div class="case-solution">
              <h4>✅ SOLUÇÃO</h4>
              <p>Plataforma multilíngue com compliance automático, parceiros locais integrados e avaliação cultural adaptativa por região.</p>
            </div>
          </div>
        </div>

        <div class="case-card">
          <div class="case-header">
            <div class="case-company">
              <div class="company-logo">HS</div>
              <div class="company-info">
                <h3>HealthSystem Plus</h3>
                <p>Saúde • 8.000 funcionários</p>
              </div>
            </div>
            <h2 class="case-title">Recrutamento Especializado em Saúde</h2>
            <p class="case-description">Solução customizada para contratação de profissionais de saúde com verificação automática de certificações e licenças.</p>
          </div>
          
          <div class="case-content">
            <div class="case-challenge">
              <h4>🎯 DESAFIO</h4>
              <p>Verificação manual de licenças médicas, alta demanda por especialistas e necessidade de compliance rigoroso com regulamentações de saúde.</p>
            </div>
            
            <div class="case-metrics">
              <div class="metric">
                <div class="metric-value">80%</div>
                <div class="metric-label">Automação</div>
              </div>
              <div class="metric">
                <div class="metric-value">50%</div>
                <div class="metric-label">Tempo Reduzido</div>
              </div>
              <div class="metric">
                <div class="metric-value">100%</div>
                <div class="metric-label">Compliance</div>
              </div>
            </div>
            
            <div class="case-solution">
              <h4>✅ SOLUÇÃO</h4>
              <p>Integração com órgãos reguladores para verificação automática, banco de talentos especializado e workflow de aprovação médica.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials-section">
      <div class="section-header">
        <h2 class="section-title">O que Nossos Clientes Dizem</h2>
        <p class="section-subtitle">Depoimentos reais de líderes de RH que transformaram seus processos com nossa plataforma</p>
      </div>

      <div class="testimonials-grid">
        <div class="testimonial-card">
          <p class="testimonial-text">A plataforma ENIAC LINK+ revolucionou completamente nosso processo de recrutamento. Conseguimos reduzir o time-to-hire em 70% e a qualidade dos candidatos melhorou significativamente.</p>
          <div class="testimonial-author">
            <div class="author-avatar">MR</div>
            <div class="author-info">
              <h4>Maria Rodriguez</h4>
              <p>Diretora de RH, TechInnovate Solutions</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-text">A expansão internacional se tornou muito mais eficiente. A automação de compliance e a gestão global de talentos nos pouparam meses de trabalho manual.</p>
          <div class="testimonial-author">
            <div class="author-avatar">JS</div>
            <div class="author-info">
              <h4>John Smith</h4>
              <p>VP Global Talent, Global Finance Corp</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <p class="testimonial-text">Para o setor de saúde, a verificação automática de licenças foi um game-changer. Agora podemos focar no que realmente importa: encontrar os melhores profissionais.</p>
          <div class="testimonial-author">
            <div class="author-avatar">AC</div>
            <div class="author-info">
              <h4>Ana Costa</h4>
              <p>Gerente de Talentos, HealthSystem Plus</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Results Section -->
    <div class="results-section">
      <div class="section-header">
        <h2 class="section-title">Resultados Consolidados</h2>
        <p class="section-subtitle">Métricas de sucesso baseadas em dados reais de nossos clientes</p>
      </div>

      <div class="results-grid">
        <div class="result-card">
          <div class="result-icon time">
            <i class="fas fa-clock"></i>
          </div>
          <div class="result-number">75%</div>
          <div class="result-label">Redução no Time-to-Hire</div>
        </div>

        <div class="result-card">
          <div class="result-icon cost">
            <i class="fas fa-chart-line"></i>
          </div>
          <div class="result-number">60%</div>
          <div class="result-label">Redução de Custos</div>
        </div>

        <div class="result-card">
          <div class="result-icon quality">
            <i class="fas fa-star"></i>
          </div>
          <div class="result-number">90%</div>
          <div class="result-label">Melhoria na Qualidade</div>
        </div>

        <div class="result-card">
          <div class="result-icon satisfaction">
            <i class="fas fa-heart"></i>
          </div>
          <div class="result-number">95%</div>
          <div class="result-label">Satisfação dos Clientes</div>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
      <div class="cta-content">
        <h2 class="cta-title">Seja o Próximo Case de Sucesso</h2>
        <p class="cta-description">Junte-se às empresas líderes que já transformaram seus processos de recrutamento e alcançaram resultados extraordinários</p>
        
        <div class="cta-buttons">
          <a href="#" class="btn-cta btn-white">
            <i class="fas fa-rocket"></i>
            Começar Agora
          </a>
          <a href="#" class="btn-cta btn-outline">
            <i class="fas fa-phone"></i>
            Falar com Consultor
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Animações de entrada
    window.addEventListener('load', function() {
      const elements = document.querySelectorAll('.case-card, .testimonial-card, .result-card');
      elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
          element.style.opacity = '1';
          element.style.transform = 'translateY(0)';
        }, index * 100);
      });

      // Animação dos números das métricas
      const numbers = document.querySelectorAll('.hero-metric-number, .metric-value, .result-number');
      numbers.forEach(number => {
        const text = number.textContent;
        const isPercentage = text.includes('%');
        const hasPlus = text.includes('+');
        const hasM = text.includes('M');
        let finalValue = parseInt(text.replace(/[^0-9]/g, ''));
        
        if (hasM) finalValue = finalValue * 1000000;
        
        let currentValue = 0;
        const increment = finalValue / 50;
        
        const updateNumber = () => {
          if (currentValue < finalValue) {
            currentValue += increment;
            let displayValue = Math.floor(currentValue);
            
            if (hasM && displayValue >= 1000000) {
              displayValue = Math.floor(displayValue / 1000000) + 'M';
            }
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
