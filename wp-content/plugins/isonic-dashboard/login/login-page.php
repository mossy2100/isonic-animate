<?php
/**
* Template Name:  Login Page
* Author: Emma Jackson, Kimberley Le Bherz
* old version - keep to copy form fields for styling new css then delete
*/



                    // //Handle login form submission
                    // if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                    //     $login_data = array(
                    //         'user_login' => $_POST['username'],
                    //         'user_password' => $_POST['password'],
                    //         // 'remember' => $_POST['rememberme']
                    //         'remember' => true
                    //     );

                        
                    //     $user = wp_signon( $login_data, false );
                    //     // var_dump($user);
                    //     if ( ! is_wp_error( $user ) ) {
                    //         wp_redirect( admin_url() ); 
                    //         exit;
                    //     } else {
                    //         $error = $user->get_error_message();
                    //     }
                    // }
  

                    // if ( is_user_logged_in() ) {
                    //     wp_redirect( plugin_dir_url( __FILE__ ) . 'dashboard/dashboard-page.php' );
                    //     exit;
                    //  }
                    //  global $pagenow;
                    //  if ( $pagenow === 'wp-login.php' ) {
                    //     wp_redirect( plugin_dir_url( __FILE__ ) . 'login-page.php' );
                    //     exit;
                    //  }


// // Check if the user has submitted the login form
// if ( isset( $_POST['login'] ) ) {

//     // Get the username and password from the form data
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Attempt to log the user in
//     $user = wp_authenticate( $username, $password );

//     // Check if the login was successful
//     if ( is_wp_error( $user ) ) {
//         // Display an error message
//         echo '<div class="error">Invalid username or password.</div>';
//     } else {
//         // Redirect the user to the custom dashboard page
//         wp_set_auth_cookie( $user->ID );
//         wp_redirect( plugin_dir_url( __FILE__ ) . 'dashboard/dashboard-page.php' );
//         exit;
//     }
// }




// Define a function to load the custom login page
function custom_login_page() {
echo "custom_login_page() called";
echo "plugin_dir_url(__FILE__)" . plugin_dir_url( __FILE__ );
    // Load the necessary scripts and styles
    wp_enqueue_style( 'custom-login-style', plugin_dir_url( __FILE__ ) . 'css/login.css' );
    // wp_enqueue_script( 'custom-login-script', plugin_dir_url( __FILE__ ) . 'assets/js/login.js' );

    // Display the login form
    ?>
    <link rel='stylesheet' href='/wp-content/plugins/projectplugin/css/login.css' type='text/css' media='all' /> 

    <div id="login">
        <!-- <h1><?php echo get_option('blogname'); ?></h1> -->
        <div class="isonic-logo-wrapper">
            <img src="/wp-content/plugins/projectplugin/images/isonic-symbol-2022-transparent.png" alt="" class="isonic-logo-img">
        </div>  

        <?php if ( isset( $error ) ) : ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form name="loginform" id="custom_loginform" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="post">

        
        <h2>Sign In</h2>
        <div class="wrapper">
                <p class="login-username">
                    <label for="username"><?php _e('Username'); ?></label>
                    <input type="text" name="username" id="user_login" class="form-control" placeholder="Username/ Email Address" value="<?php echo ( isset( $_POST['username'] ) ? esc_attr( $_POST['username'] ) : '' ); ?>" />
                </p>
                <p class="login-password">
                    <label for="password"><?php _e('Password'); ?></label>
                    <input type="password" name="password" id="user_pass" class="form-control" placeholder="Password" value="" />
                </p>
            </div>
            <p class="login-rememberme">
                <label for="rememberme">
                    <input name="rememberme" type="checkbox" id="rememberme" value="forever" class="checkbox-round" /> <?php _e('Remember Me!'); ?>
                </label>
            </p>
            <p>
                <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="<?php esc_attr_e('Log In'); ?>" />
                <input type="hidden" name="redirect_to" value="<?php echo esc_attr( home_url() ); ?>" />

                <p class="lost-password">
                    <a href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Lost your password?'); ?></a>
                </p>
            </p>

            <div class="img_yellowdots-div">
                <img class="img_yellowdots" src="/wp-content/plugins/projectplugin/images/colour-yellow-to-orange-dots.png" alt="" class="">
            </div>  
        </form>

        <div class="contact">
            <p>Having troubles logging into your website? <a href="mailto:support@isonic.com.au">Contact iSonic</a></p>
        </div>
    
    </div>

<?php



}

// Replace the default login page with the custom login page
add_action( 'login_init', function() {
    if ( ! is_user_logged_in() ) {
        custom_login_page();
        exit();
    } 
    
} );

