function checkPasswordStrength( $pass1, $pass2, $strengthResult, $submitButton, blacklistArray ) {
    var pass1 = $pass1.val(),
        pass2 = $pass2.val();
 
    // Reset the form & meter
    $submitButton.attr( 'disabled', 'disabled' );
    $strengthResult.removeClass( 'short bad good strong' );
 
    // Extend our blacklist array with those from the inputs & site data
    blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputBlacklist() );
 
    // Get the password strength
    var strength = wp.passwordStrength.meter( pass1, blacklistArray, pass2 );
 
    // Add the strength meter results
    switch ( strength ) {
 
        case 2:
            $strengthResult.addClass( 'bad' ).html( pwsL10n.bad );
            break;
 
        case 3:
            $strengthResult.addClass( 'good' ).html( pwsL10n.good );
            break;
 
        case 4:
            $strengthResult.addClass( 'strong' ).html( pwsL10n.strong );
            break;
 
        case 5:
            $strengthResult.addClass( 'short' ).html( pwsL10n.mismatch );
            break;
 
        default:
            $strengthResult.addClass( 'short' ).html( pwsL10n.short );
 
    }
 
    // The meter function returns a result even if pass2 is empty,
    // enable only the submit button if the password is strong and
    // both passwords are filled up
    /*if ( 2 === strength && '' !== pass2.trim() ) {*/
        $submitButton.removeAttr( 'disabled' );
   /* }*/
 
    return strength;
}
 
jQuery( document ).ready( function( $ ) {
    // Binding to trigger checkPasswordStrength
    $( 'body' ).on( 'keyup', 'input[name=user_pass], input[name=pass_confirm]',
        function( event ) {
            $('.pass-check').css({'display': 'block'});
            checkPasswordStrength(
                $('input[name=user_pass]'),         // First password field
                $('input[name=pass_confirm]'), // Second password field
                $('#password-strength'),           // Strength meter
                $('input[type=submit]'),           // Submit button
                ['admin', '12345']        // Blacklisted words
            );
        }
    );
});