function MyString(str)
{
    this.str = str;   
    this.getString = function ()
    {
        return this.str;
    }
   
    // 截去串頭部的空格
    function ltrim(str)
    {
        var i = 0;
        while(str.charAt(i) == ' '){++i;}
        return str.substring(i, str.length);
    }
    // 截去串尾部的空格
    function rtrim(str)
    {
        var i = str.length - 1;
        while(str.charAt(i) == ' '){--i};
        return str.substring(0, i+1);
    }
    // 截去串頭尾的空格
    function trim(str)
    {
        return ltrim(rtrim(str));
    }
   
    // 調用成員函數
    this.str = trim(this.str);
}