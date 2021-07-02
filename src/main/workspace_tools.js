function copy() {
  document.execCommand("copy", false, "");
}

function changeColor() {
  var color = prompt("Enter your color in hex ex:#f1f233");
  document.execCommand("foreColor", false, color);
}


function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
}
