using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

/*
//http://www.myhow2.net/wp/2012/09/c-visual-studio-2010%E4%B8%AD%E6%B2%A1%E4%BB%80%E4%B9%88%E6%89%BE%E4%B8%8D%E5%88%B0httputility-urlencode%E6%96%B9%E6%B3%95/
原因：Visual Studio 2010中建立的新项目，默认的编译目标平台是”.NET Framework 4.0 Client Profile”， 这个配置没有包含System.Web assembly

解决方法：把编译目标平台改成“.NET Framework 4.0”，然后到Reference里把System.Web Assembly 添加上。

Project -> Properties -> Application -> Target Framework
*/
using System.Web;
using System.Net;
using System.IO;//CookieContainer

namespace SYRIS_Offline
{
    public class CS_PHP
    {
        public String m_StrDomain;
        private CookieContainer m_CookieContainer;
        public CS_PHP()
        {
            m_StrDomain = "http://localhost:8080/cs2php/";
            m_CookieContainer = new CookieContainer();
        }
        public String loginPHP(String PHPName, String StrUserName, String StrPassword)
        {
            string url = m_StrDomain + PHPName;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            request.CookieContainer = m_CookieContainer;
            string user = StrUserName; //用户名
            string pass = StrPassword; //密码
            string data = "username=" + HttpUtility.UrlEncode(user) + "&password=" + HttpUtility.UrlEncode(pass);
            request.ContentLength = data.Length;
            StreamWriter writer = new StreamWriter(request.GetRequestStream(), Encoding.ASCII);
            writer.Write(data);
            writer.Flush();
            HttpWebResponse response = (HttpWebResponse)request.GetResponse();
            string encoding = response.ContentEncoding;
            if (encoding == null || encoding.Length < 1)
            {
                encoding = "UTF-8"; //默认编码
            }

            StreamReader reader = new StreamReader(response.GetResponseStream(), Encoding.GetEncoding(encoding));
            data = reader.ReadToEnd();

            m_CookieContainer = request.CookieContainer;
            response.Close();

            return data;
        }

        public String runPHP(String PHPName)
        {
            string url = m_StrDomain + PHPName;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            request.CookieContainer = m_CookieContainer;
            string data;

            HttpWebResponse response = (HttpWebResponse)request.GetResponse();
            string encoding = response.ContentEncoding;
            if (encoding == null || encoding.Length < 1)
            {
                encoding = "UTF-8"; //默认编码
            }
            
            StreamReader reader = new StreamReader(response.GetResponseStream(), Encoding.GetEncoding(encoding));
            data = reader.ReadToEnd();
            
            m_CookieContainer = request.CookieContainer;
            response.Close();

            return data;
        }
        public String runPHP(String PHPName, String StrData)
        {
            string url = m_StrDomain + PHPName;
            HttpWebRequest request = (HttpWebRequest)WebRequest.Create(url);
            request.Method = "POST";
            request.ContentType = "application/x-www-form-urlencoded";
            request.CookieContainer = m_CookieContainer;

            string data = "data=" + HttpUtility.UrlEncode(StrData);
            request.ContentLength = data.Length;
            StreamWriter writer = new StreamWriter(request.GetRequestStream(), Encoding.ASCII);
            writer.Write(data);
            writer.Flush();
            HttpWebResponse response = (HttpWebResponse)request.GetResponse();
            string encoding = response.ContentEncoding;
            if (encoding == null || encoding.Length < 1)
            {
                encoding = "UTF-8"; //默认编码
            }

            StreamReader reader = new StreamReader(response.GetResponseStream(), Encoding.GetEncoding(encoding));
            data = reader.ReadToEnd();

            m_CookieContainer = request.CookieContainer;
            response.Close();

            return data;
        }

    }
}
