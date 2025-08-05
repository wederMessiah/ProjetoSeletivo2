<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>API & Integração - ENIAC LINK+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Fira+Code:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
  
  <style>
    /* CSS Variables Premium */
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --premium-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
      --api-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
      --code-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --text-primary: #2c3e50;
      --text-secondary: #7f8c8d;
      --border-radius-lg: 16px;
      --border-radius-xl: 24px;
      --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      --code-bg: #1e1e1e;
      --code-text: #d4d4d4;
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

    .api-features {
      display: flex;
      justify-content: center;
      gap: 3rem;
      margin-top: 2rem;
    }

    .api-feature {
      text-align: center;
    }

    .api-feature-icon {
      width: 70px;
      height: 70px;
      border-radius: 20px;
      background: var(--success-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.8rem;
      margin: 0 auto 1rem;
    }

    .api-feature-label {
      color: var(--text-secondary);
      font-weight: 600;
      font-size: 1.1rem;
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

    /* API Overview */
    .api-overview {
      margin-bottom: 4rem;
    }

    .overview-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .overview-card {
      background: white;
      padding: 2.5rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      position: relative;
      overflow: hidden;
      transition: var(--transition-smooth);
    }

    .overview-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
    }

    .overview-card.rest::before { background: var(--success-gradient); }
    .overview-card.webhooks::before { background: var(--premium-gradient); }
    .overview-card.sdk::before { background: var(--warning-gradient); }

    .overview-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .overview-icon {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 2rem;
      margin-bottom: 1.5rem;
    }

    .overview-icon.rest { background: var(--success-gradient); }
    .overview-icon.webhooks { background: var(--premium-gradient); }
    .overview-icon.sdk { background: var(--warning-gradient); }

    .overview-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.4rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .overview-description {
      color: var(--text-secondary);
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .overview-features {
      list-style: none;
    }

    .overview-features li {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      color: var(--text-secondary);
      margin-bottom: 0.5rem;
      font-size: 0.95rem;
    }

    .overview-features li::before {
      content: '✓';
      color: #27ae60;
      font-weight: bold;
    }

    /* Code Examples */
    .code-examples {
      margin-bottom: 4rem;
    }

    .examples-tabs {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .tab-button {
      padding: 0.8rem 1.5rem;
      border: 2px solid rgba(102, 126, 234, 0.2);
      background: transparent;
      color: var(--text-primary);
      border-radius: var(--border-radius-lg);
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition-smooth);
      font-family: 'Poppins', sans-serif;
    }

    .tab-button.active {
      background: var(--primary-gradient);
      color: white;
      border-color: transparent;
    }

    .tab-button:hover {
      transform: translateY(-2px);
    }

    .code-container {
      background: var(--code-bg);
      border-radius: var(--border-radius-lg);
      padding: 2rem;
      position: relative;
      overflow: hidden;
    }

    .code-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .code-title {
      color: var(--code-text);
      font-family: 'Fira Code', monospace;
      font-weight: 600;
    }

    .copy-button {
      background: var(--success-gradient);
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      cursor: pointer;
      font-size: 0.9rem;
      transition: var(--transition-smooth);
    }

    .copy-button:hover {
      transform: translateY(-2px);
    }

    .code-block {
      background: #2d2d2d;
      border-radius: 8px;
      padding: 1.5rem;
      font-family: 'Fira Code', monospace;
      font-size: 0.9rem;
      line-height: 1.6;
      color: var(--code-text);
      overflow-x: auto;
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    /* Endpoints Section */
    .endpoints-section {
      margin-bottom: 4rem;
    }

    .endpoints-grid {
      display: grid;
      gap: 1.5rem;
    }

    .endpoint-card {
      background: white;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      overflow: hidden;
      transition: var(--transition-smooth);
    }

    .endpoint-card:hover {
      transform: translateY(-3px);
    }

    .endpoint-header {
      padding: 1.5rem 2rem;
      background: linear-gradient(135deg, rgba(79, 172, 254, 0.1), rgba(0, 242, 254, 0.1));
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .endpoint-method {
      padding: 0.3rem 0.8rem;
      border-radius: 6px;
      font-size: 0.8rem;
      font-weight: 600;
      font-family: 'Fira Code', monospace;
    }

    .method-get { background: rgba(39, 174, 96, 0.2); color: #27ae60; }
    .method-post { background: rgba(52, 152, 219, 0.2); color: #3498db; }
    .method-put { background: rgba(243, 156, 18, 0.2); color: #f39c12; }
    .method-delete { background: rgba(231, 76, 60, 0.2); color: #e74c3c; }

    .endpoint-url {
      font-family: 'Fira Code', monospace;
      font-weight: 600;
      color: var(--text-primary);
    }

    .endpoint-content {
      padding: 2rem;
    }

    .endpoint-description {
      color: var(--text-secondary);
      margin-bottom: 1.5rem;
      line-height: 1.6;
    }

    .endpoint-params {
      background: rgba(79, 172, 254, 0.05);
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
    }

    .params-title {
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
      font-size: 0.9rem;
    }

    .param-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.3rem 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      font-size: 0.85rem;
    }

    .param-item:last-child {
      border-bottom: none;
    }

    .param-name {
      font-family: 'Fira Code', monospace;
      font-weight: 600;
      color: var(--text-primary);
    }

    .param-type {
      color: var(--text-secondary);
      font-style: italic;
    }

    /* SDKs Section */
    .sdks-section {
      margin-bottom: 4rem;
      padding: 3rem 0;
      background: linear-gradient(135deg, rgba(168, 237, 234, 0.1), rgba(254, 214, 227, 0.1));
      border-radius: var(--border-radius-xl);
    }

    .sdks-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .sdk-card {
      background: white;
      padding: 2rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: var(--transition-smooth);
      border: 1px solid rgba(168, 237, 234, 0.3);
    }

    .sdk-card:hover {
      transform: translateY(-5px);
    }

    .sdk-icon {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      background: var(--api-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      color: white;
      font-size: 2rem;
    }

    .sdk-name {
      font-family: 'Poppins', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .sdk-description {
      color: var(--text-secondary);
      font-size: 0.9rem;
      line-height: 1.5;
      margin-bottom: 1.5rem;
    }

    .sdk-button {
      background: var(--primary-gradient);
      color: white;
      border: none;
      padding: 0.8rem 1.5rem;
      border-radius: var(--border-radius-lg);
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition-smooth);
      font-family: 'Poppins', sans-serif;
      text-decoration: none;
      display: inline-block;
    }

    .sdk-button:hover {
      transform: translateY(-3px);
      color: white;
      text-decoration: none;
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
      .api-features {
        flex-direction: column;
        gap: 1.5rem;
      }
      
      .overview-grid {
        grid-template-columns: 1fr;
      }
      
      .sdks-grid {
        grid-template-columns: 1fr;
      }
      
      .examples-tabs {
        flex-direction: column;
        align-items: center;
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
      
      .endpoint-header {
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
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
      <h1>API & Integração</h1>
      <p>APIs robustas e SDKs completos para integrar nossa plataforma de recrutamento com seus sistemas existentes de forma simples e eficiente</p>
      
      <div class="api-features">
        <div class="api-feature">
          <div class="api-feature-icon">
            <i class="fas fa-code"></i>
          </div>
          <div class="api-feature-label">REST API</div>
        </div>
        <div class="api-feature">
          <div class="api-feature-icon">
            <i class="fas fa-bolt"></i>
          </div>
          <div class="api-feature-label">Webhooks</div>
        </div>
        <div class="api-feature">
          <div class="api-feature-icon">
            <i class="fas fa-cube"></i>
          </div>
          <div class="api-feature-label">SDKs</div>
        </div>
      </div>
    </div>

    <!-- API Overview -->
    <div class="api-overview">
      <div class="section-header">
        <h2 class="section-title">Soluções de Integração</h2>
        <p class="section-subtitle">Escolha a forma que melhor se adapta à sua arquitetura e necessidades técnicas</p>
      </div>

      <div class="overview-grid">
        <div class="overview-card rest">
          <div class="overview-icon rest">
            <i class="fas fa-exchange-alt"></i>
          </div>
          <h3 class="overview-title">REST API</h3>
          <p class="overview-description">API RESTful completa com endpoints para todas as funcionalidades da plataforma, incluindo autenticação OAuth 2.0 e rate limiting inteligente.</p>
          <ul class="overview-features">
            <li>Endpoints para vagas, candidatos e processos</li>
            <li>Autenticação OAuth 2.0 e JWT</li>
            <li>Rate limiting e throttling</li>
            <li>Documentação interativa Swagger</li>
            <li>Versionamento semântico</li>
          </ul>
        </div>

        <div class="overview-card webhooks">
          <div class="overview-icon webhooks">
            <i class="fas fa-satellite-dish"></i>
          </div>
          <h3 class="overview-title">Webhooks</h3>
          <p class="overview-description">Receba notificações em tempo real sobre eventos importantes na plataforma através de webhooks seguros e confiáveis.</p>
          <ul class="overview-features">
            <li>Eventos de candidatura e status</li>
            <li>Notificações de entrevistas</li>
            <li>Atualizações de perfil</li>
            <li>Retry automático com backoff</li>
            <li>Verificação de assinatura HMAC</li>
          </ul>
        </div>

        <div class="overview-card sdk">
          <div class="overview-icon sdk">
            <i class="fas fa-tools"></i>
          </div>
          <h3 class="overview-title">SDKs Oficiais</h3>
          <p class="overview-description">Bibliotecas prontas para uso nas principais linguagens de programação, com exemplos completos e documentação detalhada.</p>
          <ul class="overview-features">
            <li>JavaScript/Node.js, Python, PHP</li>
            <li>C#/.NET, Java, Ruby</li>
            <li>Tratamento automático de erros</li>
            <li>Cache inteligente integrado</li>
            <li>Exemplos e tutoriais</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Code Examples -->
    <div class="code-examples">
      <div class="section-header">
        <h2 class="section-title">Exemplos de Código</h2>
        <p class="section-subtitle">Veja como é simples integrar nossa API em sua aplicação</p>
      </div>

      <div class="examples-tabs">
        <button class="tab-button active" onclick="showTab('javascript')">JavaScript</button>
        <button class="tab-button" onclick="showTab('python')">Python</button>
        <button class="tab-button" onclick="showTab('php')">PHP</button>
        <button class="tab-button" onclick="showTab('curl')">cURL</button>
      </div>

      <div class="code-container">
        <div id="javascript" class="tab-content active">
          <div class="code-header">
            <div class="code-title">JavaScript - Buscar Vagas</div>
            <button class="copy-button" onclick="copyCode('js-code')">
              <i class="fas fa-copy"></i> Copiar
            </button>
          </div>
          <div class="code-block" id="js-code">
const EniacLink = require('@eniaclink/sdk');

const client = new EniacLink({
  apiKey: 'seu_api_key_aqui',
  baseUrl: 'https://api.eniaclink.com/v1'
});

// Buscar vagas disponíveis
async function buscarVagas() {
  try {
    const response = await client.vagas.listar({
      status: 'ativa',
      area: 'tecnologia',
      limit: 10
    });
    
    console.log('Vagas encontradas:', response.data);
    return response.data;
  } catch (error) {
    console.error('Erro ao buscar vagas:', error.message);
  }
}

// Criar nova candidatura
async function candidatar(vagaId, candidatoData) {
  try {
    const candidatura = await client.candidaturas.criar({
      vaga_id: vagaId,
      candidato: candidatoData
    });
    
    console.log('Candidatura criada:', candidatura);
    return candidatura;
  } catch (error) {
    console.error('Erro na candidatura:', error.message);
  }
}</div>
        </div>

        <div id="python" class="tab-content">
          <div class="code-header">
            <div class="code-title">Python - Buscar Vagas</div>
            <button class="copy-button" onclick="copyCode('python-code')">
              <i class="fas fa-copy"></i> Copiar
            </button>
          </div>
          <div class="code-block" id="python-code">
import eniaclink

# Configurar cliente
client = eniaclink.Client(
    api_key='seu_api_key_aqui',
    base_url='https://api.eniaclink.com/v1'
)

# Buscar vagas disponíveis
def buscar_vagas():
    try:
        response = client.vagas.listar(
            status='ativa',
            area='tecnologia',
            limit=10
        )
        
        print(f'Vagas encontradas: {response.data}')
        return response.data
    except eniaclink.ApiError as e:
        print(f'Erro ao buscar vagas: {e.message}')

# Criar nova candidatura
def candidatar(vaga_id, candidato_data):
    try:
        candidatura = client.candidaturas.criar(
            vaga_id=vaga_id,
            candidato=candidato_data
        )
        
        print(f'Candidatura criada: {candidatura}')
        return candidatura
    except eniaclink.ApiError as e:
        print(f'Erro na candidatura: {e.message}')

# Exemplo de uso
if __name__ == '__main__':
    vagas = buscar_vagas()
    
    if vagas:
        candidato = {
            'nome': 'João Silva',
            'email': 'joao@email.com',
            'curriculum_url': 'https://exemplo.com/cv.pdf'
        }
        candidatar(vagas[0]['id'], candidato)</div>
        </div>

        <div id="php" class="tab-content">
          <div class="code-header">
            <div class="code-title">PHP - Buscar Vagas</div>
            <button class="copy-button" onclick="copyCode('php-code')">
              <i class="fas fa-copy"></i> Copiar
            </button>
          </div>
          <div class="code-block" id="php-code">
<?php
require_once 'vendor/autoload.php';

use EniacLink\Client;
use EniacLink\Exception\ApiException;

// Configurar cliente
$client = new Client([
    'api_key' => 'seu_api_key_aqui',
    'base_url' => 'https://api.eniaclink.com/v1'
]);

// Buscar vagas disponíveis
function buscarVagas($client) {
    try {
        $response = $client->vagas->listar([
            'status' => 'ativa',
            'area' => 'tecnologia',
            'limit' => 10
        ]);
        
        echo "Vagas encontradas: " . json_encode($response->data) . "\n";
        return $response->data;
    } catch (ApiException $e) {
        echo "Erro ao buscar vagas: " . $e->getMessage() . "\n";
        return null;
    }
}

// Criar nova candidatura
function candidatar($client, $vagaId, $candidatoData) {
    try {
        $candidatura = $client->candidaturas->criar([
            'vaga_id' => $vagaId,
            'candidato' => $candidatoData
        ]);
        
        echo "Candidatura criada: " . json_encode($candidatura) . "\n";
        return $candidatura;
    } catch (ApiException $e) {
        echo "Erro na candidatura: " . $e->getMessage() . "\n";
        return null;
    }
}

// Exemplo de uso
$vagas = buscarVagas($client);

if ($vagas && count($vagas) > 0) {
    $candidato = [
        'nome' => 'João Silva',
        'email' => 'joao@email.com',
        'curriculum_url' => 'https://exemplo.com/cv.pdf'
    ];
    
    candidatar($client, $vagas[0]['id'], $candidato);
}
?></div>
        </div>

        <div id="curl" class="tab-content">
          <div class="code-header">
            <div class="code-title">cURL - Buscar Vagas</div>
            <button class="copy-button" onclick="copyCode('curl-code')">
              <i class="fas fa-copy"></i> Copiar
            </button>
          </div>
          <div class="code-block" id="curl-code">
# Buscar vagas disponíveis
curl -X GET "https://api.eniaclink.com/v1/vagas" \
  -H "Authorization: Bearer seu_api_key_aqui" \
  -H "Content-Type: application/json" \
  -G \
  -d "status=ativa" \
  -d "area=tecnologia" \
  -d "limit=10"

# Criar nova candidatura
curl -X POST "https://api.eniaclink.com/v1/candidaturas" \
  -H "Authorization: Bearer seu_api_key_aqui" \
  -H "Content-Type: application/json" \
  -d '{
    "vaga_id": "123e4567-e89b-12d3-a456-426614174000",
    "candidato": {
      "nome": "João Silva",
      "email": "joao@email.com",
      "telefone": "+5511999999999",
      "curriculum_url": "https://exemplo.com/cv.pdf"
    }
  }'

# Buscar candidaturas de uma vaga
curl -X GET "https://api.eniaclink.com/v1/vagas/123e4567-e89b-12d3-a456-426614174000/candidaturas" \
  -H "Authorization: Bearer seu_api_key_aqui" \
  -H "Content-Type: application/json"

# Atualizar status de candidatura
curl -X PATCH "https://api.eniaclink.com/v1/candidaturas/456e7890-e12b-34d5-a678-942614174001" \
  -H "Authorization: Bearer seu_api_key_aqui" \
  -H "Content-Type: application/json" \
  -d '{
    "status": "em_analise",
    "observacoes": "Candidato interessante, agendar entrevista"
  }'</div>
        </div>
      </div>
    </div>

    <!-- Endpoints Section -->
    <div class="endpoints-section">
      <div class="section-header">
        <h2 class="section-title">Principais Endpoints</h2>
        <p class="section-subtitle">Documentação dos endpoints mais utilizados da nossa API</p>
      </div>

      <div class="endpoints-grid">
        <div class="endpoint-card">
          <div class="endpoint-header">
            <div>
              <span class="endpoint-method method-get">GET</span>
              <span class="endpoint-url">/v1/vagas</span>
            </div>
          </div>
          <div class="endpoint-content">
            <p class="endpoint-description">Lista todas as vagas disponíveis com filtros opcionais</p>
            <div class="endpoint-params">
              <div class="params-title">Parâmetros de Query:</div>
              <div class="param-item">
                <span class="param-name">status</span>
                <span class="param-type">string</span>
              </div>
              <div class="param-item">
                <span class="param-name">area</span>
                <span class="param-type">string</span>
              </div>
              <div class="param-item">
                <span class="param-name">limit</span>
                <span class="param-type">integer</span>
              </div>
            </div>
          </div>
        </div>

        <div class="endpoint-card">
          <div class="endpoint-header">
            <div>
              <span class="endpoint-method method-post">POST</span>
              <span class="endpoint-url">/v1/candidaturas</span>
            </div>
          </div>
          <div class="endpoint-content">
            <p class="endpoint-description">Cria uma nova candidatura para uma vaga específica</p>
            <div class="endpoint-params">
              <div class="params-title">Body Parameters:</div>
              <div class="param-item">
                <span class="param-name">vaga_id</span>
                <span class="param-type">string (required)</span>
              </div>
              <div class="param-item">
                <span class="param-name">candidato</span>
                <span class="param-type">object (required)</span>
              </div>
            </div>
          </div>
        </div>

        <div class="endpoint-card">
          <div class="endpoint-header">
            <div>
              <span class="endpoint-method method-get">GET</span>
              <span class="endpoint-url">/v1/candidaturas/{id}</span>
            </div>
          </div>
          <div class="endpoint-content">
            <p class="endpoint-description">Obtém detalhes de uma candidatura específica</p>
            <div class="endpoint-params">
              <div class="params-title">Path Parameters:</div>
              <div class="param-item">
                <span class="param-name">id</span>
                <span class="param-type">string (required)</span>
              </div>
            </div>
          </div>
        </div>

        <div class="endpoint-card">
          <div class="endpoint-header">
            <div>
              <span class="endpoint-method method-patch">PATCH</span>
              <span class="endpoint-url">/v1/candidaturas/{id}</span>
            </div>
          </div>
          <div class="endpoint-content">
            <p class="endpoint-description">Atualiza o status ou informações de uma candidatura</p>
            <div class="endpoint-params">
              <div class="params-title">Body Parameters:</div>
              <div class="param-item">
                <span class="param-name">status</span>
                <span class="param-type">string</span>
              </div>
              <div class="param-item">
                <span class="param-name">observacoes</span>
                <span class="param-type">string</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SDKs Section -->
    <div class="sdks-section">
      <div class="section-header">
        <h2 class="section-title">SDKs Oficiais</h2>
        <p class="section-subtitle">Bibliotecas prontas para acelerar sua integração nas principais linguagens</p>
      </div>

      <div class="sdks-grid">
        <div class="sdk-card">
          <div class="sdk-icon">
            <i class="fab fa-js-square"></i>
          </div>
          <div class="sdk-name">JavaScript/Node.js</div>
          <p class="sdk-description">SDK completo para Node.js com suporte a TypeScript e Promise/async-await</p>
          <a href="#" class="sdk-button">
            <i class="fab fa-npm"></i> npm install
          </a>
        </div>

        <div class="sdk-card">
          <div class="sdk-icon">
            <i class="fab fa-python"></i>
          </div>
          <div class="sdk-name">Python</div>
          <p class="sdk-description">Biblioteca Python 3.7+ com integração nativa ao pandas e asyncio</p>
          <a href="#" class="sdk-button">
            <i class="fas fa-download"></i> pip install
          </a>
        </div>

        <div class="sdk-card">
          <div class="sdk-icon">
            <i class="fab fa-php"></i>
          </div>
          <div class="sdk-name">PHP</div>
          <p class="sdk-description">SDK PHP 7.4+ compatível com Laravel, Symfony e frameworks modernos</p>
          <a href="#" class="sdk-button">
            <i class="fas fa-download"></i> composer install
          </a>
        </div>

        <div class="sdk-card">
          <div class="sdk-icon">
            <i class="fab fa-microsoft"></i>
          </div>
          <div class="sdk-name">C#/.NET</div>
          <p class="sdk-description">Biblioteca .NET Standard 2.0 com suporte a .NET Core e Framework</p>
          <a href="#" class="sdk-button">
            <i class="fas fa-download"></i> NuGet Package
          </a>
        </div>

        <div class="sdk-card">
          <div class="sdk-icon">
            <i class="fab fa-java"></i>
          </div>
          <div class="sdk-name">Java</div>
          <p class="sdk-description">SDK Java 8+ com suporte a Spring Boot e frameworks empresariais</p>
          <a href="#" class="sdk-button">
            <i class="fas fa-download"></i> Maven Central
          </a>
        </div>

        <div class="sdk-card">
          <div class="sdk-icon">
            <i class="fas fa-gem"></i>
          </div>
          <div class="sdk-name">Ruby</div>
          <p class="sdk-description">Gem Ruby com integração nativa ao Rails e Sinatra</p>
          <a href="#" class="sdk-button">
            <i class="fas fa-gem"></i> gem install
          </a>
        </div>
      </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
      <div class="cta-content">
        <h2 class="cta-title">Comece a Integrar Hoje</h2>
        <p class="cta-description">Obtenha suas credenciais de API e comece a transformar seus processos de recrutamento em minutos</p>
        
        <div class="cta-buttons">
          <a href="#" class="btn-cta btn-white">
            <i class="fas fa-key"></i>
            Obter API Key
          </a>
          <a href="#" class="btn-cta btn-outline">
            <i class="fas fa-book"></i>
            Ver Documentação
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Tab functionality
    function showTab(tabName) {
      // Hide all tabs
      document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
      });
      
      // Remove active class from all buttons
      document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('active');
      });
      
      // Show selected tab
      document.getElementById(tabName).classList.add('active');
      
      // Add active class to clicked button
      event.target.classList.add('active');
    }

    // Copy code functionality
    function copyCode(elementId) {
      const code = document.getElementById(elementId).textContent;
      navigator.clipboard.writeText(code).then(() => {
        // Change button text temporarily
        const button = event.target.closest('.copy-button');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check"></i> Copiado!';
        
        setTimeout(() => {
          button.innerHTML = originalText;
        }, 2000);
      });
    }

    // Animações de entrada
    window.addEventListener('load', function() {
      const elements = document.querySelectorAll('.overview-card, .endpoint-card, .sdk-card');
      elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
          element.style.opacity = '1';
          element.style.transform = 'translateY(0)';
        }, index * 100);
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
