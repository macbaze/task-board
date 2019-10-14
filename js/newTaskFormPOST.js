window.addEventListener('load', function() {
  document.forms.addTask.addEventListener('submit', function() {
    event.preventDefault();
    var formData = new FormData(this);
    formData.append('formName','addTask');
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
        if (this.status == 200) {
          alert('Задача успешно добавлена');
          window.location.href="current.php";
        } else {
          alert('Задача не добавлена'); //switch case with "not authorized"
        }
      }
    };
    xmlhttp.open('POST','./backend/formProcess.php');
    xmlhttp.send(formData);
  });
});