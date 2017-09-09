<?php
defined('POPSHOPS_API_VERSION') or die('');

class PopShops {

  function PopShops($options=array()) {
    // Setup required api keys
    $this->apiKey = $options['api_key'];
    $this->catalogKey = $options['catalog_key'];
    $this->apiVersion = POPSHOPS_API_VERSION;

    // Setup list of categories to build predefined searches to be used as categories
    $this->categories = (isset( $options['categories'] ) ) ? $options['categories'] : array();

    // Setup default parameters for how many results to return
    $this->subid = (isset( $options['subid'] ) ) ? $options['subid'] : 'popshops';
    $this->localRedirects = (isset( $options['localRedirects'] ) ) ? $options['localRedirects'] : false;
    $this->productLimit = (isset( $options['productLimit'] ) ) ? $options['productLimit'] : 9;
    $this->productGridColumns = (isset( $options['productGridColumns'] ) ) ? $options['productGridColumns'] : 3;
    $this->productOffset = 0;
    $this->dealLimit = (isset( $options['dealLimit'] ) ) ? $options['dealLimit'] : 25;
    $this->dealOffset = 0;
    $this->nameSpace = (isset( $options['nameSpace'] ) ) ? $options['nameSpace'] : 'psps_';

    if ( !isset( $_REQUEST[ $this->nameSpace.'keywords' ] ) && isset( $options['defaultSearch'] ) ) {
      $_REQUEST[ $this->nameSpace.'keywords' ] = $options['defaultSearch']; 
    }

    // Setup list of parameters to pass on to PopShops. These will be parsed out of the url.
    $this->params = array('keywords','merchant_id','merchant_type_id','category_id','brand_id','price_min','price_max','product_sort','product_limit','product_offset','product_group_id','deal_type_id','deal_offset');
  }

