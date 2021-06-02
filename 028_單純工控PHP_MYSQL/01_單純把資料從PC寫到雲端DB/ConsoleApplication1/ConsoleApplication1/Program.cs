using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Program
    {
        static void Pause()
        {
            Console.Write("Press any key to continue . . . ");
            Console.ReadKey(true);
        }
        static void CreateBat(String device_id, String value, String years, String months, String days, String hours, String minutes, String seconds)
        {
            String URL = "http://localhost:8080/sf/insert_table.php";
            String StrData = String.Format("wget --post-data=\"device_id={0}&value={1}&years={2}&months={3}&days={4}&hours={5}&minutes={6}&seconds={7}\" {8} -O log.txt", device_id, value, years, months, days, hours, minutes, seconds, URL);
            StreamWriter sw = new StreamWriter("wget_run.bat");
            sw.WriteLine(StrData);// 寫入文字
            sw.Close();// 關閉串流
        }
        static void RunBat()
        {
            Process m_pro;
            String StrPath = Path.GetDirectoryName(System.Reflection.Assembly.GetExecutingAssembly().Location) + "\\wget_run.bat";
            Console.WriteLine(StrPath);
            m_pro = Process.Start("wget_run.bat");
        }
        
        static void Main(string[] args)
        {
            String device_id="A001";
            String value="29.12";
            String years="2016";
            String months="06";
            String days="05";
            String hours="20";
            String minutes="52";
            String seconds="00";
            CreateBat(device_id, value, years, months, days, hours, minutes, seconds);
            RunBat();
            Pause();
        }
    }
}
