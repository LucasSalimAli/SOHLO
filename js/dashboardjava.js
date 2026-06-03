document.addEventListener("DOMContentLoaded", function () {
    // Helper para capturar as variáveis de texto do seu CSS de forma dinâmica
    const getCssVariable = (v) => getComputedStyle(document.documentElement).getPropertyValue(v).trim();
    
    // Cores base do layout
    const purpleNeon = '#a855f7';
    const blueNeon = '#00d2ff';
    const pinkNeon = '#ec4899';
    const gridColor = 'rgba(255, 255, 255, 0.05)'; // Linha de grade sutil

    // 1. Gráfico Lucro Mensal (Área Ondulada Superior)
    const ctxLucro = document.getElementById('chartLucroMensal').getContext('2d');
    new Chart(ctxLucro, {
        type: 'line',
        data: {
            labels: ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'],
            datasets: [{
                label: 'Lucro',
                data: [40, 38, 65, 35, 48, 32, 40, 35, 78, 42, 38, 40],
                borderColor: purpleNeon,
                backgroundColor: 'rgba(168, 85, 247, 0.4)',
                fill: true,
                tension: 0.4, // Curvatura suave idêntica à imagem
                pointRadius: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#72767B', font: { size: 10 } } },
                y: { display: false }
            }
        }
    });

    // 2. Mini Gráficos Laterais (Sparklines)
    const miniOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { x: { display: false }, y: { display: false } },
        elements: { point: { radius: 0 } }
    };

    new Chart(document.getElementById('miniChartDespesas'), {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{ data: [10, 15, 8, 20, 12], borderColor: pinkNeon, tension: 0.4 }]
        },
        options: miniOptions
    });

    new Chart(document.getElementById('miniChartSaldo'), {
        type: 'line',
        data: {
            labels: [1, 2, 3, 4, 5],
            datasets: [{ data: [5, 12, 10, 18, 25], borderColor: blueNeon, tension: 0.4 }]
        },
        options: miniOptions
    });

    // 3. Gráficos de Rosca (Despesas no Mês e Ano)
    const doughnutOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        cutout: '75%'
    };

    new Chart(document.getElementById('chartDespesasMes'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [6.4, 20, 30, 43.6],
                backgroundColor: ['#eab308', '#3b82f6', '#10b981', '#6366f1']
            }]
        },
        options: doughnutOptions
    });

    new Chart(document.getElementById('chartDespesasAno'), {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [33.4, 15, 20, 10, 21.6],
                backgroundColor: ['#3b82f6', '#10b981', '#eab308', '#ef4444', '#6366f1']
            }]
        },
        options: doughnutOptions
    });

    // 4. Margem de Lucro (Gauges em formato de semicírculo ou rosca cheia)
    const gaugeOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        cutout: '80%'
    };

    const runGauge = (id) => {
        new Chart(document.getElementById(id), {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [37.58, 62.42],
                    backgroundColor: [purpleNeon, '#2c2f36'],
                    borderWidth: 0
                }]
            },
            options: gaugeOptions
        });
    };
    runGauge('chartMargemLucro1');
    runGauge('chartMargemLucro2');

    // 5. Histórico Inferior (Receitas e Despesas)
    new Chart(document.getElementById('chartReceitasDespesas'), {
        type: 'line',
        data: {
            labels: ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez'],
            datasets: [
                {
                    label: 'Receita',
                    data: [12, 10, 15, 11, 13, 12, 14, 11, 12, 13, 11, 14],
                    borderColor: blueNeon,
                    backgroundColor: 'transparent',
                    tension: 0.4
                },
                {
                    label: 'Despesa',
                    data: [8, 9, 11, 14, 10, 11, 9, 13, 10, 12, 9, 11],
                    borderColor: pinkNeon,
                    backgroundColor: 'transparent',
                    tension: 0.4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: { color: '#72767B', boxWidth: 40, padding: 20 }
                }
            },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#72767B' } },
                y: {
                    grid: { color: gridColor },
                    ticks: {
                        color: '#72767B',
                        callback: function(value) { return 'R$ ' + value + 'k'; }
                    }
                }
            }
        }
    });
});