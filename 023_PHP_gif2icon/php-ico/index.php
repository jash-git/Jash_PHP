<?PHP
require( dirname( __FILE__ ) . '/class-php-ico.php' );

$source = dirname( __FILE__ ) . '/example.gif';
$destination = dirname( __FILE__ ) . '/example.ico';

$sizes = array(
    array( 16, 16 ),
    array( 24, 24 ),
    array( 32, 32 ),
    array( 48, 48 ),
);

//$ico_lib = new PHP_ICO( $source, $sizes );
//$ico_lib->save_ico( $destination );

//$ico_lib = new PHP_ICO( $source, array( array( 32, 32 ), array( 64, 64 ) ) );
$ico_lib = new PHP_ICO( $source, array( array( 32, 32 )));
$ico_lib->save_ico( $destination );
?>