$(document).ready(function() {
    var table = $('#organizationTable').DataTable({
        processing: true,
        // serverSide: true,
        pagination: true,
    });
});



$(document).ready(function() {
    var table = $('#EmployeeTable').DataTable({
        processing: true,
        // serverSide: true,
        pagination: true,
    });
});


function showFullAddress(address) {
    const fullAddressModal = document.getElementById('fullAddressModal');
    const fullAddressSpan = fullAddressModal.querySelector('.full-address');
    fullAddressSpan.innerHTML = address;
    fullAddressModal.style.display = 'block';
}

function closeFullAddressModal() {
    const fullAddressModal = document.getElementById('fullAddressModal');
    fullAddressModal.style.display = 'none';
}
