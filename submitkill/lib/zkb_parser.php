<?php
if(!defined('CHECK'))
	die('403');

class ZKBParser {
	function getKillInfo($url) {
		$dom = file_get_html($url);
		
		if(!$dom)
			return false;

		$data = array();

		$data["link"] = $url;

		$data["character"] = $dom->find('a[href^=/character]')[1]->innertext;
		$data["corporation"] = $dom->find('a[href^=/corporation]')[1]->innertext;
		$data["alliance"] = $dom->find('a[href^=/alliance]')[1]->innertext;

		$data["hull"] = $dom->find('a[href^=/ship]')[1]->innertext;
		$data["type"] = $dom->find('a[href^=/group]')[1]->innertext;
		$data["system"] = $dom->find('a[href^=/system]')[0]->innertext;
		$data["security"] = $dom->find('span[style^=color: #]')[0]->innertext;
		$data["region"] = $dom->find('a[href^=/region]')[0]->innertext;

		$data["isk_dropped"] = $dom->find('td.item_dropped')[0]->innertext;
		$data["isk_total"] = $dom->find('strong.item_dropped')[0]->innertext;

		$tmptime = $dom->find('table[class=table table-condensed table-striped table-hover]')[0];

		if($tmptime->find('tr')[2]->find('th')[0]->innertext == "System:")
			$data["date"] = $tmptime->find('tr')[3]->find('td')[0]->innertext;
		else
			$data["date"] = $tmptime->find('tr')[2]->find('td')[0]->innertext;

		return $data;
	}
}