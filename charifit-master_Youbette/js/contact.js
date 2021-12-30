// $(document).ready(function(){
    
//     (function($) {
//         "use strict";

    
//     jQuery.validator.addMethod('answercheck', function (value, element) {
//         return this.optional(element) || /^\bcat\b$/.test(value)
//     }, "type the correct answer -_-");

//     // validate contactForm form
//     $(function() {
//         $('#contactForm').validate({
//             rules: {
//                 name: {
//                     required: true,
//                     minlength: 2
//                 },
//                 subject: {
//                     required: true,
//                     minlength: 4
//                 },
//                 number: {
//                     required: true,
//                     minlength: 10
//                 },
//                 email: {
//                     required: true,
//                     email: true
//                 },
//                 message: {
//                     required: true,
//                     minlength: 20
//                 },
//                 prenom: {
//                     required: true,
//                     minlength: 2
//                 }
//             },
//             messages: {
//                 name: {
//                     required: "vous avez un nom, n'est-ce pas ?",
//                     minlength: "votre nom doit comporter au moins 2 caractères"
//                 },
//                 prenom: {
//                     required: "Jean-Mouloude, c'est toi !?",
//                     minlength: "votre prenom doit comporter au moins 2 caractères"
//                 },             
//                 subject: {
//                     required: "hmm, vous avez oublié quelque chose",
//                     minlength: "votre sujet doit comporter au moins 4 caractères"
//                 },
//                 number: {
//                     required: "vous avez un numéro, non?",
//                     minlength: "votre numero doit comporter au moins 10 caractères"
//                 },
//                 email: {
//                     required: "pas d'email, pas de message"
//                 },
//                 message: {
//                     required: "vous souhaiter nous parler de quelque chose?",
//                     minlength: "C'est tout? :("
//                 }
//             },
//             submitHandler: function(form) {
//                 $(form).ajaxSubmit({
//                     type:"POST",
//                     data: $(form).serialize(),
//                     url:"contact_process.php",
//                     success: function() {
//                         $('#contactForm :input').attr('disabled', 'disabled');
//                         $('#contactForm').fadeTo( "slow", 1, function() {
//                             $(this).find(':input').attr('disabled', 'disabled');
//                             $(this).find('label').css('cursor','default');
//                             $('#success').fadeIn()
//                             $('.modal').modal('hide');
// 		                	$('#success').modal('show');
//                         })
//                     },
//                     error: function() {
//                         $('#contactForm').fadeTo( "slow", 1, function() {
//                             $('#error').fadeIn()
//                             $('.modal').modal('hide');
// 		                	$('#error').modal('show');
//                         })
//                     }
//                 })
//             }
//         })
//     })
        
//  })(jQuery)
// })