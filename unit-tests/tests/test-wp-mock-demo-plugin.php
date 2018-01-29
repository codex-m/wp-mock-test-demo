<?php
/**
 * Tests WP_Mock_Demo_Plugin
 * 
 */
class Test_WP_Mock_Demo_Plugin extends PHPUnit\Framework\TestCase {
	/**
	 * Setup WP_Mock for each test
	 */
	public function setUp() {
		\WP_Mock::setUp();
	}	
	/**
	 * Clean up after the test is run
	 */
	public function tearDown() {
	    $this->addToAssertionCount(
	        \Mockery::getContainer()->mockery_getExpectationCount()
	        );
		\WP_Mock::tearDown();
	}
	/**
	 * Instantiate an instance of the class to be tested
	 * @return WP_Mock_Demo_Plugin
	 */
	private function get_subject() {
	    $test_subject = new WP_Mock_Demo_Plugin();
	    return $test_subject;
	}
	/**
	 * @test
	 * Test that hooks are initialized
	 */
	public function it_adds_init_hoooks() {
	    //Get an instance of the subject to be tested
	    $test_subject = $this->get_subject();
	    
	    /**
	     * Ensure the filter added
	     * Documentation https://github.com/10up/wp_mock#mocking-actions-and-filters
	     */
	    \WP_Mock::expectFilterAdded( 'document_title_parts',  array( $test_subject, 'append_login_status_to_title' ) , 10, 1 );
	    
	    //Now test the init hook() method of this class to check if this filter is really added
	    $test_subject->init_hooks();
	}
	/**
	 * @test
	 * Test that it appends USER LOGGED-IN to title when user is logged-in
	 */
	public function it_appends_user_loggedin_to_title() {
	    //Get an instance of the subject to be tested
	    $test_subject = $this->get_subject();
	    
	    /**
	     * Mock 'is_user_logged_in' WordPress core function
	     * Documentation: https://github.com/10up/wp_mock#mocking-wordpress-core-functions
	     */
	    \WP_Mock::userFunction( 'is_user_logged_in', array(
	        'times' => 1,
	        'return' => true
	    ) );
	    
	    //Mock original title
	    $original_title = array();
	    $original_title[] = 'Original title';
	    
	    //Set expected result
	    $expected_result = $original_title;
	    $expected_result[] = "USER LOGGED-IN";
	    
	    //Now test the append_login_status_to_title() to make sure that filters title and appends USER LOGGED-IN text	    
	    $filtered_title = $test_subject->append_login_status_to_title( $original_title );
	    
	    //Now let's assert that the filtered title is one we expected.
	    $this->assertSame( $expected_result, $filtered_title );	    
	    
	}
	
}