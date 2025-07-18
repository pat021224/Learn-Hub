const addTeacherForm = document.getElementById('add_teacher_form');
if(addTeacherForm){
    addTeacherForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(addTeacherForm);
        const data = await PostData('add/teacher', formData);
        document.getElementById('response').innerHTML = data;
    })
}