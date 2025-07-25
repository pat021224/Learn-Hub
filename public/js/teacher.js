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

