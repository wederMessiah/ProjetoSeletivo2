<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard RH - ENIAC LINK+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <style>
    /* CSS Variables Premium */
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --premium-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --warning-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
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

    /* Dashboard Container */
    .dashboard-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 3rem 2rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
      margin-top: 2rem;
      min-height: calc(100vh - 120px);
    }

    .dashboard-header {
      text-align: center;
      margin-bottom: 3rem;
    }

    .dashboard-header h1 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(2.5rem, 4vw, 3.5rem);
      font-weight: 800;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
    }

    .dashboard-header p {
      font-size: 1.2rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
    }

    /* Dashboard Stats */
    .dashboard-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .stat-card {
      background: white;
      padding: 2rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      position: relative;
      overflow: hidden;
      transition: var(--transition-smooth);
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
    }

    .stat-card.primary::before { background: var(--primary-gradient); }
    .stat-card.success::before { background: var(--success-gradient); }
    .stat-card.premium::before { background: var(--premium-gradient); }
    .stat-card.warning::before { background: var(--warning-gradient); }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .stat-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .stat-icon {
      width: 60px;
      height: 60px;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.5rem;
    }

    .stat-icon.primary { background: var(--primary-gradient); }
    .stat-icon.success { background: var(--success-gradient); }
    .stat-icon.premium { background: var(--premium-gradient); }
    .stat-icon.warning { background: var(--warning-gradient); }

    .stat-number {
      font-family: 'Poppins', sans-serif;
      font-size: 2.5rem;
      font-weight: 800;
      color: var(--text-primary);
      margin-bottom: 0.5rem;
    }

    .stat-label {
      color: var(--text-secondary);
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .stat-change {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.9rem;
      font-weight: 600;
    }

    .stat-change.positive { color: #27ae60; }
    .stat-change.negative { color: #e74c3c; }

    /* Charts Section */
    .charts-section {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .chart-card {
      background: white;
      padding: 2rem;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .chart-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
    }

    .chart-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--text-primary);
    }

    .chart-placeholder {
      height: 300px;
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      border-radius: var(--border-radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-secondary);
      font-size: 1.1rem;
    }

    /* Tables Section */
    .tables-section {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .table-card {
      background: white;
      border-radius: var(--border-radius-lg);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(102, 126, 234, 0.1);
      overflow: hidden;
    }

    .table-header {
      padding: 1.5rem 2rem;
      background: var(--primary-gradient);
      color: white;
    }

    .table-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.2rem;
      font-weight: 700;
    }

    .table-content {
      padding: 2rem;
    }

    .table-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 0;
      border-bottom: 1px solid #eee;
    }

    .table-row:last-child {
      border-bottom: none;
    }

    .table-row-left {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .table-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: var(--success-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
    }

    .table-info h4 {
      color: var(--text-primary);
      font-weight: 600;
      font-size: 0.95rem;
    }

    .table-info p {
      color: var(--text-secondary);
      font-size: 0.85rem;
    }

    .table-status {
      padding: 0.3rem 0.8rem;
      border-radius: 15px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    .status-ativo { background: rgba(39, 174, 96, 0.1); color: #27ae60; }
    .status-pendente { background: rgba(243, 156, 18, 0.1); color: #f39c12; }
    .status-contratado { background: rgba(52, 152, 219, 0.1); color: #3498db; }

    /* Action Buttons */
    .action-buttons {
      display: flex;
      gap: 1rem;
      justify-content: center;
      margin-top: 2rem;
    }

    .btn-action {
      padding: 1rem 2rem;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      font-weight: 600;
      transition: var(--transition-smooth);
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-primary {
      background: var(--primary-gradient);
      color: white;
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-success {
      background: var(--success-gradient);
      color: white;
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
    }

    .btn-action:hover {
      transform: translateY(-3px);
      color: white;
      text-decoration: none;
    }

    /* Responsividade */
    @media (max-width: 1024px) {
      .charts-section {
        grid-template-columns: 1fr;
      }
      
      .tables-section {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 768px) {
      .dashboard-stats {
        grid-template-columns: 1fr;
      }
      
      .header-container {
        flex-direction: column;
        gap: 1rem;
      }
      
      nav {
        flex-wrap: wrap;
      }
      
      .action-buttons {
        flex-direction: column;
        align-items: center;
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

  <div class="dashboard-container">
    <div class="dashboard-header">
      <h1>Dashboard RH</h1>
      <p>Painel completo para gestão de recursos humanos com métricas em tempo real e insights estratégicos</p>
    </div>

    <!-- Dashboard Stats -->
    <div class="dashboard-stats">
      <div class="stat-card primary">
        <div class="stat-header">
          <div>
            <div class="stat-number">1,247</div>
            <div class="stat-label">Candidatos Ativos</div>
          </div>
          <div class="stat-icon primary">
            <i class="fas fa-users"></i>
          </div>
        </div>
        <div class="stat-change positive">
          <i class="fas fa-arrow-up"></i>
          +12% este mês
        </div>
      </div>

      <div class="stat-card success">
        <div class="stat-header">
          <div>
            <div class="stat-number">89</div>
            <div class="stat-label">Vagas Abertas</div>
          </div>
          <div class="stat-icon success">
            <i class="fas fa-briefcase"></i>
          </div>
        </div>
        <div class="stat-change positive">
          <i class="fas fa-arrow-up"></i>
          +5% esta semana
        </div>
      </div>

      <div class="stat-card premium">
        <div class="stat-header">
          <div>
            <div class="stat-number">156</div>
            <div class="stat-label">Entrevistas Agendadas</div>
          </div>
          <div class="stat-icon premium">
            <i class="fas fa-calendar-check"></i>
          </div>
        </div>
        <div class="stat-change positive">
          <i class="fas fa-arrow-up"></i>
          +8% hoje
        </div>
      </div>

      <div class="stat-card warning">
        <div class="stat-header">
          <div>
            <div class="stat-number">23</div>
            <div class="stat-label">Contratações este Mês</div>
          </div>
          <div class="stat-icon warning">
            <i class="fas fa-handshake"></i>
          </div>
        </div>
        <div class="stat-change positive">
          <i class="fas fa-arrow-up"></i>
          +15% vs. mês anterior
        </div>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-section">
      <div class="chart-card">
        <div class="chart-header">
          <div class="chart-title">Métricas de Recrutamento - Últimos 6 Meses</div>
          <select style="padding: 0.5rem; border-radius: 8px; border: 1px solid #ddd;">
            <option>Últimos 6 meses</option>
            <option>Último ano</option>
            <option>Este ano</option>
          </select>
        </div>
        <div class="chart-placeholder">
          <div style="text-align: center;">
            <i class="fas fa-chart-line" style="font-size: 3rem; margin-bottom: 1rem; color: #667eea;"></i>
            <p>Gráfico de Tendências de Contratações</p>
            <small>Implementação com Chart.js em produção</small>
          </div>
        </div>
      </div>

      <div class="chart-card">
        <div class="chart-header">
          <div class="chart-title">Distribuição por Área</div>
        </div>
        <div class="chart-placeholder">
          <div style="text-align: center;">
            <i class="fas fa-chart-pie" style="font-size: 3rem; margin-bottom: 1rem; color: #4facfe;"></i>
            <p>Gráfico de Pizza</p>
            <small>Vagas por Departamento</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Tables Section -->
    <div class="tables-section">
      <div class="table-card">
        <div class="table-header">
          <div class="table-title">Candidatos Recentes</div>
        </div>
        <div class="table-content">
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar">MF</div>
              <div class="table-info">
                <h4>Maria Fernanda Silva</h4>
                <p>Desenvolvedora Frontend</p>
              </div>
            </div>
            <div class="table-status status-ativo">Ativo</div>
          </div>
          
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar">JS</div>
              <div class="table-info">
                <h4>João Santos</h4>
                <p>Analista de Dados</p>
              </div>
            </div>
            <div class="table-status status-pendente">Pendente</div>
          </div>
          
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar">AC</div>
              <div class="table-info">
                <h4>Ana Costa</h4>
                <p>Gerente de Projetos</p>
              </div>
            </div>
            <div class="table-status status-contratado">Contratado</div>
          </div>
          
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar">RS</div>
              <div class="table-info">
                <h4>Roberto Silva</h4>
                <p>Designer UX/UI</p>
              </div>
            </div>
            <div class="table-status status-ativo">Ativo</div>
          </div>
        </div>
      </div>

      <div class="table-card">
        <div class="table-header">
          <div class="table-title">Vagas em Destaque</div>
        </div>
        <div class="table-content">
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar" style="background: var(--premium-gradient);">SE</div>
              <div class="table-info">
                <h4>Desenvolvedor Senior</h4>
                <p>15 candidatos</p>
              </div>
            </div>
            <div class="table-status status-ativo">Aberta</div>
          </div>
          
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar" style="background: var(--warning-gradient);">GP</div>
              <div class="table-info">
                <h4>Gerente de Produto</h4>
                <p>8 candidatos</p>
              </div>
            </div>
            <div class="table-status status-ativo">Aberta</div>
          </div>
          
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar" style="background: var(--success-gradient);">AD</div>
              <div class="table-info">
                <h4>Analista DevOps</h4>
                <p>23 candidatos</p>
              </div>
            </div>
            <div class="table-status status-pendente">Triagem</div>
          </div>
          
          <div class="table-row">
            <div class="table-row-left">
              <div class="table-avatar" style="background: var(--primary-gradient);">UX</div>
              <div class="table-info">
                <h4>Designer UX Senior</h4>
                <p>12 candidatos</p>
              </div>
            </div>
            <div class="table-status status-ativo">Aberta</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons">
      <a href="criar_vaga.php" class="btn-action btn-primary">
        <i class="fas fa-plus"></i>
        Nova Vaga
      </a>
      <a href="curriculos.php" class="btn-action btn-success">
        <i class="fas fa-search"></i>
        Buscar Candidatos
      </a>
    </div>
  </div>

  <script>
    // Animações de entrada
    window.addEventListener('load', function() {
      const cards = document.querySelectorAll('.stat-card, .chart-card, .table-card');
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 100);
      });

      // Animação dos números
      const numbers = document.querySelectorAll('.stat-number');
      numbers.forEach(number => {
        const finalValue = parseInt(number.textContent);
        let currentValue = 0;
        const increment = finalValue / 50;
        
        const updateNumber = () => {
          if (currentValue < finalValue) {
            currentValue += increment;
            number.textContent = Math.floor(currentValue);
            requestAnimationFrame(updateNumber);
          } else {
            number.textContent = finalValue;
          }
        };
        
        setTimeout(updateNumber, 500);
      });
    });
  </script>
</body>
</html>
