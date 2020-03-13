<?php
class Paging{
    /**
    * set value of totalRows
    * @var numeric
    */
    private $_totalrows = 0;
    /*


    */
    private $_url = "";
    /*


    */
    private $_perPage = 0;
    /*


    */
    private $_numlink = 0;
    /*


    */
    private $_page = 0;
    /*


    */
    private $_limit = 0;
    /*


    */
    private $_customCSS;
    /*


    */
    public function __construct($perPage, $instance, $customCSS = ''){
        $this->_instance = $instance;		
		$this->_perPage = $perPage;
		$this->set_instance();
		$this->_customCSS = $customCSS;
    }
    public function get_start(){
		return ($this->_page * $this->_perPage) - $this->_perPage;
    }
    private function set_instance(){
		// echo $_GET[$this->_instance];
		// print_r($_GET);
		$val = App::uri(3);
		$this->_page = (int) (!isset($val) ? 1 : $val); 
		$this->_page = ($this->_page == 0 ? 1 : $this->_page < 0 ? 1 : $this->_page);
    }
    public function set_total($_totalRows){
		$this->_totalRows = $_totalRows;
    }
    public function get_limit(){
        return "LIMIT ".$this->get_start().",$this->_perPage";
    }
    public function get_limit_keys(){
        return ['offset' => $this->get_start(), 'limit' => $this->_perPage];
    }
    public function page_links($path='/',$ext=null)
	{
	    $adjacents = "2";
	    $prev = $this->_page - 1;
	    $next = $this->_page + 1;
	    $lastpage = ceil($this->_totalRows/$this->_perPage);
	    $lpm1 = $lastpage - 1;

	    $pagination = "";
		if($lastpage > 1)
		{   
		    $pagination .= "<ul class='pagination ".$this->_customCSS."'>";
		if ($this->_page > 1)
		    $pagination.= "<li><a href='".$path."$this->_instance=$prev"."$ext'>Previous</a></li>";
		else
		    $pagination.= "<span class='disabled'>Previous</span>";   

		if ($lastpage < 7 + ($adjacents * 2))
		{   
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
		if ($counter == $this->_page)
		    $pagination.= "<li><span class='current'>$counter</span></li>";
		else
		    $pagination.= "<li><a href='".$path."$this->_instance/$counter"."$ext'>$counter</a></li>";                   
		}
		}
		elseif($lastpage > 5 + ($adjacents * 2))
		{
		if($this->_page < 1 + ($adjacents * 2))       
		{
		for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
		{
		if ($counter == $this->_page)
		    $pagination.= "<li><span class='current'>$counter</span></li>";
		else
		    $pagination.= "<li><a href='".$path."$this->_instance/$counter"."$ext'>$counter</a></li>";                   
		}
		    $pagination.= "...";
		    $pagination.= "<li><a href='".$path."$this->_instance/$lpm1"."$ext'>$lpm1</a></li>";
		    $pagination.= "<li><a href='".$path."$this->_instance/$lastpage"."$ext'>$lastpage</a></li>";       
		}
		elseif($lastpage - ($adjacents * 2) > $this->_page && $this->_page > ($adjacents * 2))
		{
		    $pagination.= "<li><a href='".$path."$this->_instance/1"."$ext'>1</a></li>";
		    $pagination.= "<li><a href='".$path."$this->_instance/2"."$ext'>2</a></li>";
		    $pagination.= "...";
		for ($counter = $this->_page - $adjacents; $counter <= $this->_page + $adjacents; $counter++)
		{
		if ($counter == $this->_page)
		    $pagination.= "<span class='current'>$counter</span>";
		else
		    $pagination.= "<li><a href='".$path."$this->_instance/$counter"."$ext'>$counter</a></li>";                   
		}
		    $pagination.= "..";
		    $pagination.= "<li><a href='".$path."$this->_instance/$lpm1"."$ext'>$lpm1</a></li>";
		    $pagination.= "<li><a href='".$path."$this->_instance/$lastpage"."$ext'>$lastpage</a></li>";       
		}
		else
		{
		    $pagination.= "<li><a href='".$path."$this->_instance/1"."$ext'>1</a></li>";
		    $pagination.= "<li><a href='".$path."$this->_instance/2"."$ext'>2</a></li>";
		    $pagination.= "..";
		for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
		{
		if ($counter == $this->_page)
		    $pagination.= "<span class='current'>$counter</span>";
		else
		    $pagination.= "<li><a href='".$path."$this->_instance/$counter"."$ext'>$counter</a></li>";                   
		}
		}
		}

		if ($this->_page < $counter - 1)
		    $pagination.= "<li><a href='".$path."$this->_instance/$next"."$ext'>Next</a></li>";
		else
		    $pagination.= "<li><span class='disabled'>Next</span></li>";
		    $pagination.= "</ul>\n";       
		}


	    return $pagination;
	}
}