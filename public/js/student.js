//calling all function that need to run on page load
document.addEventListener('DOMContentLoaded', () => {
    getSchoolYear();
    loadStudentList();
    loadArchivedStudents();
    loadNationality();
})

//loaded a nationality list in select option.
async function loadNationality() {
  const nationality = document.getElementById('nationality')
  if(nationality){
    const data = await PostJson('nationalities');
    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.name;
      option.textContent = item.name;
      nationality.appendChild(option);
    });
  }
}

//Auto generate school year on page load. (Base on philippine school year)
function getSchoolYear() {
const schoolYear = document.getElementById('school_year');
  if(schoolYear){
      const today = new Date();
      const year = today.getFullYear();
      const month = today.getMonth(); // January = 0
      if (month >= 6) {
          // June or later = new school year starts
          schoolYear.value = `${year}-${year + 1}`;
      } else {
          // Before June = still in previous school year
          schoolYear.value = `${year - 1}-${year}`;
      }
  } 
}

//add student
const addStudentForm = document.getElementById('add_student_form');
if(addStudentForm){
  addStudentForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(addStudentForm);
    const data = await PostData('store/student', formData);
    document.getElementById('response').innerHTML = data;
    addStudentForm.reset();
  }) 
}

//generate the list of student in the table
async function loadStudentList(){
  const studentListForm = document.getElementById('student_list_form');
  if(studentListForm){
    const formData = new FormData(studentListForm);
      const data = await PostData('student/list', formData);
      document.getElementById('response').innerHTML = data;
  }
}

//load student that are soft deleted
async function loadArchivedStudents(){
  const archivedForm = document.getElementById('archived_students_form')
  if(archivedForm){
    const formData = new FormData(archivedForm);
    const data = await PostData('archived/students', formData);
    document.getElementById('response').innerHTML = data;
  }
}

//genarate the data of selected student to be edited
const editStudent = document.getElementById('edit_student_form');
if(editStudent){
  document.addEventListener('DOMContentLoaded', async () => {
    const formData = new FormData(editStudent);
    const data = await PostJson('edit/student', formData);
    document.getElementById('first_name').value = data.first_name;
    document.getElementById('middle_name').value = data.middle_name;
    document.getElementById('last_name').value = data.last_name;
    document.getElementById('gender').value = data.gender;
    document.getElementById('dob').value = data.dob;
    document.getElementById('email').value = data.email;
    document.getElementById('student_contact').value = data.student_contact;
    document.getElementById('guardian_name').value = data.guardian_name;
    document.getElementById('guardian_contact').value = data.guardian_contact;
    document.getElementById('nationality').value = data.nationality;
    document.getElementById('province').value = data.province;
    document.getElementById('municipality').value = data.municipality;
    document.getElementById('barangay').value = data.barangay;
    document.getElementById('street').value = data.street;
    document.getElementById('zipcode').value = data.zipcode;
    document.getElementById('course').value = data.course;
    document.getElementById('year_level').value = data.year_level;
    document.getElementById('section').value = data.section;
    document.getElementById('school_year').value = data.school_year;
    document.getElementById('status').value = data.status;
  })
}

//update the selected student
if(editStudent){
    editStudent.addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(editStudent);
      const data = await PostData('update/student', formData);
      document.getElementById('response').innerHTML = data;
  })
}

//set the id of selected students to be deleted


