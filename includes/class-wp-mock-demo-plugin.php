<?php 
/**
 * WP Mock Demo Plugin Class
 * @author emerson
 *
 */
class WP_Mock_Demo_Plugin {
    
    /**
     * Init hooks
     */
    public function init_hooks() {
        add_filter( 'document_title_parts',  array( $this, 'append_login_status_to_title' ) , 10, 1 );        
    }
    
    /**
     * Append login status to title
     * @param string $title
     */
    public function append_login_status_to_title( array $title ) {
        if ( is_user_logged_in() ) {
            $title[] = 'USER LOGGED-IN';
         }
        return $title;
    }    
    
}