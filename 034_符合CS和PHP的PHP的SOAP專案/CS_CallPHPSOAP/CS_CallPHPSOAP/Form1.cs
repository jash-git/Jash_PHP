using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace CS_CallPHPSOAP
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            MyPHPServer.MyPortTypeClient MPS = new MyPHPServer.MyPortTypeClient();

            MessageBox.Show("" + MPS.SumData(100, 200) + "\n" + MPS.SubData(400, 200));
        }
    }
}
