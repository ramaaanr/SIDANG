<script lang="javascript" type="text/javascript">
//data chart line realisasi anggaran dinas
let year = new Date().getFullYear()
let myChart;
$(document).ready(function() {
  const renderChart = (year) => {
    $.ajax({
      method: "POST",
      url: "<?= base_url(); ?>/DashboardSidang/dataChartLine",
      dataType: "json",
      data: {
        tahun: year,
      }
    }).done(function(postChartLine) {
      var ctx1 = document.getElementById("chart-line-anggaran").getContext("2d");
      var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
      gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
      gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
      myChart = new Chart(ctx1, {
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
  }


  const selectTahunAnggaran = $('#select-tahun-anggaran');
  $.ajax({
    method: "POST",
    url: "<?= base_url(); ?>/DashboardSidang/dataTahunAnggaranBidang",
    dataType: "json",
    success: function(res) {
      $.each(res, function(index, tahunAnggaran) {
        const option = $('<option>');

        option.val(tahunAnggaran);
        option.text(tahunAnggaran);
        if (tahunAnggaran == year) {
          option.attr('selected', true)
        }
        selectTahunAnggaran.append(option);
      });
    }
  })

  selectTahunAnggaran.on('change', function(event) {
    const selectedYear = event.target.value
    $('#chart-line-anggaran').html('');
    console.info(window.myChart)
    myChart.destroy();
    // Kosongkan referensi window.Chart
    renderChart(selectedYear)

    // renderChart(selectedYear)
  })
  renderChart(year)

});

//data chart bar persentase realisasi indikator
</script>