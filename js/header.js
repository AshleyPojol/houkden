document.addEventListener("DOMContentLoaded", function() {
    const navLinks = document.querySelectorAll('.nav-link');
  
    navLinks.forEach(link => {
      link.addEventListener('mouseover', function() {
        this.style.color = '#007bff';
      });
  
      link.addEventListener('mouseout', function() {
        this.style.color = ''; // Resets to default color
      });
    });
  });
  