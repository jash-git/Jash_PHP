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
    public partial class ProgressDialog : Form
    {
        public String m_strMessage;
        public ProgressDialog()
        {
            InitializeComponent();
        }

        private void ProgressDialog_Load(object sender, EventArgs e)
        {
            this.lab_Message.Text = m_strMessage;
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            this.lab_Message.Text = m_strMessage;
        }

    }
}
