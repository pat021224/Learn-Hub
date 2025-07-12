//loaded a nationality list in select option.
document.addEventListener('DOMContentLoaded', async () => {
  const nationality = document.getElementById('nationality')
  if(nationality){
    const response = await fetch('nationalities', {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    const data = await response.json();
    
    data.forEach(item => {
      const option = document.createElement('option');
      option.value = item.name;
      option.textContent = item.name;
      nationality.appendChild(option);
    });
  }
})

//Auto generate school year on page load. (Base on philippine school year)
const schoolYear = document.getElementById('school_year');
if(schoolYear){
  function getSchoolYear() {
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
  document.addEventListener('DOMContentLoaded', getSchoolYear);
}



//get data from inputs in *add-student.php* 
//then send it to *studentcontroller.php* -> *function store()*
const addStudentForm = document.getElementById('add_student_form');
if(addStudentForm){
  addStudentForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(addStudentForm);
    try {
      const response = await fetch('store/student', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    const data = await response.text();
    document.getElementById('response').innerHTML = data;  
    } catch (error) {
      console.error('error:', error);
    }
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
  try {
    const response = await fetch('get/course/count', {
    method: 'POST',
    headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
  })
  const data = await response.text();
  document.getElementById('response').innerHTML = data;
  } catch (error) {
    console.error('error:', error);
  }
  }) 
}
  

//generate the list of student in the table
async function loadStudentList(){
  const studentListForm = document.getElementById('student_list_form');
  if(studentListForm){
    const formData = new FormData(studentListForm)
      const response = await fetch('student/list', {
        method: 'POST',
        headers: {
              'X-Requested-With': 'XMLHttpRequest'
          },
          body: formData
      })
      const data = await response.text();
      document.getElementById('response').innerHTML = data;
  }
}
document.addEventListener('DOMContentLoaded', loadStudentList)


//genarate the data of selected student to be edited
const editStudent = document.getElementById('edit_student_form');
if(editStudent){
  document.addEventListener('DOMContentLoaded', async () => {
    const formData = new FormData(editStudent);

    
    const response = await fetch('edit/student', {
      method: 'POST',
      headers: {
              'X-Requested-With': 'XMLHttpRequest'
          },
          body: formData
    })
    const data = await response.json();
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
      const response = await fetch('update/student', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
      })
      const data = await response.text();
      document.getElementById('response').innerHTML = data;
  })
}


//set the id of selected students to be deleted
let selectedId = null;
document.addEventListener('click', async (e) => {
  const button = e.target.closest('.delete');
  if(button){
    e.preventDefault();
    selectedId = button.getAttribute('data-id');
    const formData = new FormData;
    formData.append('id', selectedId);
    const response = await fetch('modal/response', {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: formData
    })
    const data = await response.text();
    document.getElementById('modal-response').innerHTML = data;

  }
})

//send the id of the selected student to be deleted to controller 
const confirmDelete = document.getElementById('confirm-delete-student');
if(confirmDelete){
  confirmDelete.addEventListener('click', async (e) => {
    e.preventDefault();
    const formData = new FormData;
    formData.append('id', selectedId);
    const response = await fetch('delete/student', {
      method: 'POST',
      headers: {
              'X-Requested-With': 'XMLHttpRequest'
          },
          body: formData
    })
    const data = await response.text();
    document.getElementById('delete-response').textContent = data;
    const modal = bootstrap.Modal.getInstance(document.getElementById('delete-student-modal'));
      modal.hide();
      loadStudentList();
  })
}




