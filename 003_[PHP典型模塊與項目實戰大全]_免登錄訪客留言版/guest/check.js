<script language="JavaScript">
function checkInput()
{
	var name = document.getElementById('name');
	var post = document.getElementById('post');
	//驗證用戶名：不能超過10個字符（5個漢字），不能輸入非法字符，不能為空
	nameValue = name.value.replace(/\s+/g,"");
	var SPECIAL_STR = "~!%^&*();\"?><[]{}\\|,:/=+—";
	var nameflag=true;
	for(i=0;i<nameValue.lenght;i++)
	{
		if (SPECIAL_STR.indexOf(nameValue.charAt(i)) !=-1)
		nameflag=false;
	}
	if(nameValue=='')
	{
		alert('請填寫用戶名稱！');	
		return false;
	}
	if(nameValue.length>10)
	{
		alert('用戶名稱最多10個字符（5個漢字）！');
		return false;
	}
	if(nameflag===false)
	{
		alert('用戶名稱不能包含非法字符請更改！');
		return false;
	}
	//留言內容驗證
	if(post.value=="")
	{
		alert('請輸入留言內容！');
		return false;			
	}
	if(post.value.length>400)
	{
		alert('留言內容太長！');
		return false;			
	}
}
</script>
