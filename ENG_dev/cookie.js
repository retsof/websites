/**
 * Cookie Javascript
 * 
 * JS required to set/get and determine if a user can accept cookies.
 * 
 * $Id: cookie.js 4218 2012-07-30 12:54:36Z jamescollier $
 */

var cookie = {};

cookie.is_writable = null;

/**
 * Is Possible to Write Cookies
 * 
 * Determines if it is possible for a users computer to store cookies. 
 * 
 * @return boolean Returns true if cookies can be written, and false if not.
 * 
 */
cookie.is_possible_to_write_cookies = function(){

	if(this.is_writable === null){
		this.set_cookie('test',1,null);
		if(this.get_cookie('test') == false){
			return false;
		}else{
			this.is_writable = true;
			return true;
		}
		
	}else{
		return this.is_writable;
	}
	
}

/**
 * Set Cookie
 * 
 * Creates a cookie based on a given name and value pair, which expires
 * after the number of days given in 'expiredays'.
 * 
 */
cookie.set_cookie = function(name,value,expiredays)
{
	var exp_date = new Date();
	exp_date.setDate(exp_date.getDate()+expiredays);
	document.cookie=name+ "=" +escape(value)+ ((expiredays==null) ? "" : ";expires="+exp_date.toUTCString()) + ";path=/";
}

/**
 * Get Cookies
 * 
 * @return string Returns a given cookie's value. Returns false if cookie is not set.
 * 
 */
cookie.get_cookie = function(check_name){

	//Split cookie up into name/value pairs
	var a_all_cookies = document.cookie.split( ';' );
	var a_temp_cookie = '';
	var cookie_name = '';
	var cookie_value = '';
	var b_cookie_found = false; // set boolean t/f default f

	for ( i = 0; i < a_all_cookies.length; i++ )
	{
		//Split apart each name=value pair
		a_temp_cookie = a_all_cookies[i].split( '=' );

		//Trim left/right whitespace
		cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

		// If the extracted name matches passed check_name
		if ( cookie_name == check_name )
		{
			b_cookie_found = true;
			//Handle case where cookie has no value but exists (no = sign, that is):
			if ( a_temp_cookie.length > 1 )
			{
				cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
			}
			// note that in cases where cookie is initialized but no value, null is returned
			return cookie_value;
			break;
		}
		a_temp_cookie = null;
		cookie_name = '';
	}

	if ( !b_cookie_found )
	{
		return false;
	}
}