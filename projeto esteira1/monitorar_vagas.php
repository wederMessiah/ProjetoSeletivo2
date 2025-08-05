<?php
require_once 'config.php';

SessionManager::start();

// Verificar se o usuário está logado
if (!SessionManager::has('admin_logged_in')) {
    header('Location: login_admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Monitorar Vagas | ENIAC LINK+</title>
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
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      color: #333;
      line-height: 1.6;
      padding: 20px;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      background: white;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .header {
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      color: white;
      padding: 30px;
      text-align: center;
    }

    .header h1 {
      font-size: 2rem;
      margin-bottom: 10px;
    }

    .content {
      padding: 40px;
    }

    .coming-soon {
      text-align: center;
      padding: 60px 20px;
    }

    .coming-soon i {
      font-size: 4rem;
      color: #8b5cf6;
      margin-bottom: 30px;
    }

    .coming-soon h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: #1e293b;
    }

    .coming-soon p {
      font-size: 1.1rem;
      color: #64748b;
      margin-bottom: 30px;
    }

    .back-btn {
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 10px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .back-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1><i class="fas fa-chart-line"></i> Monitorar Vagas</h1>
      <p>Dashboard de métricas e estatísticas</p>
    </div>
    
    <div class="content">
      <div class="coming-soon">
        <i class="fas fa-chart-bar"></i>
        <h2>Em Desenvolvimento</h2>
        <p>O dashboard de monitoramento está sendo desenvolvido e estará disponível em breve.</p>
        <a href="gerenciar_vagas.php" class="back-btn">
          <i class="fas fa-arrow-left"></i>
          Voltar ao Gerenciamento
        </a>
      </div>
    </div>
  </div>
</body>
</html>
