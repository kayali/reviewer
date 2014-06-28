<?php

Class Verbalizer {
	public function __construct($template_id, $language, $categories){
		$this->template_id 	= $template_id;
		$this->language 	= $language;
		$this->categories	= $categories;
		return $this->verbalize();

	}
	public function verbalize(){
		$template_object = $this->parseXml();
		$verbalized_text = $this->proccessArray($template_object);
	}

	public function parseXml(){
		$xmlstring = File::get(__DIR__."/../database/templates/template_".$this->template_id."_".$this->language.".xml");
		return simplexml_load_string($xmlstring);
	}

	public function getArrayIndex($array){
		if(is_object($array)){
			return -1;
		}
		return rand(0,(sizeof($array)-1));
	}

	public function proccessArray($template_object){
		$current_mood 		= $this->getCurrentMoodRange($this->categories["avg"]);
		$mood_statment 		= $this->getStatementMood($template_object->StatmentMood, $this->categories["avg"]);
		$mooded_categories 	= $this->seperateCategoriesToMoods($this->categories["categories"]);
		$mooded_categories 	= $this->sortMoodedCategories($mooded_categories, $current_mood);
		$text 				= "";
		// print_r($template_object);die();
		foreach ($mooded_categories as $mood_key => $mood) {
			if($mood_key!=0){
				$text .=$template_object->MoodConnecter->ConnecterValue;
			}
			foreach ($mood["categories"] as $key => $category) {
				$mood_statment 		= $this->getStatementMood($template_object->StatmentMood, $category['rating']);
				if($key==0){
					$text .= $this->generatePhrase($mood_statment,$category, true, false);
				}elseif((sizeof($mood["categories"])-1)==$key){
					$text .= $this->generatePhrase($mood_statment,$category, false, true);
				}else{
					$text .= $this->generatePhrase($mood_statment,$category, false, false);
				}
			}
		}

		print $text;die();
	}

	public function getCurrentMoodRange($mood_value){
		$negative_mood_limit = 2.4;
		$neutral_mood_lower_limit = 2.5;
		$neutral_mood_upper_limit = 2.9;
		$positive_mood_limit = 3;
		if($mood_value<=$negative_mood_limit){
			return array(
				'min'=>0,
				'max'=>$negative_mood_limit
			);
		}elseif($mood_value>=$positive_mood_limit){
			return array(
				'min'=>$positive_mood_limit,
				'max'=>5
			);
		}
		return array(
				'min'=>$neutral_mood_lower_limit,
				'max'=>$neutral_mood_upper_limit
			);
	}

	public function getStatementMood($statment_moods, $avg){
		$attributes = "@attributes";
		foreach($statment_moods as $mood){
			$range = $mood->attributes();
			if($avg<=$range["MaxAvg"] && $avg>=$range["MinAvg"]){
				return $mood;
			}
		}
	}

	public function generatePhrase($mood_statment,$category, $first, $last){
		$text = "";
		if($category['rating']<2.4){
			if($last){
				$text .= $mood_statment->Phrase->loopEnd;
			}

			if(!$first && !$last){
				$text .= $mood_statment->Phrase->loopSeparator;
			}

			foreach ($mood_statment->Phrase as $key => $phrase_config) {
				$index = $this->getArrayIndex($phrase_config);
				if($index>-1){
					$phrase_template = $phrase_config;
				}
				$phrase_template = $phrase_config[$index];
				foreach ($phrase_template->PhraseText as $text_item) {
					$text_attributes = $text_item->attributes();
					if($text_attributes["type"]=="constant"){
						if($first || $text_attributes["second"]==1){
							$text .= $text_attributes["value"]." ";
						}
					}else{
						$text .= $category[(string)$text_item["value"]]." ";
					}
				}
			}	
		}else{
			foreach ($mood_statment->Phrase as $key => $phrase_config) {
				$index = $this->getArrayIndex($phrase_config);
				if($index>-1){
					$phrase_template = $phrase_config;
				}
				if($last){
					$text .= $mood_statment->Phrase->loopEnd;
				}
				if(!$first && !$last){
					$text .=",";
				}
				$phrase_template = $phrase_config[$index];
				foreach ($phrase_template->PhraseText as $text_item) {
					$text_attributes = $text_item->attributes();
					if($text_attributes["type"]=="constant"){
						if($first || $text_attributes["second"]==1){
							$text_attributes["value"]=" ".strtolower($text_attributes["value"]);
						}elseif($text_attributes["second"]==1){
							$text .= $text_attributes["value"]." ";
						}
					}else{
						$text .= $category[(string)$text_item["value"]];
						if(!$last){
							$text .= " ";
						}
					}
				}
			}	
		}
		
		return $text;
	}

	public function seperateCategoriesToMoods($categories){
		$mooded_categories = array();
		$hash_keys = array();
		foreach ($categories as $key => $category) {
			$range 	= $this->getCurrentMoodRange($category['rating']);
			$hash 	= $this->generateMoodHash($range);
			if(empty($hash_keys)){
				$hash_keys[$hash]=0;
			}else{
				if(!isset($hash_keys[$hash])){
					$hash_keys[$hash]=sizeof($hash_keys);
				}
			}
			$mooded_categories[(String)$hash_keys[$hash]]['categories'][]	= $category;
			$mooded_categories[(String)$hash_keys[$hash]]['range'] 			= $range;
			$mooded_categories[(String)$hash_keys[$hash]]['hash']			= $hash;
		}
		return $mooded_categories;
	}

	public function generateMoodHash($range){
		return hash("md5", $range["min"].$range["max"]);
	}

	public function sortMoodedCategories($mooded_categories, $current_mood){
		$sorted_array = array();
		foreach ($mooded_categories as $key => $value) {
			if($value["hash"] == $this->generateMoodHash($current_mood)){
				$sorted_array[] = $value;
				unset($mooded_categories[$key]);
			}
		}
		if(!empty($mooded_categories)){
			foreach ($mooded_categories as $key => $value) {
				if($value["hash"] == $this->generateMoodHash(array("min"=>2.5,"max"=>2.9))){
					$sorted_array[] = $value;
					unset($mooded_categories[$key]);
				}
			}
		}

		if(!empty($mooded_categories)){
			foreach ($mooded_categories as $key => $value) {
				$sorted_array[] = $value;
				unset($mooded_categories[$key]);
			}
		}
		return $sorted_array;
	}
}