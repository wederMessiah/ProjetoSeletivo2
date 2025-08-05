<?php
require_once 'config.php';

SessionManager::start();

// Verificar se o usuário está logado
if (!SessionManager::has('admin_logged_in')) {
    header('Location: login_admin.php');
    exit;
}

$admin_nome = SessionManager::get('admin_nome', 'Administrador');

// Buscar estatísticas de vagas
try {
    $database = new Database();
    $pdo = $database->connect();
    
    // Total de vagas
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM vagas");
    $stmt->execute();
    $total_vagas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Vagas ativas
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM vagas WHERE status = 'ativa'");
    $stmt->execute();
    $vagas_ativas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Vagas pausadas
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM vagas WHERE status = 'pausada'");
    $stmt->execute();
    $vagas_pausadas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Total de candidaturas
    $stmt = $pdo->prepare("SELECT COUNT(*) as total FROM candidaturas");
    $stmt->execute();
    $total_candidaturas = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
} catch (PDOException $e) {
    $total_vagas = 0;
    $vagas_ativas = 0;
    $vagas_pausadas = 0;
    $total_candidaturas = 0;
    error_log("Erro ao buscar estatísticas: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Gerenciar Vagas | ENIAC LINK+ - Sistema de Gestão</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #34609b 100%);
      background-size: 400% 400%;
      animation: gradientShift 20s ease infinite;
      min-height: 100vh;
      color: #333;
      line-height: 1.6;
      position: relative;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Header */
    header {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #34609b 100%);
      padding: 2rem 0;
      color: white;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
      position: relative;
      overflow: hidden;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="8" height="8" patternUnits="userSpaceOnUse"><path d="M 8 0 L 0 0 0 8" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
      opacity: 0.4;
      pointer-events: none;
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 2rem;
      position: relative;
      z-index: 2;
    }

    .logo-section {
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }

    .logo-header {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      border: 3px solid rgba(255, 255, 255, 0.3);
      transition: transform 0.3s ease;
    }

    .logo-header:hover {
      transform: scale(1.05);
    }
      align-items: center;
      justify-content: center;
      backdrop-filter: blur(15px);
      font-size: 1.8rem;
      border: 1px solid rgba(255, 255, 255, 0.3);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .back-btn {
      background: rgba(255, 255, 255, 0.2);
      color: white;
      padding: 16px 28px;
      border-radius: 15px;
      text-decoration: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-weight: 600;
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      display: flex;
      align-items: center;
      gap: 12px;
      font-size: 1rem;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .back-btn:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* Main Content */
    .main-content {
      max-width: 1400px;
      margin: 50px auto;
      padding: 0 30px;
    }

    .page-title {
      background: rgba(255, 255, 255, 0.95);
      padding: 60px 50px;
      border-radius: 25px;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
      margin-bottom: 50px;
      text-align: center;
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(15px);
      position: relative;
      overflow: hidden;
    }

    .page-title::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, #1e3c72, #2a5298, #34609b);
      background-size: 200% 200%;
      animation: gradientShift 8s ease infinite;
    }

    .page-title h1 {
      color: #1e3c72;
      margin-bottom: 20px;
      font-size: 3.2rem;
      font-weight: 800;
      letter-spacing: -1px;
      line-height: 1.2;
    }

    .page-title p {
      color: #64748b;
      font-size: 1.3rem;
      margin-bottom: 0;
      font-weight: 400;
      max-width: 700px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* Stats Section */
    .stats-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      margin-bottom: 60px;
    }

    .stat-card {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px 35px;
      border-radius: 20px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(15px);
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(90deg, #1e3c72, #2a5298, #34609b);
      background-size: 200% 200%;
      animation: gradientShift 8s ease infinite;
    }

    .stat-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
    }

    .stat-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 25px;
    }

    .stat-icon {
      width: 70px;
      height: 70px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      color: white;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .stat-number {
      font-size: 3.5rem;
      font-weight: 900;
      color: #1e293b;
      margin-bottom: 12px;
      line-height: 1;
      letter-spacing: -2px;
    }

    .stat-label {
      color: #64748b;
      font-weight: 600;
      font-size: 1.1rem;
      margin-bottom: 20px;
      letter-spacing: 0.5px;
    }

    /* Action Cards */
    .actions-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
      gap: 40px;
      margin-bottom: 60px;
    }

    .action-card {
      background: rgba(255, 255, 255, 0.95);
      padding: 50px 40px;
      border-radius: 25px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
      text-decoration: none;
      color: inherit;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      position: relative;
      overflow: hidden;
      cursor: pointer;
      backdrop-filter: blur(15px);
    }

    .action-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(30, 60, 114, 0.03), rgba(42, 82, 152, 0.05));
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .action-card:hover::before {
      opacity: 1;
    }

    .action-card:hover {
      transform: translateY(-15px);
      box-shadow: 0 30px 80px rgba(0, 0, 0, 0.2);
    }

    .action-icon {
      width: 90px;
      height: 90px;
      border-radius: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      color: white;
      margin-bottom: 30px;
      position: relative;
      z-index: 2;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .action-title {
      font-size: 1.8rem;
      font-weight: 800;
      color: #1e293b;
      margin-bottom: 20px;
      position: relative;
      z-index: 2;
      letter-spacing: -0.5px;
    }

    .action-desc {
      color: #64748b;
      font-size: 1.1rem;
      line-height: 1.7;
      position: relative;
      z-index: 2;
      font-weight: 400;
    }

    .action-features {
      list-style: none;
      margin-top: 25px;
      position: relative;
      z-index: 2;
    }

    .action-features li {
      color: #64748b;
      font-size: 1rem;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 500;
    }

    .action-features li i {
      color: #1e3c72;
      width: 18px;
      font-size: 0.9rem;
    }

    /* Color variations */
    .criar-vagas .action-icon {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    }

    .editar-vagas .action-icon {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .monitorar-vagas .action-icon {
      background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    }

    /* Floating shapes background effect */
    .floating-shapes {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
    }

    .shape {
      position: absolute;
      background: rgba(255, 255, 255, 0.08);
      border-radius: 50%;
      animation: float 25s infinite linear;
    }

    .shape:nth-child(1) {
      width: 120px;
      height: 120px;
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .shape:nth-child(2) {
      width: 160px;
      height: 160px;
      top: 60%;
      left: 80%;
      animation-delay: 8s;
    }

    .shape:nth-child(3) {
      width: 100px;
      height: 100px;
      top: 80%;
      left: 20%;
      animation-delay: 16s;
    }

    @keyframes float {
      0% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.6;
      }
      50% {
        transform: translateY(-120px) rotate(180deg);
        opacity: 0.3;
      }
      100% {
        transform: translateY(0px) rotate(360deg);
        opacity: 0.6;
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        gap: 25px;
        text-align: center;
        padding: 0 1.5rem;
      }

      .page-title {
        padding: 40px 30px;
        margin-bottom: 40px;
      }

      .page-title h1 {
        font-size: 2.5rem;
      }

      .page-title p {
        font-size: 1.1rem;
      }

      .actions-section {
        grid-template-columns: 1fr;
        gap: 30px;
      }

      .action-card {
        padding: 40px 30px;
      }

      .main-content {
        padding: 0 20px;
        margin: 30px auto;
      }

      .stats-section {
        grid-template-columns: 1fr;
        gap: 20px;
        margin-bottom: 40px;
      }

      .stat-card {
        padding: 30px 25px;
      }

      .stat-number {
        font-size: 3rem;
      }
    }

    @media (max-width: 480px) {
      .header-container {
        padding: 0 1rem;
      }

      .logo-section h2 {
        font-size: 1.5rem;
      }

      .logo-icon {
        width: 50px;
        height: 50px;
        font-size: 1.4rem;
      }

      .page-title h1 {
        font-size: 2rem;
      }

      .action-card {
        padding: 30px 20px;
      }

      .action-icon {
        width: 70px;
        height: 70px;
        font-size: 2rem;
      }

      .action-title {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="floating-shapes">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  
  <header>
    <div class="header-container">
      <div class="logo-section">
        <img src="./imagens/Logoindex.jpg" alt="Logo da empresa" class="logo-header">
      </div>
      <a href="admin.php" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Voltar ao Painel
      </a>
    </div>
  </header>

  <div class="main-content">
    <div class="page-title">
      <h1><i class="fas fa-cogs"></i> Central de Gestão de Vagas</h1>
      <p>Sistema completo para criação, edição e monitoramento de vagas de emprego</p>
    </div>

    <!-- Estatísticas -->
    <div class="stats-section">
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
            <i class="fas fa-briefcase"></i>
          </div>
        </div>
        <div class="stat-number"><?php echo $total_vagas; ?></div>
        <div class="stat-label">Total de Vagas</div>
      </div>
      
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
            <i class="fas fa-play-circle"></i>
          </div>
        </div>
        <div class="stat-number"><?php echo $vagas_ativas; ?></div>
        <div class="stat-label">Vagas Ativas</div>
      </div>
      
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
            <i class="fas fa-pause-circle"></i>
          </div>
        </div>
        <div class="stat-number"><?php echo $vagas_pausadas; ?></div>
        <div class="stat-label">Vagas Pausadas</div>
      </div>
      
      <div class="stat-card">
        <div class="stat-header">
          <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
            <i class="fas fa-users"></i>
          </div>
        </div>
        <div class="stat-number"><?php echo $total_candidaturas; ?></div>
        <div class="stat-label">Total de Candidaturas</div>
      </div>
    </div>

    <!-- Ações Principais -->
    <div class="actions-section">
      <a href="criar_vaga_teste.php" class="action-card criar-vagas" style="text-decoration: none; color: inherit; display: block;">
        <div class="action-icon">
          <i class="fas fa-plus-circle"></i>
        </div>
        <div class="action-title">Criar Vagas</div>
        <div class="action-desc">
          Crie novas oportunidades de emprego com formulário completo e intuitivo
        </div>
        <ul class="action-features">
          <li><i class="fas fa-check"></i> Formulário completo</li>
          <li><i class="fas fa-check"></i> Validação automática</li>
          <li><i class="fas fa-check"></i> Interface profissional</li>
          <li><i class="fas fa-check"></i> Publicação imediata</li>
        </ul>
        <div style="margin-top: 30px; text-align: center;">
          <span class="btn-action" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; padding: 16px 32px; border-radius: 15px; display: inline-flex; align-items: center; gap: 12px; font-weight: 700; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 8px 25px rgba(30, 60, 114, 0.3); transition: all 0.3s ease;">
            <i class="fas fa-plus"></i>
            Criar Nova Vaga
          </span>
        </div>
      </a>

      <div class="action-card editar-vagas" onclick="window.location.href='editar_vagas.php'">
        <div class="action-icon">
          <i class="fas fa-edit"></i>
        </div>
        <div class="action-title">Editar Vagas</div>
        <div class="action-desc">
          Modifique vagas existentes, atualize informações e remova vagas completas
        </div>
        <ul class="action-features">
          <li><i class="fas fa-check"></i> Atualizar descrições</li>
          <li><i class="fas fa-check"></i> Modificar requisitos</li>
          <li><i class="fas fa-check"></i> Ajustar salários</li>
          <li><i class="fas fa-check"></i> Excluir vagas finalizadas</li>
        </ul>
        <div style="margin-top: 30px; text-align: center;">
          <span class="btn-action" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white; padding: 16px 32px; border-radius: 15px; display: inline-flex; align-items: center; gap: 12px; font-weight: 700; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3); transition: all 0.3s ease;">
            <i class="fas fa-edit"></i>
            Editar Vagas
          </span>
        </div>
      </div>

      <div class="action-card monitorar-vagas" onclick="window.location.href='monitorar_vagas.php'">
        <div class="action-icon">
          <i class="fas fa-chart-line"></i>
        </div>
        <div class="action-title">Monitorar Vagas</div>
        <div class="action-desc">
          Acompanhe métricas, estatísticas e performance das vagas ativas
        </div>
        <ul class="action-features">
          <li><i class="fas fa-check"></i> Relatórios detalhados</li>
          <li><i class="fas fa-check"></i> Métricas de candidaturas</li>
          <li><i class="fas fa-check"></i> Taxa de conversão</li>
          <li><i class="fas fa-check"></i> Dashboard executivo</li>
        </ul>
        <div style="margin-top: 30px; text-align: center;">
          <span class="btn-action" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); color: white; padding: 16px 32px; border-radius: 15px; display: inline-flex; align-items: center; gap: 12px; font-weight: 700; font-size: 1.1rem; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3); transition: all 0.3s ease;">
            <i class="fas fa-chart-line"></i>
            Monitorar
          </span>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Animações de entrada melhoradas
    document.addEventListener('DOMContentLoaded', function() {
      // Animação das estatísticas com contador suave
      const stats = document.querySelectorAll('.stat-number');
      stats.forEach((stat, index) => {
        const finalValue = parseInt(stat.textContent);
        stat.textContent = '0';
        
        setTimeout(() => {
          let currentValue = 0;
          const increment = finalValue / 40;
          const timer = setInterval(() => {
            currentValue += increment;
            if (currentValue >= finalValue) {
              stat.textContent = finalValue;
              clearInterval(timer);
            } else {
              stat.textContent = Math.floor(currentValue);
            }
          }, 30);
        }, index * 150);
      });

      // Animação dos cards com stagger effect
      const cards = document.querySelectorAll('.action-card');
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px) scale(0.9)';
        
        setTimeout(() => {
          card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0) scale(1)';
        }, index * 200 + 600);
      });

      // Animação dos stats cards
      const statCards = document.querySelectorAll('.stat-card');
      statCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
          card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 100 + 300);
      });
    });

    // Feedback visual melhorado nos cliques
    document.querySelectorAll('.action-card').forEach(card => {
      card.addEventListener('click', function() {
        this.style.transform = 'translateY(-15px) scale(0.98)';
        setTimeout(() => {
          this.style.transform = '';
        }, 200);
      });

      // Efeito de hover mais suave
      card.addEventListener('mouseenter', function() {
        this.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
      });
    });

    // Efeito parallax para os stats cards
    document.addEventListener('scroll', function() {
      const scrolled = window.pageYOffset;
      const stats = document.querySelectorAll('.stat-card');
      
      stats.forEach((stat, index) => {
        const rate = scrolled * -0.1;
        stat.style.transform = `translateY(${rate}px)`;
      });
    });

    // Animação dos botões nos cards
    document.querySelectorAll('.btn-action').forEach(btn => {
      btn.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
        this.style.boxShadow = '0 12px 35px rgba(0, 0, 0, 0.4)';
      });

      btn.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = this.style.background.includes('1e3c72') ? 
          '0 8px 25px rgba(30, 60, 114, 0.3)' : 
          this.style.background.includes('f59e0b') ? 
          '0 8px 25px rgba(245, 158, 11, 0.3)' : 
          '0 8px 25px rgba(139, 92, 246, 0.3)';
      });
    });

    // Função específica para ir para criar vaga
    function irParaCriarVaga() {
      console.log('Redirecionando para criar_vaga_teste.php...');
      window.location.href = 'criar_vaga_teste.php';
    }

    // Debug - verificar se os eventos estão funcionando
    document.addEventListener('click', function(e) {
      if (e.target.closest('.criar-vagas')) {
        console.log('Clique no card criar-vagas detectado');
      }
    });

    // Efeito de loading suave na página
    window.addEventListener('load', function() {
      document.body.style.opacity = '0';
      document.body.style.transition = 'opacity 0.6s ease';
      setTimeout(() => {
        document.body.style.opacity = '1';
      }, 100);
    });
  </script>
</body>
</html>
