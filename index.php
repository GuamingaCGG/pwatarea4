<?php // pwatarea4/index.php — Página principal ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PWA Tarea 4 — Tecno Guaminga</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg: #06060a;
      --surface: #0e0e16;
      --border: #1a1a2e;
      --accent: #6d28d9;
      --accent-glow: rgba(109,40,217,0.35);
      --accent2: #a855f7;
      --lime: #84cc16;
      --cyan: #22d3ee;
      --text: #f1f5f9;
      --muted: #64748b;
      --card: #0d0d18;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Outfit', sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* Animated background grid */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image:
        linear-gradient(rgba(109,40,217,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(109,40,217,0.04) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
      z-index: 0;
    }

    .container { max-width: 1100px; margin: 0 auto; padding: 0 2rem; position: relative; z-index: 1; }

    /* HEADER */
    header {
      padding: 1.5rem 2rem;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
      z-index: 1;
    }
    .logo {
      font-family: 'DM Mono', monospace;
      font-size: 0.85rem;
      color: var(--accent2);
      letter-spacing: 0.05em;
    }
    .badge {
      font-family: 'DM Mono', monospace;
      font-size: 0.7rem;
      background: var(--border);
      color: var(--muted);
      padding: 4px 10px;
      border-radius: 99px;
      border: 1px solid var(--border);
    }

    /* HERO */
    .hero {
      padding: 5rem 2rem 3rem;
      text-align: center;
      position: relative;
    }
    .hero-tag {
      display: inline-block;
      font-family: 'DM Mono', monospace;
      font-size: 0.72rem;
      color: var(--lime);
      letter-spacing: 0.15em;
      text-transform: uppercase;
      margin-bottom: 1.5rem;
      border: 1px solid rgba(132,204,22,0.3);
      padding: 5px 14px;
      border-radius: 99px;
      background: rgba(132,204,22,0.05);
    }
    .hero h1 {
      font-size: clamp(2.8rem, 6vw, 5rem);
      font-weight: 800;
      line-height: 1.08;
      letter-spacing: -0.02em;
      background: linear-gradient(135deg, #fff 0%, var(--accent2) 60%, var(--cyan) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 1.2rem;
    }
    .hero p {
      font-size: 1.05rem;
      color: var(--muted);
      font-weight: 300;
      max-width: 480px;
      margin: 0 auto;
      line-height: 1.7;
    }

    /* Decorative glow behind title */
    .hero::before {
      content: '';
      position: absolute;
      top: 40%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 500px;
      height: 300px;
      background: radial-gradient(ellipse, var(--accent-glow) 0%, transparent 70%);
      pointer-events: none;
    }

    /* GRID */
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 1.25rem;
      padding: 1rem 2rem 5rem;
      max-width: 1100px;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }

    /* CARDS */
    .card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 2rem;
      text-decoration: none;
      color: var(--text);
      display: flex;
      flex-direction: column;
      gap: 1rem;
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .card::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at top left, var(--card-color, var(--accent-glow)), transparent 65%);
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .card:hover {
      transform: translateY(-6px);
      border-color: var(--card-color-border, var(--accent));
      box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 0 30px var(--card-color-shadow, var(--accent-glow));
    }
    .card:hover::before { opacity: 1; }

    .card-01 { --card-color: rgba(109,40,217,0.2); --card-color-border: #6d28d9; --card-color-shadow: rgba(109,40,217,0.3); }
    .card-02 { --card-color: rgba(34,211,238,0.15); --card-color-border: #22d3ee; --card-color-shadow: rgba(34,211,238,0.25); }
    .card-03 { --card-color: rgba(132,204,22,0.15); --card-color-border: #84cc16; --card-color-shadow: rgba(132,204,22,0.25); }
    .card-04 { --card-color: rgba(249,115,22,0.15); --card-color-border: #f97316; --card-color-shadow: rgba(249,115,22,0.25); }
    .card-05 { --card-color: rgba(236,72,153,0.15); --card-color-border: #ec4899; --card-color-shadow: rgba(236,72,153,0.25); }

    .card-num {
      font-family: 'DM Mono', monospace;
      font-size: 0.68rem;
      color: var(--muted);
      letter-spacing: 0.12em;
      text-transform: uppercase;
    }
    .card-icon {
      font-size: 2rem;
      line-height: 1;
    }
    .card-title {
      font-size: 1.3rem;
      font-weight: 700;
      letter-spacing: -0.01em;
    }
    .card-desc {
      font-size: 0.88rem;
      color: var(--muted);
      line-height: 1.65;
      flex: 1;
      font-weight: 300;
    }
    .card-arrow {
      font-size: 0.78rem;
      color: var(--muted);
      font-family: 'DM Mono', monospace;
      transition: color 0.2s, letter-spacing 0.2s;
    }
    .card:hover .card-arrow {
      color: var(--text);
      letter-spacing: 0.04em;
    }

    /* Tech tag pills */
    .tags { display: flex; gap: 6px; flex-wrap: wrap; }
    .tag {
      font-family: 'DM Mono', monospace;
      font-size: 0.65rem;
      padding: 3px 9px;
      border-radius: 99px;
      background: var(--border);
      color: var(--muted);
      border: 1px solid rgba(255,255,255,0.05);
    }

    /* FOOTER */
    footer {
      text-align: center;
      padding: 2rem;
      color: var(--muted);
      font-size: 0.8rem;
      font-family: 'DM Mono', monospace;
      border-top: 1px solid var(--border);
      position: relative;
      z-index: 1;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .card { animation: fadeUp 0.5s ease both; }
    .card:nth-child(1) { animation-delay: 0.05s; }
    .card:nth-child(2) { animation-delay: 0.12s; }
    .card:nth-child(3) { animation-delay: 0.19s; }
    .card:nth-child(4) { animation-delay: 0.26s; }
    .card:nth-child(5) { animation-delay: 0.33s; }
  </style>
</head>
<body>

<header>
  <span class="logo">&lt;pwatarea4 /&gt;</span>
  <span class="badge">Tecno Guaminga</span>
</header>

<section class="hero">
  <span class="hero-tag">Programación Web Avanzada</span>
  <h1>Tarea<br>Práctica 4</h1>
  <p>Cinco ejercicios independientes de PHP, MySQL y JavaScript para demostrar dominio del stack web.</p>
</section>

<div class="grid">

  <a href="ejercicio01/index.php" class="card card-01">
    <span class="card-num">Ejercicio 01</span>
    <div class="card-icon">📋</div>
    <h2 class="card-title">Lista de Tareas</h2>
    <p class="card-desc">Gestión con roles Admin/Usuario, autenticación con sesiones y almacenamiento en MySQL.</p>
    <div class="tags">
      <span class="tag">PHP</span>
      <span class="tag">MySQL</span>
      <span class="tag">Sesiones</span>
      <span class="tag">Roles</span>
    </div>
    <span class="card-arrow">Ver ejercicio →</span>
  </a>

  <a href="ejercicio02/index.php" class="card card-02">
    <span class="card-num">Ejercicio 02</span>
    <div class="card-icon">📊</div>
    <h2 class="card-title">Control de Asistencia</h2>
    <p class="card-desc">Registro y procesamiento de asistencia escolar con manejo de sesiones PHP.</p>
    <div class="tags">
      <span class="tag">PHP</span>
      <span class="tag">MySQL</span>
      <span class="tag">Sesiones</span>
    </div>
    <span class="card-arrow">Ver ejercicio →</span>
  </a>

  <a href="ejercicio03/index.php" class="card card-03">
    <span class="card-num">Ejercicio 03</span>
    <div class="card-icon">💰</div>
    <h2 class="card-title">Presupuesto Dinámico</h2>
    <p class="card-desc">Calculadora de gastos interactiva con manipulación del DOM en tiempo real.</p>
    <div class="tags">
      <span class="tag">JavaScript</span>
      <span class="tag">DOM</span>
      <span class="tag">LocalStorage</span>
    </div>
    <span class="card-arrow">Ver ejercicio →</span>
  </a>

  <a href="ejercicio04/index.php" class="card card-04">
    <span class="card-num">Ejercicio 04</span>
    <div class="card-icon">📦</div>
    <h2 class="card-title">Inventario CRUD</h2>
    <p class="card-desc">Inserción, lectura y eliminación de artículos usando PHP PDO y tablas MySQL.</p>
    <div class="tags">
      <span class="tag">PHP</span>
      <span class="tag">PDO</span>
      <span class="tag">MySQL</span>
      <span class="tag">CRUD</span>
    </div>
    <span class="card-arrow">Ver ejercicio →</span>
  </a>

  <a href="ejercicio05/index.php" class="card card-05">
    <span class="card-num">Ejercicio 05</span>
    <div class="card-icon">📝</div>
    <h2 class="card-title">Bloc de Notas</h2>
    <p class="card-desc">Lectura y escritura directa de archivos de texto plano (.txt) en el servidor.</p>
    <div class="tags">
      <span class="tag">PHP</span>
      <span class="tag">File I/O</span>
      <span class="tag">Servidor</span>
    </div>
    <span class="card-arrow">Ver ejercicio →</span>
  </a>

</div>

<footer>
  pwatarea4 &nbsp;·&nbsp; Tecno Guaminga &nbsp;·&nbsp; <?= date('Y') ?>
</footer>

</body>
</html>
