<script lang="javascript" type="text/javascript">
    //data chart line realisasi anggaran dinas
    $(document).ready(function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url(); ?>/DashboardSidang/dataChartLine",
            dataType: "json"
        }).done(function(postChartLine) {
            var ctx1 = document.getElementById("chart-line-anggaran").getContext("2d");
            var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

            gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
            gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
            gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
            new Chart(ctx1, {
                type: "line",
                data: {
                    labels: [
                        "Triwulan I",
                        "Triwulan II",
                        "Triwulan III",
                        "Triwulan IV",
                    ],
                    datasets: [{
                        label: "Realisasi",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#5e72e4",
                        backgroundColor: gradientStroke1,
                        borderWidth: 3,
                        fill: true,
                        data: postChartLine,
                        maxBarThickness: 6,
                    }, ],
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
                                drawBorder: true,
                                display: true,
                                drawOnChartArea: true,
                                drawTicks: true,
                                borderDash: [5, 5],
                            },
                            ticks: {
                                display: true,
                                padding: 10,
                                color: "black",
                                font: {
                                    size: 11,
                                    family: "Open Sans",
                                    style: "normal",
                                    lineHeight: 1,
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
        }).fail(function() {
            document.getElementById('salah').innerText = 'ada kesalahan dalam mengambil data';
        })
    });

    //data chart bar persentase realisasi indikator
    $(document).ready(function() {
        $.ajax({
            method: "POST",
            url: "<?= base_url(); ?>/DashboardSidang/dataChartBar",
            dataType: "json"
        }).done(function(postChartBar) {

            let dBid1 = Object.values(postChartBar[0]);

            var ctx2 = document.getElementById("chart-bar-capaianKinerja").getContext("2d");

            new Chart(ctx2, {
                type: "bar",
                data: {
                    labels: [
                        "Triwulan I",
                        "Triwulan II",
                        "Triwulan III",
                        "Triwulan IV",
                    ],
                    datasets: [{
                        label: "Sekretariat",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "blue",
                        borderWidth: 3,
                        fill: true,
                        data: Object.values(postChartBar[0]),
                        maxBarThickness: 12,
                    }, {
                        label: "Pengendalian Penduduk",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "red",
                        borderWidth: 3,
                        fill: true,
                        data: Object.values(postChartBar[1]),
                        maxBarThickness: 12,
                    }, {
                        label: "Keluarga Berencana & Keluarga Sejahtera",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "lime",
                        borderWidth: 3,
                        fill: true,
                        data: Object.values(postChartBar[2]),
                        maxBarThickness: 12,
                    }, {
                        label: "Pemberdayaan Masyarakat",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "grey",
                        borderWidth: 3,
                        fill: true,
                        data: Object.values(postChartBar[3]),
                        maxBarThickness: 12,
                    }, {
                        label: "Pemberdayaan Perempuan Perlindungan Anak",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "orange",
                        borderWidth: 3,
                        fill: true,
                        data: Object.values(postChartBar[4]),
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
            })
        });
    });
</script>