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

//send student data to database
const addStudentForm = document.getElementById('add_student_form');
if(addStudentForm){
  addStudentForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(addStudentForm);
    const data = await PostData('store/student', formData);
    document.getElementById('response').innerHTML = data;
  }) 
}

//get the selected course and send it to *studentcontroller.php*
const courseSelect = document.getElementById('course')
if(courseSelect){
  course.addEventListener('change', async () => {
  const course = courseSelect.value;
  const schoolYear = document.getElementById('school_year').value;
  const formData = new FormData();
  formData.append('course', course);
  formData.append('school_year', schoolYear);
  const data = await PostData('get/course/count', formData);
  document.getElementById('response').innerHTML = data;
  }) 
}

//generate the list of student in the table
async function loadStudentList(){
  const studentListForm = document.getElementById('student_list_form');
  if(studentListForm){
    const isDeleted = 0;
    const formData = new FormData(studentListForm);
      formData.append('isDeleted', isDeleted);
      const data = await PostData('student/list', formData);
      document.getElementById('response').innerHTML = data;
  }
}

//load student that are soft deleted
async function loadArchivedStudents(){
  const archivedForm = document.getElementById('restore_students_form')
  if(archivedForm){
    const formData = new FormData(archivedForm);
    const isDeleted = 1;
    formData.append('isDeleted', isDeleted);
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
let selectedId = null;
document.addEventListener('click', async (e) => {
  const deleteButton = e.target.closest('.delete');
  if(deleteButton){
    e.preventDefault();
    selectedId = deleteButton.getAttribute('data-id');
    const formData = new FormData;
    formData.append('id', selectedId);
    const data = await PostData('modal/response', formData);
    document.getElementById('modal-response').innerHTML = data;
  }
  //set the id of selected student to be restored
  const restoreButton = e.target.closest('.restore');
  if(restoreButton){
    e.preventDefault();
    formData = new FormData();
    selectedId = restoreButton.getAttribute('data-id');
    formData.append('id', selectedId);
    const data = await PostData('restore/modal/response', formData);
    document.getElementById('modal-response').innerHTML = data;
  }
  //set the id of selected student to be permanently deleted
  const permanentDeleteButton = e.target.closest('.permanent-delete');
  if(permanentDeleteButton){
    e.preventDefault();
    selectedId = permanentDeleteButton.getAttribute('data-id');
    const formData = new FormData();
    formData.append('id', selectedId);
    const data = await PostData('permanent/delete/modal/response', formData);
    document.getElementById('perma-modal-response').innerHTML = data;
  }
})

//send the id of the selected student to be deleted to controller 
const confirmDelete = document.getElementById('confirm-delete-student');
if(confirmDelete){
  confirmDelete.addEventListener('click', async (e) => {
    e.preventDefault();
    const formData = new FormData;
    formData.append('id', selectedId);
    const data = await PostData('delete/student', formData);
    document.getElementById('delete-response').innerHTML = data;
    const modal = bootstrap.Modal.getInstance(document.getElementById('delete-student-modal'));
      modal.hide();
      loadStudentList();
  })
}

//send the id of selected student to be restore in controller
const confirmRestore = document.getElementById('confirm-restore-student')
if(confirmRestore){
  confirmRestore.addEventListener('click', async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('id', selectedId);
    const data = await PostData('restore/student', formData);
    document.getElementById('restore-response').innerHTML = data;
    const modal = bootstrap.Modal.getInstance(document.getElementById('restore-student-modal'));
    modal.hide();
    loadArchivedStudents();
  })
}

const confirmPermanentDelete = document.getElementById('confirm-permanent-delete-student');
if(confirmPermanentDelete){
  confirmPermanentDelete.addEventListener('click', async () => {
    const formData = new FormData();
    formData.append('id', selectedId);
    const data = await PostData('permanent/delete/student', formData);
    document.getElementById('restore-response').innerHTML = data;
    const modal = bootstrap.Modal.getInstance(document.getElementById('permanent-delete-student-modal'));
    modal.hide();
    loadArchivedStudents();
  })
}