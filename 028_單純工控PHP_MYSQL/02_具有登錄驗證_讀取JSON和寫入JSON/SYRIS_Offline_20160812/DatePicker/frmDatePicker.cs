using System;
using System.Data;
using System.Drawing;
using System.Globalization;
using System.Linq;
using System.Windows.Forms;
using System.Xml;//jash

namespace DatePicker
{
    public partial class frmDatePicker : Form
    {
        private Color _backColor = Color.White;
        private DateTime _currentDate;
        public int m_intLanguageIndex;

        public DateTime CurrentDate
        {
            get
            {
                return _currentDate;
            }
            set
            {
                _currentDate = value;
            }
        }

        public Color HeaderColor
        {
            get;
            set;
        }


        public frmDatePicker(Color headerColor, int Language)
        {
            InitializeComponent();
            DataGridViewCellStyle dataGridViewCellStyle = new DataGridViewCellStyle();
            
            m_intLanguageIndex = Language;//jash
            dataGridViewCellStyle.BackColor  = pn_Controls.BackColor = pn_Header.BackColor = headerColor;
            dataGridViewCellStyle.Font = new Font("Times New Roman", 8.25F, FontStyle.Regular, GraphicsUnit.Point, (204));
            dgv_Dates.ColumnHeadersDefaultCellStyle = dataGridViewCellStyle;
        }


        private void frmDatePicker_Paint(object sender, PaintEventArgs e)
        {
            BackColor = _backColor;
        }

        private void frmDatePicker_Load(object sender, EventArgs e)
        {
            if (cmb_Cal.Format == DateTimePickerFormat.Short || cmb_Cal.Format == DateTimePickerFormat.Long)
            {
                pn_TrackBar.Visible = false;
                Width = Width - pn_TrackBar.Width;
            }
            /*
            String StrXmlFileName = "Language.xml";
            if (System.IO.File.Exists(StrXmlFileName))
            {
                //MessageBox.Show(FileName + " 檔案存在");
                //讀取上一次的語系設定
                XmlDocument xd = new XmlDocument();
                xd.Load(StrXmlFileName);
                XmlNode root = xd.SelectSingleNode("//Language");
                m_intLanguageIndex = Convert.ToInt32(root.FirstChild.InnerText, 10);
            }
            else
            {
                m_intLanguageIndex = 2;
            }
            */
            if (m_intLanguageIndex != 2)
            {
                if (m_intLanguageIndex == 0)
                {
                    lblCaption.Text = "月历";
                    this.label3.Text = "时";//jash
                    this.label4.Text = "分";//jash
                }
                else
                {
                    lblCaption.Text = "月曆";
                    this.label3.Text = "時";//jash
                    this.label4.Text = "分";//jash
                }
            }
            AddGridViewColumns();
            FillCells();
            FillComboxes();
            SelectCell(_currentDate.Day, _currentDate.Month);
            if (m_intLanguageIndex == 2)
            {
                lbl_Today.Text = "Today is: " + DateTime.Now.ToShortDateString();
            }
            else
            {
                lbl_Today.Text = "今天: " + DateTime.Now.ToShortDateString();//jash
            }
            tr_Hrs.Value = _currentDate.Hour;
            lbl_Hrs.Text = tr_Hrs.Value.ToString();

            tr_Mins.Value = _currentDate.Minute;
            lbl_Mins.Text = tr_Mins.Value.ToString();
        }

        /// <summary>
        /// Fills years and months comboboxes
        /// </summary>
        private void FillComboxes()
        {
            string[] monthNames = DateTimeFormatInfo.InvariantInfo.MonthNames;
            string[] monthNamesch = new string[] {"一月",
                                                    "二月",
                                                    "三月",
                                                    "四月",
                                                    "五月",
                                                    "六月",
                                                    "七月",
                                                    "八月",
                                                    "九月",
                                                    "十月",
                                                    "十一月",
                                                    "十二月",
                                                    "" };//jash
            var monthList = new DataTable();

            //Fills months combobox
            monthList.Columns.Add(new DataColumn("Month", typeof(string)));
            monthList.Columns.Add(new DataColumn("Id", typeof(int)));
            for (int i = 0; i < 12; i++)
            {
                monthList.Rows.Add(monthList.NewRow());
                if (m_intLanguageIndex == 2)
                {
                    monthList.Rows[i][0] = Convert.ToString(monthNames[i]);
                }
                else
                {
                    monthList.Rows[i][0] = Convert.ToString(monthNamesch[i]);//jash
                }
                monthList.Rows[i][1] = i + 1;
            }

            cmb_Months.DataSource = monthList;
            cmb_Months.DisplayMember = "Month";
            cmb_Months.ValueMember = "Id";

            //Fills years combobox
            for (int i = 0; i < 201; i++)
            {
                cmb_Years.Items.Insert(i, i + 1900);
            }

            cmb_Years.SelectedItem = _currentDate.Year;
            cmb_Months.SelectedValue = _currentDate.Month;
        }

