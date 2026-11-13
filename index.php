<?php
// TP1 - Liquidación de Sueldos (Programación IV)
// Los importes y porcentajes corresponden a la consigna del trabajo práctico.

$sueldosBasicos = [
    'A' => 4050.55,
    'B' => 3209.20,
    'C' => 2575.73,
    'D' => 1812.28,
];

$categoria = 'A';
$antiguedad = 1;
$liquidacion = null;
$error = '';

/** Formatea hasta seis decimales para reproducir la precisión del ejemplo. */
function importe(float $valor): string
{
    $texto = number_format($valor, 2, ',', '.');
    return rtrim(rtrim($texto, '0'), ',');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoriaIngresada = $_POST['categoria'] ?? '';
    $antiguedadIngresada = filter_input(INPUT_POST, 'antiguedad', FILTER_VALIDATE_INT);

    if (!is_string($categoriaIngresada) || !array_key_exists($categoriaIngresada, $sueldosBasicos)) {
        $error = 'Seleccioná una categoría válida (A, B, C o D).';
    } elseif ($antiguedadIngresada === false || $antiguedadIngresada === null || $antiguedadIngresada < 1 || $antiguedadIngresada > 30) {
        $error = 'La antigüedad debe ser un número entero entre 1 y 30.';
    } else {
        $categoria = $categoriaIngresada;
        $antiguedad = $antiguedadIngresada;

        $basico = $sueldosBasicos[$categoria];
        $bonifAntiguedad = $basico * 0.10 * $antiguedad;
        $bonifPresentismo = $basico * 0.15;
        $bonifDedicacion = $basico * 0.50;
        $totalHaberes = $basico + $bonifAntiguedad + $bonifPresentismo + $bonifDedicacion;

        // Los descuentos se aplican sobre el total de haberes, NO sobre el básico.
        $descuentoObraSocial = $totalHaberes * 0.05;
        $descuentoJubilatorio = $totalHaberes * 0.11;
        $totalDescuentos = $descuentoObraSocial + $descuentoJubilatorio;
        $totalNeto = $totalHaberes - $totalDescuentos;

        $liquidacion = [
            'basico' => $basico,
            'bonifAntiguedad' => $bonifAntiguedad,
            'bonifPresentismo' => $bonifPresentismo,
            'bonifDedicacion' => $bonifDedicacion,
            'totalHaberes' => $totalHaberes,
            'descuentoObraSocial' => $descuentoObraSocial,
            'descuentoJubilatorio' => $descuentoJubilatorio,
            'totalDescuentos' => $totalDescuentos,
            'totalNeto' => $totalNeto,
        ];
    }
}

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TP1 | Liquidación de Sueldos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --principal: #17324f; --acento: #087e8b; --fondo: #f3f6fa; }
        body { background: var(--fondo); color: #23354a; font-family: system-ui, sans-serif; }
        .encabezado { background: linear-gradient(120deg, var(--principal), #245a78); color: white; padding: 2.5rem 0; }
        .panel { background: white; border-radius: 1rem; box-shadow: 0 10px 30px #17324f0e; padding: 1.65rem; }
        .etiqueta { color: #64758a; font-size: .85rem; }
        .importe { font-variant-numeric: tabular-nums; white-space: nowrap; }
        .total-neto { background: #e9f8f4; color: #096345; border-radius: .8rem; }
        .btn-principal { background: var(--acento); border-color: var(--acento); color: white; }
        .btn-principal:hover { background: #086775; border-color: #086775; color: white; }
        .tabla-liquidacion td { padding-top: .75rem; padding-bottom: .75rem; }
        @media print { .encabezado, .formulario, .btn-imprimir, footer { display: none !important; } body { background: white; } .panel { box-shadow: none; } }
    </style>
</head>
<body>
<header class="encabezado">
    <div class="container">
        <div class="small text-uppercase opacity-75 mb-2">Programación IV · Trabajo Práctico Nº 1</div>
        <h1 class="h2 fw-bold mb-1">Liquidación de sueldos</h1>
        <p class="mb-0 opacity-75">Microsistema desarrollado con PHP, HTML, CSS y Bootstrap</p>
    </div>
</header>
<main class="container py-4 py-md-5">
    <div class="row g-4 align-items-start">
        <div class="col-12 col-lg-4 formulario">
            <section class="panel">
                <h2 class="h5 fw-bold mb-3">Datos del empleado</h2>
                <?php if ($error !== ''): ?>
                    <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
                <?php endif; ?>
                <form action="" method="post">
                    <label for="categoria" class="form-label fw-semibold">Categoría</label>
                    <select id="categoria" name="categoria" class="form-select mb-3" required>
                        <?php foreach ($sueldosBasicos as $letra => $sueldo): ?>
                            <option value="<?= $letra ?>" <?= $categoria === $letra ? 'selected' : '' ?>>Categoría <?= $letra ?> — $<?= importe($sueldo) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="antiguedad" class="form-label fw-semibold">Antigüedad (años)</label>
                    <select id="antiguedad" name="antiguedad" class="form-select mb-3" required>
                        <?php for ($anio = 1; $anio <= 30; $anio++): ?>
                            <option value="<?= $anio ?>" <?= $antiguedad === $anio ? 'selected' : '' ?>><?= $anio ?> <?= $anio === 1 ? 'año' : 'años' ?></option>
                        <?php endfor; ?>
                    </select>
                    <button class="btn btn-principal w-100 fw-semibold py-2" type="submit">Calcular liquidación</button>
                </form>
                <p class="etiqueta mt-3 mb-0">Los cálculos respetan los porcentajes definidos en la consigna.</p>
            </section>
        </div>
        <div class="col-12 col-lg-8">
            <?php if ($liquidacion === null): ?>
                <section class="panel text-center py-5">
                    <div class="h2 mb-3">&#128196;</div>
                    <h2 class="h5 fw-bold">Completá los datos</h2>
                    <p class="text-secondary mb-0">Seleccioná la categoría y la antigüedad, y presioná «Calcular liquidación».</p>
                </section>
            <?php else: ?>
                <section class="panel">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
                        <div>
                            <div class="etiqueta text-uppercase">Recibo de liquidación</div>
                            <h2 class="h4 fw-bold mb-1">Categoría <?= htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8') ?></h2>
                            <p class="text-secondary mb-0">Antigüedad: <?= $antiguedad ?> <?= $antiguedad === 1 ? 'año' : 'años' ?></p>
                        </div>
                        <button type="button" class="btn btn-outline-secondary btn-sm btn-imprimir" onclick="window.print()">Imprimir</button>
                    </div>
                    <h3 class="h6 text-uppercase fw-bold">Haberes</h3>
                    <div class="table-responsive">
                        <table class="table tabla-liquidacion align-middle">
                            <thead class="table-light"><tr><th scope="col">Código / concepto</th><th scope="col" class="text-end">Importe ($)</th></tr></thead>
                            <tbody>
                                <tr><td>01 · Sueldo básico</td><td class="text-end importe"><?= importe($liquidacion['basico']) ?></td></tr>
                                <tr><td>02 · Bonif. antigüedad (10% × <?= $antiguedad ?>)</td><td class="text-end importe"><?= importe($liquidacion['bonifAntiguedad']) ?></td></tr>
                                <tr><td>03 · Bonif. presentismo (15%)</td><td class="text-end importe"><?= importe($liquidacion['bonifPresentismo']) ?></td></tr>
                                <tr><td>04 · Bonif. dedicación especial (50%)</td><td class="text-end importe"><?= importe($liquidacion['bonifDedicacion']) ?></td></tr>
                                <tr class="table-light fw-bold"><td>Total haberes</td><td class="text-end importe"><?= importe($liquidacion['totalHaberes']) ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <h3 class="h6 text-uppercase fw-bold mt-4">Descuentos</h3>
                    <div class="table-responsive">
                        <table class="table tabla-liquidacion align-middle">
                            <thead class="table-light"><tr><th scope="col">Código / concepto</th><th scope="col" class="text-end">Importe ($)</th></tr></thead>
                            <tbody>
                                <tr><td>05 · Obra social (5% de haberes)</td><td class="text-end importe"><?= importe($liquidacion['descuentoObraSocial']) ?></td></tr>
                                <tr><td>06 · Aporte jubilatorio (11% de haberes)</td><td class="text-end importe"><?= importe($liquidacion['descuentoJubilatorio']) ?></td></tr>
                                <tr class="table-light fw-bold"><td>Total descuentos</td><td class="text-end importe"><?= importe($liquidacion['totalDescuentos']) ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="total-neto p-3 p-md-4 d-flex flex-wrap justify-content-between align-items-center gap-2 mt-4">
                        <div class="fw-bold">TOTAL NETO A COBRAR</div>
                        <div class="h4 fw-bold mb-0 importe">$ <?= importe($liquidacion['totalNeto']) ?></div>
                    </div>
                </section>
            <?php endif; ?>
        </div>
    </div>
</main>
<footer class="container pb-4 text-center etiqueta">Ejercicio académico · No constituye un recibo salarial legal</footer>
</body>
</html>
