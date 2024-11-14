// bootstrap.js

// Import necessary libraries
import 'bootstrap'; // Import Bootstrap's JavaScript
import $ from 'jquery'; // Import jQuery if needed

// Optional: Set up jQuery globally if you need to use it in other scripts
window.$ = window.jQuery = $;

// Example: Initialize Bootstrap tooltips
import { Tooltip, Toast, Popover } from 'bootstrap';

// Initialize tooltips
const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new Tooltip(tooltipTriggerEl);
});

// Example: Custom JavaScript or initialization code
document.addEventListener('DOMContentLoaded', () => {
    console.log('Bootstrap and jQuery are ready!');
    // Your custom code here
});

// If you are using any other libraries, import and initialize them here
// For example, if you are using SweetAlert2
import Swal from 'sweetalert2';

// Example function to show an alert
function showAlert() {
    Swal.fire({
        title: 'Hello!',
        text: 'This is a SweetAlert2 alert!',
        icon: 'success',
        confirmButtonText: 'Cool'
    });
}

// Export any functions if needed
export { showAlert };