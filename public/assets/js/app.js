const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('toggleSidebar');
const toggleIcon = document.getElementById('toggleIcon');

// SIDEBAR TOGGLE BUTTON
toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');

    if (sidebar.classList.contains('collapsed')) {
        toggleIcon.setAttribute('icon', 'mdi:chevron-right');
    } else {
        toggleIcon.setAttribute('icon', 'mdi:chevron-left');
    }
});

// SECCOND SECTION
// LINE CHART
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        datasets: [
            {
                label: 'Bertambah',
                data: [30, 80, 40, 60, 50, 70, 55, 65, 50, 40, 30, 20],
                borderColor: '#00BF63',
                tension: 0.4,
                borderWidth: 3,
                pointRadius: 0
            },
            {
                label: 'Berkurang',
                data: [10, 20, 15, 10, 25, 15, 10, 20, 18, 12, 10, 8],
                borderColor: '#E74A3B',
                tension: 0.4,
                borderWidth: 3,
                pointRadius: 0
            }
        ]
    },
    options: {
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: {
                grid: {
                    color: 'rgba(255, 255, 255, 0.05)',
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0, 0, 0, 0.02)',
                }
            }
        }
    }
});

// DONUT 1
const donutLabels = {
    id: 'donutLabels',
    afterDraw(chart) {
        const { ctx } = chart;
        const meta = chart.getDatasetMeta(0);

        meta.data.forEach((arc, i) => {
            const value = chart.data.datasets[0].data[i];

            // Get center of each arc properly
            const { x, y } = arc.tooltipPosition();

            ctx.save();
            ctx.fillStyle = "#fff";
            ctx.font = "bold 14px Sora";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            ctx.fillText(value, x, y);
        });
    }
};

new Chart(document.getElementById('donutChart1'), {
    type: 'doughnut',
    data: {
        labels: ['Guru', 'Murid'],
        datasets: [{
            data: [54, 218],
            backgroundColor: ['#1D57BA', '#00BF63'],
            borderWidth: 3,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        cutout: '45%' 
    },
    plugins: [donutLabels]
});

// DONUT 2
const donutLabels2 = {
    id: 'donutLabels2',
    afterDraw(chart) {
        const { ctx } = chart;
        const meta = chart.getDatasetMeta(0);

        const data = chart.data.datasets[0].data;
        const total = data.reduce((a, b) => a + b, 0);

        meta.data.forEach((arc, i) => {
            const value = data[i];
            const percentage = Math.round((value / total) * 100) + "%";

            const { x, y } = arc.tooltipPosition();

            ctx.save();
            ctx.fillStyle = "#fff";
            ctx.font = "bold 14px Sora";
            ctx.textAlign = "center";
            ctx.textBaseline = "middle";

            ctx.fillText(percentage, x, y);
        });
    }
};

new Chart(document.getElementById('donutChart2'), {
    type: 'doughnut',
    data: {
        labels: ['Aktif', 'Vakum', 'Tidak Aktif'],
        datasets: [{
            data: [80, 5, 15],
            backgroundColor: ['#00BF63', '#1D57BA', '#E74A3B'],
            borderWidth: 3,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        cutout: '45%' 
    },
    plugins: [donutLabels2]
});

// THIRD SECTION
// STUDENT CHART
new Chart(document.getElementById('studentChart'), {
    type: 'line',
    data: {
        labels: ['2020', '2021', '2022', '2023', '2024'],
        datasets: [
            {
                data: [130, 150, 200, 130, 190],
                borderColor: '#00BF63',
                borderWidth: 2,
                tension: 0.4,
                pointRadius: 0
            },
            {
                data: [128, 140, 130, 132, 148],
                borderColor: '#1D57BA',
                borderWidth: 2,
                tension: 0.4,
                pointRadius: 0
            },
            {
                data: [200, 150, 130, 200, 150],
                borderColor: '#00A8C6',
                borderWidth: 2,
                tension: 0.4,
                pointRadius: 0
            },
            {
                data: [150, 200, 150, 130, 200],
                borderColor: '#E74A3B',
                borderWidth: 2,
                tension: 0.4,
                pointRadius: 0
            }
        ]
    },
    options: {
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: {
                grid: { color: 'rgba(255, 255, 255, 0.03)' }
            },
            y: {
                grid: { color: 'rgba(0,0,0,0.03)' }
            }
        }
    }
});

// PROGRESS CHART
new Chart(document.getElementById('progressChart'), {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [80, 20],
            backgroundColor: ['#00BF63', '#ECECEC'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '80%',
        plugins: {
            legend: { display: false },
            tooltip: { enabled: false }
        }
    }
});

// FINANCE CHART
new Chart(document.getElementById('financeChart'), {
    type: 'line',
    data: {
        labels: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],
        datasets: [
            {
                data: [25, 30, 10, 20, 18, 25, 30, 40, 20, 22, 29, 19],
                borderColor: '#00BF63',
                borderWidth: 3,
                tension: 0.4,
                pointRadius: 0
            },
            {
                data: [10, 15, 20, 5, 8, 1, 30, 10, 5, 1, 6, 0],
                borderColor: '#E74A3B',
                borderWidth: 3,
                tension: 0.4,
                pointRadius: 0
            }
        ]
    },
    options: {
        plugins: {
            legend: { display: false }
        },
        scales: {
            x: {
                grid: { color: 'rgba(255, 255, 255, 0.03)' }
            },
            y: {
                grid: { color: 'rgba(0,0,0,0.03)' }
            }
        }
    }
});

/* ========================================
   BAR CHART
======================================== */

new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: [
            'Batam Kota',
            'Sekupang',
            'Batu Aji',
            'Nongsa',
            'Sagulung',
            'Batu Ampar',
            'Lubuk Baja',
            'Sei Beduk',
            'Bengkong'
        ],
        datasets: [{
            label: 'Jumlah Anggota',
            data: [120, 95, 78, 85, 110, 67, 72, 88, 60],
            backgroundColor: '#00BF63',
            borderRadius: 8,
            borderSkipped: false,
            barThickness: 38,
            hoverBackgroundColor: '#00A857'
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: { display: false }
        },

        scales: {
            x: {
                grid: {
                    color: 'rgba(255, 255, 255, 0.03)'
                }
            },

            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0,0,0,0.03)'
                }
            }
        }
    }
});


