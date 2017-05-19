<?php

function stripUnicode($str) {
	if (!$str)
		return false;
	$unicode = array(
		'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'd' => 'đ',
		'D' => 'Đ',
		'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'i' => 'í|ì|ỉ|ĩ|ị',
		'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
		'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
		'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);
	foreach ($unicode as $khongdau => $codau) {
		$arr = explode("|", $codau);
		$str = str_replace($arr, $khongdau, $str);
	}
	return $str;
}

function changeTitle($str) {
	$str = trim($str);
	if ($str == "")
		return "";
	$str = str_replace('"', '', $str);
	$str = str_replace("'", '', $str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
	// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER = in hoa / in hoa chữ đầu tiên / in thường
	$str = str_replace(' ', '-', $str);
	return $str;
}

 // // MENU 1 CẤP
 //  function cate_parent($data){
 //  foreach ($data as $key => $val) {
 //  $id = $val["id"];
 //  $name = $val["name"]; // chỗ này để fix lỗi dữ liệu truyền vào ko phải string
 //  echo "<option>$name</option>";
 //  }



//  // MENU đa CẤP đệ quy ko linh động
// function cate_parent($data,$parent=0,$str="---"){
// 	foreach ($data as $key => $val) {
// 		$id = $val["id"];
// 		$name = $val["name"]; // chỗ này để fix lỗi dữ liệu truyền vào ko phải string
// 		if($val["parent_id"]==$parent){
// 			echo "<option value='$id'>$str $name</option>";
// 			cate_parent($data,$id,$str."---");
// 		}
// }



// menu đa cấp đệ quy
function cate_parent($data, $parent = 0, $str = "--", $select = 0) { // chỉ là cái hàm, ở add.blade gọi hàm, thì phải truyền parent vào, vì đó mới là thứ cần, data là dữ liệu từ lấy controller Cate, str là chuỗi thể hiện giá trị con, select là id của menu cha
    //vị trí mặc định để edit là select 0
    foreach ($data as $key => $val) {//data này tức là parent = Cate::select, có thể bỏ key vì đíu dùng
        $id = $val["id"];
        $name = $val["name"];
        // cấp 1
        if ($val["parent_id"] == $parent) { //$val["parent_id"] tức là $parent = Cate::select nhưng chỉ lấy parent so sánh vs $parent ở trên hàm
            if ($select != 0 && $id == $select) {//select !=0 chỉ là ràng buộc, còn chú ý phần sau
                // id = select tức là chọn ra cái menu cha để add phần con mới, thay select mặc định = 0 -> số khác cũng dc
                // ví dụ để mặc định ở hàm $select=3, thì khi load:http://localhost/Project/admin/cate/add thì mục Category sẽ = id 3 ở csdl, lúc đó khỏi cần chọn, mà chỉ cần điền tiếp các input dưới thì nó tự hiểu cái vừa thêm là con của menu cha id=3
                // ví dụ áo có id = 3, thì áo sơ mi con của áo ->có parent_id=3
                echo "<option value='$id' selected='selected'>$str $name</option>";
            } else {
                echo "<option value='$id'>$str $name</option>";
            }
            // cấp 2
            cate_parent($data, $id, $str . "--",$select); // để hiện cate hiện tại lúc edit
        }
    }
}

?>