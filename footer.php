
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="js/form-validation.js"></script>
<script src="js/delete.js"></script>
<script>
  // Close mobile & tablet menu on item click
  $('.navbar-item').each(function(e) {
    $(this).click(function(){
      if($('#navbar-burger-id').hasClass('is-active')){
        $('#navbar-burger-id').removeClass('is-active');
        $('#navbar-menu-id').removeClass('is-active');
      }
    });
  });

  // Open or Close mobile & tablet menu
  $('.navbar-burger').click(function () {
    if($('.navbar-burger').hasClass('is-active')){
      $('.navbar-burger').removeClass('is-active');
      $('.navbar-menu').removeClass('is-active');
    }else {
      $('.navbar-burger').addClass('is-active');
      $('.navbar-menu').addClass('is-active');
    }
  });

  //
</script>
</body>
</html>