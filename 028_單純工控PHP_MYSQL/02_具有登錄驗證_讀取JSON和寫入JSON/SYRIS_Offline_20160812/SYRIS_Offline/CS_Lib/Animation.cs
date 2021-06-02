using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Windows.Forms;

namespace SYRIS_Offline
{
    public class Animation
    {
        static public bool m_blnAnimation = false;
        static public void createThreadAnimation(String StrMsg, ParameterizedThreadStart fun)//執行多執行序和顯示等待動畫  [W1 & W2可共用]
        {
            m_blnAnimation = true;
            ProgressDialog d = new ProgressDialog();
            Thread t = new Thread(fun);
            t.Start(d);
            d.StartPosition = FormStartPosition.CenterParent;
            d.m_strMessage = StrMsg;
            d.ShowDialog();
        }
        static public void Animation_Wait(object arg)
        {
            int count = 0;
            
            ProgressDialog d = (ProgressDialog)arg;
            string stbuf = d.m_strMessage;
            String StrJson = "";
            do
            {
                d.m_strMessage = stbuf + " (" + (count * 2) + ")%";
                count++;
                
                Thread.Sleep(100);
                if (count == 15)
                {
                    MessageBox.Show(MainWnd.m_CS_PHP.loginPHP("login.php", "jash", "1234"));
                }
                if (count == 30)
                {
                    StrJson = MainWnd.m_CS_PHP.runPHP("outjson.php");
                    MessageBox.Show(StrJson);
                }
                if (count == 50)
                {
                    StrJson = MainWnd.m_CS_PHP.runPHP("getjson.php", StrJson);
                    MessageBox.Show(StrJson);
                }
                if (count > 50)
                {
                    m_blnAnimation = false;
                }
            } while (m_blnAnimation);
            d.Invoke(new Action(d.Close));
        }
    }
}
