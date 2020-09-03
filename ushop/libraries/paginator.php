<?php

class paginator{
    var $items_per_page;
    var $items_total;
    var $current_page;
    var $current_url;
    var $num_pages;
    var $mid_range;
    var $low;
    var $high;
    var $limit;
    var $return;
    var $default_limit = 10;
    var $segment;

    function paginator()
    {
        $this->current_page = isset($this->current_page)?$this->current_page:1;
        $this->mid_range = isset($this->current_page)?$this->current_page:1;
        $this->items_per_page = (!empty($_GET['limit'])) ? $_GET['limit']:$this->default_limit;
    }

    function paginate()
    {
        $CI =& get_instance();

        $CI->load->helper('url');
        $CI->load->library('session');

        if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_limit;
        $this->num_pages = ceil($this->items_total/$this->items_per_page);

        $this->current_page = $CI->uri->segment($this->segment); // must be numeric > 0
        if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;
        if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;
        $prev_page = $this->current_page-1;
        $next_page = $this->current_page+1;

        if($this->num_pages > 10)
        {
            $this->return = ($this->current_page != 1 And $this->items_total >= 10) ? "<span class=\"item\" ><a href=\"$this->current_url/$prev_page?limit=$this->items_per_page\">« Previous</a></span> ":"";

            $this->start_range = $this->current_page - floor($this->mid_range/2);
            $this->end_range = $this->current_page + floor($this->mid_range/2);

            if($this->start_range <= 0)
            {
                $this->end_range += abs($this->start_range)+1;
                $this->start_range = 1;
            }
            if($this->end_range > $this->num_pages)
            {
                $this->start_range -= $this->end_range-$this->num_pages;
                $this->end_range = $this->num_pages;
            }
            $this->range = range($this->start_range,$this->end_range);

            for($i=1;$i<=$this->num_pages;$i++)
            {
                if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";
                // loop through all pages. if first, last, or in range, display
                if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))
                {
                    $this->return .= ($i == $this->current_page ) ? "<span class=\"current\">$i</span>":"<span class='item'><a   href=\"$this->current_url/$i?limit=$this->items_per_page\">$i</a> </span>";
                }
                if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " ... ";
            }
            $this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) ) ? "<span class='item'><a  href=\"$this->current_url/$next_page?limit=$this->items_per_page\">Next »</a>\n":"";

        }
        else
        {
            for($i=1;$i<=$this->num_pages;$i++)
            {
                $this->return .= ($i == $this->current_page) ? "<span class=\"current\">$i</span> ":"<span class='item'><a  href=\"$this->current_url/$i?limit=$this->items_per_page\">$i</a> </span>";
            }
        }
        $this->low = ($this->current_page-1) * $this->items_per_page;
        $this->high = ($this->current_page * $this->items_per_page)-1;

    }

    function display_items_per_page()
    {
        $items = '';
        $limit_array = array(1,10,25,50,100);
        foreach($limit_array as $limit_opt)    $items .= ($limit_opt == $this->items_per_page) ? "<option selected value=\"$limit_opt\">$limit_opt</option>\n":"<option value=\"$limit_opt\">$limit_opt</option>\n";
        return "<select class='item itemselect' onchange=\"window.location='$this->current_url/$this->current_page?limit='+this[this.selectedIndex].value;return false\">$items</select>\n";
    }

    function display_jump_menu()
    {
        for($i=1;$i<=$this->num_pages;$i++)
        {
            $option .= ($i==$this->current_page) ? "<option value=\"$i\" selected>$i</option>\n":"<option value=\"$i\">$i</option>\n";
        }
        return "<select class='item itemselect' onchange=\"window.location='$this->current_url/this[this.selectedIndex].value?limit=$this->items_per_page';return false\">$option</select>\n";
    }

    function display_pages()
    {
        return $this->return;
    }
}
?>