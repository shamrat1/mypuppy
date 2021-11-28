function ShowHideLFQ($lfqid) {
  if ($div = document.getElementById("lfq" + $lfqid)) {
      $img = document.getElementById("lfqimg" + $lfqid);
      if ($div.style.display == "none") {
          $div.style.display = "block";
          $img.src = "{{ asset('img/other/arrow-close.png')}}";
      } else {
          $div.style.display = "none";
          $img.src = "{{ asset('img/other/arrow-open.png')}}";
      }
  }
} // end of fn ShowHideLFQ

function checkAll() {
  var inputs = document.querySelectorAll('input');
  for (var i = 0; i < inputs.length; i++) {
      inputs[i].checked = true;
  }
}

function uncheckAll() {
  var inputs = document.querySelectorAll('input');
  for (var i = 0; i < inputs.length; i++) {
      inputs[i].checked = false;
  }
}

function GetSelected() {
  //Create an Array.
  var selected = new Array();

  //Reference the Table.
  var tblAvailTime = document.getElementById("tblAvailTime");

  //Reference all the CheckBoxes in Table.
  var chks = tblAvailTime.getElementsByTagName("INPUT");

  // Loop and push the checked CheckBox value in Array.
  for (var i = 0; i < chks.length; i++) {
      if (chks[i].checked) {
          selected.push(chks[i].value);
      }
  }

  //Display the selected CheckBox values.
  if (selected.length > 0) {


      alert("Selected values: " + selected.join(","));
      document.getElementById("AvailTime").value = selected.join(",");

  }
};