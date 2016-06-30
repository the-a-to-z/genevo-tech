<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
if (!function_exists('segment')) {
	function segment($uri = 1) {
		$lmp = &get_instance();
		return $lmp -> uri -> segment($uri);
	}

	function formatMoney($number, $fractional = false, $currency = NULL) {
		if ($fractional) {
			$number = sprintf('%.2f', $number);
		}
		if ($currency != NULL) {
			$number .= " " . $currency;
		}
		while (true) {
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
			if ($replaced != $number) {
				$number = $replaced;
			} else {
				break;
			}
		}
		return $number;
	}

}
if (!function_exists('dimention')) {

	function dimention() {
		$array = array('' => DROPDOWN_DEFAULT, 'x10&#x2079;/1' => 'x10&#x2079;/1', 'x10&#x2081;&#x2082;/1' => 'x10&#x2081;&#x2082;/1', 'g/dl' => 'g/dl', 'fl' => 'fl', 'pg' => 'pg', '%' => '%', 'mm' => 'mm', );
		return $array;
	}

}
if (!function_exists('string_digit')) {
	function string_digit($digit) {
		$format = '0000000';
		return substr($format, 0, -strlen($digit)) . $digit;
	}

}
if (!function_exists('table_manager')) {
	function table_manager($table_object, $arr_column, $control = FALSE, $format = NULL) {
		if (!is_array($arr_column) || count($arr_column) <= 0)
			return FALSE;
		$string_table = form_open('', array('name' => 'form_manager'));
		$string_table .= '<table class="table table-bordered table-striped" cellpadding="2" cellspacing="0" border="1">';

		//start write table header
		$string_table .= '<tr clas="tbl_header">';
		if ($control)
			$string_table .= '<th><input type="checkbox" class="check_all" /></th>';
		foreach ($arr_column as $header => $column) {
			$string_table .= '<th>' . $header . '</th>';
		}
		$string_table .= '</tr>';

		//start write table data
		if ($table_object -> num_rows() > 0) {

			foreach ($table_object->result() as $arr_data) {
				//    =============== Use format money=====================
				if ($format == NULL) {
					$f = NULL;
				} else {
					$f = 1;
				}//=============================End format money========================

				$string_table .= '<tr>';
				$check_first = TRUE;
				foreach ($arr_column as $column) {
					if ($check_first) {
						if ($control)
							$string_table .= '<td><input type="checkbox" class="check" name="check_select[]" value="' . $arr_data -> $column . '" /></td>';
						$check_first = FALSE;
					}
					if ($format == NULL) {//////////=========Not aply money format=================
						$string_table .= '<td>' . $arr_data -> $column . '</td>';
					} else {
						if ($f > 2) {
							$string_table .= '<td class="td_right">' . formatMoney($arr_data -> $column) . '</td>';
						} else {
							$string_table .= '<td>' . $arr_data -> $column . '</td>';
						}
					}
					$f++;
				}
				$string_table .= '</tr>';
			}
		} else {
			$string_table .= '<tr><td colspan="' . count($arr_column) . '"><p class="no_record">There is no record.</p></td></tr>';
		}
		$string_table .= '</table>';
		$string_table .= form_close();
		return $string_table;
	}

}

if (!function_exists('table_manager')) {
	function sitemap() {
		$str_sitemap = '<div class="sitemap">';
		if (segment(3) != '') {
			$CI = &get_instance();
			$title_lists = $CI -> mod_global -> get_one_value(PREFIX_VIEW . 'contents_parents_trees', 'con_join_title', array('con_title' => segment(3)));
			$str_sitemap .= anchor(site_url(), '<img src="' . site_url(IMAGES_PATH . 'home.png') . '" alt="Home" />') . ' > ';
			$arr_title = explode(' > ', $title_lists);
			if (count($arr_title) == 1) {
				$str_sitemap .= '<span>' . str_replace('-', ' ', $title_lists) . '</span>';
			} else {
				for ($i = 0; $i < count($arr_title); $i++) {
					if ($i == count($arr_title) - 1) {
						$str_sitemap .= '<span>' . str_replace('-', ' ', $arr_title[$i]) . '</span>';
					} else {
						$str_sitemap .= anchor(site_url(segment(1) . '/' . segment(2) . '/' . $arr_title[$i]), str_replace('-', ' ', $arr_title[$i])) . ' > ';
					}
				}
			}
		}
		$str_sitemap .= '</div>';
		return $str_sitemap;
	}

}
?>