        /// <summary>
        /// Fills calendar datagridview
        /// </summary>
        private void AddGridViewColumns()
        {
            // Adds columns with day names
            if (m_intLanguageIndex == 2)
            {
                string[] dayNames = DateTimeFormatInfo.InvariantInfo.DayNames;
                for (int i = 0; i < dayNames.Count(); i++)
                {
                    dgv_Dates.Columns.Add("col" + dayNames[i].Substring(0, 2), dayNames[i].Substring(0, 2));
                    //dgv_Dates.Columns.Add("col" + dayNames[i], dayNames[i]);//jash
                    dgv_Dates.Columns[i].Width = 37;
                }
            }
            else
            {
                string[] dayNames = new string[] { "日", "一", "二", "三", "四", "五", "六" };//jash
                for (int i = 0; i < dayNames.Count(); i++)
                {
                    //dgv_Dates.Columns.Add("col" + dayNames[i].Substring(0, 2), dayNames[i].Substring(0, 2));
                    dgv_Dates.Columns.Add("col" + dayNames[i], dayNames[i]);//jash
                    dgv_Dates.Columns[i].Width = 37;
                }
            }


            // Sets columns as non sortable
            foreach (DataGridViewColumn column in dgv_Dates.Columns)
            {
                column.SortMode = DataGridViewColumnSortMode.NotSortable;
            }

            // Adds empty rows for dates numbers
            //string[] dayNumber = new string[dayNames.Count()];
            string[] dayNumber = new string[7];
            for (int i = 0; i < 6; i++)
            {
                for (int x = 0; x < 7; x++)
                {
                    dayNumber[x] = string.Empty;
                }

                dgv_Dates.Rows.Add(dayNumber);
            }

        }

        private void SelectCell(int dayValue, int MonthValue)
        {
            for (int r = 0; r < dgv_Dates.Rows.Count; r++)
            {
                for (int c = 0; c < dgv_Dates.Columns.Count; c++)
                {
                    if (Convert.ToInt32(dgv_Dates.Rows[r].Cells[c].Value) == dayValue &&
                        Convert.ToInt32(dgv_Dates.Rows[r].Cells[c].Tag) == MonthValue)
                    {
                        dgv_Dates.BeginInvoke(new ChangeCurrentCellDelegate(ChangeCurrentCell), new object[] { r, c });
                    }
                }
            }
        }

        private delegate void ChangeCurrentCellDelegate(int columnIndex, int rowIndex);
        private void ChangeCurrentCell(int columnIndex, int rowIndex)
        {
            dgv_Dates.Rows[columnIndex].Cells[rowIndex].Selected = true;
        }


        /// <summary>
        /// Sets month number for combobox
        /// </summary>
        private void NextPrevMonth(int monthNumber)
        {
            _currentDate = _currentDate.AddMonths(monthNumber);
            FillCells();

            cmb_Years.SelectedItem = _currentDate.Year;
            cmb_Months.SelectedValue = _currentDate.Month;

            cmb_Cal.Value = _currentDate;
            SelectCell(1, (int)cmb_Months.SelectedValue);
        }

        private DateTime FirstDayOfMonth(DateTime dateTime)
        {
            return new DateTime(dateTime.Year, dateTime.Month, 1);
        }

        /// <summary>
        /// Fills calendar DataGridView with date numbers
        /// </summary>
        private void FillCells()
        {
            string[] dayNames = DateTimeFormatInfo.InvariantInfo.DayNames;
            var firstDay = (int)FirstDayOfMonth(_currentDate).DayOfWeek;
            if (firstDay == 0) firstDay = 7;
            DateTime prevMonthDate;

            if (firstDay == 1)
            {
                prevMonthDate = FirstDayOfMonth(_currentDate).AddDays(-8);//2016/05/03 jash.liao modidy FirstDayOfMonth(_currentDate).AddDays(-7);
            }
            else
            {
                prevMonthDate = FirstDayOfMonth(_currentDate).AddDays(-(firstDay - 0));//2016/05/03 jash.liao modidy //FirstDayOfMonth(_currentDate).AddDays(-(firstDay - 1));
            }


            int nrDay = prevMonthDate.Day;
            int nrMonth = prevMonthDate.Month;

            for (int i = 0; i < 6; i++)
            {
                for (int x = 0; x < dayNames.Count(); x++)
                {

                    //if current month is reached
                    if (nrDay > DateTime.DaysInMonth(_currentDate.Year, _currentDate.AddMonths(-1).Month) && nrMonth == _currentDate.AddMonths(-1).Month)
                    {
                        nrDay = 1;
                        nrMonth = _currentDate.Month;
                    }

                    //if next month is reached
                    if (nrDay > DateTime.DaysInMonth(_currentDate.Year, _currentDate.Month) && nrMonth == _currentDate.Month)
                    {
                        nrDay = 1;
                        nrMonth = _currentDate.AddMonths(1).Month;
                    }

                    dgv_Dates.Rows[i].Cells[x].Value = nrDay;
                    dgv_Dates.Rows[i].Cells[x].Tag = nrMonth;

                    //Changes font style when current month is reached
                    if (Convert.ToInt32(dgv_Dates.Rows[i].Cells[x].Tag) != _currentDate.Month)
                    {
                        dgv_Dates.Rows[i].Cells[x].Style.Font = new Font("Arial", 8.25F, FontStyle.Regular, GraphicsUnit.Point, 0);
                    }
                    else
                    {
                        dgv_Dates.Rows[i].Cells[x].Style.Font = new Font("Arial", 8.25F, FontStyle.Bold, GraphicsUnit.Point, 0);
                    }

                    nrDay++;
                }
            }

        }


