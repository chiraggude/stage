/////////////////////////////////////////////////
// MMenu.js
/////////////////////////////////////////////////
if(jQuery('nav#menu-left').length > 0) { //checks if nav element #menu exists
	jQuery('nav#menu-left').mmenu({
    classes: "mm-dark",
    slidingSubmenus: false
    }, {
   // configuration object
   selectedClass: "current-menu-item"
   }
  );
}


/////////////////////////////////////////////////
// ScrollNav.js
/////////////////////////////////////////////////
jQuery(document).ready(function(){ 
    if(jQuery('#toc').length > 0) {  //checks if div element #toc exists
        if(jQuery('#wpadminbar').length > 0) {   // checks if element #wpadminbar is shown
            jQuery('.page-nav-article').scrollNav({
                sections: 'h2',
                fixedMargin: 90,
                scrollOffset: 90,
                arrowKeys: true,
                headlineText: 'JUMP TO',
                insertTarget: '.cpg-nav-pane',
                insertLocation: 'appendTo'
            });
            } else {
            jQuery('.page-nav-article').scrollNav({
                sections: 'h2',
                fixedMargin: 70,
                scrollOffset: 70,
                arrowKeys: true,
                headlineText: 'JUMP TO',
                insertTarget: '.cpg-nav-pane',
                insertLocation: 'appendTo'
            });
        }
    }
});

/////////////////////////////////////////////////
// Scroll-to-Fixed.js
/////////////////////////////////////////////////
jQuery(document).ready(function(){ 
    if(jQuery('#toc').length > 0) {  //checks if div element #toc exists
        if(jQuery('#wpadminbar').length > 0) {   // checks if element #wpadminbar is shown
            jQuery('#toc').scrollToFixed({ marginTop: 90, removeOffsets:true, limit: jQuery(jQuery('h2')[4]).offset().top });
        } else { // if element #wpadminbar is not shown    
            jQuery('#toc').scrollToFixed({ marginTop: 70, removeOffsets:true, limit: jQuery(jQuery('h2')[4]).offset().top });
        }
    }
});


/////////////////////////////////////////////////
// Smooth "Scroll to Top" link in footer (jQuery only)
/////////////////////////////////////////////////
jQuery(document).ready(function() {
   jQuery('a[href=#top]').click(function(){
        jQuery('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});


/////////////////////////////////////////////////
// Share.js
/////////////////////////////////////////////////
jQuery(document).ready(function(){ 
    if(jQuery('#sharebutton').length > 0) { //checks if div element #sharebutton exists
            jQuery('#sharebutton').share({
            color: '#767676',
            flyout: 'top left'
            });
    }
});


/////////////////////////////////////////////////
// NiceScroll.js
/////////////////////////////////////////////////
jQuery(document).ready( function() {  
    jQuery("html").niceScroll( {
        cursorcolor:"#474747", cursorwidth: "8px", mousescrollstep:"60", zindex:"10000", cursoropacitymax:"0.5", scrollspeed:"30", hidecursordelay:"2000"});
});
	
jQuery(document).ready(function() {
  jQuery('[data-toggle=offcanvas]').click(function() {
    jQuery('.row-offcanvas').toggleClass('active');
  });
});


/////////////////////////////////////////////////
// Validate the comment form when it is submitted
/////////////////////////////////////////////////
if(jQuery('#commentform').length > 0) { //checks if div element #commentform exists
function resetForm() {
    jQuery('#commentform').reset();
    validator.resetForm();    
}

function validateForm(){	
    if (validator.form()) {
        jQuery('#commentform').submit();
    }
}

validator = jQuery("#commentform").validate({
        rules: {
            author: "required",			
            email: {
                required: true,
                email: true
            },                        
            url: {
                url: false	
            },
            comment: {
			     required: true,
				 minlength: 1
			}
        },
		
		highlight: function(element) {
            jQuery(element).closest('.input-group').addClass('has-error').removeClass('has-success');
            jQuery(element).closest('.wpbs-textarea').addClass('has-error').removeClass('has-success');
        },
        
        unhighlight: function(element) {
            jQuery(element).closest('.input-group').removeClass('has-error').addClass('has-success');
            jQuery(element).closest('.wpbs-textarea').removeClass('has-error').addClass('has-success');
        },
		
		errorElement: 'span',

        errorClass: 'help-block',
    
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }, 
	
        messages: {
            author: "Please enter your full name",			
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            url: "Please enter a valid URL e.g. http://www.mysite.com",	
            comment: "<strong>Please include your comment </strong>" 
        }
    });
}



