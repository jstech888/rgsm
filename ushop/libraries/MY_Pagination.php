<?php
/* 
Slight adjustment to the create_links function

we have query strings enabled for paypal but we don't want to use them anywhere else in the cart
so this method is getting changed to make query strings only if it's configured to do so.
*/
class MY_Pagination extends CI_Pagination
{

	var $search_condition			=  ''; // The search condition

	function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------
	// --------------------------------------------------------------------
	
	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */	
	function create_links()
	{
		$this->full_tag_open='<div class="pagnation">';
		$this->full_tag_close='</div>';
		$this->num_tag_open = $this->prev_tag_open =$this->next_tag_open = $this->first_tag_open= $this->last_tag_open='<span class="item">';
		$this->num_tag_close = $this->prev_tag_close=$this->next_tag_close =$this->first_tag_close= $this->last_tag_close='</span>';
		$this->cur_tag_open ='<span class="current">';
		$this->cur_tag_close ='</span>';
		
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
		   return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);
		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Determine the current page number.		
		$CI =& get_instance();
		
		if ($this->page_query_string === TRUE)
		{
			if ($CI->input->get($this->query_string_segment) != 0)
			{
				$this->cur_page = $CI->input->get($this->query_string_segment);
				
				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if ($CI->uri->segment($this->uri_segment) != 0)
			{
				$this->cur_page = $CI->uri->segment($this->uri_segment);
				
				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		$this->num_links = (int)$this->num_links;
		
		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}
				
		if ( ! is_numeric($this->cur_page) OR  $this->cur_page == 0)
		{
			$this->cur_page = 1;
		}
		
		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->cur_page > $num_pages)
		{
			$this->cur_page = $num_pages;
		}
		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		$get_sort	= '';
		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($this->page_query_string === TRUE)
		{
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
			if(!empty($_GET['by']))
			{
				$get_sort	= '&by='.$_GET['by'];
			}
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/') .'/';
			if(!empty($_GET['by']))
			{
				$get_sort	= '/?by='.$_GET['by'];
			}
		}
		
		
		
  		// And here we go...
		$output = '';
		
		// Render the "First" link
		if  ($this->cur_page > ($this->num_links + 1))
		{
			$output .= $this->first_tag_open.'<a href="#" onclick="searchdd(\''.$this->base_url.$get_sort.'\')">'.$this->first_link.'</a>'.$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->cur_page > 1)
		{
			$i = $this->cur_page - 1;
			$output .= $this->prev_tag_open.'<a href="#" onclick="searchdd(\''.$this->base_url.$i.$get_sort.'\')">'.$this->prev_link.'</a>'.$this->prev_tag_close;
		}

		// Write the digit links
		for ($loop = $start -1; $loop <= $end; $loop++)
		{
			$i = ($loop * $this->per_page) - $this->per_page;
					
			if ($i >= 0)
			{
				if ($this->cur_page == $loop)
				{
					$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
				}
				else
				{
					//$n = ($i == 0) ? '' : $i;
					$output .= $this->num_tag_open.'<a href="#" onclick="searchdd(\''.$this->base_url.$loop.$get_sort.'\')">'.$loop.'</a>'.$this->num_tag_close;
				}
			}
		}

		// Render the "next" link
		if ($this->cur_page < $num_pages)
		{
			$output .= $this->next_tag_open.'<a href="#" onclick="searchdd(\''.$this->base_url.($this->cur_page + 1).$get_sort.'\')">'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		// Render the "Last" link
		if (($this->cur_page + $this->num_links) < $num_pages)
		{
//			$i = (($num_pages * $this->per_page) - $this->per_page);
			$i = $num_pages;
			$output .= $this->last_tag_open.'<a href="#" onclick="searchdd(\''.$this->base_url.$i.$get_sort.'\')">'.$this->last_link.'</a>'.$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		
		///joson 2012-11-16 for search form
		$output .= '
			</form>
			<form id="pagination_search_form" name="pagination_search_form" method="post" accept-charset="utf-8">
			<input type="hidden" name="search_condition" value="'.$this->search_condition.'" />
			<script type="text/javascript">
				function searchdd(src)
				{
					document.pagination_search_form.action =src;
					$("#pagination_search_form").submit();
				}
			</script>
		';
		$output = $this->full_tag_open.$output.$this->full_tag_close;
		
		return $output;		
	}
}