  function findMerchants() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/merchants.xml?";
    $request .= "catalog_key=".$this->catalogKey;
    $this->merchantResults = $this->requestResults($request);
  }

  function findDeals() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/deals.xml?";
    $request .= "catalog_key=".$this->catalogKey;
    $request = $this->addParameter($request, 'deal_limit', $this->dealLimit);
    $request = $this->addParameters($request,$this->params);
    $this->dealResults = $this->requestResults($request);
  }

  function findDealTypes() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/deal_types.xml";
    $this->dealTypeResults = $this->requestResults($request);
  }

  function findMerchantTypes() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/merchant_types.xml";
    $this->merchantTypeResults = $this->requestResults($request);
  }

  function findNetworks() {
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/networks.xml";
    $this->networkResults = $this->requestResults($request);
  }

  function findProducts(){
    $request = "http://www.popshops.com/v".$this->apiVersion."/".$this->apiKey."/products.xml?";
    $request .= "catalog_key=".$this->catalogKey;
    $request = $this->addParameter($request, 'product_limit', $this->productLimit);
    $request = $this->addParameters($request,$this->params);
    $this->productResults = $this->requestResults($request);
  }

  function productStoreName($product){
    $out = '';
    $storeName = $this->merchantNameFor($product);

    if (!empty($storeName)) {
      $out .= '<p class="psps-text psps-store-name"><span>Store: </span>';
      $out .= '<a href="'.$this->localRedirectURL($product['url']) .'" rel="nofollow">'.$storeName.'</a>';
      $out .= '</p>';
    }
    return $out;
  }

  function productPrice($product){
    $out = '';
    $out .= '<p class="psps-text psps-price">';

    if (intval($product['merchant_price']) > 0 && (floatval($product['merchant_price']) != floatval($product['retail_price']))) {
      $out .= '<span class="psps-retail-price"><del>$'.number_format(floatval($product['retail_price']),2).'</del></span>';
      $out .= '<span class="psps-store-price">$'.number_format(floatval($product['merchant_price']),2).'</span>';
    } else {
      $out .= '<span class="psps-store-price">$'.number_format(floatval($product['merchant_price']),2).'</span>';
    }

    $out .= '</p>';
    return $out;
  }

  function renderProduct($product) {
    $out = '';
    $out .= '<div class="psps-img"><a href="'.$this->localRedirectURL($product['url']).'" rel="nofollow"><img src="'.$product['large_image_url'].'" /></a></div>';
    $out .= $this->productPrice($product);
    $out .= '<p class="psps-text psps-name"><a href="'.$this->localRedirectURL($product['url']).'" rel="nofollow">'.$product['name'].'</a></p>';
    $out .= '<p class="psps-text psps-description">'.substr($product['description'],0,150) .'...</p>';
    $out .= $this->productStoreName($product);
    return $out;
  }

  function renderProductGrid() {
    $out = '<table style="float:left;">';

    $count = 0;
    $rowCount = 1;
    $cols = $this->productGridColumns;
    $size = sizeof($this->productResults->products->product);

    foreach($this->productResults->products->product as $product) {
      if ($count%$cols == 0) { $rowCount++; }

      if (($count == 0) || ($count%$cols == 0)) { $out .= '<tr>'; }

      $out .= '<td class="psps-cell">';
      $out .= $this->renderProduct($product);
      $out .= '</td>';

      // This will add any additional cells in the last row that might be missing. 
      if ( $size == $count+1 && $size%$cols != 0 ) { 
        $i = 0;
        while ( $i < ( $cols - $size%$cols) ) {
          $out .= '<td> </td>';
          $i++; 
        }
      }

      $count++;
      if (($count%$cols == 0) || ($count == $size)) { 
        $out .= '</tr>';
      }
    }

    $out .= '</table>';
    return $out;
  }

  function renderCustomCategories(){
    $out = '';
    if (sizeOf($this->categories) > 0) {
      $out .= '<h3>Popular categories</h3>';
      $out .= '<ul>';
      foreach ($this->categories as $category) {
        $out .= '<li>'.$this->customCategoryLink($category).'</li>';
      }
      $out .= '</ul>';
    }
    return $out;
  }

  function merchantNameFor($object) {
    if (isset($this->merchantResults)) {
      $merchants = $this->merchantResults;
    } else {
      $merchants = isset($this->productResults) ? $this->productResults->merchants : $this->dealResults->merchants;
    }

    foreach($merchants->merchant as $merchant) {
      if (intval($merchant['id']) == intval($object['merchant_id'])) {
        return $merchant['name'];
      }
    }
    return '';
  }

  function merchantLogoFor($object) {
    if (isset($this->merchantResults)) {
      $merchants = $this->merchantResults;
    } else {
      $merchants = isset($this->productResults) ? $this->productResults->merchants : $this->dealResults->merchants;
    }

    foreach($merchants->merchant as $merchant) {
      if (intval($merchant['id']) == intval($object['merchant_id'])) {
        return $merchant['logo_url'];
      }
    }
    return '';
  }

  function localRedirectURL($destination) {
    if ( $this->localRedirects == true ) {
      $url = $this->baseURL($this->params);
      $url = str_replace('?&','?',$url);
      $delimiter = (strpos($url,'?') > -1) ? '&' : '?';
      return $url.$delimiter.$this->nameSpace.'destination='.str_replace('http://','',$destination);
    } else {
      return $destination;
    }
  }

  function renderDealRows(){
    $out = '';
    if (sizeOf($this->dealResults->deals->deal) > 0) {
      $out .= '<ul>';
      foreach($this->dealResults->deals->deal as $deal) {
        $out .= '<li><div class="psps-deal">';
        $out .= '<div class="psps-deal-logo"><a href="'.$this->localRedirectURL($deal['url']).'" rel="nofollow"><img src="'.$this->merchantLogoFor($deal).'" alt="'.$this->merchantNameFor($deal).'"/></a></div>';
        $out .= '<div class="psps-deal-name">'.$deal['name'].'</div>';
        $out .= '<div class="psps-deal-meta">';
        $out .= '<span class="psps-deal-expiration">Expires: '.$deal['end_on'].'</span>';
        if (isset($deal['code'])) {
          $out .= '<span class="psps-deal-code">Code: '.$deal['code'].'</span>';
        }
        
        $out .= '</div>';
        $out .= '</div></li>';
      }
      $out .= '</ul>';
    }
    return $out;
  }

  function renderDeals(){
    $out = '';
    if (sizeOf($this->productResults->deals->deal) > 0) {
      $out .= '<h3>Deals</h3>';
      $out .= '<div class="psps-filter-options psps-tall">';
      $out .= '<ul>';
      foreach($this->productResults->deals->deal as $deal) {
        $out .= '<li><div class="psps-deal">';
        $out .= '<div class="psps-merchant"><a href="'.$this->localRedirectURL($deal['url']).'" rel="nofollow">'.$this->merchantNameFor($deal).'</a></div>';
        $out .= '<div class="psps-name">'.$deal['name'].'</div>';
        $out .= '</div></li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderDealMerchantTypeFilter(){
    return $this->renderMerchantTypeFilter($this->dealResults);
  }

  function renderDealMerchantTypeSelect(){
    return $this->renderMerchantTypeSelect($this->dealResults);
  }

  function renderDealMerchantFilter(){
    return $this->renderMerchantFilter($this->dealResults);
  }

  function renderDealMerchantSelect(){
    return $this->renderMerchantSelect($this->dealResults);
  }

  function renderDealTypeFilter(){
    $out = '';
    if (sizeOf($this->dealResults->deal_types) > 0) {
      $out .= '<h3>Types of deals</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($this->dealResults->deal_types->deal_type as $dealType) {
        $out .= '<li>';
        $out .= '<span class="psps-label">'.$this->dealTypeLink($dealType).'</span>';
        $out .= ' <span class="psps-count">('.number_format(floatval($dealType['deal_count'])).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderDealTypeSelect(){
    $out = '';
    if (sizeOf($this->dealResults->deal_types) > 0) {
      $out .= '<h3>Types of deals</h3>';
      $out .= '<select class="psps-select" onchange="window.location=this.value;">';
      $out .= '<option value="'.$this->baseURL(array('deal_type_id')).'">All</option>';
      foreach($this->dealResults->deal_types->deal_type as $dealType) {
        $param = isset($_REQUEST[$this->nameSpace.'deal_type_id']) ? $_REQUEST[$this->nameSpace.'deal_type_id'] : 0;
        $selected = (intval($dealType['id']) == intval($param)) ? ' selected="selected"' : '';
        $out .= '<option value="'.$this->dealTypeUrl($dealType).'"'.$selected.'>';
        $out .= $dealType['name'].' ('.number_format(floatval($dealType['deal_count'])).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;
  }

  function dealTypeLink($dealType) {
    return '<a href="'.$this->dealTypeUrl($dealType).'">'.$dealType['name'].'</a>';
  }

  function dealTypeUrl($dealType) {
    $url = $this->baseURL(array('deal_type_id','deal_offset'));
    $url = $this->addParameter($url,'deal_type_id',$dealType['id']);

    if (isset($_REQUEST[$this->nameSpace.'merchant_type_id'])) {
      $url = $this->addParameter($url,'merchant_type_id',$_REQUEST[$this->nameSpace.'merchant_type_id']);
    }

    $url = str_replace('?&','?',$url);
    return $url;
  }

  function renderCategoryFilter(){
    if (isset($_REQUEST[$this->nameSpace.'category_id'])) {
      $this->renderMerchantCategoryFilter();
    } else {
      $this->renderMerchantTypeFilter($this->productResults);
    }
  }

  function renderMerchantCategoryFilter(){
    $out = '';
    if (sizeOf($this->productResults->categories->category) > 0) {
      $out .= '<h3>Categories</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($this->productResults->categories->category as $category) {
        $out .= '<li>';
        $out .= '<span class="psps-label">'.$this->categoryLink($category).'</span>';
        $out .= ' <span class="psps-count">('.number_format(floatval($category['product_count'])).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderMerchantTypeFilter($results){
    $out = '';
    if (sizeOf($results->merchant_types->merchant_type) > 0) {
      $out .= '<h3>Categories</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($results->merchant_types->merchant_type as $merchant_type) {
        $out .= '<li>';
        $out .= '<span class="psps-label">'.$this->merchantTypeLink($merchant_type).'</span>';
        $count = isset($merchant_type['deal_count']) ? $merchant_type['deal_count'] : $merchant_type['product_count'];
        $out .= ' <span class="psps-count">('.number_format(intval($count)).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderMerchantTypeSelect($results){
    $out = '';
    if (sizeOf($results->merchant_types->merchant_type) > 0) {
      $out .= '<h3>Categories</h3>';
      $out .= '<select class="psps-select" onchange="window.location=this.value;">';
      $out .= '<option value="'.$this->baseURL(array('merchant_type_id')).'">All</option>';
      foreach($results->merchant_types->merchant_type as $merchant_type) {
        $param = isset($_REQUEST[$this->nameSpace.'merchant_type_id']) ? $_REQUEST[$this->nameSpace.'merchant_type_id'] : 0;
        $selected = (intval($merchant_type['id']) == intval($param)) ? ' selected="selected"' : '';
        
        $out .= '<option value="'.$this->merchantTypeUrl($merchant_type).'"'.$selected.'>';
        $out .= $merchant_type['name'];
        $count = isset($merchant_type['deal_count']) ? $merchant_type['deal_count'] : $merchant_type['product_count'];
        $out .= ' ('.number_format(intval($count)).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;
  }

  function renderBrandFilter(){
    $out = '';
    if (sizeOf($this->productResults->brands->brand) > 0) {
      $out .= '<h3>Brands</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($this->productResults->brands->brand as $brand) {
        $out .= '<li>';
        $out .= '<span class="psps-label">'.$this->brandLink($brand).'</span>';
        $out .= ' <span class="psps-count">('.number_format(intval($brand['product_count'])).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderMerchantFilter($results){
    $out = '';
    if (sizeOf($results->merchants->merchant) > 0) {
      $out .= '<h3>Stores</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($results->merchants->merchant as $merchant) {
        $out .= '<li>';
        $out .= '<span class="psps-label">'.$this->merchantLink($merchant).'</span>';
        $count = isset($merchant['deal_count']) ? $merchant['deal_count'] : $merchant['product_count'];
        $out .= ' <span class="psps-count">('.number_format(intval($count)).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderMerchantSelect($results){
    $out = '';
    if (sizeOf($results->merchants->merchant) > 0) {
      $out .= '<h3>Stores</h3>';
      $out .= '<select class="psps-select" onchange="window.location=this.value">';
      $out .= '<option value="'.$this->baseURL(array('merchant_id')).'">All</option>';
      foreach($results->merchants->merchant as $merchant) {
        $param = isset($_REQUEST[$this->nameSpace.'merchant_id']) ? $_REQUEST[$this->nameSpace.'merchant_id'] : 0;
        $selected = (intval($merchant['id']) == intval($param)) ? ' selected="selected"' : '';
        $out .= '<option value="'.$this->merchantUrl($merchant).'"'.$selected.'>';
        $out .= $merchant['name'];
        $count = isset($merchant['deal_count']) ? $merchant['deal_count'] : $merchant['product_count'];
        $out .= ' ('.number_format(intval($count)).')';
        $out .= '</option>';
      }
      $out .= '</select>';
    }
    return $out;
  }

  function renderPriceRangeFilter() {
    $out = '';
    if (sizeOf($this->productResults->price_ranges->price_range) > 0) {
      $out .= '<h3>Prices</h3>';
      $out .= '<div class="psps-filter-options">';
      $out .= '<ul>';
      foreach($this->productResults->price_ranges->price_range as $price_range) {
        $out .= '<li>';
        $out .= '<span class="psps-label">'.$this->priceLink(array('price_min' => $price_range['min'], 'price_max' => $price_range['max'])).'</span>';
        $out .= ' <span class="psps-count">('.number_format(intval($price_range['product_count'])).')</span>';
        $out .= '</li>';
      }
      $out .= '</ul>';
      $out .= '</div>';
    }
    return $out;
  }

  function renderSuggestedMerchants() {
    if (!isset($this->cachedSuggestedMerchants)) {
      $out = '';
      if (!isset($this->productResults->suggested_merchants)) return $out;
      $out .= '<div id="psps-suggested-merchants">';
      $out .= '<h2>Go directly to this store:</h2>';
      foreach($this->productResults->suggested_merchants->merchant as $suggested_merchant) {
        $out .= '<div class="psps-suggested-merchant">';
        if (strlen($suggested_merchant['logo_url']) > 0) {
          $out .= '<a href="'.$suggested_merchant['url'].'" rel="nofollow"><img src="'.$suggested_merchant['logo_url'].'" /></a>';
        }
        $out .= '<a href="'.$suggested_merchant['url'].'" rel="nofollow">'.$suggested_merchant['name'].'</a>';
        $out .= '</div>';
      }
      $out .= '</div>';
      $this->cachedSuggestedMerchants = $out;
    }
    return $this->cachedSuggestedMerchants;
  }

  function renderDealPaginationSummary(){
    return $this->renderPaginationSummary($this->dealResults['deal_offset'], $this->dealResults->deals['total_count'], $this->dealLimit);
  }

  function renderProductPaginationSummary(){
    return $this->renderPaginationSummary($this->productResults['product_offset'], $this->productResults->products['total_count'], $this->productLimit);
  }

  function renderPaginationSummary($offset,$count,$limit){
    if (!isset($this->cachedPaginationSummary)) {
      $start = intval($offset)+1;
      $finish = (intval($count) < $start+$limit) ? $count : (($start+$limit)-1);
      $this->cachedPaginationSummary = 'Showing '.$start.'-'.$finish.' of '.number_format(intval($count));
    }
    return $this->cachedPaginationSummary;
  }

  function renderDealPaginationLinks() {
    return $this->renderPaginationLinks('deal', $this->dealResults, $this->dealResults->deals['total_count']);
  }

  function renderProductPaginationLinks(){
    return $this->renderPaginationLinks('product', $this->productResults, $this->productResults->products['total_count']);
  }

  function renderPaginationLinks($type, $results, $count){

    if (!isset($this->cachedPagination_links)) {
      $out = '';
      $itemCount = intval($count);
      if ($type == 'deal') {
        $limit = $this->dealLimit;
      } else {
        $limit = $this->productLimit;
      }

        if ($itemCount > $limit) {
          $offset = intval($results[$type.'_offset']);
          $pagesAtOnce = 5;
          $pageNumber = ($offset == 0) ? 1 : intval(($offset/$limit)+1);
          $totalPages = intval($itemCount / $limit);
          if (($itemCount%$limit) > 0) $totalPages++;
          $pagesAtATime = ($totalPages <= $pagesAtOnce) ? $totalPages : $pagesAtOnce;

          $out .= '<div class="psps-results-pages">';

          if ($pageNumber != 1) {
            $out .= '<span class="psps-search-next">'.$this->pageLink(array($type.'_offset' => ($limit*($pageNumber-2)), 'page' => $pageNumber-1, 'text' => 'Previous')).'</span>';
          }
          if ($pageNumber <= 2 || $totalPages <= 5) {
            $start_page = 1;
            $end_page = $pagesAtATime;
          } else if (($totalPages - $pageNumber) == 0) {
            $start_page = $pageNumber - 4;
            $end_page = $pageNumber;
          } else if (($totalPages - $pageNumber) == 1) {
            $start_page = $pageNumber - 3;
            $end_page = $pageNumber + 1;
          } else {
            $start_page = $pageNumber - 2;
            $end_page = $pageNumber + 2;
          }

          $i = $start_page;

          while ($i < $end_page+1) {
            if ($i == $pageNumber) {
              $out .= '<span class="psps-search-current">'.$pageNumber.'</span>';
            } else {
              $out .= $this->pageLink(array($type.'_offset' => ($limit*($i-1)),'page' => $i, 'text' => $i));
            }
            $i++;
          }

      if ($pageNumber < $totalPages) {
        $out .= '<span class="psps-search-next">'.$this->pageLink(array($type.'_offset' => ($limit*($pageNumber)), 'page' => $pageNumber+1, 'text' => 'Next')).'</span>';
      }

      $out .= '</div>';
      }
      $this->cachedPaginationLinks = $out;
    }
    return $this->cachedPaginationLinks;
  }

  function customCategoryLink($category) {
    $url = $this->baseURL($this->params);

    if (isset($category['search_options']) && sizeOf($category['search_options']) > 0) {
      foreach($category['search_options'] as $key => $value) {
        $url = $this->addParameter($url,$key,$value);
      }
    } else {
      $url = $this->addParameter($url,'keywords',$category['name']);
    }
    $url = str_replace('?&','?',$url);
    return '<a href="'.$url.'">'.$category['name'].'</a>';
  }

  function brandLink($brand) {
    return '<a href="'.$this->brandUrl($brand).'" title="See '.$brand['name'].' products">'.$brand['name'].'</a>';
  }

  function brandUrl($brand) {
    $url = $this->baseURL(array('merchant_type_id','brand_id','price_max','price_min','product_offset','category_id'));
    $url = $this->addParameter($url,'brand_id',$brand['id']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function categoryLink($category) {
    return '<a href="'.$this->categoryUrl($category).'" title="See '.$category['name'].' products">'.$category['name'].'</a>';
  }

  function categoryUrl($category) {
    $url = $this->baseURL(array('merchant_id','merchant_type_id','brand_id','price_max','price_min','product_offset','category_id'));
    $url = $this->addParameter($url,'category_id',$category['id']);
    $url = $this->addParameter($url,'merchant_id',$_REQUEST['merchant_id']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function merchantLink($merchant) {
    return '<a href="'.$this->merchantUrl($merchant).'" title="See '.$merchant['name'].' products">'.$merchant['name'].'</a>';
  }

  function merchantUrl($merchant){
    $url = $this->baseURL(array('merchant_id','merchant_type_id','brand_id','price_max','price_min','product_offset','category_id','deal_offset'));
    $url = $this->addParameter($url,'merchant_id',$merchant['id']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function merchantTypeLink($merchant) {
    return '<a href="'.$this->merchantTypeUrl($merchant).'" title="See '.$merchant['name'].' products">'.$merchant['name'].'</a>';
  }

  function merchantTypeUrl($merchant){
    $url = $this->baseURL(array('merchant_id','merchant_type_id','brand_id','price_max','price_min','product_offset','category_id','deal_offset'));
    $url = $this->addParameter($url,'merchant_type_id',$merchant['id']);    
    if (isset($_REQUEST[$this->nameSpace.'merchant_id'])) {
      $url = $this->addParameter($url,'merchant_id',$_REQUEST[$this->nameSpace.'merchant_id']);
    }
    $url = str_replace('?&','?',$url);
    return $url;
  }

  // $options = array('price_min' => '', 'price_max' => '', 'text' => '')
  function priceLink($options=array()) {
    $label = (intval($options['price_min']) == 0) ? "Under $".$options['price_max'] : '$'.$options['price_min'].'-$'.$options['price_max'];    
    return '<a href="'.$this->priceUrl($options).'" title="Filter by prices $'.$options['price_min'].'-$'.$options['price_max'].'">'.$label.'</a>';
  }

  function priceUrl($options=array()){
    $url = $this->baseURL(array('merchant_type_id','brand_id','price_min','price_max'));
    $url = $this->addParameter($url,'price_min',$options['price_min']);
    $url = $this->addParameter($url,'price_max',$options['price_max']);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  // $options = array('product_offset' => '', 'page' => '', 'text' => '')
  function pageLink($options=array()) {        
    return '<a href="'.$this->pageUrl($options).'" title="Go to page '.$options['page'].'">'.$options['text'].'</a>';
  }

  function pageUrl($options=array()){
    if (isset($options['product_offset'])) {
      $url = $this->baseURL(array('product_offset'));
      $url = $this->addParameter($url,'product_offset',$options['product_offset']);
    } else {
      $url = $this->baseURL(array('deal_offset'));
      $url = $this->addParameter($url,'deal_offset',$options['deal_offset']);
    }

    $url = str_replace('?&','?',$url);
    return $url;
  }

  function addParameters($url,$paramNames_to_add) {
    $url = $this->addParameter($url, 'url_subid', $this->subid);
    foreach($paramNames_to_add as $paramName) {
      if (isset($_REQUEST[$this->nameSpace.$paramName]) && (strlen($_REQUEST[$this->nameSpace.$paramName]) > 0)) {
        $url = $this->addParameter($url,$paramName,$_REQUEST[$this->nameSpace.$paramName]);
      }
    }
    $url = str_replace($this->nameSpace, '', $url);
    $url = str_replace('?&','?',$url);
    return $url;
  }

  function addParameter($url,$paramName,$paramValue) {
    if (strlen($paramValue) > 0) {
      $delimiter = (strpos($url,'?') > -1) ? '&' : '?';
      $url = $url.$delimiter.$this->nameSpace.$paramName.'='.urlencode($paramValue);
    }
    return $url;
  }

  function baseURL($paramNamesToStrip) {
    $url = $this->requestURI();        
    foreach ($_REQUEST as $key => $value) {
      foreach ($paramNamesToStrip as $paramName) {
        $url = $this->stripParameter($url,$paramName,$key,$value);
      }
    }
    return $url;
  }

  function stripParameter($url,$paramName,$key,$value){
    if (strpos($key,$paramName) > -1 ) {
      $url = str_replace('&'.$key.'='.urlencode($value), "", $url);
      $url = str_replace($key.'='.urlencode($value), "", $url);
    }
    return $url;
  }

  function requestURI() {
    if(!isset($_SERVER['REQUEST_URI'])) {
      $url = $_SERVER['PHP_SELF'];
      if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
        $url .= $HTTP_SERVER_VARS['QUERY_STRING']; 
      }
      return $url;
    } else {
      return $_SERVER['REQUEST_URI'];
    }
  }

  function requestResults($request){
    if (function_exists( 'curl_init')) {
       $session = curl_init($request);
       curl_setopt($session,CURLOPT_HEADER,false);
       curl_setopt($session,CURLOPT_RETURNTRANSFER,true);
       $response = curl_exec($session);
       curl_close($session);
     } else {
       $response = file_get_contents($request);
     }
    return simplexml_load_string($response);
  }

  function findCachedMerchantTypes() {
    $this->cachedMerchantTypes = simplexml_load_string($this->cachedMerchantTypesXml());
  }

  function cachedMerchantTypesXml(){
    return '<merchant_types total_count="44">
      <merchant_type name="Adult" merchant_count="18" id="34"/>
      <merchant_type name="Apparel & Accessories" merchant_count="129" id="26"/>
      <merchant_type name="Apparel - Lingerie" merchant_count="16" id="59"/>
      <merchant_type name="Apparel - Plus Size" merchant_count="30" id="14"/>
      <merchant_type name="Automotive & Motorcycle" merchant_count="24" id="5"/>
      <merchant_type name="Babies & Kids" merchant_count="62" id="9"/>
      <merchant_type name="Bags & Luggage" merchant_count="19" id="30"/>
      <merchant_type name="Beauty & Fragrance" merchant_count="70" id="40"/>
      <merchant_type name="Books & Entertainment" merchant_count="51" id="1"/>
      <merchant_type name="Career & Business Supplies" merchant_count="4" id="23"/>
      <merchant_type name="Christmas" merchant_count="6" id="39"/>
      <merchant_type name="Computers & Accessories" merchant_count="54" id="11"/>
      <merchant_type name="Costume & Party Supplies" merchant_count="35" id="20"/>
      <merchant_type name="Crafting & Scrapbooking" merchant_count="18" id="32"/>
      <merchant_type name="Department Stores" merchant_count="52" id="47"/>
      <merchant_type name="Electronics & Accessories" merchant_count="72" id="10"/>
      <merchant_type name="Flowers & Related" merchant_count="16" id="3"/>
      <merchant_type name="Food & Drink" merchant_count="62" id="37"/>
      <merchant_type name="Gifts & Collectibles" merchant_count="64" id="53"/>
      <merchant_type name="Green & Organic" merchant_count="14" id="25"/>
      <merchant_type name="Health & Wellness" merchant_count="39" id="41"/>
      <merchant_type name="Home & Garden" merchant_count="218" id="33"/>
      <merchant_type name="Jewelry" merchant_count="84" id="28"/>
      <merchant_type name="Magazines" merchant_count="14" id="36"/>
      <merchant_type name="Medical & Nursing" merchant_count="16" id="51"/>
      <merchant_type name="Mobile Phones & Accessories" merchant_count="18" id="4"/>
      <merchant_type name="Musical Supplies" merchant_count="15" id="18"/>
      <merchant_type name="Novelties & Collectibles" merchant_count="39" id="66"/>
      <merchant_type name="Office Supplies" merchant_count="31" id="45"/>
      <merchant_type name="Outdoor Gear" merchant_count="33" id="17"/>
      <merchant_type name="Pets & Animal Gear" merchant_count="47" id="19"/>
      <merchant_type name="Photo & Personalized" merchant_count="17" id="63"/>
      <merchant_type name="Religious" merchant_count="8" id="57"/>
      <merchant_type name="Shoes & Accessories" merchant_count="58" id="29"/>
      <merchant_type name="Sports & Recreation" merchant_count="102" id="31"/>
      <merchant_type name="Supplements" merchant_count="23" id="58"/>
      <merchant_type name="Tickets & Events" merchant_count="6" id="55"/>
      <merchant_type name="Toner & Ink" merchant_count="8" id="6"/>
      <merchant_type name="Tools & hardware" merchant_count="20" id="43"/>
      <merchant_type name="Toys, Games & Hobbies" merchant_count="53" id="27"/>
      <merchant_type name="Travel & Hotels" merchant_count="19" id="16"/>
      <merchant_type name="TV & Studio Stores" merchant_count="18" id="49"/>
      <merchant_type name="Vision Care" merchant_count="24" id="2"/>
      <merchant_type name="Weddings & Celebrations" merchant_count="27" id="35"/>
    </merchant_types>
    ';
  }
}
?>