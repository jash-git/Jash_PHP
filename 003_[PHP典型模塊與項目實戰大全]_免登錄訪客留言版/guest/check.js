<script language="JavaScript">
function checkInput()
{
	var name = document.getElementById('name');
	var post = document.getElementById('post');
	//���ҥΤ�W�G����W�L10�Ӧr�š]5�Ӻ~�r�^�A�����J�D�k�r�šA���ର��
	nameValue = name.value.replace(/\s+/g,"");
	var SPECIAL_STR = "~!%^&*();\"?><[]{}\\|,:/=+�X";
	var nameflag=true;
	for(i=0;i<nameValue.lenght;i++)
	{
		if (SPECIAL_STR.indexOf(nameValue.charAt(i)) !=-1)
		nameflag=false;
	}
	if(nameValue=='')
	{
		alert('�ж�g�Τ�W�١I');	
		return false;
	}
	if(nameValue.length>10)
	{
		alert('�Τ�W�ٳ̦h10�Ӧr�š]5�Ӻ~�r�^�I');
		return false;
	}
	if(nameflag===false)
	{
		alert('�Τ�W�٤���]�t�D�k�r�ŽЧ��I');
		return false;
	}
	//�d�����e����
	if(post.value=="")
	{
		alert('�п�J�d�����e�I');
		return false;			
	}
	if(post.value.length>400)
	{
		alert('�d�����e�Ӫ��I');
		return false;			
	}
}
</script>
