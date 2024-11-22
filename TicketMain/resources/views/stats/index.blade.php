<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Estatísticas do Sistema</h2>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-center shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total de Eventos</h5>
                        <p class="card-text display-4">{{ $totalEvents }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total de Palestras</h5>
                        <p class="card-text display-4">{{ $totalLectures }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total de Participantes</h5>
                        <p class="card-text display-4">{{ $totalParticipants }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total de Inscrições</h5>
                        <p class="card-text display-4">{{ $totalRegistrations }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h5 class="text-center">Eventos por Mês</h5>
                <canvas id="eventsChart"></canvas>
            </div>
            <div class="col-md-6">
                <h5 class="text-center">Palestras por Evento</h5>
                <canvas id="lecturesChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Função para gerar cores aleatórias
        function generateColors(length) {
            const colors = [];
            for (let i = 0; i < length; i++) {
                const randomColor = `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.6)`;
                colors.push(randomColor);
            }
            return colors;
        }

        // Gráfico de Eventos por Mês
        const eventsColors = generateColors(@json($eventsPerMonthLabels).length);
        const eventsData = {
            labels: @json($eventsPerMonthLabels), // Nomes dos meses
            datasets: [{
                label: 'Eventos por Mês',
                data: @json($eventsPerMonthData),
                backgroundColor: eventsColors,
                borderColor: eventsColors.map(color => color.replace('0.6', '1')),
                borderWidth: 1
            }]
        };

        const eventsConfig = {
            type: 'bar',
            data: eventsData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        new Chart(document.getElementById('eventsChart'), eventsConfig);

        // Gráfico de Palestras por Evento
        const lecturesColors = generateColors(@json($lecturesPerEventLabels).length);
        const lecturesData = {
            labels: @json($lecturesPerEventLabels), // Nomes dos eventos
            datasets: [{
                label: 'Palestras por Evento',
                data: @json($lecturesPerEventData),
                backgroundColor: lecturesColors,
                borderColor: lecturesColors.map(color => color.replace('0.6', '1')),
                borderWidth: 1
            }]
        };

        const lecturesConfig = {
            type: 'pie',
            data: lecturesData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            }
        };

        new Chart(document.getElementById('lecturesChart'), lecturesConfig);
    </script>
</x-app-layout>