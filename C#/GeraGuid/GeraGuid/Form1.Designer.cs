namespace GeraGuid
{
  partial class Form1
  {
    /// <summary>
    ///  Required designer variable.
    /// </summary>
    private System.ComponentModel.IContainer components = null;

    /// <summary>
    ///  Clean up any resources being used.
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
    ///  Required method for Designer support - do not modify
    ///  the contents of this method with the code editor.
    /// </summary>
    private void InitializeComponent()
    {
      btGerar = new Button();
      edGuid = new TextBox();
      label1 = new Label();
      SuspendLayout();
      // 
      // btGerar
      // 
      btGerar.AutoSize = true;
      btGerar.Location = new Point(12, 12);
      btGerar.Name = "btGerar";
      btGerar.Size = new Size(94, 41);
      btGerar.TabIndex = 1;
      btGerar.Text = "Gerar";
      btGerar.UseVisualStyleBackColor = true;
      btGerar.Click += btGerar_Click;
      // 
      // edGuid
      // 
      edGuid.Font = new Font("Segoe UI Light", 13.8F, FontStyle.Regular, GraphicsUnit.Point);
      edGuid.Location = new Point(27, 114);
      edGuid.Name = "edGuid";
      edGuid.Size = new Size(938, 38);
      edGuid.TabIndex = 2;
      // 
      // label1
      // 
      label1.AutoSize = true;
      label1.Location = new Point(27, 80);
      label1.Name = "label1";
      label1.Size = new Size(71, 31);
      label1.TabIndex = 3;
      label1.Text = "Guid:";
      // 
      // Form1
      // 
      AutoScaleDimensions = new SizeF(14F, 31F);
      AutoScaleMode = AutoScaleMode.Font;
      ClientSize = new Size(1400, 698);
      Controls.Add(label1);
      Controls.Add(edGuid);
      Controls.Add(btGerar);
      Font = new Font("Segoe UI", 13.8F, FontStyle.Bold, GraphicsUnit.Point);
      Margin = new Padding(5, 5, 5, 5);
      Name = "Form1";
      Text = "Form1";
      ResumeLayout(false);
      PerformLayout();
    }

    #endregion

    private Button btGerar;
    private TextBox edGuid;
    private Label label1;
  }
}