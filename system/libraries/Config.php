 function secure_site_url($uri = '')
    {
        if (is_array($uri))
        {
            $uri = implode('/', $uri);
        }
 
        if ($uri == '')
        {
            return $this->slash_item('secure_base_url').$this->item('index_page');
        }
        else
        {
            $suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
           return $this->slash_item('secure_base_url').$this->slash_item('index_page').preg_replace("|^/*(.+?)/*$|", "\\1", $uri).$suffix;
        }
    }