<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ENIAC LINK+ | Processo Seletivo Virtual Premium</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
      --premium-gradient: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
      --dark-gradient: linear-gradient(135deg, #232526 0%, #414345 100%);
      --glass-bg: rgba(255, 255, 255, 0.1);
      --glass-border: rgba(255, 255, 255, 0.2);
      --shadow-primary: 0 8px 32px rgba(31, 38, 135, 0.37);
      --shadow-premium: 0 8px 32px rgba(255, 215, 0, 0.3);
      --text-primary: #2d3748;
      --text-secondary: #4a5568;
      --border-radius-lg: 20px;
      --border-radius-xl: 24px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      background-attachment: fixed;
      color: var(--text-primary);
      line-height: 1.7;
      overflow-x: hidden;
    }

    /* Elementos flutuantes de fundo */
    .floating-elements {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: -1;
    }

    .floating-elements::before,
    .floating-elements::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      opacity: 0.1;
      animation: float 6s ease-in-out infinite;
    }

    .floating-elements::before {
      width: 300px;
      height: 300px;
      background: var(--secondary-gradient);
      top: -150px;
      right: -150px;
      animation-delay: -3s;
    }

    .floating-elements::after {
      width: 200px;
      height: 200px;
      background: var(--success-gradient);
      bottom: -100px;
      left: -100px;
      animation-delay: -1s;
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
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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
    }

    nav a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      padding: 1rem 1.8rem;
      border-radius: 20px;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
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

    nav a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 3px;
      background: var(--success-gradient);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      transform: translateX(-50%);
      border-radius: 2px;
    }

    nav a:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
      color: #ffffff;
    }

    nav a:hover::after {
      width: 80%;
    }

    nav a:hover i {
      transform: rotate(360deg) scale(1.2);
      color: #00f2fe;
    }

    nav a.active {
      background: var(--success-gradient);
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
      transform: translateY(-2px);
    }

    nav a.active::after {
      width: 90%;
      background: rgba(255, 255, 255, 0.9);
    }

    nav a i {
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 1.1rem;
    }

    /* Efeito premium para botão ativo */
    nav a.active {
      animation: premiumGlow 3s ease-in-out infinite alternate;
    }

    @keyframes premiumGlow {
      0% {
        box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
      }
      100% {
        box-shadow: 0 8px 35px rgba(79, 172, 254, 0.6), 0 0 40px rgba(0, 242, 254, 0.3);
      }
    }

    /* Menu Mobile */
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .header-container {
        flex-direction: column;
        gap: 1rem;
        padding: 1rem;
      }

      .logo-header {
        width: 60px;
        height: 60px;
      }

      nav {
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.5rem;
      }

      nav a {
        padding: 0.6rem 1.2rem;
        font-size: 0.85rem;
        border-radius: 20px;
      }

      nav a:hover {
        transform: translateY(-2px) scale(1.03);
      }

      .mobile-menu-btn {
        display: none;
      }
    }

    @media (max-width: 480px) {
      .logo-header {
        width: 50px;
        height: 50px;
      }

      nav {
        gap: 0.3rem;
      }

      nav a {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
        border-radius: 18px;
      }

      nav a i {
        font-size: 0.9rem;
      }

      .header-container {
        padding: 0.8rem;
      }
    }

    /* Hero Section Premium */
    .hero {
      background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
      backdrop-filter: blur(20px);
      color: white;
      padding: 120px 20px;
      display: flex;
      align-items: center;
      gap: 60px;
      min-height: 85vh;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(79, 172, 254, 0.3) 0%, transparent 50%);
      animation: float 8s ease-in-out infinite;
    }

    .hero-container {
      max-width: 1400px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 80px;
      align-items: center;
      position: relative;
      z-index: 2;
    }

    .hero-content h1 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 1.5rem;
      background: linear-gradient(135deg, #ffffff, #f0f8ff, #e6f3ff);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      animation: textShine 3s ease-in-out infinite alternate;
    }

    @keyframes textShine {
      0% { background-position: 0% 50%; }
      100% { background-position: 100% 50%; }
    }

    .hero-content p {
      font-size: 1.3rem;
      line-height: 1.8;
      margin-bottom: 2.5rem;
      opacity: 0.95;
      font-weight: 400;
    }

    .hero-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem;
      margin: 3rem 0;
    }

    .stat-item {
      text-align: center;
      padding: 1.5rem;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: var(--border-radius-lg);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.4s ease;
    }

    .stat-item:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.15);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 800;
      font-family: 'Poppins', sans-serif;
      background: var(--success-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      display: block;
    }

    .stat-label {
      font-size: 0.9rem;
      opacity: 0.9;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 0.5rem;
    }

    .hero-visual {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .hero-image {
      width: 100%;
      max-width: 500px;
      height: auto;
      border-radius: var(--border-radius-xl);
      box-shadow: var(--shadow-primary);
      transform: perspective(1000px) rotateY(-15deg) rotateX(5deg);
      transition: all 0.4s ease;
    }

    .hero-image:hover {
      transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.05);
    }

    .floating-card {
      position: absolute;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(20px);
      border-radius: var(--border-radius-lg);
      padding: 1.5rem;
      box-shadow: var(--shadow-primary);
      color: var(--text-primary);
      animation: cardFloat 6s ease-in-out infinite;
    }

    .floating-card-1 {
      top: 10%;
      right: -10%;
      animation-delay: -2s;
    }

    .floating-card-2 {
      bottom: 20%;
      left: -15%;
      animation-delay: -4s;
    }

    @keyframes cardFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(2deg); }
    }

    /* Botões CTA Premium */
    .cta-buttons {
      display: flex;
      gap: 1.5rem;
      margin-top: 2.5rem;
      flex-wrap: wrap;
    }

    .btn-primary, .btn-secondary {
      padding: 1.2rem 2.5rem;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-family: 'Poppins', sans-serif;
      border: none;
      cursor: pointer;
    }

    .btn-primary {
      background: var(--success-gradient);
      color: white;
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
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
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 15px 35px rgba(79, 172, 254, 0.6);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, 0.15);
      color: white;
      border: 2px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(15px);
    }

    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.25);
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(255, 255, 255, 0.2);
    }

    .btn i {
      font-size: 1.2rem;
      transition: all 0.4s ease;
    }

    .btn-primary:hover i {
      transform: rotate(360deg) scale(1.2);
    }

    .btn-secondary:hover i {
      transform: translateX(5px);
    }

    /* Seção de recursos premium */
    .features-section {
      padding: 120px 20px;
      background: linear-gradient(135deg, #f8fafc, #e2e8f0);
      position: relative;
    }

    .features-container {
      max-width: 1400px;
      margin: 0 auto;
    }

    .section-header {
      text-align: center;
      margin-bottom: 80px;
    }

    .section-header h2 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(2.5rem, 4vw, 3.5rem);
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 1.5rem;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .section-header p {
      font-size: 1.2rem;
      color: var(--text-secondary);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.8;
    }

    .features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 3rem;
    }

    .feature-card {
      background: white;
      padding: 3rem 2.5rem;
      border-radius: var(--border-radius-xl);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: var(--primary-gradient);
      transform: scaleX(0);
      transition: transform 0.4s ease;
    }

    .feature-card:hover::before {
      transform: scaleX(1);
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .feature-icon {
      width: 80px;
      height: 80px;
      background: var(--primary-gradient);
      border-radius: var(--border-radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 2rem;
      position: relative;
    }

    .feature-icon i {
      font-size: 2rem;
      color: white;
    }

    .feature-icon::after {
      content: '';
      position: absolute;
      top: -5px;
      left: -5px;
      right: -5px;
      bottom: -5px;
      background: var(--success-gradient);
      border-radius: var(--border-radius-lg);
      z-index: -1;
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    .feature-card:hover .feature-icon::after {
      opacity: 1;
    }

    .feature-title {
      font-family: 'Poppins', sans-serif;
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--text-primary);
      margin-bottom: 1rem;
    }

    .feature-description {
      color: var(--text-secondary);
      line-height: 1.7;
      font-size: 1rem;
    }
      margin: 0 auto;
      display: flex;
      align-items: center;
      gap: 40px;
      position: relative;
      z-index: 1;
    }

    .hero img {
      flex-shrink: 0;
    }

    .hero-text {
      flex-grow: 1;
    }

    .hero h1 {
      font-size: 3.5rem;
      margin-bottom: 24px;
      font-weight: 700;
      line-height: 1.2;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero p {
      font-size: 1.3rem;
      margin-bottom: 32px;
      opacity: 0.95;
      font-weight: 300;
    }

    .cta-buttons {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }

    .btn-primary {
      background: rgba(255, 255, 255, 0.95);
      color: #0056b3;
      padding: 14px 28px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:hover {
      background: white;
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .btn-secondary {
      background: transparent;
      color: white;
      border: 2px solid rgba(255, 255, 255, 0.8);
      padding: 12px 26px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.1);
      border-color: white;
    }

    .logo-hero {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
      border: 4px solid rgba(255, 255, 255, 0.2);
      transition: transform 0.3s ease;
    }

    .logo-hero:hover {
      transform: scale(1.05);
    }

    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
        text-align: center;
        padding: 60px 20px;
        min-height: auto;
      }

      .hero-container {
        flex-direction: column;
        text-align: center;
      }

      .hero h1 {
        font-size: 2.5rem;
      }

      .hero p {
        font-size: 1.1rem;
      }

      .logo-hero {
        width: 150px;
        height: 150px;
      }

      .cta-buttons {
        justify-content: center;
      }
    }

    /* Seção de Estatísticas */
    .stats-section {
      background: #f8f9fa;
      padding: 60px 20px;
    }

    .stats-container {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 40px;
      text-align: center;
    }

    .stat-item {
      background: white;
      padding: 40px 20px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .stat-item:hover {
      transform: translateY(-5px);
    }

    .stat-number {
      font-size: 3rem;
      font-weight: 700;
      color: #0056b3;
      display: block;
      margin-bottom: 12px;
    }

    .stat-label {
      font-size: 1.1rem;
      color: #666;
      font-weight: 500;
    }

    /* Seção de Serviços Melhorada */
    .services-section {
      padding: 80px 20px;
      background: white;
    }

    .services-header {
      text-align: center;
      max-width: 800px;
      margin: 0 auto 60px;
    }

    .services-header h2 {
      font-size: 2.8rem;
      color: #333;
      margin-bottom: 20px;
      font-weight: 700;
    }

    .services-header p {
      font-size: 1.2rem;
      color: #666;
      line-height: 1.6;
    }

    .carousel-wrapper {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 30px;
      padding: 0 20px;
    }

    .card {
      border-radius: 16px;
      color: white;
      position: relative;
      height: 400px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 30px;
      background-size: cover;
      background-position: center;
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, rgba(0, 86, 179, 0.8), rgba(0, 123, 255, 0.6));
      transition: opacity 0.3s ease;
    }

    .card:hover::before {
      opacity: 0.9;
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
    }

    .card-content {
      position: relative;
      z-index: 2;
    }

    .card-icon {
      font-size: 3rem;
      margin-bottom: 16px;
      display: block;
    }

    .card h3 {
      font-size: 1.8rem;
      margin-bottom: 12px;
      font-weight: 600;
    }

    .card p {
      font-size: 1rem;
      margin-bottom: 20px;
      line-height: 1.5;
      opacity: 0.95;
    }

    .card a {
      background: rgba(255, 255, 255, 0.95);
      color: #0056b3;
      padding: 12px 24px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      align-self: flex-start;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .card a:hover {
      background: white;
      transform: translateX(5px);
    }

    /* Seção de Depoimentos Premium */
    .testimonials-section {
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      padding: 100px 20px;
      position: relative;
      overflow: hidden;
    }

    .testimonials-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" patternUnits="userSpaceOnUse" width="100" height="100"><circle cx="50" cy="50" r="1" fill="%23667eea" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      pointer-events: none;
    }

    .testimonials-container {
      max-width: 1400px;
      margin: 0 auto;
      text-align: center;
      position: relative;
      z-index: 2;
    }

    .testimonials-header h2 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(2.5rem, 4vw, 3.5rem);
      font-weight: 800;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1.5rem;
      position: relative;
    }

    .testimonials-header h2::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80px;
      height: 4px;
      background: var(--success-gradient);
      border-radius: 2px;
    }

    .testimonials-header p {
      font-size: 1.3rem;
      color: var(--text-secondary);
      margin-bottom: 4rem;
      max-width: 700px;
      margin-left: auto;
      margin-right: auto;
      line-height: 1.8;
    }

    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 2.5rem;
      margin-bottom: 3rem;
    }

    .premium-testimonial {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: var(--border-radius-xl);
      padding: 2.5rem;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      text-align: left;
      position: relative;
      overflow: hidden;
    }

    .premium-testimonial::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: var(--primary-gradient);
    }

    .premium-testimonial:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 30px 80px rgba(0, 0, 0, 0.15);
    }

    .testimonial-content {
      margin-bottom: 2rem;
    }

    .quote-icon {
      color: var(--primary-gradient);
      font-size: 2rem;
      margin-bottom: 1rem;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .testimonial-text {
      font-size: 1.2rem;
      color: var(--text-primary);
      line-height: 1.8;
      margin-bottom: 1.5rem;
      font-style: italic;
      position: relative;
    }

    .testimonial-rating {
      margin-bottom: 1rem;
    }

    .testimonial-rating i {
      color: #ffc107;
      font-size: 1.1rem;
      margin-right: 0.2rem;
      filter: drop-shadow(0 2px 4px rgba(255, 193, 7, 0.3));
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding-top: 1.5rem;
      border-top: 1px solid rgba(102, 126, 234, 0.1);
    }

    .author-avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 700;
      font-size: 1.3rem;
      font-family: 'Poppins', sans-serif;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      position: relative;
      overflow: hidden;
    }

    .author-avatar.marina {
      background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .author-avatar.roberto {
      background: linear-gradient(135deg, #4facfe, #00f2fe);
    }

    .author-avatar.ana {
      background: linear-gradient(135deg, #f093fb, #f5576c);
    }

    .author-avatar::before {
      content: '';
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      border-radius: 50%;
      background: var(--premium-gradient);
      z-index: -1;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .premium-testimonial:hover .author-avatar::before {
      opacity: 1;
    }

    .author-info h4 {
      color: var(--text-primary);
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 0.3rem;
      font-family: 'Poppins', sans-serif;
    }

    .author-info p {
      color: var(--text-secondary);
      font-size: 0.95rem;
      margin-bottom: 0.5rem;
    }

    .verified-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.3rem;
      background: rgba(79, 172, 254, 0.1);
      color: #4facfe;
      padding: 0.3rem 0.8rem;
      border-radius: 15px;
      font-size: 0.8rem;
      font-weight: 600;
      border: 1px solid rgba(79, 172, 254, 0.2);
    }

    .verified-badge i {
      font-size: 0.9rem;
    }

    .testimonials-footer {
      text-align: center;
      margin-top: 3rem;
    }

    .btn-enviar-testimonial {
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
      background: var(--success-gradient);
      color: white;
      padding: 1.2rem 2.5rem;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      font-weight: 700;
      font-size: 1.1rem;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-family: 'Poppins', sans-serif;
    }

    .btn-enviar-testimonial::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s ease;
    }

    .btn-enviar-testimonial:hover::before {
      left: 100%;
    }

    .btn-enviar-testimonial:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 15px 35px rgba(79, 172, 254, 0.6);
      color: white;
      text-decoration: none;
    }

    .btn-enviar-testimonial i {
      transition: transform 0.3s ease;
    }

    .btn-enviar-testimonial:hover i {
      transform: rotate(90deg);
    }

    /* Testimonials Section */
    .testimonials-section {
      padding: 80px 20px;
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      margin: 60px 0;
    }

    .testimonials-container {
      max-width: 1200px;
      margin: 0 auto;
      text-align: center;
    }

    .testimonials-section h2 {
      color: #2c3e50;
      font-size: 2.5rem;
      margin-bottom: 20px;
      font-weight: 700;
    }

    .testimonials-section .subtitle {
      color: #666;
      font-size: 1.2rem;
      margin-bottom: 50px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    /* Footer Premium Ultra-Profissional */
    footer {
      background: linear-gradient(135deg, #0f1419 0%, #1a202c 50%, #2d3748 100%);
      color: white;
      padding: 0;
      position: relative;
      overflow: hidden;
    }

    footer::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23667eea" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,197.3C1248,203,1344,149,1392,122.7L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>');
      background-size: cover;
      background-position: top;
      pointer-events: none;
    }

    .footer-top-section {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      padding: 60px 20px;
      position: relative;
      z-index: 2;
    }

    .footer-cta-container {
      max-width: 1400px;
      margin: 0 auto;
      text-align: center;
      margin-bottom: 60px;
    }

    .footer-cta h2 {
      font-family: 'Poppins', sans-serif;
      font-size: clamp(2rem, 4vw, 3rem);
      font-weight: 800;
      background: linear-gradient(135deg, #667eea, #764ba2, #4facfe);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
    }

    .footer-cta p {
      font-size: 1.2rem;
      color: rgba(255, 255, 255, 0.8);
      margin-bottom: 2rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    .footer-cta-buttons {
      display: flex;
      gap: 1.5rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .footer-btn {
      display: inline-flex;
      align-items: center;
      gap: 0.8rem;
      padding: 1.2rem 2.5rem;
      border-radius: var(--border-radius-lg);
      font-weight: 700;
      font-size: 1rem;
      text-decoration: none;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      font-family: 'Poppins', sans-serif;
    }

    .footer-btn.primary {
      background: var(--success-gradient);
      color: white;
      box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
    }

    .footer-btn.secondary {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 2px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(10px);
    }

    .footer-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s ease;
    }

    .footer-btn:hover::before {
      left: 100%;
    }

    .footer-btn:hover {
      transform: translateY(-3px) scale(1.05);
      color: white;
      text-decoration: none;
    }

    .footer-btn.primary:hover {
      box-shadow: 0 15px 35px rgba(79, 172, 254, 0.6);
    }

    .footer-btn.secondary:hover {
      background: rgba(255, 255, 255, 0.2);
      border-color: rgba(255, 255, 255, 0.5);
    }

    .footer-container {
      max-width: 1400px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr;
      gap: 3rem;
      padding: 60px 20px;
      position: relative;
      z-index: 2;
    }

    .footer-section {
      position: relative;
    }

    .footer-brand {
      grid-column: 1;
    }

    .footer-brand .brand-logo {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .footer-brand .brand-logo img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
    }

    .footer-brand .brand-name {
      font-family: 'Poppins', sans-serif;
      font-size: 2rem;
      font-weight: 800;
      background: var(--primary-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .footer-section h3 {
      font-family: 'Poppins', sans-serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: white;
      margin-bottom: 1.5rem;
      position: relative;
      padding-bottom: 0.5rem;
    }

    .footer-section h3::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 40px;
      height: 3px;
      background: var(--success-gradient);
      border-radius: 2px;
    }

    .footer-section p {
      color: rgba(255, 255, 255, 0.8);
      line-height: 1.8;
      margin-bottom: 1.5rem;
      font-size: 1rem;
    }

    .footer-section ul {
      list-style: none;
    }

    .footer-section li {
      margin-bottom: 0.8rem;
    }

    .footer-section a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.3rem 0;
      border-radius: 6px;
      font-weight: 500;
    }

    .footer-section a:hover {
      color: #4facfe;
      background: rgba(79, 172, 254, 0.1);
      padding-left: 0.5rem;
      transform: translateX(5px);
    }

    .footer-section a i {
      width: 16px;
      text-align: center;
    }

    /* Estatísticas Premium */
    .footer-stats {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 1rem;
      margin: 2rem 0;
    }

    .stat-item {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: var(--border-radius-lg);
      padding: 1.5rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .stat-item:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateY(-3px);
    }

    .stat-number {
      display: block;
      font-family: 'Poppins', sans-serif;
      font-size: 1.8rem;
      font-weight: 800;
      background: var(--success-gradient);
      background-clip: text;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 0.3rem;
    }

    .stat-label {
      color: rgba(255, 255, 255, 0.8);
      font-size: 0.9rem;
      font-weight: 500;
    }

    /* Redes Sociais Premium */
    .social-links {
      display: flex;
      gap: 1rem;
      margin-top: 2rem;
      flex-wrap: wrap;
    }

    .social-link {
      width: 50px;
      height: 50px;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-decoration: none;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      font-size: 1.3rem;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .social-link::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.6s ease;
    }

    .social-link:hover::before {
      left: 100%;
    }

    .social-link.linkedin {
      background: linear-gradient(135deg, #0077b5, #005582);
    }

    .social-link.facebook {
      background: linear-gradient(135deg, #1877f2, #0d5dcc);
    }

    .social-link.instagram {
      background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
    }

    .social-link.whatsapp {
      background: linear-gradient(135deg, #25d366, #1ebe57);
    }

    .social-link.youtube {
      background: linear-gradient(135deg, #ff0000, #cc0000);
    }

    .social-link:hover {
      transform: translateY(-5px) scale(1.1);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }

    /* Informações de Contato Premium */
    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .contact-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.05);
      border-radius: var(--border-radius-lg);
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
    }

    .contact-item:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }

    .contact-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      background: var(--success-gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.1rem;
    }

    .contact-details h4 {
      color: white;
      font-weight: 600;
      margin-bottom: 0.2rem;
      font-size: 0.9rem;
    }

    .contact-details p {
      color: rgba(255, 255, 255, 0.8);
      margin: 0;
      font-size: 0.9rem;
    }

    /* Footer Bottom Premium */
    .footer-bottom {
      background: rgba(0, 0, 0, 0.3);
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      padding: 2rem 20px;
      text-align: center;
      position: relative;
      z-index: 2;
    }

    .footer-bottom-container {
      max-width: 1400px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .footer-copyright {
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.95rem;
    }

    .footer-copyright .heart {
      color: #ff4757;
      animation: heartbeat 2s ease-in-out infinite;
    }

    @keyframes heartbeat {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    .footer-badges {
      display: flex;
      gap: 1rem;
      align-items: center;
    }

    .footer-badge {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(255, 255, 255, 0.1);
      padding: 0.5rem 1rem;
      border-radius: 20px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 0.85rem;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

      .footer-badge i {
        color: #4facfe;
      }

      /* Responsividade Footer Premium */
      @media (max-width: 1024px) {
        .footer-container {
          grid-template-columns: 1fr 1fr 1fr;
          gap: 2rem;
        }
        
        .footer-brand {
          grid-column: 1 / -1;
        }
        
        .footer-cta-buttons {
          flex-direction: column;
          align-items: center;
        }
        
        .footer-btn {
          width: 100%;
          max-width: 300px;
          justify-content: center;
        }
      }

      @media (max-width: 768px) {
        .footer-container {
          grid-template-columns: 1fr;
          gap: 2rem;
          padding: 40px 20px;
        }
        
        .footer-top-section {
          padding: 40px 20px;
        }
        
        .footer-cta h2 {
          font-size: 2rem;
        }
        
        .footer-stats {
          grid-template-columns: 1fr;
        }
        
        .social-links {
          justify-content: center;
        }
        
        .footer-bottom-container {
          flex-direction: column;
          text-align: center;
        }
        
        .footer-badges {
          justify-content: center;
        }
      }

      @media (max-width: 480px) {
        .footer-btn {
          padding: 1rem 2rem;
          font-size: 0.9rem;
        }
        
        .contact-item {
          padding: 0.8rem;
        }
        
        .contact-icon {
          width: 35px;
          height: 35px;
        }
        
        .social-link {
          width: 45px;
          height: 45px;
        }
      }

    /* Responsividade Geral */
    @media (max-width: 768px) {
      .services-header h2 {
        font-size: 2.2rem;
      }

      .testimonials-header h2 {
        font-size: 2.2rem;
      }

      .carousel-wrapper {
        grid-template-columns: 1fr;
        padding: 0;
      }

      .card {
        height: 350px;
      }

      .stats-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
      }

      .testimonials-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }
      
      .premium-testimonial {
        padding: 2rem 1.5rem;
      }
      
      .testimonial-text {
        font-size: 1.1rem;
      }
      
      .author-avatar {
        width: 50px;
        height: 50px;
        font-size: 1.1rem;
      }
      
      .btn-enviar-testimonial {
        padding: 1rem 2rem;
        font-size: 1rem;
      }
    }

    @media (max-width: 480px) {
      .testimonials-section {
        padding: 60px 15px;
      }
      
      .testimonials-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .premium-testimonial {
        padding: 1.5rem 1rem;
      }
      
      .testimonial-text {
        font-size: 1rem;
      }
      
      .testimonials-header h2 {
        font-size: 1.8rem;
      }
      
      .testimonials-header p {
        font-size: 1rem;
      }
    }

    /* Animações */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in-up {
      animation: fadeInUp 0.6s ease-out;
    }

    /* Scroll suave */
    html {
      scroll-behavior: smooth;
    }
  </style>
</head>
<body>
  <!-- Elementos flutuantes de fundo -->
  <div class="floating-elements"></div>

  <header>
    <div class="header-container">
      <div class="logo-section">
        <img src="./imagens/Logoindex.jpg" alt="Logo da Empresa" class="logo-header">
      </div>
      <nav id="nav">
        <a href="index.php" class="active"><i class="fas fa-home"></i> Início</a>
        <a href="vagas.php"><i class="fas fa-briefcase"></i> Vagas</a>
        <a href="cadastro.php"><i class="fas fa-user-plus"></i> Cadastrar</a>
        <a href="fale_conosco.php"><i class="fas fa-comments"></i> Fale Conosco</a>
        <a href="login_admin.php"><i class="fas fa-sign-in-alt"></i> Login</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <div class="hero-container">
      <div class="hero-content">
        <h1>🚀 Revolução em Processos Seletivos</h1>
        <p>Transformamos a maneira como você encontra oportunidades de carreira. Plataforma inteligente, rápida e totalmente digital para conectar talentos às empresas dos sonhos.</p>
        
        <div class="hero-stats">
          <div class="stat-item">
            <span class="stat-number">1000+</span>
            <span class="stat-label">Candidatos</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">50+</span>
            <span class="stat-label">Empresas</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">95%</span>
            <span class="stat-label">Satisfação</span>
          </div>
        </div>

        <div class="cta-buttons">
          <a href="cadastro.php" class="btn-primary">
            <i class="fas fa-rocket"></i> Começar Jornada
          </a>
          <a href="vagas.php" class="btn-secondary">
            <i class="fas fa-search"></i> Explorar Vagas
          </a>
        </div>
      </div>

      <div class="hero-visual">
        <img src="./imagens/Logoindex.jpg" alt="Plataforma ENIAC LINK+" class="hero-image">
        
        <div class="floating-card floating-card-1">
          <i class="fas fa-briefcase" style="color: #667eea; font-size: 1.5rem; margin-bottom: 0.5rem;"></i>
          <h4 style="margin-bottom: 0.5rem;">Vagas Premium</h4>
          <p style="font-size: 0.9rem; color: #666;">Oportunidades exclusivas</p>
        </div>
        
        <div class="floating-card floating-card-2">
          <i class="fas fa-chart-line" style="color: #f093fb; font-size: 1.5rem; margin-bottom: 0.5rem;"></i>
          <h4 style="margin-bottom: 0.5rem;">Match Inteligente</h4>
          <p style="font-size: 0.9rem; color: #666;">IA para conexões perfeitas</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Seção de Recursos -->
  <section class="features-section">
    <div class="features-container">
      <div class="section-header">
        <h2>💎 Recursos Premium</h2>
        <p>Descubra os diferenciais que tornam nossa plataforma única e poderosa para impulsionar sua carreira profissional</p>
      </div>
      
      <div class="features-grid">
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-brain"></i>
          </div>
          <h3 class="feature-title">IA Inteligente</h3>
          <p class="feature-description">Algoritmos avançados que conectam seu perfil às vagas mais compatíveis, aumentando suas chances de sucesso em até 300%.</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3 class="feature-title">Segurança Total</h3>
          <p class="feature-description">Seus dados protegidos com criptografia militar. LGPD compliant e auditoria de segurança constante.</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-rocket"></i>
          </div>
          <h3 class="feature-title">Processo Rápido</h3>
          <p class="feature-description">Candidature-se em segundos. Sistema otimizado que reduz o tempo de aplicação em 80% comparado aos métodos tradicionais.</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-chart-line"></i>
          </div>
          <h3 class="feature-title">Analytics Avançado</h3>
          <p class="feature-description">Acompanhe métricas detalhadas do seu desempenho e receba insights para melhorar continuamente seu perfil.</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-mobile-alt"></i>
          </div>
          <h3 class="feature-title">Mobile First</h3>
          <p class="feature-description">Interface responsiva premium. Acesse de qualquer dispositivo com experiência fluida e design de alta qualidade.</p>
        </div>
        
        <div class="feature-card">
          <div class="feature-icon">
            <i class="fas fa-headset"></i>
          </div>
          <h3 class="feature-title">Suporte 24/7</h3>
          <p class="feature-description">Equipe especializada disponível sempre que precisar. Chat ao vivo, suporte por e-mail e base de conhecimento completa.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="stats-section">
    <div class="stats-container">
      <div class="stat-item fade-in-up">
        <span class="stat-number">1,250+</span>
        <span class="stat-label">Candidatos Aprovados</span>
      </div>
      <div class="stat-item fade-in-up">
        <span class="stat-number">350+</span>
        <span class="stat-label">Empresas Parceiras</span>
      </div>
      <div class="stat-item fade-in-up">
        <span class="stat-number">95%</span>
        <span class="stat-label">Taxa de Satisfação</span>
      </div>
      <div class="stat-item fade-in-up">
        <span class="stat-number">24h</span>
        <span class="stat-label">Tempo Médio de Resposta</span>
      </div>
    </div>
  </section>

  <section class="services-section">
    <div class="services-header">
      <h2>Nossos Serviços</h2>
      <p>Oferecemos uma plataforma completa para conectar talentos com as melhores oportunidades do mercado</p>
    </div>
    <div class="carousel-wrapper">
      <div class="card" style="background-image: url('https://images.unsplash.com/photo-1586281380349-632531db7ed5');">
        <div class="card-content">
          <span class="card-icon">🚀</span>
          <h3>Cadastro Inteligente</h3>
          <p>Envie seus dados e currículo em poucos minutos com nossa plataforma intuitiva e moderna.</p>
          <a href="cadastro.php">
            Cadastrar Agora <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="card" style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d');">
        <div class="card-content">
          <span class="card-icon">🔍</span>
          <h3>Vagas Personalizadas</h3>
          <p>Encontre oportunidades que combinam perfeitamente com seu perfil e objetivos profissionais.</p>
          <a href="vagas.php">
            Explorar Vagas <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="card" style="background-image: url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43');">
        <div class="card-content">
          <span class="card-icon">🎥</span>
          <h3>Entrevistas Online</h3>
          <p>Participe de entrevistas por vídeo chamadas de forma rápida, prática e segura.</p>
          <a href="cadastro.php#entrevista">
            Agendar Entrevista <i class="fas fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials-section">
    <div class="testimonials-container">
      <div class="testimonials-header">
        <h2>O que nossos candidatos dizem</h2>
        <p>Histórias reais de pessoas que encontraram suas oportunidades conosco</p>
      </div>
      <div class="testimonials-grid" id="candidatesTestimonials">
        <!-- Testimonials Estáticos Premium -->
        <div class="testimonial-card premium-testimonial">
          <div class="testimonial-content">
            <div class="quote-icon">
              <i class="fas fa-quote-left"></i>
            </div>
            <p class="testimonial-text">"Consegui minha vaga dos sonhos em apenas 2 semanas! O processo foi super rápido e eficiente. Recomendo para todos."</p>
            <div class="testimonial-rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar marina">MF</div>
            <div class="author-info">
              <h4>Marina Ferreira</h4>
              <p>Desenvolvedora Front-end - Tech Solutions</p>
              <span class="verified-badge">
                <i class="fas fa-check-circle"></i> Verificado
              </span>
            </div>
          </div>
        </div>

        <div class="testimonial-card premium-testimonial">
          <div class="testimonial-content">
            <div class="quote-icon">
              <i class="fas fa-quote-left"></i>
            </div>
            <p class="testimonial-text">"Plataforma incrível! A interface é muito intuitiva e o suporte é excepcional. Encontrei várias oportunidades alinhadas com meu perfil."</p>
            <div class="testimonial-rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar roberto">RS</div>
            <div class="author-info">
              <h4>Roberto Silva</h4>
              <p>Analista de Dados - DataCorp</p>
              <span class="verified-badge">
                <i class="fas fa-check-circle"></i> Verificado
              </span>
            </div>
          </div>
        </div>

        <div class="testimonial-card premium-testimonial">
          <div class="testimonial-content">
            <div class="quote-icon">
              <i class="fas fa-quote-left"></i>
            </div>
            <p class="testimonial-text">"O processo seletivo online foi uma experiência fantástica. Muito mais prático que os métodos tradicionais!"</p>
            <div class="testimonial-rating">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <div class="testimonial-author">
            <div class="author-avatar ana">AC</div>
            <div class="author-info">
              <h4>Ana Costa</h4>
              <p>Gerente de Projetos - Inovação Ltda</p>
              <span class="verified-badge">
                <i class="fas fa-check-circle"></i> Verificado
              </span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Botão para enviar testimonial -->
      <div class="testimonials-footer">
        <a href="cadastro.php" class="btn-enviar-testimonial">
          <i class="fas fa-plus"></i> Compartilhar Minha História
        </a>
      </div>
    </div>
  </section>

  <footer>
    <!-- Seção CTA Premium -->
    <div class="footer-top-section">
      <div class="footer-cta-container">
        <div class="footer-cta">
          <h2>Pronto para dar o próximo passo?</h2>
          <p>Junte-se a milhares de profissionais que já encontraram sua oportunidade ideal. Comece sua jornada hoje mesmo!</p>
          <div class="footer-cta-buttons">
            <a href="cadastro.php" class="footer-btn primary">
              <i class="fas fa-rocket"></i>
              Começar Agora
            </a>
            <a href="vagas.php" class="footer-btn secondary">
              <i class="fas fa-search"></i>
              Explorar Vagas
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Conteúdo Principal do Footer -->
    <div class="footer-container">
      <!-- Seção da Marca -->
      <div class="footer-section footer-brand">
        <div class="brand-logo">
          <img src="imagens/Logoindex.jpg" alt="ENIAC LINK+">
          <div class="brand-name">ENIAC LINK+</div>
        </div>
        <p>Conectando talentos com oportunidades desde 2025. Nossa missão é simplificar o processo seletivo e aproximar candidatos das empresas ideais através de tecnologia inovadora e experiência humanizada.</p>
        
        <!-- Estatísticas Premium -->
        <div class="footer-stats">
          <div class="stat-item">
            <span class="stat-number">5K+</span>
            <span class="stat-label">Candidatos</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">350+</span>
            <span class="stat-label">Empresas</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">95%</span>
            <span class="stat-label">Satisfação</span>
          </div>
          <div class="stat-item">
            <span class="stat-number">24h</span>
            <span class="stat-label">Resposta</span>
          </div>
        </div>

        <!-- Redes Sociais Premium -->
        <div class="social-links">
          <a href="#" class="social-link linkedin" title="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="#" class="social-link facebook" title="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="social-link instagram" title="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="#" class="social-link whatsapp" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
          </a>
          <a href="#" class="social-link youtube" title="YouTube">
            <i class="fab fa-youtube"></i>
          </a>
        </div>
      </div>
      
      <!-- Links Rápidos -->
      <div class="footer-section">
        <h3>Links Rápidos</h3>
        <ul>
          <li><a href="index.php"><i class="fas fa-home"></i>Início</a></li>
          <li><a href="cadastro.php"><i class="fas fa-user-plus"></i>Cadastro</a></li>
          <li><a href="vagas.php"><i class="fas fa-briefcase"></i>Vagas</a></li>
          <li><a href="curriculos.php"><i class="fas fa-file-alt"></i>Currículos</a></li>
          <li><a href="login_admin.php"><i class="fas fa-users-cog"></i>Portal RH</a></li>
        </ul>
      </div>
      
      <!-- Suporte -->
      <div class="footer-section">
        <h3>Suporte</h3>
        <ul>
          <li><a href="#"><i class="fas fa-question-circle"></i>Central de Ajuda</a></li>
          <li><a href="#"><i class="fas fa-file-contract"></i>Termos de Uso</a></li>
          <li><a href="#"><i class="fas fa-shield-alt"></i>Política de Privacidade</a></li>
          <li><a href="#"><i class="fas fa-comments"></i>Fale Conosco</a></li>
          <li><a href="#"><i class="fas fa-book"></i>FAQ</a></li>
        </ul>
      </div>
      
      <!-- Para Empresas -->
      <div class="footer-section">
        <h3>Para Empresas</h3>
        <ul>
          <li><a href="solucoes_corporativas.php"><i class="fas fa-building"></i>Soluções Corporativas</a></li>
          <li><a href="dashboard_rh.php"><i class="fas fa-chart-line"></i>Dashboard RH</a></li>
          <li><a href="parcerias.php"><i class="fas fa-handshake"></i>Parcerias</a></li>
          <li><a href="cases_sucesso.php"><i class="fas fa-award"></i>Cases de Sucesso</a></li>
          <li><a href="api_integracao.php"><i class="fas fa-cogs"></i>API Integração</a></li>
        </ul>
      </div>
      
      <!-- Contato Premium -->
      <div class="footer-section">
        <h3>Contato</h3>
        <div class="contact-info">
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-details">
              <h4>Email</h4>
              <p>contato@eniaclink.com</p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-phone"></i>
            </div>
            <div class="contact-details">
              <h4>Telefone</h4>
              <p>(11) 9999-9999</p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="contact-details">
              <h4>Endereço</h4>
              <p>São Paulo, SP - Brasil</p>
            </div>
          </div>
          
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-clock"></i>
            </div>
            <div class="contact-details">
              <h4>Horário</h4>
              <p>24/7 - Suporte Online</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Footer Bottom Premium -->
    <div class="footer-bottom">
      <div class="footer-bottom-container">
        <div class="footer-copyright">
          <p>&copy; 2025 ENIAC LINK+ — Todos os direitos reservados. Desenvolvido com <span class="heart">❤️</span> para conectar pessoas.</p>
        </div>
        <div class="footer-badges">
          <div class="footer-badge">
            <i class="fas fa-shield-check"></i>
            <span>Seguro & Confiável</span>
          </div>
          <div class="footer-badge">
            <i class="fas fa-certificate"></i>
            <span>Certificado ISO</span>
          </div>
          <div class="footer-badge">
            <i class="fas fa-lock"></i>
            <span>SSL Protegido</span>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script>
    // Animação de entrada
    window.addEventListener('load', function() {
      const elements = document.querySelectorAll('.fade-in-up');
      elements.forEach((el, index) => {
        setTimeout(() => {
          el.style.opacity = '1';
          el.style.transform = 'translateY(0)';
        }, index * 200);
      });
      
  <script>
    // Animações Premium Avançadas
    window.addEventListener('load', function() {
      // Animação de entrada para elementos
      const elements = document.querySelectorAll('.fade-in-up');
      elements.forEach((el, index) => {
        setTimeout(() => {
          el.style.opacity = '1';
          el.style.transform = 'translateY(0)';
        }, index * 200);
      });
      
      // Animação dos testimonials
      const testimonials = document.querySelectorAll('.premium-testimonial');
      testimonials.forEach((testimonial, index) => {
        testimonial.style.opacity = '0';
        testimonial.style.transform = 'translateY(30px)';
        testimonial.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
        
        setTimeout(() => {
          testimonial.style.opacity = '1';
          testimonial.style.transform = 'translateY(0)';
        }, 500 + (index * 200));
      });

      // Animação dos elementos do footer
      const footerElements = document.querySelectorAll('.footer-section, .stat-item, .contact-item');
      footerElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        element.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
      });

      // Observer para animações no scroll
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, { threshold: 0.1 });

      footerElements.forEach(element => {
        observer.observe(element);
      });

      // Animação das estatísticas
      const statNumbers = document.querySelectorAll('.stat-number');
      statNumbers.forEach(stat => {
        const finalValue = stat.textContent;
        let currentValue = 0;
        const increment = finalValue.includes('+') ? parseInt(finalValue) / 100 : parseInt(finalValue) / 50;
        
        const updateCounter = () => {
          if (currentValue < parseInt(finalValue)) {
            currentValue += increment;
            stat.textContent = Math.floor(currentValue) + (finalValue.includes('+') ? '+' : finalValue.includes('%') ? '%' : finalValue.includes('h') ? 'h' : '');
            requestAnimationFrame(updateCounter);
          } else {
            stat.textContent = finalValue;
          }
        };

        // Iniciar contador quando o elemento estiver visível
        const statObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              updateCounter();
              statObserver.unobserve(entry.target);
            }
          });
        });

        statObserver.observe(stat);
      });
    });

    // Efeito parallax suave para elementos flutuantes
    window.addEventListener('scroll', function() {
      const scrolled = window.pageYOffset;
      const parallax = document.querySelectorAll('.floating-elements');
      
      parallax.forEach(element => {
        const speed = 0.5;
        element.style.transform = `translateY(${scrolled * speed}px)`;
      });

      // Efeito parallax no footer
      const footer = document.querySelector('footer');
      if (footer) {
        const footerOffset = footer.offsetTop;
        const windowHeight = window.innerHeight;
        const scrollPosition = window.pageYOffset;
        
        if (scrollPosition + windowHeight > footerOffset) {
          const progress = (scrollPosition + windowHeight - footerOffset) / windowHeight;
          footer.style.transform = `translateY(${progress * -20}px)`;
        }
      }
    });

    // Hover effects premium para elementos interativos
    document.addEventListener('DOMContentLoaded', function() {
      // Efeito ripple nos botões
      const buttons = document.querySelectorAll('.footer-btn, .social-link');
      buttons.forEach(button => {
        button.addEventListener('click', function(e) {
          const ripple = document.createElement('span');
          const rect = this.getBoundingClientRect();
          const size = Math.max(rect.width, rect.height);
          const x = e.clientX - rect.left - size / 2;
          const y = e.clientY - rect.top - size / 2;
          
          ripple.style.width = ripple.style.height = size + 'px';
          ripple.style.left = x + 'px';
          ripple.style.top = y + 'px';
          ripple.classList.add('ripple');
          
          // CSS para o ripple effect
          ripple.style.position = 'absolute';
          ripple.style.borderRadius = '50%';
          ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.3)';
          ripple.style.transform = 'scale(0)';
          ripple.style.animation = 'ripple 0.6s linear';
          ripple.style.pointerEvents = 'none';
          
          this.appendChild(ripple);
          
          setTimeout(() => {
            ripple.remove();
          }, 600);
        });
      });

      // Adicionar keyframes para ripple
      const style = document.createElement('style');
      style.textContent = `
        @keyframes ripple {
          to {
            transform: scale(4);
            opacity: 0;
          }
        }
      `;
      document.head.appendChild(style);
    });
  </script>

</body>
</html>
