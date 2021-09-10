// Script to Display Specialization based on Course SelectedIndex
function getCourseDetail(){

  var currentIndex=selectedIndex=1;
  // var first = document.getElementById('category');
document.getElementById('Course_id').onchange = function () {
  // document.getElementById("Specialization_id").innerHTML ="Select Specialization";
  var e = document.getElementById("Course_id");
  selectedIndex = e.value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("Specialization_id").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "../user/responce-1.php?courseId="+selectedIndex, true);
    xhttp.send();
    

  }
}
  

//Script to Change Password
function changePin(){
  var newPin = document.getElementById("pin").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
      }
    };
    xhttp.open("GET", "../user/responce-2.php?newPin="+newPin, true);
    xhttp.send();

}

//Script to Display Change Password field
function show(element){
  var e = document.getElementById(element);
  e.style.display = "block";
  
}

/*Script for Form Validation */
