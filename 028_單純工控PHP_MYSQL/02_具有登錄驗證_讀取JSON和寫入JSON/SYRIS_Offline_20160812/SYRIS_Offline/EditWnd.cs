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
    public partial class EditWnd : Form
    {
        public MainWnd m_MW;
        public EditWnd(MainWnd MW)
        {
            InitializeComponent();
            m_MW = MW;
        }

        private void EditWnd_Load(object sender, EventArgs e)
        {
            SetLanguage();
        }
        public void SetLanguage()
        {
            Ed_advancedDatePicker01.m_intLanguage = Language.m_LanguageIndex;
            Ed_advancedDatePicker02.m_intLanguage = Language.m_LanguageIndex;

            Ed_label01.Text = Language.m_StrEd_label01;
            Ed_label02.Text = Language.m_StrEd_label02;
            Ed_groupBox01.Text = Language.m_StrEd_groupBox01;
            Ed_label03.Text = Language.m_StrEd_label03;
            Ed_label04.Text = Language.m_StrEd_label04;
            Ed_groupBox02.Text = Language.m_StrEd_groupBox02;
            Ed_label05.Text = Language.m_StrEd_label05;
            Ed_label06.Text = Language.m_StrEd_label06;
            Ed_cb_week00.Text = Language.m_StrEd_cb_week00;
            Ed_cb_week01.Text = Language.m_StrEd_cb_week01;
            Ed_cb_week02.Text = Language.m_StrEd_cb_week02;
            Ed_cb_week03.Text = Language.m_StrEd_cb_week03;
            Ed_cb_week04.Text = Language.m_StrEd_cb_week04;
            Ed_cb_week05.Text = Language.m_StrEd_cb_week05;
            Ed_cb_week06.Text = Language.m_StrEd_cb_week06;
            Ed_cb_Holiday.Text = Language.m_StrEd_cb_Holiday;
            Ed_groupBox03.Text = Language.m_StrEd_groupBox03;
            Ed_label07.Text = Language.m_StrEd_label07;
            Ed_label08.Text = Language.m_StrEd_label08;
            Ed_label09.Text = Language.m_StrEd_label09;
        }
    }
}
