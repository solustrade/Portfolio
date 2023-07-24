namespace Imprimir_ListBox
{
    partial class Form1
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
            this.lbDados = new System.Windows.Forms.ListBox();
            this.btnCarregarDados = new System.Windows.Forms.Button();
            this.btnImprimir = new System.Windows.Forms.Button();
            this.pd1 = new System.Drawing.Printing.PrintDocument();
            this.printDialog1 = new System.Windows.Forms.PrintDialog();
            this.chkBD = new System.Windows.Forms.CheckBox();
            this.SuspendLayout();
            // 
            // lbDados
            // 
            this.lbDados.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lbDados.ForeColor = System.Drawing.Color.Blue;
            this.lbDados.FormattingEnabled = true;
            this.lbDados.ItemHeight = 16;
            this.lbDados.Location = new System.Drawing.Point(26, 22);
            this.lbDados.Name = "lbDados";
            this.lbDados.Size = new System.Drawing.Size(371, 292);
            this.lbDados.TabIndex = 0;
            // 
            // btnCarregarDados
            // 
            this.btnCarregarDados.Enabled = false;
            this.btnCarregarDados.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnCarregarDados.Location = new System.Drawing.Point(26, 331);
            this.btnCarregarDados.Name = "btnCarregarDados";
            this.btnCarregarDados.Size = new System.Drawing.Size(129, 51);
            this.btnCarregarDados.TabIndex = 1;
            this.btnCarregarDados.Text = "Carregar Dados ";
            this.btnCarregarDados.UseVisualStyleBackColor = true;
            this.btnCarregarDados.Click += new System.EventHandler(this.btnCarregarDados_Click);
            // 
            // btnImprimir
            // 
            this.btnImprimir.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnImprimir.Location = new System.Drawing.Point(268, 331);
            this.btnImprimir.Name = "btnImprimir";
            this.btnImprimir.Size = new System.Drawing.Size(129, 51);
            this.btnImprimir.TabIndex = 1;
            this.btnImprimir.Text = "Imprimir";
            this.btnImprimir.UseVisualStyleBackColor = true;
            this.btnImprimir.Click += new System.EventHandler(this.btnImprimir_Click);
            // 
            // pd1
            // 
            this.pd1.PrintPage += new System.Drawing.Printing.PrintPageEventHandler(this.pd1_PrintPage);
            // 
            // printDialog1
            // 
            this.printDialog1.UseEXDialog = true;
            // 
            // chkBD
            // 
            this.chkBD.AutoSize = true;
            this.chkBD.Location = new System.Drawing.Point(172, 349);
            this.chkBD.Name = "chkBD";
            this.chkBD.Size = new System.Drawing.Size(71, 17);
            this.chkBD.TabIndex = 2;
            this.chkBD.Text = "Fonte BD";
            this.chkBD.UseVisualStyleBackColor = true;
            this.chkBD.CheckedChanged += new System.EventHandler(this.chkBD_CheckedChanged);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.ActiveCaption;
            this.ClientSize = new System.Drawing.Size(429, 391);
            this.Controls.Add(this.chkBD);
            this.Controls.Add(this.btnImprimir);
            this.Controls.Add(this.btnCarregarDados);
            this.Controls.Add(this.lbDados);
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Imprimir ListBox";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.ListBox lbDados;
        private System.Windows.Forms.Button btnCarregarDados;
        private System.Windows.Forms.Button btnImprimir;
        private System.Drawing.Printing.PrintDocument pd1;
        private System.Windows.Forms.PrintDialog printDialog1;
        private System.Windows.Forms.CheckBox chkBD;
    }
}

