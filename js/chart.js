$(document).ready(function () {
    $('#seqFormId').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.corrected) {
                    renderChart(response.corrected);
                } else {
                    console.error('Unexpected response:', response);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr.responseText);
            }
        });
    });
});

function renderChart(sequence) {
    const ctx = document.getElementById('seqChartId').getContext('2d');
    const labels = sequence;
    const values = sequence.map(s => s.split('.').length);

    if (window.barChart) {
        window.barChart.destroy();
    }

    window.barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'corrected sequence',
                data: values,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1,
                    title: {
                        display: true,
                        text: 'Depth'
                    }
                }
            }
        }
    });
}
