using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace SYRIS_Offline
{
    public partial class MainWnd : Form
    {
        public SettingFile m_SettingFile;
        private SettingWnd m_SettingWnd;
        private ImportWnd m_ImportWnd;
        private EditWnd m_EditWnd;

        static public CS_PHP m_CS_PHP=new CS_PHP();

        public MainWnd()
        {
            InitializeComponent();
        }

        private void MainWnd_Load(object sender, EventArgs e)
        {
            m_SettingFile = new SettingFile();
            m_SettingFile.readSettingXML();
            Language.m_LanguageIndex = m_SettingFile.m_intLanguages;

            Language.initVar();
            SetLanguage();

            m_SettingWnd=null;
            m_ImportWnd = null;
            m_EditWnd = null;
        }
        private ToolStripMenuItem AddContextMenu(string text,int Imindex, ToolStripItemCollection cms, EventHandler callback)
        {
            if (text == "-")
            {
                ToolStripSeparator tsp = new ToolStripSeparator();
                cms.Add(tsp);
                return null;
            }
            else if (!string.IsNullOrEmpty(text))
            {
                ToolStripMenuItem tsmi = new ToolStripMenuItem(text);
                if (Imindex >= 0)
                {
                    tsmi.Image = MW_imageList1.Images[Imindex];
                }
                if (callback != null) tsmi.Click += callback;
                cms.Add(tsmi);

                return tsmi;
            }

            return null;
        }
        public void MenuClicked(object sender, EventArgs e)
        {
            String StrBuf;
            StrBuf = ((ToolStripMenuItem)sender).Text;
            if (m_SettingWnd != null)
            {
                m_SettingWnd.Close();
                m_SettingWnd = null;
            }
            if (m_ImportWnd != null)
            {
                m_ImportWnd.Close();
                m_ImportWnd = null;
            }
            if (m_EditWnd != null)
            {
                m_EditWnd.Close();
                m_EditWnd = null;
            }
            if (Language.m_StrWM_menu01 == StrBuf)
            {
                m_SettingWnd = new SettingWnd(this);
                m_SettingWnd.WindowState = FormWindowState.Normal;

                m_SettingWnd.MdiParent = this;
                m_SettingWnd.Show();
                m_SettingWnd.Focus();
            }
            else if (Language.m_StrWM_menu02 == StrBuf)
            {
                Animation.createThreadAnimation(Language.m_StrImport_Msg01, Animation.Animation_Wait);
                /*
                m_ImportWnd = new ImportWnd(this);
                m_ImportWnd.WindowState = FormWindowState.Maximized;
                m_ImportWnd.MdiParent = this;
                m_ImportWnd.Show();
                m_ImportWnd.Focus();
                */ 
            }
            else if (Language.m_StrWM_menu03 == StrBuf)
            {
                m_EditWnd = new EditWnd(this);
                m_EditWnd.WindowState = FormWindowState.Maximized;
                m_EditWnd.MdiParent = this;
                m_EditWnd.Show();
                m_EditWnd.Focus();
            }
        }
        public void SetLanguage()
        {
            MW_menuStrip.Items.Clear();
            //主選單01
            ToolStripMenuItem subItem;
            subItem = AddContextMenu(Language.m_StrWM_menu00,-1, MW_menuStrip.Items, null);
            //主選單01的子選單
            AddContextMenu(Language.m_StrWM_menu01,0, subItem.DropDownItems, new EventHandler(MenuClicked));
            AddContextMenu(Language.m_StrWM_menu02,1, subItem.DropDownItems, new EventHandler(MenuClicked));
            AddContextMenu(Language.m_StrWM_menu03,2, subItem.DropDownItems, new EventHandler(MenuClicked));
            AddContextMenu(Language.m_StrWM_menu04,3, subItem.DropDownItems, new EventHandler(MenuClicked));
        }
        public void MainSetLanguage()
        {
            m_SettingFile.m_intLanguages = Language.m_LanguageIndex;
            this.SetLanguage();
            if (m_SettingWnd != null)
            {
                m_SettingWnd.SetLanguage();
            }
            if (m_EditWnd != null)
            {
                m_EditWnd.SetLanguage();
            }
        }

        private void MainWnd_FormClosing(object sender, FormClosingEventArgs e)
        {
            m_SettingFile.saveSettingXML();
        }
    }
}
