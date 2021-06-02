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
    public partial class ImportWnd : Form
    {
        public MainWnd n_MW;
        public int m_Count;
        public ImportWnd(MainWnd MW)
        {
            InitializeComponent();
            n_MW = MW;
        }

        private void ImportWnd_Load(object sender, EventArgs e)
        {
        }
        private void timer1_Tick(object sender, EventArgs e)
        {

        }
    }
}
