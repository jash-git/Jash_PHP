namespace SYRIS_Offline
{
    partial class MainWnd
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
            this.components = new System.ComponentModel.Container();
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(MainWnd));
            this.MW_menuStrip = new System.Windows.Forms.MenuStrip();
            this.MW_imageList1 = new System.Windows.Forms.ImageList(this.components);
            this.SuspendLayout();
            // 
            // MW_menuStrip
            // 
            this.MW_menuStrip.Font = new System.Drawing.Font("微軟正黑體", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.MW_menuStrip.Location = new System.Drawing.Point(0, 0);
            this.MW_menuStrip.Name = "MW_menuStrip";
            this.MW_menuStrip.Size = new System.Drawing.Size(1154, 24);
            this.MW_menuStrip.TabIndex = 0;
            this.MW_menuStrip.Text = "menuStrip1";
            // 
            // MW_imageList1
            // 
            this.MW_imageList1.ImageStream = ((System.Windows.Forms.ImageListStreamer)(resources.GetObject("MW_imageList1.ImageStream")));
            this.MW_imageList1.TransparentColor = System.Drawing.Color.Transparent;
            this.MW_imageList1.Images.SetKeyName(0, "1470397579_vector_66_14.ico");
            this.MW_imageList1.Images.SetKeyName(1, "1470394617_import.ico");
            this.MW_imageList1.Images.SetKeyName(2, "1470394758_edit.ico");
            this.MW_imageList1.Images.SetKeyName(3, "1470394688_export.ico");
            // 
            // MainWnd
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1154, 622);
            this.Controls.Add(this.MW_menuStrip);
            this.Font = new System.Drawing.Font("新細明體", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(136)));
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.IsMdiContainer = true;
            this.MainMenuStrip = this.MW_menuStrip;
            this.Margin = new System.Windows.Forms.Padding(4);
            this.Name = "MainWnd";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "SYRIS Offline";
            this.FormClosing += new System.Windows.Forms.FormClosingEventHandler(this.MainWnd_FormClosing);
            this.Load += new System.EventHandler(this.MainWnd_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.MenuStrip MW_menuStrip;
        private System.Windows.Forms.ImageList MW_imageList1;
    }
}

