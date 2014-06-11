<?php
class Codechef extends CI_Model{
	public function get_rank(){
		$user=array();
		$url='http://www.codechef.com/long/ranklist/IN';
		function g($string,$start,$end){
			preg_match_all('/' . preg_quote($start, '/') . '(.*?)'. preg_quote($end, '/').'/i', $string, $m); 
			$out = array();
			foreach($m[1] as $key => $value){ 
				$type = explode('::',$value); 
				if(sizeof($type)>1){ 
					if(!is_array($out[$type[0]])) 
						$out[$type[0]] = array(); 
					$out[$type[0]][] = $type[1]; 
				} else { 
					if($value=='NA'){
						$value=0;
						$out[] = $value;
						$out[] = $value;
					} else{
						$out[] = $value; 
					}
				} 
			}
			return $out;
		}


		function name($url){
			//$ch = curl_init();
			ini_set('max_execution_time', 0);
			$ch= curl_init($url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			$cl = curl_exec($ch);
			curl_close($ch);
			$dom = new DOMDocument();
			@$dom->loadHTML($cl);
			$xpath = new DOMXpath($dom);
			$titleQuery = $xpath->query("//td");
			$title=$titleQuery->item(24)->nodeValue;
			if($title=='Institution:'){
				$title=$titleQuery->item(25)->nodeValue;
			}
			else if ($title=='Organisation:') {
				$title=$titleQuery->item(25)->nodeValue;
			}
			return $title;
		}


		function top($url){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($ch);
			curl_close($ch); 
			$dom = new DOMDocument();
			@$dom->loadHTML($output);
			$finder = new DomXPath($dom);
			$nodes = $finder->query('//*[contains(@class, "rating-table")]');
			$tmp_dom = new DOMDocument(); 
			foreach ($nodes as $node) {
				$tmp_dom->appendChild($tmp_dom->importNode($node,true));
			}
			$innerHTML="";
			$innerHTML.=trim($tmp_dom->saveHTML()); 
			// echo $innerHTML;
			$buffdom = new DOMDocument();
			@$buffdom->loadHTML($innerHTML);
			$rank="";
			$reallll=0;
			$detail=$buffdom->getElementsByTagName('hx');
			foreach($detail as $i){
				$reallll++;
				$rank=$rank."hx".$i->nodeValue."/hx";
			}
			//echo $rank;
			$rank=g($rank,'hx','/hx');
			return ($rank);
		}



		function _curl($url,$p){
			$ch= curl_init($url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			$cl = curl_exec($ch);
			curl_close($ch);
			$dom = new DOMDocument();
			@$dom->loadHTML($cl);
			$xpath = new DOMXpath($dom);
			$titleQuery = $xpath->query("//td/a");
			echo "<pre>";
			$i=$p;
			$count= $p+20;
			global $user;
			foreach($titleQuery as $ti){
				$user[$i]=$ti->nextSibling->nodeValue;
				if(++$i==$count)
				break;
			}
		}



		_curl($url,0);
		for($i=20;$i<400;$i+=20){
			$r=$i/20;
			$t=$url.'?page='.$r;
			_curl($t,$i);
		}
		global $user;
		$urlu='http://www.codechef.com/users/';
		$co=0;
		for($i=0;$i<400;$i++){
			global $user;
			$t=$urlu.$user[$i];
			$insti=name($t);
			$ins='Indian Institute of Technology Kanpur ';
			if(strncmp($insti, $ins,37)== 0){
				echo $insti;
				$ra=top($t);
				echo $user[$i].' country rank ='.$ra[1]."<br>";
				$data = array(
						'username'=>$user[$i],
						'rank'=>$ra[1]
					);
				$this->db->insert('codechef_top_rankers',$data);
				++$co;
			}
			if($co==5)
				break;
		}
	}
}