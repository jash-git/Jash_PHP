namespace SYRIS_Offline
{
    partial class SettingWnd
    {
        /// <summary>
        /// 設計工具所需的變數。
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// 清除任何使用中的資源。
        /// </summary>
        /// <param name="disposing">如果應該處置 Managed 資源則為 true，否則為 false。</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form 設計工具產生的程式碼

        /// <summary>
        /// 此為設計工具支援所需的方法 - 請勿使用程式碼編輯器
        /// 修改這個方法的內容。
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(SettingWnd));
            this.SW_groupBox = new System.Windows.Forms.GroupBox();
            this.SW_comboBox01 = new System.Windows.Forms.ComboBox();
            this.SW_label04 = new System.Windows.Forms.Label();
            this.SW_button02 = new System.Windows.Forms.Button();
            this.SW_button01 = new System.Windows.Forms.Button();
            this.textBox3 = new System.Windows.Forms.TextBox();
            this.SW_label03 = new System.Windows.Forms.Label();
            this.textBox2 = new System.Windows.Forms.TextBox();
            this.SW_label02 = new System.Windows.Forms.Label();
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.SW_label01 = new System.Windows.Forms.Label();
            this.SW_groupBox.SuspendLayout();
            this.SuspendLayout();
            // 
            // SW_groupBox
            // 
            this.SW_groupBox.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom)
                        | System.Windows.Forms.AnchorStyles.Left)
                        | System.Windows.Forms.AnchorStyles.Right)));
            this.SW_groupBox.Controls.Add(this.SW_comboBox01);
            this.SW_groupBox.Controls.Add(this.SW_label04);
            this.SW_groupBox.Controls.Add(this.SW_button02);
            this.SW_groupBox.Controls.Add(this.SW_button01);
            this.SW_groupBox.Controls.Add(this.textBox3);
            this.SW_groupBox.Controls.Add(this.SW_label03);
            this.SW_groupBox.Controls.Add(this.textBox2);
            this.SW_groupBox.Controls.Add(this.SW_label02);
            this.SW_groupBox.Controls.Add(this.textBox1);
            this.SW_groupBox.Controls.Add(this.SW_label01);
            this.SW_groupBox.Location = new System.Drawing.Point(8, -4);
            this.SW_groupBox.Name = "SW_groupBox";
            this.SW_groupBox.Size = new System.Drawing.Size(333, 306);
            this.SW_groupBox.TabIndex = 0;
            this.SW_groupBox.TabStop = false;
            // 
            // SW_comboBox01
            // 
            this.SW_comboBox01.FormattingEnabled = true;
            this.SW_comboBox01.Location = new System.Drawing.Point(161, 38);
            this.SW_comboBox01.Name = "SW_comboBox01";
            this.SW_comboBox01.Size = new System.Drawing.Size(161, 24);
            this.SW_comboBox01.TabIndex = 19;
            this.SW_comboBox01.SelectedIndexChanged += new System.EventHandler(this.SW_comboBox01_SelectedIndexChanged);
            // 
            // SW_label04
            // 
            this.SW_label04.AutoSize = true;
            this.SW_label04.Location = new System.Drawing.Point(10, 41);
            this.SW_label04.Name = "SW_label04";
            this.SW_label04.Size = new System.Drawing.Size(86, 16);
            this.SW_label04.TabIndex = 18;
            this.SW_label04.Text = "Language：";
            // 
            // SW_button02
            // 
            this.SW_button02.Location = new System.Drawing.Point(252, 238);
            this.SW_button02.Name = "SW_button02";
            this.SW_button02.Size = new System.Drawing.Size(70, 30);
            this.SW_button02.TabIndex = 17;
            this.SW_button02.Text = "Save";
            this.SW_button02.UseVisualStyleBackColor = true;
            // 
            // SW_button01
            // 
            this.SW_button01.Location = new System.Drawing.Point(158, 238);
            this.SW_button01.Name = "SW_button01";
            this.SW_button01.Size = new System.Drawing.Size(70, 30);
            this.SW_button01.TabIndex = 16;
            this.SW_button01.Text = "Test";
            this.SW_button01.UseVisualStyleBackColor = true;
            // 
            // textBox3
            // 
            this.textBox3.Location = new System.Drawing.Point(158, 188);
            this.textBox3.Name = "textBox3";
            this.textBox3.Size = new System.Drawing.Size(164, 27);
            this.textBox3.TabIndex = 15;
            // 
            // SW_label03
            // 
            this.SW_label03.AutoSize = true;
            this.SW_label03.Location = new System.Drawing.Point(10, 191);
            this.SW_label03.Name = "SW_label03";
            this.SW_label03.Size = new System.Drawing.Size(83, 16);
            this.SW_label03.TabIndex = 14;
            this.SW_label03.Text = "Password：";
            // 
            // textBox2
            // 
            this.textBox2.Location = new System.Drawing.Point(158, 138);
            this.textBox2.Name = "textBox2";
            this.textBox2.Size = new System.Drawing.Size(164, 27);
            this.textBox2.TabIndex = 13;
            // 
            // SW_label02
            // 
            this.SW_label02.AutoSize = true;
            this.SW_label02.Location = new System.Drawing.Point(10, 141);
            this.SW_label02.Name = "SW_label02";
            this.SW_label02.Size = new System.Drawing.Size(94, 16);
            this.SW_label02.TabIndex = 12;
            this.SW_label02.Text = "User Name：";
            // 
            // textBox1
            // 
            this.textBox1.Location = new System.Drawing.Point(158, 88);
            this.textBox1.Name = "textBox1";
            this.textBox1.Size = new System.Drawing.Size(164, 27);
            this.textBox1.TabIndex = 11;
            // 
            // SW_label01
            // 
            this.SW_label01.AutoSize = true;
            this.SW_label01.Location = new System.Drawing.Point(10, 91);
            this.SW_label01.Name = "SW_label01";
            this.SW_label01.Size = new System.Drawing.Size(64, 16);
            this.SW_label01.TabIndex = 10;
            this.SW_label01.Text = "Server：";
            // 
            // SettingWnd
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(350, 310);
            this.Controls.Add(this.SW_groupBox);
            this.Font = new System.Drawing.Font("新細明體", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(136)));
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle;
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Margin = new System.Windows.Forms.Padding(4);
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "SettingWnd";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Setting";
            this.Load += new System.EventHandler(this.SettingWnd_Load);
            this.SW_groupBox.ResumeLayout(false);
            this.SW_groupBox.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.GroupBox SW_groupBox;
        private System.Windows.Forms.ComboBox SW_comboBox01;
        private System.Windows.Forms.Label SW_label04;
        private System.Windows.Forms.Button SW_button02;
        private System.Windows.Forms.Button SW_button01;
        private System.Windows.Forms.TextBox textBox3;
        private System.Windows.Forms.Label SW_label03;
        private System.Windows.Forms.TextBox textBox2;
        private System.Windows.Forms.Label SW_label02;
        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.Label SW_label01;


    }
}