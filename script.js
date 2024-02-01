document.addEventListener('DOMContentLoaded', function() {
    setupPage();
    setupNavbarLinks();
    document.getElementById('updatePersonalBtn').style.display = 'none'; // Initially hide the update button
    document.getElementById('personalForm').style.display = 'none'; // Initially hide the form
    fetchRecords(); // Fetch records to determine which button to show

    document.getElementById('updateEducationalBtn').style.display = 'none'; // Initially hide the update button
    document.getElementById('educationalForm').style.display = 'none'; // Initially hide the form
    fetchEducationalRecords(); 
});

function setupPage() {
    // Hide all details sections
    var detailsSections = document.querySelectorAll('.details-section');
    detailsSections.forEach(function(section) {
        section.style.display = 'none';
    });
    
    // Display the home section by default
    document.getElementById('homeSection').style.display = 'block';
}

function setupNavbarLinks() {
    // Add click event listeners to all navbar links
    var navbarLinks = document.querySelectorAll('.nav-links a');
    navbarLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            // Hide all details sections
            var detailsSections = document.querySelectorAll('.details-section');
            detailsSections.forEach(function(section) {
                section.style.display = 'none';
            });
            // Show the clicked section
            var sectionId = link.getAttribute('href');
            document.querySelector(sectionId).style.display = 'block';
        });
    });
}

function toggleForm(formId) {
    var form = document.getElementById(formId);
    form.style.display = (form.style.display === 'block') ? 'none' : 'block';
}

function submitForm(event, formId) {
    event.preventDefault();
    var form = document.getElementById(formId);
    var formData = new FormData(form);

    fetch('submitPersonalDetails.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            form.style.display = 'none';
            fetchRecords(); // Re-fetch records after successful submit
        } else {
            console.error('Error:', data.error);
        }
    })
    .catch(error => {
        console.error('Error during fetch:', error);
    });
}

function fetchRecords() {
    fetch('fetchPersonalDetails.php')
    .then(response => response.json())
    .then(data => {
        const recordsContainer = document.getElementById('recordsContainer');
        recordsContainer.innerHTML = '';

        if (data.records && data.records.length > 0) {
            // Display the first record and the "Update Record" button
            const record = data.records[0];
            recordsContainer.innerHTML = `Name: ${record.name}, Age: ${record.age}, Email: ${record.email}`;
            document.getElementById('addPersonalBtn').style.display = 'none';
            document.getElementById('updatePersonalBtn').style.display = 'block';
        } else {
            // Display the "Add Record" button
            document.getElementById('addPersonalBtn').style.display = 'block';
            document.getElementById('updatePersonalBtn').style.display = 'none';
        }
    })
    .catch(error => {
        console.error('Error fetching records:', error);
    });
}

function prepareFormForUpdate() {
    // Assuming there's only one record, fetch and populate it for update
    fetchRecords(); // This should populate the form
    toggleForm('personalForm'); // Show the form for update
}

function prepareFormForAdd() {
    document.getElementById('personal_Form').reset(); // Reset the form for new entry
    toggleForm('personalForm'); // Show the form for adding
}


//For Educational Details
// ... existing code ...

// Function to submit the educational details form data
function submitEducationalForm(event, formId) {
    event.preventDefault();
    var form = document.getElementById(formId);
    var formData = new FormData(form);

    fetch('submitEducationalDetails.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            form.style.display = 'none';
            fetchEducationalRecords(); // Re-fetch records after successful submit
        } else {
            console.error('Error:', data.error);
        }
    })
    .catch(error => {
        console.error('Error during fetch:', error);
    });
}

// Function to fetch educational records and update the button text accordingly
function fetchEducationalRecords() {
    fetch('fetchEducationalDetails.php')
    .then(response => response.json())
    .then(data => {
        const educationalRecordsContainer = document.getElementById('educationalRecordsContainer');
        educationalRecordsContainer.innerHTML = '';
        const addOrUpdateEducationalBtn = document.getElementById('addEducationalBtn');
        const updateEducationalBtn = document.getElementById('updateEducationalBtn'); // Ensure this button exists in HTML

        if (data.records && Array.isArray(data.records) && data.records.length > 0) {
            // Assuming there's only one educational record for the user
            const record = data.records[0];
            const recordDiv = document.createElement('div');
            recordDiv.className = 'record';
            recordDiv.innerHTML = `Qualification: ${record.qualification}, Institute: ${record.institution}, Department: ${record.department}`;
            educationalRecordsContainer.appendChild(recordDiv);
            addOrUpdateEducationalBtn.style.display = 'none';
            updateEducationalBtn.style.display = 'block';
        } else {
            addOrUpdateEducationalBtn.style.display = 'block';
            updateEducationalBtn.style.display = 'none';
        }
    })
    .catch(error => {
        console.error('Error fetching educational records:', error);
    });
}

// Function to prepare the form for updating educational details
function prepareEducationalFormForUpdate() {
    // Fetch and populate the form for update
    fetchEducationalRecords(); // This should populate the form
    toggleForm('educationalForm'); // Show the form for update
}

// Function to prepare the form for adding new educational details
function prepareEducationalFormForAdd() {
    document.getElementById('educational_Form').reset(); // Reset the form for new entry
    toggleForm('educationalForm'); // Show the form for adding
}

function handleLogout() {
    fetch('logout.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Logout failed.');
        }
        // If you want to reload the page or redirect to a different one:
        window.location.href = 'signin.php'; // Redirect to the login page
    })
    .catch(error => {
        console.error('Error during logout:', error);
    });
}