/* ========================================
   HISTOGRAM CHART
======================================== */

new Chart(document.getElementById('histogramChart'), {
    type: 'bar',

    data: {
        labels: [
            '17-20',
            '21-25',
            '26-30',
            '31-35',
            '36-40',
            '41-45',
            '46-50',
            '51-55',
            '56+'
        ],

        datasets: [{
            data: [
                18,
                24,
                30,
                42,
                36,
                28,
                20,
                15,
                8
            ],

            backgroundColor: [
                '#00BF63',
                '#00BF63',

                '#00A8C6',
                '#00A8C6',
                '#00A8C6',
                '#00A8C6',

                '#E74A3B',
                '#E74A3B',
                '#E74A3B'
            ],

            borderRadius: 6,
            borderSkipped: false,
            barThickness: 28
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {

            x: {
                grid: {
                    color: 'rgba(255,255,255,0.03)'
                },

                ticks: {
                    color: '#666'
                }
            },

            y: {
                beginAtZero: true,

                grid: {
                    color: 'rgba(0,0,0,0.03)'
                },

                ticks: {
                    color: '#666'
                }
            }

        }
    }
});
/* ========================================
   SCATTER CHART
======================================== */

new Chart(document.getElementById('scatterChart'), {
    type: 'scatter',

    data: {
        datasets: [

            /* AKTIF */
            {
                label: 'Aktif',

                data: [
                    { x: 25, y: 90 },
                    { x: 35, y: 95 },
                    { x: 40, y: 85 }
                ],

                backgroundColor: '#00BF63',

                pointRadius: 7,

                pointHoverRadius: 8
            },

            /* KURANG AKTIF */
            {
                label: 'Kurang Aktif',

                data: [
                    { x: 30, y: 78 },
                    { x: 45, y: 75 }
                ],

                backgroundColor: '#00A8C6',

                pointRadius: 7,

                pointHoverRadius: 8
            },

            /* TIDAK AKTIF */
            {
                label: 'Tidak Aktif',

                data: [
                    { x: 20, y: 68 },
                    { x: 42, y: 58 }
                ],

                backgroundColor: '#E74A3B',

                pointRadius: 7,

                pointHoverRadius: 8
            }

        ]
    },

    options: {
        responsive: true,

        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {

            x: {
                grid: {
                    color: 'rgba(255,255,255,0.03)'
                },

                ticks: {
                    color: '#666'
                }
            },

            y: {
                beginAtZero: true,

                max: 100,

                grid: {
                    color: 'rgba(0,0,0,0.03)'
                },

                ticks: {
                    color: '#666'
                }
            }

        }
    }
});

/* ========================================
   AREA CHART
======================================== */

new Chart(document.getElementById('areaChart'), {
    type: 'line',

    data: {
        labels: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul'
        ],

        datasets: [

            /* BERJALAN */
            {
                label: 'Berjalan',

                data: [2, 4, 6, 5, 8, 9, 12],

                fill: true,

                backgroundColor: 'rgba(0,191,99,0.18)',

                borderColor: '#00BF63',

                borderWidth: 3,

                tension: 0.4,

                pointRadius: 0
            },

            /* AKAN DATANG */
            {
                label: 'Akan Datang',

                data: [5, 6, 5, 7, 6, 8, 9],

                fill: true,

                backgroundColor: 'rgba(0,168,198,0.14)',

                borderColor: '#00A8C6',

                borderWidth: 3,

                tension: 0.4,

                pointRadius: 0
            },

            /* SELESAI */
            {
                label: 'Selesai',

                data: [1, 2, 4, 6, 5, 7, 8],

                fill: true,

                backgroundColor: 'rgba(231,74,59,0.12)',

                borderColor: '#E74A3B',

                borderWidth: 3,

                tension: 0.4,

                pointRadius: 0
            }

        ]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {

            x: {
                grid: {
                    color: 'rgba(255,255,255,0.03)'
                },

                ticks: {
                    color: '#666'
                }
            },

            y: {
                beginAtZero: true,

                grid: {
                    color: 'rgba(0,0,0,0.03)'
                },

                ticks: {
                    color: '#666'
                }
            }

        }
    }
});