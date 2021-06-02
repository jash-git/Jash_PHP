using System.Drawing;
using System.Windows.Forms;
namespace DatePicker
{
    partial class frmDatePicker
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle1 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle2 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle3 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle4 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle5 = new System.Windows.Forms.DataGridViewCellStyle();
            this.Column6 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Column5 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Column4 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Column3 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Column2 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Column1 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.bvbn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.pnBack = new System.Windows.Forms.Panel();
            this.dgv_Dates = new System.Windows.Forms.DataGridView();
            this.pn_TrackBar = new System.Windows.Forms.Panel();
            this.tr_Mins = new System.Windows.Forms.TrackBar();
            this.tr_Hrs = new System.Windows.Forms.TrackBar();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.lbl_Mins = new System.Windows.Forms.Label();
            this.lbl_Hrs = new System.Windows.Forms.Label();
            this.panel5 = new System.Windows.Forms.Panel();
            this.pn_Controls = new System.Windows.Forms.Panel();
            this.btn_NextMonth = new System.Windows.Forms.Button();
            this.btn_PrevMonth = new System.Windows.Forms.Button();
            this.cmb_Months = new System.Windows.Forms.ComboBox();
            this.cmb_Years = new System.Windows.Forms.ComboBox();
            this.panel3 = new System.Windows.Forms.Panel();
            this.lbl_Today = new System.Windows.Forms.Label();
            this.panel2 = new System.Windows.Forms.Panel();
            this.pn_Header = new System.Windows.Forms.Panel();
            this.lblCaption = new System.Windows.Forms.Label();
            this.toolTip1 = new System.Windows.Forms.ToolTip(this.components);
            this.pnBack.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgv_Dates)).BeginInit();
            this.pn_TrackBar.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.tr_Mins)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.tr_Hrs)).BeginInit();
            this.pn_Controls.SuspendLayout();
            this.panel3.SuspendLayout();
            this.pn_Header.SuspendLayout();
            this.SuspendLayout();
            // 
            // Column6
            // 
            this.Column6.HeaderText = "Column6";
            this.Column6.Name = "Column6";
            this.Column6.Width = 50;
            // 
            // Column5
            // 
            this.Column5.HeaderText = "Column5";
            this.Column5.Name = "Column5";
            this.Column5.Width = 50;
            // 
            // Column4
            // 
            this.Column4.HeaderText = "Column4";
            this.Column4.Name = "Column4";
            this.Column4.Width = 50;
            // 
            // Column3
            // 
            this.Column3.HeaderText = "Column3";
            this.Column3.Name = "Column3";
            this.Column3.Width = 50;
            // 
            // Column2
            // 
            this.Column2.HeaderText = "Column2";
            this.Column2.Name = "Column2";
            this.Column2.Width = 50;
            // 
            // Column1
            // 
            this.Column1.HeaderText = "Column1";
            this.Column1.Name = "Column1";
            this.Column1.Width = 50;
            // 
            // bvbn
            // 
            this.bvbn.HeaderText = "Column1";
            this.bvbn.Name = "bvbn";
            this.bvbn.Width = 50;
            // 
            // pnBack
            // 
            this.pnBack.BackColor = System.Drawing.Color.White;
            this.pnBack.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.pnBack.Controls.Add(this.dgv_Dates);
            this.pnBack.Controls.Add(this.pn_TrackBar);
            this.pnBack.Controls.Add(this.panel5);
            this.pnBack.Controls.Add(this.pn_Controls);
            this.pnBack.Controls.Add(this.panel3);
            this.pnBack.Controls.Add(this.panel2);
            this.pnBack.Controls.Add(this.pn_Header);
            this.pnBack.Dock = System.Windows.Forms.DockStyle.Fill;
            this.pnBack.Location = new System.Drawing.Point(0, 0);
            this.pnBack.Name = "pnBack";
            this.pnBack.Padding = new System.Windows.Forms.Padding(5);
            this.pnBack.Size = new System.Drawing.Size(243, 250);
            this.pnBack.TabIndex = 0;
            // 
            // dgv_Dates
            // 
            this.dgv_Dates.AllowUserToAddRows = false;
            this.dgv_Dates.AllowUserToDeleteRows = false;
            this.dgv_Dates.AllowUserToResizeColumns = false;
            this.dgv_Dates.AllowUserToResizeRows = false;
            dataGridViewCellStyle1.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.dgv_Dates.AlternatingRowsDefaultCellStyle = dataGridViewCellStyle1;
            this.dgv_Dates.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.ColumnHeader;
            this.dgv_Dates.BackgroundColor = System.Drawing.Color.White;
            this.dgv_Dates.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.dgv_Dates.ColumnHeadersBorderStyle = System.Windows.Forms.DataGridViewHeaderBorderStyle.Single;
            dataGridViewCellStyle2.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle2.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(168)))), ((int)(((byte)(192)))), ((int)(((byte)(234)))));
            dataGridViewCellStyle2.Font = new System.Drawing.Font("Times New Roman", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            dataGridViewCellStyle2.ForeColor = System.Drawing.SystemColors.WindowText;
            dataGridViewCellStyle2.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle2.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle2.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dgv_Dates.ColumnHeadersDefaultCellStyle = dataGridViewCellStyle2;
            this.dgv_Dates.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            dataGridViewCellStyle3.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle3.BackColor = System.Drawing.SystemColors.Window;
            dataGridViewCellStyle3.Font = new System.Drawing.Font("Tahoma", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            dataGridViewCellStyle3.ForeColor = System.Drawing.SystemColors.ControlText;
            dataGridViewCellStyle3.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle3.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle3.WrapMode = System.Windows.Forms.DataGridViewTriState.False;
            this.dgv_Dates.DefaultCellStyle = dataGridViewCellStyle3;
            this.dgv_Dates.Dock = System.Windows.Forms.DockStyle.Fill;
            this.dgv_Dates.EditMode = System.Windows.Forms.DataGridViewEditMode.EditProgrammatically;
            this.dgv_Dates.EnableHeadersVisualStyles = false;
            this.dgv_Dates.Location = new System.Drawing.Point(5, 65);
            this.dgv_Dates.MultiSelect = false;
            this.dgv_Dates.Name = "dgv_Dates";
            this.dgv_Dates.ReadOnly = true;
            dataGridViewCellStyle4.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle4.BackColor = System.Drawing.SystemColors.Control;
            dataGridViewCellStyle4.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            dataGridViewCellStyle4.ForeColor = System.Drawing.SystemColors.WindowText;
            dataGridViewCellStyle4.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle4.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle4.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dgv_Dates.RowHeadersDefaultCellStyle = dataGridViewCellStyle4;
            this.dgv_Dates.RowHeadersVisible = false;
            this.dgv_Dates.RowHeadersWidth = 31;
            dataGridViewCellStyle5.Font = new System.Drawing.Font("Tahoma", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.dgv_Dates.RowsDefaultCellStyle = dataGridViewCellStyle5;
            this.dgv_Dates.RowTemplate.DefaultCellStyle.Font = new System.Drawing.Font("Arial", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dgv_Dates.Size = new System.Drawing.Size(183, 162);
            this.dgv_Dates.TabIndex = 24;
            this.dgv_Dates.CellEnter += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgvDates_CellEnter);
            // 
            // pn_TrackBar
            // 
            this.pn_TrackBar.Controls.Add(this.tr_Mins);
            this.pn_TrackBar.Controls.Add(this.tr_Hrs);
            this.pn_TrackBar.Controls.Add(this.label4);
            this.pn_TrackBar.Controls.Add(this.label3);
            this.pn_TrackBar.Controls.Add(this.lbl_Mins);
            this.pn_TrackBar.Controls.Add(this.lbl_Hrs);
            this.pn_TrackBar.Dock = System.Windows.Forms.DockStyle.Right;
            this.pn_TrackBar.Location = new System.Drawing.Point(188, 65);
            this.pn_TrackBar.Name = "pn_TrackBar";
            this.pn_TrackBar.Size = new System.Drawing.Size(48, 162);
            this.pn_TrackBar.TabIndex = 23;
            // 
            // tr_Mins
            // 
            this.tr_Mins.Location = new System.Drawing.Point(26, 38);
            this.tr_Mins.Maximum = 59;
            this.tr_Mins.Name = "tr_Mins";
            this.tr_Mins.Orientation = System.Windows.Forms.Orientation.Vertical;
            this.tr_Mins.Size = new System.Drawing.Size(45, 121);
            this.tr_Mins.TabIndex = 22;
            this.tr_Mins.TickStyle = System.Windows.Forms.TickStyle.None;
            this.tr_Mins.Scroll += new System.EventHandler(this.tr_Mins_Scroll);
            // 
            // tr_Hrs
            // 
            this.tr_Hrs.Location = new System.Drawing.Point(4, 38);
            this.tr_Hrs.Maximum = 23;
            this.tr_Hrs.Name = "tr_Hrs";
            this.tr_Hrs.Orientation = System.Windows.Forms.Orientation.Vertical;
            this.tr_Hrs.Size = new System.Drawing.Size(45, 121);
            this.tr_Hrs.TabIndex = 21;
            this.tr_Hrs.TickStyle = System.Windows.Forms.TickStyle.None;
            this.tr_Hrs.Scroll += new System.EventHandler(this.tr_Hrs_Scroll);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.BackColor = System.Drawing.Color.Transparent;
            this.label4.Font = new System.Drawing.Font("Tahoma", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.label4.Location = new System.Drawing.Point(23, 23);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(28, 13);
            this.label4.TabIndex = 18;
            this.label4.Text = "Mins";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.BackColor = System.Drawing.Color.Transparent;
            this.label3.Font = new System.Drawing.Font("Tahoma", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.label3.Location = new System.Drawing.Point(3, 23);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(23, 13);
            this.label3.TabIndex = 17;
            this.label3.Text = "Hrs";
            // 
            // lbl_Mins
            // 
            this.lbl_Mins.AutoSize = true;
            this.lbl_Mins.BackColor = System.Drawing.Color.Transparent;
            this.lbl_Mins.Font = new System.Drawing.Font("Arial", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.lbl_Mins.Location = new System.Drawing.Point(26, 5);
            this.lbl_Mins.Name = "lbl_Mins";
            this.lbl_Mins.Size = new System.Drawing.Size(19, 14);
            this.lbl_Mins.TabIndex = 16;
            this.lbl_Mins.Text = "50";
            // 
            // lbl_Hrs
            // 
            this.lbl_Hrs.AutoSize = true;
            this.lbl_Hrs.BackColor = System.Drawing.Color.Transparent;
            this.lbl_Hrs.Font = new System.Drawing.Font("Arial", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.lbl_Hrs.Location = new System.Drawing.Point(3, 5);
            this.lbl_Hrs.Name = "lbl_Hrs";
            this.lbl_Hrs.Size = new System.Drawing.Size(25, 14);
            this.lbl_Hrs.TabIndex = 15;
            this.lbl_Hrs.Text = "10 :";
            // 
            // panel5
            // 
            this.panel5.BackColor = System.Drawing.Color.Transparent;
            this.panel5.Dock = System.Windows.Forms.DockStyle.Top;
            this.panel5.Location = new System.Drawing.Point(5, 60);
            this.panel5.Name = "panel5";
            this.panel5.Size = new System.Drawing.Size(231, 5);
            this.panel5.TabIndex = 21;
            // 
            // pn_Controls
            // 
            this.pn_Controls.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(168)))), ((int)(((byte)(192)))), ((int)(((byte)(234)))));
            this.pn_Controls.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.pn_Controls.Controls.Add(this.btn_NextMonth);
            this.pn_Controls.Controls.Add(this.btn_PrevMonth);
            this.pn_Controls.Controls.Add(this.cmb_Months);
            this.pn_Controls.Controls.Add(this.cmb_Years);
            this.pn_Controls.Dock = System.Windows.Forms.DockStyle.Top;
            this.pn_Controls.Location = new System.Drawing.Point(5, 33);
            this.pn_Controls.Name = "pn_Controls";
            this.pn_Controls.Size = new System.Drawing.Size(231, 27);
            this.pn_Controls.TabIndex = 19;
            // 
            // btn_NextMonth
            // 
            this.btn_NextMonth.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.btn_NextMonth.BackColor = System.Drawing.Color.White;
            this.btn_NextMonth.Font = new System.Drawing.Font("Arial", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.btn_NextMonth.Location = new System.Drawing.Point(202, 1);
            this.btn_NextMonth.Name = "btn_NextMonth";
            this.btn_NextMonth.Size = new System.Drawing.Size(27, 22);
            this.btn_NextMonth.TabIndex = 12;
            this.btn_NextMonth.Text = ">>";
            this.toolTip1.SetToolTip(this.btn_NextMonth, "Next Month");
            this.btn_NextMonth.UseVisualStyleBackColor = false;
            this.btn_NextMonth.Click += new System.EventHandler(this.btn_NextMonth_Click);
            // 
            // btn_PrevMonth
            // 
            this.btn_PrevMonth.BackColor = System.Drawing.Color.White;
            this.btn_PrevMonth.Font = new System.Drawing.Font("Arial", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.btn_PrevMonth.Location = new System.Drawing.Point(0, 1);
            this.btn_PrevMonth.Name = "btn_PrevMonth";
            this.btn_PrevMonth.Size = new System.Drawing.Size(27, 22);
            this.btn_PrevMonth.TabIndex = 1;
            this.btn_PrevMonth.Text = "<<";
            this.toolTip1.SetToolTip(this.btn_PrevMonth, "Prev. Month");
            this.btn_PrevMonth.UseVisualStyleBackColor = false;
            this.btn_PrevMonth.Click += new System.EventHandler(this.btn_PrevMonth_Click);
            // 
            // cmb_Months
            // 
            this.cmb_Months.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.cmb_Months.BackColor = System.Drawing.Color.White;
            this.cmb_Months.DropDownHeight = 170;
            this.cmb_Months.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.cmb_Months.Font = new System.Drawing.Font("Arial", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.cmb_Months.FormattingEnabled = true;
            this.cmb_Months.IntegralHeight = false;
            this.cmb_Months.Location = new System.Drawing.Point(94, 2);
            this.cmb_Months.Name = "cmb_Months";
            this.cmb_Months.Size = new System.Drawing.Size(107, 22);
            this.cmb_Months.TabIndex = 0;
            this.cmb_Months.SelectedIndexChanged += new System.EventHandler(this.cmb_Months_SelectedIndexChanged);
            // 
            // cmb_Years
            // 
            this.cmb_Years.BackColor = System.Drawing.Color.White;
            this.cmb_Years.DropDownHeight = 170;
            this.cmb_Years.DropDownStyle = System.Windows.Forms.ComboBoxStyle.DropDownList;
            this.cmb_Years.Font = new System.Drawing.Font("Arial", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.cmb_Years.FormattingEnabled = true;
            this.cmb_Years.IntegralHeight = false;
            this.cmb_Years.Location = new System.Drawing.Point(27, 2);
            this.cmb_Years.Name = "cmb_Years";
            this.cmb_Years.Size = new System.Drawing.Size(61, 22);
            this.cmb_Years.TabIndex = 1;
            this.cmb_Years.SelectedIndexChanged += new System.EventHandler(this.cmb_Years_SelectedIndexChanged);
            // 
            // panel3
            // 
            this.panel3.BackColor = System.Drawing.Color.Transparent;
            this.panel3.Controls.Add(this.lbl_Today);
            this.panel3.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.panel3.Location = new System.Drawing.Point(5, 227);
            this.panel3.Name = "panel3";
            this.panel3.Size = new System.Drawing.Size(231, 16);
            this.panel3.TabIndex = 17;
            // 
            // lbl_Today
            // 
            this.lbl_Today.AutoSize = true;
            this.lbl_Today.Cursor = System.Windows.Forms.Cursors.Hand;
            this.lbl_Today.Font = new System.Drawing.Font("Tahoma", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.lbl_Today.Location = new System.Drawing.Point(37, 3);
            this.lbl_Today.Name = "lbl_Today";
            this.lbl_Today.Size = new System.Drawing.Size(51, 13);
            this.lbl_Today.TabIndex = 12;
            this.lbl_Today.Text = "Today is:";
            this.lbl_Today.Click += new System.EventHandler(this.lbl_Today_Click);
            // 
            // panel2
            // 
            this.panel2.BackColor = System.Drawing.Color.Transparent;
            this.panel2.Dock = System.Windows.Forms.DockStyle.Top;
            this.panel2.Location = new System.Drawing.Point(5, 28);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(231, 5);
            this.panel2.TabIndex = 16;
            // 
            // pn_Header
            // 
            this.pn_Header.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(168)))), ((int)(((byte)(192)))), ((int)(((byte)(234)))));
            this.pn_Header.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.pn_Header.Controls.Add(this.lblCaption);
            this.pn_Header.Dock = System.Windows.Forms.DockStyle.Top;
            this.pn_Header.Location = new System.Drawing.Point(5, 5);
            this.pn_Header.Name = "pn_Header";
            this.pn_Header.Size = new System.Drawing.Size(231, 23);
            this.pn_Header.TabIndex = 7;
            // 
            // lblCaption
            // 
            this.lblCaption.AutoSize = true;
            this.lblCaption.BackColor = System.Drawing.Color.Transparent;
            this.lblCaption.Font = new System.Drawing.Font("Tahoma", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.lblCaption.Location = new System.Drawing.Point(2, 5);
            this.lblCaption.Name = "lblCaption";
            this.lblCaption.Size = new System.Drawing.Size(60, 14);
            this.lblCaption.TabIndex = 0;
            this.lblCaption.Text = "Calendar";
            // 
            // frmDatePicker
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 12F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(243, 250);
            this.ControlBox = false;
            this.Controls.Add(this.pnBack);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            this.Name = "frmDatePicker";
            this.ShowInTaskbar = false;
            this.Text = "frmDate";
            this.Load += new System.EventHandler(this.frmDatePicker_Load);
            this.Paint += new System.Windows.Forms.PaintEventHandler(this.frmDatePicker_Paint);
            this.pnBack.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgv_Dates)).EndInit();
            this.pn_TrackBar.ResumeLayout(false);
            this.pn_TrackBar.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.tr_Mins)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.tr_Hrs)).EndInit();
            this.pn_Controls.ResumeLayout(false);
            this.panel3.ResumeLayout(false);
            this.panel3.PerformLayout();
            this.pn_Header.ResumeLayout(false);
            this.pn_Header.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        public DateTimePicker cmb_Cal;
        private System.Windows.Forms.DataGridViewTextBoxColumn Column6;
        private System.Windows.Forms.DataGridViewTextBoxColumn Column5;
        private System.Windows.Forms.DataGridViewTextBoxColumn Column4;
        private System.Windows.Forms.DataGridViewTextBoxColumn Column3;
        private System.Windows.Forms.DataGridViewTextBoxColumn Column2;
        private System.Windows.Forms.DataGridViewTextBoxColumn Column1;
        private System.Windows.Forms.DataGridViewTextBoxColumn bvbn;
        private System.Windows.Forms.Panel pnBack;
        private System.Windows.Forms.Panel pn_Header;
        private System.Windows.Forms.Label lblCaption;
        private System.Windows.Forms.ToolTip toolTip1;
        private System.Windows.Forms.Panel panel3;
        private System.Windows.Forms.Label lbl_Today;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Button btn_NextMonth;
        private System.Windows.Forms.Button btn_PrevMonth;
        private System.Windows.Forms.ComboBox cmb_Years;
        private System.Windows.Forms.ComboBox cmb_Months;
        private System.Windows.Forms.Panel pn_Controls;
        private System.Windows.Forms.Panel panel5;
        private System.Windows.Forms.Panel pn_TrackBar;
        private System.Windows.Forms.TrackBar tr_Mins;
        private System.Windows.Forms.TrackBar tr_Hrs;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label lbl_Mins;
        private System.Windows.Forms.Label lbl_Hrs;
        private System.Windows.Forms.DataGridView dgv_Dates;
    }
}