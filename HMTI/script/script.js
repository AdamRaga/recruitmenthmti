function validateForm() {
    var jenis_kelamin = document.forms["myForm"]["jenis_kelamin"].value;
    var semester = document.forms["myForm"]["semester"].value;

    if (jenis_kelamin === "Jenis Kelamin" || semester === "Semester") {
        alert("Lengkapi dulu semua kolomnya");
        return false;
    }
    return true;
}

function validateTable() {
    var table = document.querySelector("table tbody");
    var rows = table.querySelectorAll("tr");
    var isComplete = true;

    rows.forEach(function(row) {
        var cells = row.querySelectorAll("td");
        cells.forEach(function(cell) {
            if (cell.innerText === "" || cell.innerText === null) {
                isComplete = false;
            }
        });
    });

    if (!isComplete) {
        alert("Silahkan lengkapi semua data di tabel sebelum mengirim.");
        return false;
    }

    return true;
}

window.onload = function() {
    var submitButton = document.getElementById("submit-button");
    submitButton.disabled = true;
    var table = document.querySelector("table tbody");
    var rows = table.querySelectorAll("tr");
    var allComplete = true;
    rows.forEach(function(row) {
        var cells = row.querySelectorAll("td");
        cells.forEach(function(cell) {
            if (cell.innerText === "" || cell.innerText === null) {
                allComplete = false;
            }
        });
    });

    if (allComplete) {
        submitButton.disabled = false;
    }
}
window.onload = function() {
    const element = document.getElementById('yourElementId');
    if (element) {
      element.disabled = true;
    }
  };
  window.onload = function() {
    const element = document.getElementById('yourElementId');
    if (element) {
      element.disabled = true;
    }
  };
    