 // Alpine.js Store para el menú móvil
        document.addEventListener('alpine:init', () => {
            Alpine.store('mobileMenu', {
                open: false,
                toggle() {
                    this.open = !this.open;
                }
            });
        });

        // Datos de ejemplo para notificaciones y mensajes
        const notificationData = [
            { title: 'Nueva propiedad', message: 'Se ha añadido una nueva propiedad', time: 'Hace 5 minutos', unread: true },
            { title: 'Nuevo cliente', message: 'Nuevo registro de cliente', time: 'Hace 1 hora', unread: true },
            { title: 'Cita confirmada', message: 'La cita ha sido confirmada', time: 'Hace 2 horas', unread: false }
        ];
    
        const messageData = [
            { from: 'Juan Pérez', message: 'Consulta sobre propiedad', time: 'Hace 10 minutos', unread: true },
            { from: 'María García', message: 'Actualización de contrato', time: 'Hace 30 minutos', unread: true },
            { from: 'Carlos López', message: 'Confirmación de visita', time: 'Hace 1 hora', unread: false }
        ];
    
        // Inicialización de Alpine.js
        document.addEventListener('alpine:init', () => {
            // Sistema de notificaciones
            Alpine.data('notifications', () => ({
                open: false,
                notifications: notificationData,
                toggle() {
                    this.open = !this.open;
                },
                markAsRead(index) {
                    this.notifications[index].unread = false;
                },
                close() {
                    this.open = false;
                },
                unreadCount() {
                    return this.notifications.filter(n => n.unread).length;
                }
            }));
    
            // Sistema de mensajes
            Alpine.data('messages', () => ({
                open: false,
                messages: messageData,
                toggle() {
                    this.open = !this.open;
                },
                markAsRead(index) {
                    this.messages[index].unread = false;
                },
                close() {
                    this.open = false;
                },
                unreadCount() {
                    return this.messages.filter(m => m.unread).length;
                }
            }));
        });

        // Función para actualizar el gráfico
        function updateChart(filter) {
            const data = {
                day: {
                    labels: ['8am', '10am', '12pm', '2pm', '4pm', '6pm'],
                    data: [50000, 75000, 120000, 160000, 200000, 250000]
                },
                month: {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    data: [150000, 180000, 210000, 250000, 280000, 320000, 350000, 380000, 410000, 450000, 480000, 520000]
                },
                year: {
                    labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
                    data: [1500000, 1800000, 2100000, 2500000, 2800000, 3200000]
                }
            };

            const selectedData = data[filter];
            if (!selectedData) return;

            if (window.myChart) {
                window.myChart.data.labels = selectedData.labels;
                window.myChart.data.datasets[0].data = selectedData.data;
                window.myChart.update();
            }
        }

        // Inicialización del gráfico
        function initChart() {
            const ctx = document.getElementById('revenueChart');
            if (!ctx) return;

            // Establecer una altura fija para el contenedor del gráfico
            ctx.style.height = '400px';
            ctx.style.maxHeight = '400px';

            const ctx2d = ctx.getContext('2d');
            const data = {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Ingresos 2023',
                    data: [150000, 180000, 210000, 250000, 280000, 320000, 350000, 380000, 410000, 450000, 480000, 520000],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            };

            if (window.myChart) {
                window.myChart.destroy();
            }

            window.myChart = new Chart(ctx2d, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    aspectRatio: 2,  // Proporción ancho/alto de 2:1
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'Ingresos: $' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            },
                            grid: {
                                drawBorder: false,
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar datos de notificaciones y mensajes
            window.$store = {
                mobileMenu: {
                    open: false,
                    toggle() {
                        this.open = !this.open;
                    }
                },
                notifications: {
                    items: [
                        {title: 'Nueva propiedad', message: 'Se ha agregado una nueva propiedad', time: 'Hace 5 min', unread: true},
                        {title: 'Cita programada', message: 'Nueva cita con cliente', time: 'Hace 1 hora', unread: true}
                    ],
                    toggle() {
                        this.open = !this.open;
                    },
                    markAsRead(index) {
                        this.items[index].unread = false;
                    }
                },
                messages: {
                    items: [
                        {from: 'Juan Pérez', message: 'Consulta sobre propiedad', time: 'Hace 10 min', unread: true},
                        {from: 'María García', message: 'Actualización de precio', time: 'Hace 30 min', unread: false}
                    ],
                    toggle() {
                        this.open = !this.open;
                    },
                    markAsRead(index) {
                        this.items[index].unread = false;
                    }
                }
            };
        });

        // Acciones rápidas
        const quickActions = document.querySelectorAll('[data-action]');
        quickActions.forEach(button => {
            button.addEventListener('click', () => {
                const action = button.dataset.action;
                switch(action) {
                    case 'new-property':
                        window.location.href = 'propiedades.html?action=new';
                        break;
                    case 'new-agent':
                        window.location.href = 'agentes.html?action=new';
                        break;
                    case 'new-appointment':
                        window.location.href = 'citas.html?action=new';
                        break;
                    case 'view-reports':
                        window.location.href = 'reportes.html';
                        break;
                }
            });
        });

document.addEventListener('DOMContentLoaded', function() {
    // Configuración de la gráfica de ingresos
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
            datasets: [{
                label: 'Ingresos Mensuales',
                data: [45000, 52000, 49000, 58000, 54000, 56000],
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true,
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Funcionalidad de los filtros de período
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', function() {
            const period = this.dataset.filter;
            // Actualizar datos según el período seleccionado
            let newData;
            switch(period) {
                case 'day':
                    newData = [12000, 15000, 13000, 16000, 14000, 15000];
                    break;
                case 'month':
                    newData = [45000, 52000, 49000, 58000, 54000, 56000];
                    break;
                case 'year':
                    newData = [540000, 624000, 588000, 696000, 648000, 672000];
                    break;
            }
            revenueChart.data.datasets[0].data = newData;
            revenueChart.update();
        });
    });
});