<?php
if($_FILES['file']['error']>0){
  exit("�ɮפW�ǥ��ѡI");//�p�G�X�{���~�h����{��
}
move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$_FILES['file']['name']);//�ƻs�ɮ�
echo '<a href="file/'.$_FILES['file']['name'].'">file/'.$_FILES['file']['name'].'</a>';//����ɮ׸��|
?>