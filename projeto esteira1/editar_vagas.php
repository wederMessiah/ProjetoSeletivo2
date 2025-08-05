<?php
require_once 'config.php';

SessionManager::start();

// Verificar se o usuário está logado
if (!SessionManager::has('admin_logged_in')) {
    header('Location: login_admin.php');
    exit;
}

$admin_nome = SessionManager::get('admin_nome', 'Administrador');

// Buscar todas as vagas
try {
    $database = new Database();
    $pdo = $database->connect();
    
    // Se for uma ação de edição
    if (isset($_POST['action']) && $_POST['action'] === 'edit' && isset($_POST['vaga_id'])) {
        $vaga_id = (int)$_POST['vaga_id'];
        
        // Atualizar a vaga
        $stmt = $pdo->prepare("UPDATE vagas SET 
                               titulo = ?, 
                               descricao = ?, 
                               empresa = ?, 
                               localizacao = ?, 
                               salario_min = ?, 
                               salario_max = ?, 
                               tipo_contrato = ?, 
                               modalidade = ?, 
                               vagas_disponiveis = ?, 
                               data_encerramento = ?, 
                               requisitos = ?, 
                               beneficios = ?, 
                               status = ? 
                               WHERE id = ?");
        
        $data_encerramento = trim($_POST['data_encerramento'] ?? '');
        
        // Validar data de encerramento se fornecida
        if (!empty($data_encerramento)) {
            $data_hoje = date('Y-m-d');
            if ($data_encerramento <= $data_hoje) {
                $error_message = "Data de encerramento deve ser posterior à data atual";
                $data_encerramento = null;
            }
        } else {
            // Se não fornecida, definir como null
            $data_encerramento = null;
        }
        
        $result = $stmt->execute([
            $_POST['titulo'],
            $_POST['descricao'],
            $_POST['empresa'],
            $_POST['localizacao'],
            $_POST['salario_min'] ?? null,
            $_POST['salario_max'] ?? null,
            $_POST['tipo'],
            $_POST['modalidade'] ?? null,
            (int)($_POST['vagas_disponiveis'] ?? 1),
            $data_encerramento ?: null,
            $_POST['requisitos'] ?? '',
            $_POST['beneficios'] ?? '',
            $_POST['status'],
            $vaga_id
        ]);
        
        if ($result) {
            $success_message = "Vaga atualizada com sucesso!";
        } else {
            $error_message = "Erro ao atualizar vaga.";
        }
    }
    
    // Se for uma ação de exclusão
    if (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['vaga_id'])) {
        $vaga_id = (int)$_POST['vaga_id'];
        
        // Primeiro, excluir candidaturas relacionadas
        $stmt = $pdo->prepare("DELETE FROM candidaturas WHERE vaga_id = ?");
        $stmt->execute([$vaga_id]);
        
        // Depois, excluir a vaga
        $stmt = $pdo->prepare("DELETE FROM vagas WHERE id = ?");
        $result = $stmt->execute([$vaga_id]);
        
        if ($result) {
            $success_message = "Vaga excluída com sucesso!";
        } else {
            $error_message = "Erro ao excluir vaga.";
        }
    }
    
    // Buscar vagas com contagem de candidaturas
    $sql = "SELECT v.*, 
                   COUNT(c.id) as total_candidaturas,
                   MAX(c.data_candidatura) as ultima_candidatura
            FROM vagas v 
            LEFT JOIN candidaturas c ON v.id = c.vaga_id
            GROUP BY v.id 
            ORDER BY v.data_criacao DESC";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $vagas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $vagas = [];
    $error_message = "Erro ao buscar vagas: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Vagas | ENIAC LINK+ - Sistema de Gestão</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #34609b 100%);
      background-size: 400% 400%;
      animation: gradientShift 20s ease infinite;
      min-height: 100vh;
      color: #333;
      line-height: 1.6;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* Header */
    header {
      background: linear-gradient(135deg, rgba(30, 60, 114, 0.95) 0%, rgba(42, 82, 152, 0.95) 100%);
      backdrop-filter: blur(20px);
      padding: 1.5rem 0;
      color: white;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .header-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 2rem;
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
      border: 1px solid rgba(255, 255, 255, 0.3);
      font-size: 1.3rem;
    }

    .back-btn {
      background: rgba(255, 255, 255, 0.15);
      color: white;
      padding: 14px 28px;
      border-radius: 14px;
      text-decoration: none;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-weight: 600;
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 0.95rem;
    }

    .back-btn:hover {
      background: rgba(255, 255, 255, 0.25);
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* Main Content */
    .main-content {
      max-width: 1400px;
      margin: 50px auto;
      padding: 0 25px;
    }

    .page-title {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.95) 100%);
      padding: 50px 40px;
      border-radius: 24px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
      margin-bottom: 40px;
      text-align: center;
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(20px);
    }

    .page-title h1 {
      color: #1e293b;
      margin-bottom: 18px;
      font-size: 2.8rem;
      font-weight: 800;
      letter-spacing: -0.5px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .page-title p {
      color: #64748b;
      font-size: 1.2rem;
      margin-bottom: 0;
      font-weight: 400;
    }

    /* Alerts */
    .alert {
      padding: 20px 25px;
      border-radius: 16px;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
      gap: 15px;
      font-weight: 500;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(10px);
    }

    .alert-success {
      background: linear-gradient(135deg, rgba(209, 250, 229, 0.9) 0%, rgba(167, 243, 208, 0.9) 100%);
      color: #047857;
      border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .alert-error {
      background: linear-gradient(135deg, rgba(254, 226, 226, 0.9) 0%, rgba(252, 202, 202, 0.9) 100%);
      color: #dc2626;
      border: 1px solid rgba(239, 68, 68, 0.3);
    }

    /* Vagas Grid */
    .vagas-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(420px, 1fr));
      gap: 30px;
      margin-bottom: 50px;
    }

    .vaga-card {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.95) 100%);
      border-radius: 20px;
      box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(20px);
    }

    .vaga-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
    }

    .vaga-header {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #34609b 100%);
      color: white;
      padding: 30px;
      position: relative;
      overflow: hidden;
    }

    .vaga-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="8" height="8" patternUnits="userSpaceOnUse"><path d="M 8 0 L 0 0 0 8" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
      opacity: 0.3;
    }

    .vaga-status {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 8px 16px;
      border-radius: 25px;
      font-size: 0.85rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      z-index: 2;
    }

    .status-ativa {
      background: rgba(16, 185, 129, 0.9);
      color: white;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    .status-pausada {
      background: rgba(239, 68, 68, 0.9);
      color: white;
      box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    }

    .vaga-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 12px;
      position: relative;
      z-index: 2;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    .vaga-empresa {
      font-size: 1.1rem;
      opacity: 0.9;
      position: relative;
      z-index: 2;
      font-weight: 500;
    }

    .vaga-content {
      padding: 30px;
    }

    .vaga-info {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 20px;
      margin-bottom: 25px;
    }

    .info-item {
      display: flex;
      align-items: center;
      gap: 12px;
      color: #475569;
      font-size: 0.95rem;
      font-weight: 500;
    }

    .info-item i {
      color: #2a5298;
      width: 18px;
      font-size: 1rem;
    }

    .vaga-description {
      color: #64748b;
      font-size: 1rem;
      line-height: 1.7;
      margin-bottom: 25px;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .vaga-stats {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 0;
      border-top: 2px solid #e5e7eb;
      margin-bottom: 25px;
      background: linear-gradient(135deg, rgba(248, 250, 252, 0.5) 0%, rgba(241, 245, 249, 0.5) 100%);
      border-radius: 12px;
      padding: 20px;
      margin: 20px -10px 25px -10px;
    }

    .stat-item {
      text-align: center;
      flex: 1;
    }

    .stat-number {
      font-size: 1.8rem;
      font-weight: 800;
      color: #1e293b;
      display: block;
      margin-bottom: 4px;
    }

    .stat-label {
      font-size: 0.85rem;
      color: #64748b;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-weight: 600;
    }

    .vaga-actions {
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .action-btn {
      flex: 1;
      padding: 14px 18px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-decoration: none;
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      min-height: 48px;
    }

    .btn-edit {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
    }

    .btn-edit:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
      background: linear-gradient(135deg, #1a3565 0%, #24487d 100%);
    }

    .btn-delete {
      background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
    }

    .btn-delete:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
      background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
    }

    .btn-view {
      background: linear-gradient(135deg, #059669 0%, #047857 100%);
      color: white;
      box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
    }

    .btn-view:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
      background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 100px 30px;
      color: #64748b;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(248, 250, 252, 0.9) 100%);
      border-radius: 20px;
      box-shadow: 0 15px 45px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .empty-state i {
      font-size: 5rem;
      margin-bottom: 30px;
      color: #cbd5e1;
      opacity: 0.7;
    }

    .empty-state h3 {
      font-size: 1.8rem;
      margin-bottom: 18px;
      color: #1e293b;
      font-weight: 700;
    }

    .empty-state p {
      font-size: 1.1rem;
      margin-bottom: 40px;
      max-width: 400px;
      margin-left: auto;
      margin-right: auto;
      line-height: 1.6;
    }

    .create-btn {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      color: white;
      padding: 18px 36px;
      border: none;
      border-radius: 14px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font-weight: 600;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      box-shadow: 0 8px 25px rgba(30, 60, 114, 0.3);
    }

    .create-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 40px rgba(30, 60, 114, 0.4);
      background: linear-gradient(135deg, #1a3565 0%, #24487d 100%);
    }

    /* Efeitos visuais modernos */
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
      top: 10%;
      left: 5%;
      animation-delay: 0s;
    }

    .shape:nth-child(2) {
      width: 80px;
      height: 80px;
      top: 70%;
      left: 90%;
      animation-delay: 8s;
    }

    .shape:nth-child(3) {
      width: 100px;
      height: 100px;
      top: 40%;
      left: 85%;
      animation-delay: 16s;
    }

    @keyframes float {
      0% {
        transform: translateY(0px) rotate(0deg);
        opacity: 0.6;
      }
      50% {
        transform: translateY(-150px) rotate(180deg);
        opacity: 0.3;
      }
      100% {
        transform: translateY(0px) rotate(360deg);
        opacity: 0.6;
      }
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .vagas-grid {
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 25px;
      }
    }

    @media (max-width: 768px) {
      .main-content {
        padding: 0 20px;
        margin: 30px auto;
      }

      .page-title {
        padding: 40px 30px;
        margin-bottom: 30px;
      }

      .page-title h1 {
        font-size: 2.2rem;
      }

      .vagas-grid {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .vaga-actions {
        flex-direction: column;
      }

      .vaga-info {
        grid-template-columns: 1fr;
        gap: 15px;
      }

      .vaga-stats {
        flex-direction: column;
        gap: 15px;
      }

      .header-container {
        padding: 0 1.5rem;
      }

      .logo-section h2 {
        font-size: 1.5rem;
      }

      .back-btn {
        padding: 12px 20px;
        font-size: 0.9rem;
      }
    }

    @media (max-width: 480px) {
      .main-content {
        padding: 0 15px;
        margin: 20px auto;
      }

      .page-title {
        padding: 30px 20px;
      }

      .page-title h1 {
        font-size: 1.8rem;
      }

      .page-title p {
        font-size: 1rem;
      }

      .vaga-header {
        padding: 25px 20px;
      }

      .vaga-content {
        padding: 25px 20px;
      }

      .vaga-title {
        font-size: 1.3rem;
      }

      .empty-state {
        padding: 60px 20px;
      }

      .empty-state i {
        font-size: 3.5rem;
      }

      .empty-state h3 {
        font-size: 1.5rem;
      }
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      z-index: 1000;
      backdrop-filter: blur(10px);
    }

    .modal-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(248, 250, 252, 0.95) 100%);
      border-radius: 24px;
      padding: 40px;
      max-width: 900px;
      width: 95%;
      max-height: 95vh;
      overflow-y: auto;
      box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 35px;
      padding-bottom: 20px;
      border-bottom: 2px solid #e5e7eb;
    }

    .modal-header h3 {
      color: #1e293b;
      font-size: 1.8rem;
      font-weight: 700;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .modal-close {
      background: rgba(239, 68, 68, 0.1);
      border: 1px solid rgba(239, 68, 68, 0.3);
      border-radius: 50%;
      width: 40px;
      height: 40px;
      font-size: 18px;
      cursor: pointer;
      color: #dc2626;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .modal-close:hover {
      background: rgba(239, 68, 68, 0.2);
      transform: scale(1.1);
    }

    .form-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 25px;
    }

    .form-group label {
      display: block;
      margin-bottom: 10px;
      font-weight: 600;
      color: #1e293b;
      font-size: 1rem;
      letter-spacing: 0.2px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 16px 20px;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      font-size: 1rem;
      font-family: 'Inter', sans-serif;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      background: rgba(255, 255, 255, 0.95);
      color: #1e293b;
      font-weight: 400;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: #2a5298;
      background: white;
      box-shadow: 0 0 0 4px rgba(42, 82, 152, 0.1);
      transform: translateY(-2px);
    }

    .form-group input:hover,
    .form-group select:hover,
    .form-group textarea:hover {
      border-color: #cbd5e1;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-group textarea {
      resize: vertical;
      min-height: 120px;
      line-height: 1.6;
    }

    .modal-actions {
      display: flex;
      gap: 20px;
      justify-content: flex-end;
      margin-top: 40px;
      padding-top: 25px;
      border-top: 2px solid #e5e7eb;
    }

    .btn-cancel {
      background: linear-gradient(135deg, #64748b 0%, #475569 100%);
      color: white;
      padding: 14px 28px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
    }

    .btn-cancel:hover {
      background: linear-gradient(135deg, #475569 0%, #334155 100%);
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
    }

    .btn-save {
      background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
      color: white;
      padding: 14px 28px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 0.3px;
      box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
    }

    .btn-save:hover {
      background: linear-gradient(135deg, #1a3565 0%, #24487d 100%);
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(30, 60, 114, 0.4);
    }

    .alert {
      padding: 15px 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
      font-weight: 500;
    }

    .alert-success {
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
    }

    .alert-error {
      background: linear-gradient(135deg, #ef4444, #dc2626);
      color: white;
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
      <a href="gerenciar_vagas.php" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Voltar ao Gerenciamento
      </a>
    </div>
  </header>

  <div class="main-content">
    <div class="page-title">
      <h1><i class="fas fa-edit"></i> Gerenciar Vagas</h1>
      <p>Edite informações, monitore candidaturas e gerencie o status das suas oportunidades</p>
    </div>

    <?php if (isset($success_message)): ?>
      <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <?php echo $success_message; ?>
      </div>
    <?php endif; ?>

    <?php if (isset($error_message)): ?>
      <div class="alert alert-error">
        <i class="fas fa-exclamation-triangle"></i>
        <?php echo $error_message; ?>
      </div>
    <?php endif; ?>

    <?php if (empty($vagas)): ?>
      <div class="empty-state">
        <i class="fas fa-briefcase"></i>
        <h3>Nenhuma vaga encontrada</h3>
        <p>Não há vagas cadastradas no sistema ainda.</p>
        <a href="vagas.php" class="create-btn">
          <i class="fas fa-plus"></i>
          Ir para Vagas Públicas
        </a>
      </div>
    <?php else: ?>
      <div class="vagas-grid">
        <?php foreach ($vagas as $vaga): ?>
          <div class="vaga-card" data-vaga-id="<?php echo $vaga['id']; ?>">
            <div class="vaga-header">
              <div class="vaga-status <?php echo $vaga['status'] === 'ativa' ? 'status-ativa' : 'status-pausada'; ?>">
                <?php echo $vaga['status'] === 'ativa' ? 'Ativa' : 'Pausada'; ?>
              </div>
              <div class="vaga-title"><?php echo htmlspecialchars($vaga['titulo']); ?></div>
              <div class="vaga-company"><?php echo htmlspecialchars($vaga['empresa'] ?? 'ENIAC LINK+'); ?></div>
            </div>
            
            <div class="vaga-content">
              <div class="vaga-info">
                <div class="info-item">
                  <i class="fas fa-map-marker-alt"></i>
                  <span><?php echo htmlspecialchars($vaga['localizacao'] ?? 'São Paulo'); ?></span>
                </div>
                <div class="info-item">
                  <i class="fas fa-clock"></i>
                  <span><?php echo htmlspecialchars($vaga['tipo_contrato'] ?? 'CLT'); ?></span>
                </div>
                <div class="info-item">
                  <i class="fas fa-dollar-sign"></i>
                  <span><?php echo htmlspecialchars($vaga['salario_min'] ?? 'A combinar'); ?></span>
                </div>
                <div class="info-item">
                  <i class="fas fa-calendar"></i>
                  <span><?php echo date('d/m/Y', strtotime($vaga['data_criacao'])); ?></span>
                </div>
              </div>
              
              <div class="vaga-description">
                <?php echo htmlspecialchars($vaga['descricao']); ?>
              </div>
              
              <div class="vaga-stats">
                <div class="stat-item">
                  <div class="stat-number"><?php echo $vaga['total_candidaturas']; ?></div>
                  <div class="stat-label">Candidaturas</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number"><?php echo $vaga['ultima_candidatura'] ? date('d/m', strtotime($vaga['ultima_candidatura'])) : '-'; ?></div>
                  <div class="stat-label">Última</div>
                </div>
              </div>
              
              <div class="vaga-actions">
                <a href="vagas.php?vaga_id=<?php echo $vaga['id']; ?>" class="action-btn btn-view">
                  <i class="fas fa-eye"></i>
                  Visualizar
                </a>
                <button class="action-btn btn-edit" onclick="editarVaga(<?php echo $vaga['id']; ?>)">
                  <i class="fas fa-edit"></i>
                  Editar
                </button>
                <button class="action-btn btn-delete" onclick="confirmarExclusao(<?php echo $vaga['id']; ?>, '<?php echo addslashes($vaga['titulo']); ?>')">
                  <i class="fas fa-trash"></i>
                  Excluir
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Form oculto para exclusão -->
  <form id="deleteForm" method="POST" style="display: none;">
    <input type="hidden" name="action" value="delete">
    <input type="hidden" name="vaga_id" id="deleteVagaId">
  </form>

  <!-- Modal de Edição -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <div class="modal-header">
        <h3><i class="fas fa-edit"></i> Editar Vaga</h3>
        <button class="modal-close" onclick="closeEditModal()">&times;</button>
      </div>
      
      <form method="POST" id="editForm">
        <input type="hidden" name="action" value="edit">
        <input type="hidden" name="vaga_id" id="edit_vaga_id">
        
        <div class="form-grid">
          <div class="form-group">
            <label for="edit_titulo">Título da Vaga *</label>
            <input type="text" id="edit_titulo" name="titulo" required>
          </div>
          
          <div class="form-group">
            <label for="edit_empresa">Empresa *</label>
            <input type="text" id="edit_empresa" name="empresa" required>
          </div>
          
          <div class="form-group">
            <label for="edit_localizacao">Localização *</label>
            <input type="text" id="edit_localizacao" name="localizacao" required>
          </div>
          
          <div class="form-group">
            <label for="edit_modalidade">Modalidade</label>
            <select id="edit_modalidade" name="modalidade">
              <option value="">Selecione a modalidade</option>
              <option value="presencial">Presencial</option>
              <option value="remoto">Remoto</option>
              <option value="híbrido">Híbrido</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="edit_salario_min">Salário Mínimo</label>
            <input type="number" id="edit_salario_min" name="salario_min" placeholder="Ex: 5000" min="0" step="100">
          </div>
          
          <div class="form-group">
            <label for="edit_salario_max">Salário Máximo</label>
            <input type="number" id="edit_salario_max" name="salario_max" placeholder="Ex: 8000" min="0" step="100">
          </div>
          
          <div class="form-group">
            <label for="edit_vagas_disponiveis">Vagas Disponíveis</label>
            <input type="number" id="edit_vagas_disponiveis" name="vagas_disponiveis" min="1" max="50" value="1">
          </div>

          <div class="form-group">
            <label for="edit_data_encerramento">Data de Encerramento</label>
            <input type="date" id="edit_data_encerramento" name="data_encerramento" min="">
          </div>
          
          <div class="form-group">
            <label for="edit_tipo">Tipo de Contrato *</label>
            <select id="edit_tipo" name="tipo" required>
              <option value="clt">CLT</option>
              <option value="pj">PJ</option>
              <option value="estagio">Estágio</option>
              <option value="freelancer">Freelancer</option>
              <option value="temporario">Temporário</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="edit_status">Status *</label>
            <select id="edit_status" name="status" required>
              <option value="ativa">Ativa</option>
              <option value="pausada">Pausada</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label for="edit_descricao">Descrição da Vaga *</label>
          <textarea id="edit_descricao" name="descricao" rows="4" required></textarea>
        </div>
        
        <div class="form-group">
          <label for="edit_requisitos">Requisitos</label>
          <textarea id="edit_requisitos" name="requisitos" rows="3"></textarea>
        </div>
        
        <div class="form-group">
          <label for="edit_beneficios">Benefícios</label>
          <textarea id="edit_beneficios" name="beneficios" rows="3"></textarea>
        </div>
        
        <div class="modal-actions">
          <button type="button" onclick="closeEditModal()" class="btn-cancel">Cancelar</button>
          <button type="submit" class="btn-save">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function confirmarExclusao(vagaId, titulo) {
      if (confirm(`⚠️ EXCLUIR VAGA\n\nDeseja realmente excluir a vaga "${titulo}"?\n\n• Todas as candidaturas serão removidas\n• Esta ação não pode ser desfeita\n• A vaga será removida permanentemente\n\nConfirmar exclusão?`)) {
        if (confirm(`🚨 CONFIRMAÇÃO FINAL\n\nEsta é sua última chance!\n\nExcluir "${titulo}" PERMANENTEMENTE?`)) {
          document.getElementById('deleteVagaId').value = vagaId;
          document.getElementById('deleteForm').submit();
        }
      }
    }

    function editarVaga(vagaId) {
      // Fazer requisição AJAX para buscar dados da vaga
      fetch(`api.php?action=get_vaga&id=${vagaId}`)
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            const vaga = data.vaga;
            
            // Preencher o modal com os dados da vaga
            document.getElementById('edit_vaga_id').value = vagaId;
            document.getElementById('edit_titulo').value = vaga.titulo || '';
            document.getElementById('edit_empresa').value = vaga.empresa || '';
            document.getElementById('edit_localizacao').value = vaga.localizacao || '';
            document.getElementById('edit_modalidade').value = vaga.modalidade || '';
            document.getElementById('edit_salario_min').value = vaga.salario_min || '';
            document.getElementById('edit_salario_max').value = vaga.salario_max || '';
            document.getElementById('edit_vagas_disponiveis').value = vaga.vagas_disponiveis || 1;
            document.getElementById('edit_data_encerramento').value = vaga.data_encerramento || '';
            document.getElementById('edit_tipo').value = vaga.tipo_contrato || 'clt';
            document.getElementById('edit_status').value = vaga.status || 'ativa';
            document.getElementById('edit_descricao').value = vaga.descricao || '';
            document.getElementById('edit_requisitos').value = vaga.requisitos || '';
            document.getElementById('edit_beneficios').value = vaga.beneficios || '';
            
            // Configurar data mínima como amanhã
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            document.getElementById('edit_data_encerramento').min = tomorrow.toISOString().split('T')[0];
            
            // Abrir modal
            document.getElementById('editModal').style.display = 'block';
          } else {
            alert('Erro ao carregar dados da vaga: ' + data.message);
          }
        })
        .catch(error => {
          console.error('Erro:', error);
          
          // Fallback: buscar dados da vaga do DOM atual
          const vagaCard = document.querySelector(`[data-vaga-id="${vagaId}"]`);
          
          if (vagaCard) {
            // Extrair dados da vaga do DOM
            const titulo = vagaCard.querySelector('.vaga-title').textContent.trim();
            const empresa = vagaCard.querySelector('.vaga-company').textContent.trim();
            const localizacao = vagaCard.querySelector('.info-item i.fa-map-marker-alt').nextElementSibling.textContent.trim();
            const salario = vagaCard.querySelector('.info-item i.fa-dollar-sign').nextElementSibling.textContent.trim();
            const descricao = vagaCard.querySelector('.vaga-description').textContent.trim();
            
            // Preencher o modal
            document.getElementById('edit_vaga_id').value = vagaId;
            document.getElementById('edit_titulo').value = titulo;
            document.getElementById('edit_empresa').value = empresa;
            document.getElementById('edit_localizacao').value = localizacao;
            document.getElementById('edit_salario').value = salario === 'A combinar' ? '' : salario;
            document.getElementById('edit_descricao').value = descricao;
            
            // Abrir modal
            document.getElementById('editModal').style.display = 'block';
          } else {
            // Último recurso: abrir modal vazio
            document.getElementById('edit_vaga_id').value = vagaId;
            document.getElementById('editModal').style.display = 'block';
          }
        });
    }

    function closeEditModal() {
      document.getElementById('editModal').style.display = 'none';
      // Limpar formulário
      document.getElementById('editForm').reset();
    }

    // Fechar modal ao clicar fora dele
    window.onclick = function(event) {
      const modal = document.getElementById('editModal');
      if (event.target === modal) {
        closeEditModal();
      }
    }

    // Animações de entrada
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.vaga-card');
      cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
          card.style.transition = 'all 0.6s ease';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 100);
      });

      // Validação para data de encerramento
      const dataEncerramentoInput = document.getElementById('edit_data_encerramento');
      if (dataEncerramentoInput) {
        dataEncerramentoInput.addEventListener('change', function() {
          const selectedDate = new Date(this.value);
          const today = new Date();
          today.setHours(0, 0, 0, 0);
          
          if (selectedDate <= today) {
            this.setCustomValidity('A data de encerramento deve ser posterior a hoje');
            this.style.borderColor = '#dc2626';
          } else {
            this.setCustomValidity('');
            this.style.borderColor = '#d1d5db';
          }
        });
      }

      // Validação no submit do formulário de edição
      const editForm = document.getElementById('editForm');
      if (editForm) {
        editForm.addEventListener('submit', function(e) {
          const dataInput = document.getElementById('edit_data_encerramento');
          if (dataInput && dataInput.value) {
            const selectedDate = new Date(dataInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (selectedDate <= today) {
              e.preventDefault();
              alert('Por favor, selecione uma data de encerramento posterior a hoje.');
              return;
            }
          }
          
          const submitBtn = this.querySelector('.btn-save');
          if (submitBtn) {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Salvando...';
            submitBtn.disabled = true;
          }
        });
      }
    });
  </script>
</body>
</html>
