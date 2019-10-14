window.addEventListener('load', function() {
  document.forms.editTask.addEventListener('submit', function(event) {
    event.preventDefault();
    
    var formData = new FormData(this);
    formData.append('formName','editTask');
    
    if (this.elements.text.value != this.elements.previousText.value) {
      formData.append('edited', 1);
    }
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4) {
        if (this.status == 200) {
          alert('Задача успешно изменена');
          window.location.href="current.php";
        } else {
          if (this.status == 403) {
            alert('Нет прав для изменения задачи');
            window.location.href="login.php";
          }
          alert('Задача не изменена\n'+this.responseXML);
        }
      }
    };
    
    xmlhttp.open('POST','./backend/formProcess.php');
    xmlhttp.send(formData);
  });
});