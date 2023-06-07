<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<center>
<body>
<h1>  :أدخل بيا نات المنتج</h1>
<div class="warp ">
<form action="insert_pross.php" method="post ">
<table >
<tr>
<td><input type="number" name="item_code" value='<?php echo $item_code; ?>'/></td>
<td>:الرقم</td >
</tr>
<tr>
<td> <input type="text" name="name" value='<?php echo $item_name; ?>'/></td>
<td>:الإسم</td>
</tr>

<tr >
<td><input type="text" name="address1" value='<?php echo $addrrss1; ?>'/> </td>
<td>:العنوان</td >
</tr>
<tr >
<td><textarea name="note" cols="20" rows="7"><?php echo $descrption; ?></textarea></td></td>
<td>:ملاحظات</td >
</tr>
<tr>
<tr >
<td><textarea name="pictuer" cols="20" rows="7"><?php echo $imagename; ?></textarea></td></td>
<td>:ملاحظات</td >
</tr>
<tr>

<td><input type="submit" name="update" value="تحديث "/></td>
</tr>
</table>
</form >
</center>
</div >
</body >
</html>
