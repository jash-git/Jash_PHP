<?php
if($_FILES['file']['error']>0){
echo "Error: " . $_FILES['file']['error'];
  exit("�ɮפW�ǥ��ѡI");//�p�G�X�{���~�h����{��
}
else{
echo "�ɮצW��: " . $_FILES['file']['name']."<br/>";
echo "�ɮ�����: " . $_FILES['file']['type']."<br/>";
echo "�ɮפj�p: " . ($_FILES['file']['size'] / 1024)." Kb<br />";
echo "�Ȧs�W��: " . $_FILES['file']['tmp_name'];
move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$_FILES['file']['name']);
}
?>