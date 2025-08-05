<?php
require_once 'config.php';

$admin_nome = 'Administrador (Modo Teste)';
$message = '';
$message_type = '';

// Processar criação de vaga
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $database = new Database();
        $pdo = $database->connect();
        
        $titulo = trim($_POST['titulo'] ?? '');
        $empresa = trim($_POST['empresa'] ?? '');
        $localizacao = trim($_POST['localizacao'] ?? '');
        $salario_min = trim($_POST['salario_min'] ?? '');
        $salario_max = trim($_POST['salario_max'] ?? '');
        $tipo = trim($_POST['tipo'] ?? '');
        $modalidade = trim($_POST['modalidade'] ?? '');
        $vagas_disponiveis = (int)($_POST['vagas_disponiveis'] ?? 1);
        $data_encerramento = trim($_POST['data_encerramento'] ?? '');
        $status = trim($_POST['status'] ?? 'ativa');
        $descricao = trim($_POST['descricao'] ?? '');
        $requisitos = trim($_POST['requisitos'] ?? '');
        $beneficios = trim($_POST['beneficios'] ?? '');
        
        // Validação básica
        if (empty($titulo) || empty($empresa) || empty($descricao)) {
            throw new Exception('Título, empresa e descrição são obrigatórios');
        }
        
        if ($vagas_disponiveis < 1) {
            $vagas_disponiveis = 1;
        }
        
        // Validar data de encerramento
        if (!empty($data_encerramento)) {
            $data_hoje = date('Y-m-d');
            if ($data_encerramento <= $data_hoje) {
                throw new Exception('Data de encerramento deve ser posterior à data atual');
            }
        } else {
            // Se não fornecida, definir como null
            $data_encerramento = null;
        }
        
        $stmt = $pdo->prepare("
            INSERT INTO vagas (titulo, empresa, localizacao, salario_min, salario_max, tipo_contrato, modalidade, vagas_disponiveis, data_encerramento, status, descricao, requisitos, beneficios, data_publicacao, data_criacao) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), NOW())
        ");
        
        $stmt->execute([
            $titulo, $empresa, $localizacao, $salario_min, $salario_max,
            $tipo, $modalidade, $vagas_disponiveis, $data_encerramento ?: null, $status, $descricao, $requisitos, $beneficios
        ]);
        
        $message = 'Vaga criada com sucesso!';
        $message_type = 'success';
        
        // Limpar formulário após sucesso
        $_POST = [];
        
    } catch (Exception $e) {
        $message = 'Erro ao criar vaga: ' . $e->getMessage();
        $message_type = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Vaga - ENIAC LINK+ (Modo Teste)</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #34609b 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            max-width: 950px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .header {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #34609b 100%);
            color: white;
            padding: 50px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="8" height="8" patternUnits="userSpaceOnUse"><path d="M 8 0 L 0 0 0 8" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.4;
        }

        .header h1 {
            font-size: 3rem;
            margin-bottom: 16px;
            font-weight: 700;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: -0.5px;
        }

        .header p {
            font-size: 1.3rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.5;
        }

        .nav-back {
            position: absolute;
            top: 25px;
            left: 25px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 14px 20px;
            border-radius: 15px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            z-index: 3;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            font-size: 0.95rem;
        }

        .nav-back:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateX(-8px) translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .form-container {
            padding: 60px 50px;
            background: linear-gradient(135deg, rgba(248, 250, 252, 0.8) 0%, rgba(241, 245, 249, 0.9) 100%);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 35px;
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
            color: #1e293b;
            font-size: 1.05rem;
            letter-spacing: 0.2px;
        }

        .required {
            color: #dc2626;
            font-weight: 700;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 18px 22px;
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
            min-height: 150px;
            resize: vertical;
            line-height: 1.6;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #64748b;
            font-style: italic;
        }

        .btn-container {
            display: flex;
            gap: 25px;
            justify-content: center;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 18px 36px;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.3px;
            min-width: 180px;
            justify-content: center;
            text-transform: uppercase;
            font-size: 0.95rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #34609b 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(30, 60, 114, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(30, 60, 114, 0.4);
            background: linear-gradient(135deg, #1a3565 0%, #24487d 50%, #2e5485 100%);
        }

        .btn-primary:active {
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(100, 116, 139, 0.3);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #475569 0%, #334155 100%);
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(100, 116, 139, 0.4);
        }

        .message {
            padding: 22px 28px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 500;
            font-size: 1rem;
            border-left: 5px solid;
            animation: slideInDown 0.5s ease-out;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message.success {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #047857;
            border-left-color: #10b981;
        }

        .message.error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            color: #dc2626;
            border-left-color: #ef4444;
        }

        /* Efeitos visuais modernos */
        .form-group::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(42, 82, 152, 0.3), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .form-group:focus-within::before {
            opacity: 1;
        }

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
            width: 100px;
            height: 100px;
            top: 15%;
            left: 8%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 140px;
            height: 140px;
            top: 65%;
            left: 85%;
            animation-delay: 8s;
        }

        .shape:nth-child(3) {
            width: 80px;
            height: 80px;
            top: 85%;
            left: 15%;
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

        @media (max-width: 768px) {
            .container {
                margin: 15px 10px;
                border-radius: 16px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .header h1 {
                font-size: 2.5rem;
            }

            .header p {
                font-size: 1.1rem;
            }

            .form-container {
                padding: 40px 30px;
            }

            .btn-container {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }

            .nav-back {
                position: static;
                display: inline-block;
                margin-bottom: 25px;
            }

            .header {
                padding: 40px 25px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px 10px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .form-container {
                padding: 30px 20px;
            }

            .form-group input,
            .form-group select,
            .form-group textarea {
                padding: 16px 18px;
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
    
    <div class="container">
        <div class="header">
            <a href="gerenciar_vagas.php" class="nav-back">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
            <h1><i class="fas fa-plus-circle"></i> Criar Nova Vaga</h1>
            <p>Preencha os detalhes da nova oportunidade de emprego com cuidado e precisão</p>
        </div>

        <div class="form-container">
            <?php if ($message): ?>
                <div class="message <?php echo $message_type; ?>">
                    <i class="fas fa-<?php echo $message_type === 'success' ? 'check-circle' : 'exclamation-circle'; ?>"></i>
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="titulo">
                            <i class="fas fa-briefcase"></i> Título da Vaga <span class="required">*</span>
                        </label>
                        <input type="text" id="titulo" name="titulo" required 
                               placeholder="Ex: Desenvolvedor Full Stack Sênior"
                               value="<?php echo htmlspecialchars($_POST['titulo'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="empresa">
                            <i class="fas fa-building"></i> Empresa <span class="required">*</span>
                        </label>
                        <input type="text" id="empresa" name="empresa" required 
                               placeholder="Ex: ENIAC LINK+"
                               value="<?php echo htmlspecialchars($_POST['empresa'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="localizacao">
                            <i class="fas fa-map-marker-alt"></i> Localização
                        </label>
                        <input type="text" id="localizacao" name="localizacao" 
                               placeholder="Ex: São Paulo - SP"
                               value="<?php echo htmlspecialchars($_POST['localizacao'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="modalidade">
                            <i class="fas fa-laptop-house"></i> Modalidade
                        </label>
                        <select id="modalidade" name="modalidade">
                            <option value="">Selecione a modalidade</option>
                            <option value="presencial" <?php echo ($_POST['modalidade'] ?? '') === 'presencial' ? 'selected' : ''; ?>>Presencial</option>
                            <option value="remoto" <?php echo ($_POST['modalidade'] ?? '') === 'remoto' ? 'selected' : ''; ?>>Remoto</option>
                            <option value="híbrido" <?php echo ($_POST['modalidade'] ?? '') === 'híbrido' ? 'selected' : ''; ?>>Híbrido</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="salario_min">
                            <i class="fas fa-dollar-sign"></i> Salário Mínimo
                        </label>
                        <input type="number" id="salario_min" name="salario_min" 
                               placeholder="Ex: 5000"
                               min="0" step="100"
                               value="<?php echo htmlspecialchars($_POST['salario_min'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="salario_max">
                            <i class="fas fa-money-bill-wave"></i> Salário Máximo
                        </label>
                        <input type="number" id="salario_max" name="salario_max" 
                               placeholder="Ex: 8000"
                               min="0" step="100"
                               value="<?php echo htmlspecialchars($_POST['salario_max'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="vagas_disponiveis">
                            <i class="fas fa-users"></i> Vagas Disponíveis
                        </label>
                        <input type="number" id="vagas_disponiveis" name="vagas_disponiveis" 
                               placeholder="Ex: 2"
                               min="1" max="50"
                               value="<?php echo htmlspecialchars($_POST['vagas_disponiveis'] ?? '1'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="data_encerramento">
                            <i class="fas fa-calendar-times"></i> Data de Encerramento
                        </label>
                        <input type="date" id="data_encerramento" name="data_encerramento" 
                               min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                               value="<?php echo htmlspecialchars($_POST['data_encerramento'] ?? ''); ?>">
                    </div>

                    <div class="form-group">
                        <label for="tipo">
                            <i class="fas fa-file-contract"></i> Tipo de Contrato
                        </label>
                        <select id="tipo" name="tipo">
                            <option value="">Selecione o tipo</option>
                            <option value="clt" <?php echo ($_POST['tipo'] ?? '') === 'clt' ? 'selected' : ''; ?>>CLT</option>
                            <option value="pj" <?php echo ($_POST['tipo'] ?? '') === 'pj' ? 'selected' : ''; ?>>PJ</option>
                            <option value="estagio" <?php echo ($_POST['tipo'] ?? '') === 'estagio' ? 'selected' : ''; ?>>Estágio</option>
                            <option value="freelancer" <?php echo ($_POST['tipo'] ?? '') === 'freelancer' ? 'selected' : ''; ?>>Freelancer</option>
                            <option value="temporario" <?php echo ($_POST['tipo'] ?? '') === 'temporario' ? 'selected' : ''; ?>>Temporário</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">
                            <i class="fas fa-toggle-on"></i> Status
                        </label>
                        <select id="status" name="status">
                            <option value="ativa" <?php echo ($_POST['status'] ?? 'ativa') === 'ativa' ? 'selected' : ''; ?>>Ativa</option>
                            <option value="pausada" <?php echo ($_POST['status'] ?? '') === 'pausada' ? 'selected' : ''; ?>>Pausada</option>
                        </select>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label for="descricao">
                        <i class="fas fa-align-left"></i> Descrição da Vaga <span class="required">*</span>
                    </label>
                    <textarea id="descricao" name="descricao" required 
                              placeholder="Descreva as principais responsabilidades, objetivos da posição e o que a pessoa fará no dia a dia..."><?php echo htmlspecialchars($_POST['descricao'] ?? ''); ?></textarea>
                </div>

                <div class="form-group full-width">
                    <label for="requisitos">
                        <i class="fas fa-list-check"></i> Requisitos
                    </label>
                    <textarea id="requisitos" name="requisitos" 
                              placeholder="Liste os requisitos necessários como:&#10;• Formação acadêmica&#10;• Experiência profissional&#10;• Conhecimentos técnicos&#10;• Habilidades comportamentais"><?php echo htmlspecialchars($_POST['requisitos'] ?? ''); ?></textarea>
                </div>

                <div class="form-group full-width">
                    <label for="beneficios">
                        <i class="fas fa-gift"></i> Benefícios
                    </label>
                    <textarea id="beneficios" name="beneficios" 
                              placeholder="Descreva os benefícios oferecidos:&#10;• Vale alimentação/refeição&#10;• Plano de saúde&#10;• Home office&#10;• Desenvolvimento profissional&#10;• Outros benefícios"><?php echo htmlspecialchars($_POST['beneficios'] ?? ''); ?></textarea>
                </div>

                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Criar Vaga
                    </button>
                    <a href="gerenciar_vagas.php" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Animação de entrada suave para os elementos
        document.addEventListener('DOMContentLoaded', function() {
            const formGroups = document.querySelectorAll('.form-group');
            
            formGroups.forEach((group, index) => {
                setTimeout(() => {
                    group.style.opacity = '0';
                    group.style.transform = 'translateY(20px)';
                    group.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                    
                    setTimeout(() => {
                        group.style.opacity = '1';
                        group.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 100);
            });
        });

        // Validação em tempo real
        document.getElementById('titulo').addEventListener('input', function() {
            const value = this.value.trim();
            if (value.length > 0 && value.length < 5) {
                this.style.borderColor = '#f59e0b';
            } else if (value.length >= 5) {
                this.style.borderColor = '#10b981';
            } else {
                this.style.borderColor = '#e2e8f0';
            }
        });

        document.getElementById('empresa').addEventListener('input', function() {
            const value = this.value.trim();
            if (value.length > 0 && value.length < 3) {
                this.style.borderColor = '#f59e0b';
            } else if (value.length >= 3) {
                this.style.borderColor = '#10b981';
            } else {
                this.style.borderColor = '#e2e8f0';
            }
        });

        document.getElementById('descricao').addEventListener('input', function() {
            const value = this.value.trim();
            if (value.length > 0 && value.length < 50) {
                this.style.borderColor = '#f59e0b';
            } else if (value.length >= 50) {
                this.style.borderColor = '#10b981';
            } else {
                this.style.borderColor = '#e2e8f0';
            }
        });

        // Contador de caracteres para textarea
        const textareas = document.querySelectorAll('textarea');
        textareas.forEach(textarea => {
            const counter = document.createElement('div');
            counter.style.cssText = `
                font-size: 0.85rem;
                color: #64748b;
                text-align: right;
                margin-top: 8px;
                font-weight: 500;
            `;
            textarea.parentNode.appendChild(counter);

            function updateCounter() {
                const count = textarea.value.length;
                counter.textContent = `${count} caracteres`;
                
                if (count > 500) {
                    counter.style.color = '#dc2626';
                } else if (count > 300) {
                    counter.style.color = '#f59e0b';
                } else {
                    counter.style.color = '#64748b';
                }
            }

            textarea.addEventListener('input', updateCounter);
            updateCounter();
        });

        // Validação para data de encerramento
        const dataEncerramentoInput = document.getElementById('data_encerramento');
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

        // Feedback visual melhor para o form
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            // Validar data antes de enviar
            if (dataEncerramentoInput && dataEncerramentoInput.value) {
                const selectedDate = new Date(dataEncerramentoInput.value);
                const today = new Date();
                today.setHours(0, 0, 0, 0);
                
                if (selectedDate <= today) {
                    e.preventDefault();
                    alert('Por favor, selecione uma data de encerramento posterior a hoje.');
                    return;
                }
            }
            
            const submitBtn = this.querySelector('.btn-primary');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Criando...';
            submitBtn.disabled = true;
        });

        // Auto-resize para textareas
        textareas.forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        });
    </script>
</body>
</html>