        private void cmb_Years_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (cmb_Years.SelectedItem != null)
            {
                _currentDate = new DateTime((int)cmb_Years.SelectedItem, _currentDate.Month, _currentDate.Day,
                    _currentDate.Hour, _currentDate.Minute, _currentDate.Second, _currentDate.Millisecond);
                FillCells();

                cmb_Cal.Value = _currentDate;
            }
        }

        private void cmb_Months_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (cmb_Months.SelectedValue is int)
            {
                int day = _currentDate.Day;
                if (_currentDate.Day > DateTime.DaysInMonth(_currentDate.Year, (int)cmb_Months.SelectedValue)) day=1;
                _currentDate = new DateTime(_currentDate.Year, (int)cmb_Months.SelectedValue, day,
                    _currentDate.Hour, _currentDate.Minute, _currentDate.Second, _currentDate.Millisecond);
                FillCells();
                cmb_Cal.Value = _currentDate;
                SelectCell(1, (int)cmb_Months.SelectedValue);
            }
        }

        private void dgvDates_CellEnter(object sender, DataGridViewCellEventArgs e)
        {
            if (!string.IsNullOrEmpty(dgv_Dates.CurrentCell.Value.ToString()) && Convert.ToInt32(dgv_Dates.CurrentCell.Value) != _currentDate.Day)
            {
                if (dgv_Dates.CurrentCell.Tag != null)
                {
                    var day = Convert.ToInt32(dgv_Dates.CurrentCell.Value);
                    var month = Convert.ToInt32(dgv_Dates.CurrentCell.Tag);
                    _currentDate = new DateTime(_currentDate.Year, month, day,
                                                _currentDate.Hour, _currentDate.Minute, _currentDate.Second,
                                                _currentDate.Millisecond);

                    if (Convert.ToDateTime(cmb_Cal.Value).Month != _currentDate.Month)
                    {
                        int currentYear = _currentDate.Year;
                        if (_currentDate.Month == 12 && Convert.ToDateTime(cmb_Cal.Value).Month == 1) currentYear--;
                        if (_currentDate.Month == 1 && Convert.ToDateTime(cmb_Cal.Value).Month == 12) currentYear++;
                        
                        FillCells();
                        cmb_Years.SelectedItem = currentYear;
                        cmb_Months.SelectedValue = _currentDate.Month;
                        dgv_Dates.ClearSelection();
                        SelectCell(_currentDate.Day, _currentDate.Month);
                    }
                    cmb_Cal.Value = _currentDate;
                }
            }

        }

        private void lbl_Today_Click(object sender, EventArgs e)
        {
            _currentDate = DateTime.Now;

            FillCells();
            cmb_Years.SelectedItem = _currentDate.Year;
            cmb_Months.SelectedValue = _currentDate.Month;
            cmb_Cal.Value = DateTime.Now;
            SelectCell(DateTime.Now.Day, (int)cmb_Months.SelectedValue);
        }


        private void btn_PrevMonth_Click(object sender, EventArgs e)
        {
            NextPrevMonth(-1);
        }


        private void btn_NextMonth_Click(object sender, EventArgs e)
        {
            NextPrevMonth(1);
        }


        private void tr_Hrs_Scroll(object sender, EventArgs e)
        {
            int hour = tr_Hrs.Value;

            lbl_Hrs.Text = hour.ToString();


            _currentDate = new DateTime(_currentDate.Year, _currentDate.Month, _currentDate.Day,
                hour, _currentDate.Minute, _currentDate.Second, _currentDate.Millisecond);

            cmb_Cal.Value = _currentDate;

        }

        private void tr_Mins_Scroll(object sender, EventArgs e)
        {
            int min = tr_Mins.Value;

            lbl_Mins.Text = min.ToString();


            _currentDate = new DateTime(_currentDate.Year, _currentDate.Month, _currentDate.Day,
                _currentDate.Hour, min, _currentDate.Second, _currentDate.Millisecond);

            cmb_Cal.Value = _currentDate;
        }

    }
}
