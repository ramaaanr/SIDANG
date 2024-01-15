<script>
    var ctx1 = document.getElementById("chart-bar").getContext("2d");

    new Chart(ctx1, {
        type: "bar",
        data: {
            labels: [
                "Triwulan I",
                "Triwulan II",
                "Triwulan III",
                "Triwulan IV",
            ],
            datasets: [{
                label: "Pelayanan Pencegahan Kekesaran",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "red",
                borderWidth: 3,
                fill: true,
                data: [30, 40, 80, 98],
                maxBarThickness: 12,
            }, {
                label: "Pendampingan Korban Kekerasan",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "blue",
                borderWidth: 3,
                fill: true,
                data: [10, 60, 70, 98],
                maxBarThickness: 12,
            }, {
                label: "Penyediaan Layanan KB",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "orange",
                borderWidth: 3,
                fill: true,
                data: [25, 55, 90, 98],
                maxBarThickness: 12,
            }, {
                label: "Peyuaraan Kesetaraan Gender",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "green",
                borderWidth: 3,
                fill: true,
                data: [15, 30, 80, 98],
                maxBarThickness: 12,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: "#ccc",
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5],
                    },
                    ticks: {
                        display: true,
                        color: "#ccc",
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
            },
        },
    });
</script>