<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/contact.css"> 
</head>
<body>
  <?php include('header.php'); ?> 
  <section class="Cont">
    <h1>Contact Us</h1>
  </section>
  
  <section class="Form">
  <form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">First Name</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="First Name" required>
      <div class="invalid-feedback">
          Required First Name.
        </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last name</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Last Name" required>
      <div class="invalid-feedback">
        Required Last Name.
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Email</label>
      <input type="email" class="form-control" id="validationCustom02" placeholder="Last Name" required>
      <div class="invalid-feedback">
        Required Email.
      </div>
    </div>
   
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Number</label>
      <input type="number" class="form-control" id="validationCustom02" placeholder="Last Name" required>
      <div class="invalid-feedback">
        Required Number.
      </div>
    </div>

    <div class="col-md-12 mb-3">
      <label for="validationCustom02">Message</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Enter Message" required>
      <div class="invalid-feedback">
        Required Message.
      </div>
    </div>
  
  </div>
  <button class="btn btn-primary" type="submit">Send Message</button>
</form>

<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
  </section>

  <section class="Map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d494779.0815321015!2d120.72561128095462!3d14.342678808823365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b9c267d5bc5b%3A0x5c049335a8f33cdb!2sBrewLeaf%20Malanday%20Marikina!5e0!3m2!1sen!2sph!4v1712502724093!5m2!1sen!2sph" width="1535" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

  <?php include('footer.php'); ?> 

  <html>