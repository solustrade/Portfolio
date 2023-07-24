namespace DGViewListImp
{
    partial class PrintOptions
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
            this.chklst = new System.Windows.Forms.CheckedListBox();
            this.label1 = new System.Windows.Forms.Label();
            this.btnConfirmaImpress = new System.Windows.Forms.Button();
            this.btnCancelaImpress = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // chklst
            // 
            this.chklst.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.chklst.FormattingEnabled = true;
            this.chklst.Location = new System.Drawing.Point(13, 29);
            this.chklst.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.chklst.Name = "chklst";
            this.chklst.Size = new System.Drawing.Size(265, 140);
            this.chklst.TabIndex = 0;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(13, 9);
            this.label1.Margin = new System.Windows.Forms.Padding(4, 0, 4, 0);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(265, 16);
            this.label1.TabIndex = 1;
            this.label1.Text = "Campos disponíveis para impressão:";
            // 
            // btnConfirmaImpress
            // 
            this.btnConfirmaImpress.Location = new System.Drawing.Point(285, 29);
            this.btnConfirmaImpress.Name = "btnConfirmaImpress";
            this.btnConfirmaImpress.Size = new System.Drawing.Size(139, 37);
            this.btnConfirmaImpress.TabIndex = 2;
            this.btnConfirmaImpress.Text = "Confirmar";
            this.btnConfirmaImpress.UseVisualStyleBackColor = true;
            this.btnConfirmaImpress.Click += new System.EventHandler(this.btnConfirmaImpress_Click);
            // 
            // btnCancelaImpress
            // 
            this.btnCancelaImpress.Location = new System.Drawing.Point(285, 72);
            this.btnCancelaImpress.Name = "btnCancelaImpress";
            this.btnCancelaImpress.Size = new System.Drawing.Size(139, 37);
            this.btnCancelaImpress.TabIndex = 3;
            this.btnCancelaImpress.Text = "Cancelar";
            this.btnCancelaImpress.UseVisualStyleBackColor = true;
            this.btnCancelaImpress.Click += new System.EventHandler(this.btnCancelaImpress_Click);
            // 
            // PrintOptions
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(436, 175);
            this.Controls.Add(this.btnCancelaImpress);
            this.Controls.Add(this.btnConfirmaImpress);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.chklst);
            this.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow;
            this.Margin = new System.Windows.Forms.Padding(4, 4, 4, 4);
            this.Name = "PrintOptions";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Configurações de impressão";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.CheckedListBox chklst;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button btnConfirmaImpress;
        private System.Windows.Forms.Button btnCancelaImpress;
    }
}