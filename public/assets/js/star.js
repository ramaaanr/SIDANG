// Select all elements with the "i" tag and store them in a NodeList called "stars"
const stars = document.querySelectorAll(".stars i");
// Loop through the "stars" NodeList
stars.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    star.addEventListener("click", () => {
        // Loop through the "stars" NodeList Again
        stars.forEach((star, index2) => {
            // Add the "active" class to the clicked star and any stars with a lower index
            // and remove the "active" class from any stars with a higher index
            index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
        });
    });
});

$('.stars i').on('click', function () {
    $('#skor').val($(this).index() + 1);
    console.log($('#skor').val());


});

/*var table = document.getElementById("tabel"),
    sumHsl = 0;
for (var t = 1; t < table.rows.length; t++) {
    sumHsl = sumHsl + parseInt(table.rows[t].cells[2].innerHTML);
}
document.getElementById("hasil").innerHTML = "Total = " + sumHsl;

var td = document.querySelectorAll('.tabel > tbody > tr > td:nilai');
    var total = 0;

    for (var i = 0; i < td.length; i++)
    {
        total += parseInt(td[i].innerText);
    }

    document.getElementById('hasil').innerText = total;
    */
// Simply get the sum of a column


