// Initialize Flatpickr on the DOB input field
document.addEventListener('DOMContentLoaded', async function () {
  flatpickr("#dob", {
    dateFormat: "Y-m-d",
    maxDate: "today"
  });

  //Auto-address. Province > Municipality > Barangay > Zip Code
  const provinceSelect = document.getElementById('province');
  const municipalitySelect = document.getElementById('municipality');
  const barangaySelect = document.getElementById('barangay');
  const zipcodeInput = document.getElementById('zipcode');

  let locationData = {};
  let zipData = [];

  //load JSON from *ph_address_data.json* <-- province/municipality/barangay only
  //and *ph-zip-codes.json* <-- this has the zip code
  try {
    const [locationRes, zipRes] = await Promise.all([
      fetch('assets/ph_address_data.json'),
      fetch('assets/ph-zip-codes.json')
    ]);

    locationData = await locationRes.json();
    zipData = await zipRes.json();

    loadProvinces();
  } catch (err) {
    console.error('Failed to load address or zip data:', err);
  }

  function loadProvinces() {
    let provinces = [];

    for (const regionCode in locationData) {
      const region = locationData[regionCode];
      if (region.province_list) {
        for (const province in region.province_list) {
          provinces.push(province);
        }
      }
    }

    provinces.sort().forEach(province => {
      const option = document.createElement('option');
      option.value = province;
      option.textContent = province;
      provinceSelect.appendChild(option);
    });

    provinceSelect.disabled = false;
  }

  provinceSelect.addEventListener('change', function () {
    municipalitySelect.innerHTML = '<option selected disabled>Municipality</option>';
    barangaySelect.innerHTML = '<option selected disabled>Barangay</option>';
    municipalitySelect.disabled = false;
    barangaySelect.disabled = true;

    const selectedProvince = this.value;
    let municipalities = [];

    for (const regionCode in locationData) {
      const region = locationData[regionCode];
      if (region.province_list && region.province_list[selectedProvince]) {
        const provinceData = region.province_list[selectedProvince];
        municipalities = Object.keys(provinceData.municipality_list);
        break;
      }
    }

    municipalities.sort().forEach(muni => {
      const option = document.createElement('option');
      option.value = muni;
      option.textContent = muni;
      municipalitySelect.appendChild(option);
    });
  });

  municipalitySelect.addEventListener('change', function () {
    barangaySelect.innerHTML = '<option selected disabled>Barangay</option>';
    barangaySelect.disabled = false;

    const selectedProvince = provinceSelect.value;
    const selectedMunicipality = this.value;
    let barangays = [];

    for (const regionCode in locationData) {
      const region = locationData[regionCode];
      if (
        region.province_list &&
        region.province_list[selectedProvince] &&
        region.province_list[selectedProvince].municipality_list[selectedMunicipality]
      ) {
        barangays = region.province_list[selectedProvince]
          .municipality_list[selectedMunicipality].barangay_list;
        break;
      }
    }

    barangays.sort().forEach(brgy => {
      const option = document.createElement('option');
      option.value = brgy;
      option.textContent = brgy;
      barangaySelect.appendChild(option);
    });

    const toTitleCase = (str) =>
      str.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());

    const combinedArea = `PH - ${toTitleCase(selectedProvince)} ${toTitleCase(selectedMunicipality)}`;
    const match = zipData.find(entry => entry.area === combinedArea);

    if (match) {
      zipcodeInput.value = match.zip;
    } else {
      zipcodeInput.value = '';
    }
  });
});

//Auto generate school year on page load. (Base on philippine school year)
function getSchoolYear() {
    const schoolYear = document.getElementById('school_year');
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
document.addEventListener('DOMContentLoaded', getSchoolYear());


//get data from inputs in *add-student.php* 
//then send it to *studentcontroller.php* -> *function store()*
document.getElementById('add_student_form').addEventListener('submit', async function(e){
    e.preventDefault();
    const formData = new FormData(this);
    const response = await fetch('store/student', {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    const data = await response.text();
    document.getElementById('response').innerHTML = data;  
})

//get the selected course and send it to *studentcontroller.php* -> *function generateStudentId()*
document.getElementById('course').addEventListener('change', async function(){
  const course = document.getElementById('course').value;
  const schoolYear = document.getElementById('school_year').value;
  const formData = new FormData();

  formData.append('course', course);
  formData.append('school_year', schoolYear);
  const response = await fetch('get/course/count', {
    method: 'POST',
    headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
  })
  const data = await response.text();
  document.getElementById('response').innerHTML = data;
})