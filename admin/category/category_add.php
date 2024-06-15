<?php
if(session_id()==''){session_start();} 
if (isset($_SESSION['accountid'])){ 
  if (file_exists('systemconfig.inc')) {include_once('systemconfig.inc'); }
  if (file_exists('includes/systemconfig.inc')) {include_once('includes/systemconfig.inc'); }
  if (file_exists('../includes/systemconfig.inc')) {include_once('../includes/systemconfig.inc'); }
} else {
  header('location: ../'); exit(0); 
}

$categoryid=0;
if(isset($_GET['categoryid'])){
  $categoryid = secureData($_GET['categoryid'],'d');
}

$category = GetData('select category from tblcategory where categoryid='.$categoryid);
?>
<button onclick="ajax_new('category.php','maincontent');">Back</button>
<table>
      <tr>
        <td>Category</td>
        <td><input type="text" id="category" value="<?=$category?>"/></td>
        <td>
          <?
          if($categoryid){
            echo' <button onclick="edit_category('.$categoryid.');">Edit</button>';
          } else {
            echo'<button onclick="add_category();">Add</button>';
          }
          ?>
        </td>
      </tr>
</table>