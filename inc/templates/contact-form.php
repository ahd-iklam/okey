<div class="icon text-center">
<i class="fas fa-paper-plane "></i>
</div>
<form action="#" class="contact-Form" id="contactForm" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
    <div class="form-group ">
        <input type="text" class="form-control" id="name" required name="name" placeholder="your name">
    </div> 
    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" required  placeholder="your email" autocomplete="off">
    </div> 
    <div class="form-group">
        <textarea name="message" id="message" cols="30" required  placeholder="your message"></textarea>
    </div>
    <button type="submit" class="btn btn-outline-warning text-center"> send </button>
</form>