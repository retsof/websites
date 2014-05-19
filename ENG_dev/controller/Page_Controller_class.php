<?php 
/**
 *  Page Contoller 
 *  
 *  Sets up vars needed to display the 'landing page' view. These pages are displayed without standard top/footer files. 
 * 
 * The constructor sets the view file, and removes the bodytop/bottom files as it is the same for every action. 
 * The params set in the constructor can be overwritten on a per view basis.
 *  
 *  $Id: Page_class.php 5471 2013-07-12 14:31:19Z jamescollier $
 */
class Page_Controller extends Local_Controller{
	
	/**
	 *  Constructor 
	 * 
	 *  Removes bodytop and bodybottom files for all landing pages by default
	 * 
	 */
	public function __construct(){
		
		//Set display var defaults for all landing  pages
		$this->view = 'page';
		$this->body_top_file = '';
		$this->body_bottom_file = '';
		
		//Parent contructor sets up site wide vars
		parent::__construct();
	}
	
	/**
	 *  Override Index 
	 * 	 
	 * @return false Returns false, as there's no index for this controller 
	 */
	public function execute_index(){
		//Return false, we do this because there is no default action for 'page', 
		//but this method is implemented in the parent class.
		return false;
	}
	
	/**
	 * Execute Multiple Profile Job Ad 
	 * 
	 *  Sets partial ID for page/multiple_profile_job_ad
	 */
	public function execute_multiple_profile_job_ad(){		

		$this->page_partial_id = 276;
	}
	
	 /**
	 * Execute 100
	 * 
	 *  Sets partial ID for page/100
	 */
	public function execute_100(){		

		$this->page_partial_id = 264;
	}
	
	/**
	 * Execute 1056
	 * 
	 *  Sets partial ID for page/1056
	 */
	public function execute_1056(){		

		$this->page_partial_id = 406;
	}
	
	/**
	 * Execute 1072
	 * 
	 *  Sets partial ID for page/1072
	 */	
	public function execute_1072(){		

		$this->page_partial_id = 407;
	}

	/**
	 * Execute 1094
	 * 
	 *  Sets partial ID for page/1094
	 */	
	public function execute_1094(){		

		$this->page_partial_id = 408;
	}

	/**
	 * Execute 1134
	 * 
	 *  Sets partial ID for page/1134
	 */
	public function execute_1134(){		

		$this->page_partial_id = 409;
	}

	/**
	 * Execute 1315
	 * 
	 *  Sets partial ID for page/1315
	 */	
	public function execute_1315(){		

		$this->page_partial_id = 410;
	}

	/**
	 * Execute 1317
	 * 
	 *  Sets partial ID for page/1317
	 */	
	public function execute_1317(){		

		$this->page_partial_id = 411;
	}

	/**
	 * Execute 1357
	 * 
	 *  Sets partial ID for page/1357
	 */	
	public function execute_1357(){		

		$this->page_partial_id = 412;
	}

	/**
	 * Execute 1427
	 * 
	 *  Sets partial ID for page/1427
	 */	
	public function execute_1427(){		

		$this->page_partial_id = 413;
	}

	/**
	 * Execute 1429
	 * 
	 *  Sets partial ID for page/1429
	 */	
	public function execute_1429(){		

		$this->page_partial_id = 414;
	}

	/**
	 * Execute 1521
	 * 
	 *  Sets partial ID for page/1521
	 */	
	public function execute_1521(){		

		$this->page_partial_id = 415;
	}

	/**
	 * Execute 250
	 * 
	 *  Sets partial ID for page/250
	 */	
	public function execute_250(){		

		$this->page_partial_id = 273;
	}

	/**
	 * Execute 280
	 * 
	 *  Sets partial ID for page/280
	 */	
	public function execute_280(){		

		$this->page_partial_id = 269;
	}

	/**
	 * Execute 29lw
	 * 
	 *  Sets partial ID for page/29lw
	 */	
	public function execute_29lw(){		

		$this->page_partial_id = 294;
	}

	/**
	 * Execute 310
	 * 
	 *  Sets partial ID for page/310
	 */	
	public function execute_310(){		

		$this->page_partial_id = 271;
	}
	
	/**
	 * Execute 34is
	 * 
	 *  Sets partial ID for page/34is
	 */	
	public function execute_34is(){		

		$this->page_partial_id = 295;
	}

	/**
	 * Execute 350
	 * 
	 *  Sets partial ID for page/350
	 */	
	public function execute_350(){		

		$this->page_partial_id = 265;
	}

	/**
	 * Execute 450
	 * 
	 *  Sets partial ID for page/450
	 */	
	public function execute_450(){		

		$this->page_partial_id = 270;
	}

	/**
	 * Execute 50nw
	 * 
	 *  Sets partial ID for page/50nw
	 */	
	public function execute_50nw(){		

		$this->page_partial_id = 296;
	}
	
	/**
	 * Execute 670
	 *
	 *  Sets partial ID for page/670
	 */
	public function execute_670(){
	
		$this->page_partial_id = 266;
	}
	
	/**
	 * Execute 700
	 *
	 *  Sets partial ID for page/700
	 */
	public function execute_700(){
	
		$this->page_partial_id = 272;
	}
	
	/**
	 * Execute 800
	 *
	 *  Sets partial ID for page/800
	 */
	public function execute_800(){
	
		$this->page_partial_id = 268;
	}
	
	/**
	 * Execute 87tr
	 *
	 *  Sets partial ID for page/87tr
	 */
	public function execute_87tr(){
	
		$this->page_partial_id = 297;
	}
	
	/**
	 * Execute 900
	 *
	 *  Sets partial ID for page/900
	 */
	public function execute_900(){
	
		$this->page_partial_id = 267;
	}
	
	/**
	 * Execute 99sa
	 *
	 *  Sets partial ID for page/99sa
	 */
	public function execute_99sa(){
	
		$this->page_partial_id = 298;
	}
}
?>
