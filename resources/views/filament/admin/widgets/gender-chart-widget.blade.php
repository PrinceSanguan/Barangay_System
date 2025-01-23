<div>
    <canvas id="genderChart"></canvas>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('genderChart').getContext('2d');

        const chartData = @json($chartData);

        const genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: chartData.labels,
                datasets: chartData.datasets,
            },
            options: {
                onClick: function (event, elements) {
                    if (elements.length > 0) {
                        const chartElement = elements[0];
                        const label = genderChart.data.labels[chartElement.index];

                        // Redirect to a Filament resource filtered by gender
                        window.location.href = `/admin/brgy-inhabitants?filter[sex]=${label}`;
                    }
                }
            }
        });
    });
</script>
