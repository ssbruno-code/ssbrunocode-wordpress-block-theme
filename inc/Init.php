<?php
/**
 * @package  SsbCodeBlockTheme
 */
namespace Inc;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services() 
	{
		
		$isDisabled = get_option( 'ssbcodeOptionName' );

		if( isset( $isDisabled['activate_deactivate_0'] ) ){
			return [					
				Settings\Settings::class			
			];
		}

		return [
			Base\Enqueue::class,
			Base\Cpts::class,
			Base\RegisterBlocks::class,
			Settings\Settings::class,			
			Settings\Theme::class,			
			Settings\SearchRoute::class		
		];

	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}