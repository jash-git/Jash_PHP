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
    public partial class SettingWnd : Form
    {
        MainWnd m_WM;
        public SettingWnd(MainWnd WM)
        {
            InitializeComponent();
            m_WM = WM;
        }

        private void SettingWnd_Load(object sender, EventArgs e)
        {
            SW_comboBox01.DropDownStyle = ComboBoxStyle.DropDownList;
            SW_comboBox01.Items.AddRange(Language.m_ItemObject);
            SW_comboBox01.SelectedIndex = Language.m_LanguageIndex;
            SetLanguage();
        }
        public void SetLanguage()
        {
            SW_label01.Text = Language.m_StrSW_label01;
            SW_label02.Text = Language.m_StrSW_label02;
            SW_label03.Text = Language.m_StrSW_label03;
            SW_button01.Text = Language.m_StrSW_button01;
            SW_button02.Text = Language.m_StrSW_button02;
        }

        private void SW_comboBox01_SelectedIndexChanged(object sender, EventArgs e)
        {
            Language.changeLanguage(SW_comboBox01.SelectedIndex);
            m_WM.MainSetLanguage();
        }
    }
}
