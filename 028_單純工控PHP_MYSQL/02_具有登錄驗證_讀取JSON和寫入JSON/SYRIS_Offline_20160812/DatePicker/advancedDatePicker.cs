using System;
using System.ComponentModel;
using System.Drawing;
using System.Windows.Forms;

namespace DatePicker
{
    public class advancedDatePicker : System.Windows.Forms.DateTimePicker   
    {
        private PopupWindowHelper popupHelper;

        /// <summary>
        /// Color of the DatePicker header
        /// </summary>
        [Description("Color of the DatePicker header")]
        [Browsable(true), Category("DatePicker")]
        public Color HeaderColor
        {
            get;
            set;
        }

        [Description("Language of the DatePicker")]//jash
        [Browsable(true), Category("DatePicker")]
        public int m_intLanguage
        {
            get;
            set;
        }

		public advancedDatePicker() : base()
		{
            popupHelper = new PopupWindowHelper();
            Button btn = new Button();
            btn.Dock = System.Windows.Forms.DockStyle.Right;
            btn.Image = Properties.Resources.datePicker;
    	    btn.Width = 28;
            this.Controls.Add(btn);
            btn.Click += btn_Click;

		}

        private void btn_Click(object sender, EventArgs e)
        {
            var btn = sender as Button; 
            Form f = FindForm();
            var popup = new frmDatePicker(HeaderColor, m_intLanguage);//jash
            popup.cmb_Cal = this;
            popup.CurrentDate = Convert.ToDateTime(Value);
            Value = popup.CurrentDate;

            Point location = PointToScreen(new Point(btn.Left-Width + btn.Width , btn.Bottom));
            popupHelper.ShowPopup(f, popup, location);
        }

	}

}
