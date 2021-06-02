using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Xml;

namespace SYRIS_Offline
{
    public class SettingFile
    {
        public int m_intLanguages;
        public String m_StrServerIP;
        public String m_StrAccount;
        public String m_StrPassword;
        public SettingFile()
        {
            m_intLanguages = 1;
            m_StrServerIP = "";
            m_StrAccount = "";
            m_StrPassword = "";
        }
        public void saveSettingXML()
        {
            XmlTextWriter XTW = new XmlTextWriter(System.Windows.Forms.Application.StartupPath + "\\SYRIS_Offline.xml", Encoding.UTF8);

            XTW.WriteStartDocument();
            XTW.WriteStartElement("Setting");
            
            XTW.WriteElementString("Languages", "" + m_intLanguages);
            XTW.WriteElementString("ServerIP",m_StrServerIP);
            XTW.WriteElementString("Account",m_StrAccount);
            XTW.WriteElementString("Password", Encrypt.EncryptDES(m_StrPassword));
            
            XTW.Flush();
            XTW.Close();
        }
        public void readSettingXML()
        {
            try
            {
                XmlDocument xd = new XmlDocument();

                xd.Load(System.Windows.Forms.Application.StartupPath + "\\SYRIS_Offline.xml");

                XmlNode root = xd.SelectSingleNode("//Setting");
                int i = 0;
                foreach (XmlElement elm in root.ChildNodes)
                {
                    switch (i)
                    {
                        case 00:
                            m_intLanguages = Convert.ToInt32(elm.InnerText.Trim(), 10);
                            break;
                        case 01:
                            m_StrServerIP = elm.InnerText.Trim();
                            break;
                        case 02:
                            m_StrAccount = elm.InnerText.Trim();
                            break;
                        case 03:
                            m_StrPassword = Encrypt.DecryptDES(elm.InnerText.Trim());
                            break;
                    }
                    i++;
                }
            }
            catch
            {
                m_intLanguages = 1;
                m_StrServerIP = "";
                m_StrAccount = "";
                m_StrPassword = "";
            }
        }
    }
}
