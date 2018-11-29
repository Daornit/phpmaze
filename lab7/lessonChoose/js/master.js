let students;
let lessons;
//initial selected lessons
let ISL = {};
let activeStudent;
let selectedSTag;
$(document).ready(function() {
  students = $.getJSON('http://mazenet.com/lab7/allStudent.php',function(data){
    studentTable = $("#students");
    data.forEach(function(student) {
      studentTable.append(`
        <tr class="row100" data-sCredits="0" onClick="select(this)">
  			<td class="column100 column1">${student.sisi}</td>
  	   	<td class="column100 column2">${student.fname}</td>
  			<td class="column100 column3">${student.lname}</td>
  			<td class="column100 column4">${student.program}</td>
  			</tr>
      `);
    });
  });
  lessons = $.getJSON('http://mazenet.com/lab7/lessonToJson.php',function(data){
    lessonsTable = $("#lessons");
    data.forEach(function(lesson){
      ISL[lesson.index] = lesson.correntChair;
      lessonsTable.append(`
        <tr class="row100" data-lChair="0">
  			<td class="column100 column1">${lesson.index}</td>
  	   	<td class="column100 column2">${lesson.name}</td>
  			<td class="column100 column3">${lesson.credit}</td>
  			<td class="column100 column4">${lesson.suudal}</td>
        <td class="column100 column4" id="${lesson.index}"></td>
  			</tr>
      `);
    });
  });

});

function select(tag){
  selectedSTag = tag;
  lessons.responseJSON.forEach(function(les){
    inputAdd = $(`#${les.index}`).html("");
  });
  let selectedStudent = tag.firstElementChild.innerHTML;
  students.responseJSON.forEach(function(student){
    if(student.sisi == selectedStudent){
      activeStudent = student;
    }
  });
  lessons.responseJSON.forEach(function(les){
    inputAdd = $(`#${les.index}`);
    if(activeStudent.lessons.indexOf(`${les.index}`)!=-1){
      inputAdd.append("<button style='color:red' onClick='declineLesson(this)'>Cancel</button>");
    }else{
      let totalChair;
      for(let i=0;i<lessons.responseJSON.length;i++){
        if(inputAdd.attr("id") == lessons.responseJSON[i].index){
          totalChair = lessons.responseJSON[i].suudal;
        }
      }
      if(totalChair>ISL[inputAdd.attr("id")]){
        if(activeStudent.credits<21){
          inputAdd.append("<button onClick='choosedLesson(this)'>Choose</button>");
          $("#error").html("");
        }
        else {
          $("#error").html(`<div class="alert alert-warning">
            <p>Tanii credit hetersen baina ${activeStudent.credits}<p>
          </div>`);
        }
      }
      else {
        inputAdd.append("<p>Suudal duursen</p>");
      }
    }
  });
};
function choosedLesson(tag){
  let oneLesson = tag.parentElement.getAttribute("id");
  let totalChair = 0;
  for(let i=0;i<10;i++){
    if(oneLesson == lessons.responseJSON[i].index){
      totalChair = lessons.responseJSON[i].suudal;
      activeStudent.credits+=lessons.responseJSON[i].credit;
    }
  }
  alert(`Chairs ${ISL[oneLesson]}/${totalChair}`);
  ISL[oneLesson]++;
  activeStudent.lessons.push(oneLesson);
  select(selectedSTag);
}
function declineLesson(tag){
  let oneLesson = tag.parentElement.getAttribute("id");
  ISL[oneLesson]--;
  let index = activeStudent.lessons.indexOf(oneLesson);
  activeStudent.lessons.splice(index, 1);
  activeStudent.credits-=3;
  select(selectedSTag);
}
function valdation(){
  let jsone = {
    sisi: activeStudent.sisi,
    lessons: activeStudent.lessons
  }
  console.log(jsone);
  let ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText);
          if(data.success){
            alert("Таний сонгосон хичээлүүд амжилттай баталгаажлаа");
          }else{
            alert("Таний сонгосон хичээлүүд баталгаажсангүй");
          }
     }
  };
  ajax.open("POST","http://mazenet.com/lab7/validate.php",true);
  ajax.send(JSON.stringify(jsone));
}
