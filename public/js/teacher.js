document.addEventListener('DOMContentLoaded', () => {
    loadTeacherList();
    loadArchivedTeachers();
})

const addTeacherForm = document.getElementById('add_teacher_form');
if(addTeacherForm){
    addTeacherForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(addTeacherForm);
        const data = await PostData('add/teacher', formData);
        document.getElementById('response').innerHTML = data;
        addTeacherForm.reset();
    })
}
async function loadTeacherList(){
    const teacher = document.getElementById('teacher_list');
    if(teacher){
        const formData = new FormData();
        const data = await PostData('get/teacher/list', formData);
        document.getElementById('response').innerHTML = data;
    }
}

async function loadArchivedTeachers(){
    const archived = document.getElementById('archived_teachers_form')
    if(archived){
        const formData = new FormData();
        const data = await PostData('archived/teachers', formData);
        document.getElementById('response').innerHTML = data;
    }
}

const editTeacher = document.getElementById('edit_teacher_form');
if(editTeacher){
  document.addEventListener('DOMContentLoaded', async () => {
    const formData = new FormData(editTeacher);
    const data = await PostJson('edit/teacher', formData);
    document.getElementById('first_name').value = data.first_name;
    document.getElementById('middle_name').value = data.middle_name;
    document.getElementById('last_name').value = data.last_name;
    document.getElementById('gender').value = data.gender;
    document.getElementById('dob').value = data.dob;
    document.getElementById('email').value = data.email;
    document.getElementById('phone_number').value = data.phone_number;
    document.getElementById('nationality').value = data.nationality;
    document.getElementById('province').value = data.province;
    document.getElementById('municipality').value = data.municipality;
    document.getElementById('barangay').value = data.barangay;
    document.getElementById('street').value = data.street;
    document.getElementById('zipcode').value = data.zipcode;
    document.getElementById('department').value = data.department;
  })
}

if(editTeacher){
    editTeacher.addEventListener('submit', async (e) => {
      e.preventDefault();
      const formData = new FormData(editTeacher);
      const data = await PostData('update/teacher', formData);
      document.getElementById('response').innerHTML = data;
  })
}



