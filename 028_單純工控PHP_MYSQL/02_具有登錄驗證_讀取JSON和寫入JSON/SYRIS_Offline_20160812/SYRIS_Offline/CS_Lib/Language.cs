using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Globalization;
using System.Resources;
using System.Reflection;


namespace SYRIS_Offline
{
    public class Language
    {
        public static System.Object[] m_ItemObject = new System.Object[3];//語系選項
        public static String m_StrWM_menu00;
        public static String m_StrWM_menu01;
        public static String m_StrWM_menu02;
        public static String m_StrWM_menu03;
        public static String m_StrWM_menu04;
        public static String m_StrSW_label01;
        public static String m_StrSW_label02;
        public static String m_StrSW_label03;
        public static String m_StrSW_button01;
        public static String m_StrSW_button02;
        public static String m_StrImport_Msg01;

        public static String m_StrEd_label01;
        public static String m_StrEd_label02;
        public static String m_StrEd_groupBox01;
        public static String m_StrEd_label03;
        public static String m_StrEd_label04;
        public static String m_StrEd_groupBox02;
        public static String m_StrEd_label05;
        public static String m_StrEd_label06;
        public static String m_StrEd_cb_week00;
        public static String m_StrEd_cb_week01;
        public static String m_StrEd_cb_week02;
        public static String m_StrEd_cb_week03;
        public static String m_StrEd_cb_week04;
        public static String m_StrEd_cb_week05;
        public static String m_StrEd_cb_week06;
        public static String m_StrEd_cb_Holiday;
        public static String m_StrEd_groupBox03;
        public static String m_StrEd_label07;
        public static String m_StrEd_label08;
        public static String m_StrEd_label09;


        public static int m_LanguageIndex = 1;
        public static void initVar()
        {
            //--
            //語系選項設定
            m_ItemObject[0] = "简体中文";
            m_ItemObject[1] = "繁體中文";
            m_ItemObject[2] = "English";
            //--
            changeLanguage(m_LanguageIndex);
        }
        public static void changeLanguage(int LanguageIndex)
        {
            m_LanguageIndex = LanguageIndex;
            switch (m_LanguageIndex)//讀取目前選擇語系狀態
            {
                case 0:
                    Thread.CurrentThread.CurrentUICulture = new CultureInfo("zh-CN");
                    break;
                case 1:
                    Thread.CurrentThread.CurrentUICulture = new CultureInfo("zh-TW");
                    break;
                case 2:
                    Thread.CurrentThread.CurrentUICulture = new CultureInfo("en");
                    break;
            }
            ResourceManager Rm = new ResourceManager("SYRIS_Offline.LanguagePack", Assembly.GetExecutingAssembly());//讀取對應語系檔
            m_StrWM_menu00 = Rm.GetString("WM_menu00");
            m_StrWM_menu01 = Rm.GetString("WM_menu01");
            m_StrWM_menu02 = Rm.GetString("WM_menu02");
            m_StrWM_menu03 = Rm.GetString("WM_menu03");
            m_StrWM_menu04 = Rm.GetString("WM_menu04");
            m_StrSW_label01 = Rm.GetString("SW_label01");
            m_StrSW_label02 = Rm.GetString("SW_label02");
            m_StrSW_label03 = Rm.GetString("SW_label03");
            m_StrSW_button01 = Rm.GetString("SW_button01");
            m_StrSW_button02 = Rm.GetString("SW_button02");
            m_StrImport_Msg01 = Rm.GetString("Import_Msg01");

            m_StrEd_label01= Rm.GetString("Ed_label01");
            m_StrEd_label02= Rm.GetString("Ed_label02");
            m_StrEd_groupBox01= Rm.GetString("Ed_groupBox01");
            m_StrEd_label03= Rm.GetString("Ed_label03");
            m_StrEd_label04= Rm.GetString("Ed_label04");
            m_StrEd_groupBox02= Rm.GetString("Ed_groupBox02");
            m_StrEd_label05= Rm.GetString("Ed_label05");
            m_StrEd_label06= Rm.GetString("Ed_label06");
            m_StrEd_cb_week00= Rm.GetString("Ed_cb_week00");
            m_StrEd_cb_week01= Rm.GetString("Ed_cb_week01");
            m_StrEd_cb_week02= Rm.GetString("Ed_cb_week02");
            m_StrEd_cb_week03= Rm.GetString("Ed_cb_week03");
            m_StrEd_cb_week04= Rm.GetString("Ed_cb_week04");
            m_StrEd_cb_week05= Rm.GetString("Ed_cb_week05");
            m_StrEd_cb_week06= Rm.GetString("Ed_cb_week06");
            m_StrEd_cb_Holiday= Rm.GetString("Ed_cb_Holiday");
            m_StrEd_groupBox03= Rm.GetString("Ed_groupBox03");
            m_StrEd_label07= Rm.GetString("Ed_label07");
            m_StrEd_label08= Rm.GetString("Ed_label08");
            m_StrEd_label09 = Rm.GetString("Ed_label09");

        }
    }
}
