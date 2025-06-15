document.addEventListener('DOMContentLoaded', function() {
    fetchAndDisplayCalls();
});

function fetchAndDisplayCalls() {
    // URL points to the backend folder
    fetch('../backend/get_calls.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tableBody = document.getElementById('call-log-body');
            tableBody.innerHTML = ''; // Clear existing rows

            if (data.length === 0) {
                tableBody.innerHTML = '<tr><td colspan="7">No call logs found.</td></tr>';
                return;
            }

            data.forEach(call => {
                const row = `<tr>
                    <td>${call.date}</td>
                    <td>${call.time}</td>
                    <td>${call.type}</td>
                    <td>${call.device_number}</td>
                    <td>${call.client_number}</td>
                    <td>${call.ring_duration}</td>
                    <td>${call.call_duration}</td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => {
            console.error('Error fetching call logs:', error);
            const tableBody = document.getElementById('call-log-body');
            tableBody.innerHTML = `<tr><td colspan="7">Error loading data.</td></tr>`;
        });
}
