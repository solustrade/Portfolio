namespace SerializarClasseParaXML
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
      btSerializar = new Button();
      edXML = new TextBox();
      label2 = new Label();
      groupBox1 = new GroupBox();
      rbDistNfeRS = new RadioButton();
      rbConsSitNfe = new RadioButton();
      rbConsNfeDest = new RadioButton();
      groupBox1.SuspendLayout();
      SuspendLayout();
      // 
      // btSerializar
      // 
      btSerializar.Location = new Point(15, 170);
      btSerializar.Margin = new Padding(4, 3, 4, 3);
      btSerializar.Name = "btSerializar";
      btSerializar.Size = new Size(295, 33);
      btSerializar.TabIndex = 0;
      btSerializar.Text = "Serializar XML";
      btSerializar.UseVisualStyleBackColor = true;
      btSerializar.Click += btSerializar_Click;
      // 
      // edXML
      // 
      edXML.Font = new Font("Segoe UI", 10.2F, FontStyle.Regular, GraphicsUnit.Point);
      edXML.Location = new Point(15, 262);
      edXML.Margin = new Padding(4, 3, 4, 3);
      edXML.Multiline = true;
      edXML.Name = "edXML";
      edXML.Size = new Size(864, 413);
      edXML.TabIndex = 3;
      // 
      // label2
      // 
      label2.AutoSize = true;
      label2.Location = new Point(15, 223);
      label2.Margin = new Padding(4, 0, 4, 0);
      label2.Name = "label2";
      label2.Size = new Size(51, 23);
      label2.TabIndex = 4;
      label2.Text = "XML:";
      // 
      // groupBox1
      // 
      groupBox1.Controls.Add(rbDistNfeRS);
      groupBox1.Controls.Add(rbConsSitNfe);
      groupBox1.Controls.Add(rbConsNfeDest);
      groupBox1.Location = new Point(15, 12);
      groupBox1.Margin = new Padding(4, 3, 4, 3);
      groupBox1.Name = "groupBox1";
      groupBox1.Padding = new Padding(4, 3, 4, 3);
      groupBox1.Size = new Size(295, 139);
      groupBox1.TabIndex = 5;
      groupBox1.TabStop = false;
      groupBox1.Text = "Schema";
      // 
      // rbDistNfeRS
      // 
      rbDistNfeRS.AutoSize = true;
      rbDistNfeRS.Location = new Point(19, 95);
      rbDistNfeRS.Name = "rbDistNfeRS";
      rbDistNfeRS.Size = new Size(113, 27);
      rbDistNfeRS.TabIndex = 2;
      rbDistNfeRS.TabStop = true;
      rbDistNfeRS.Text = "DistNfeRS";
      rbDistNfeRS.UseVisualStyleBackColor = true;
      // 
      // rbConsSitNfe
      // 
      rbConsSitNfe.AutoSize = true;
      rbConsSitNfe.Location = new Point(19, 62);
      rbConsSitNfe.Name = "rbConsSitNfe";
      rbConsSitNfe.Size = new Size(120, 27);
      rbConsSitNfe.TabIndex = 1;
      rbConsSitNfe.TabStop = true;
      rbConsSitNfe.Text = "ConsSitNfe";
      rbConsSitNfe.UseVisualStyleBackColor = true;
      // 
      // rbConsNfeDest
      // 
      rbConsNfeDest.AutoSize = true;
      rbConsNfeDest.Checked = true;
      rbConsNfeDest.Location = new Point(19, 29);
      rbConsNfeDest.Name = "rbConsNfeDest";
      rbConsNfeDest.Size = new Size(134, 27);
      rbConsNfeDest.TabIndex = 0;
      rbConsNfeDest.TabStop = true;
      rbConsNfeDest.Text = "ConsNfeDest";
      rbConsNfeDest.UseVisualStyleBackColor = true;
      // 
      // Form1
      // 
      AutoScaleDimensions = new SizeF(10F, 23F);
      AutoScaleMode = AutoScaleMode.Font;
      ClientSize = new Size(898, 689);
      Controls.Add(groupBox1);
      Controls.Add(label2);
      Controls.Add(edXML);
      Controls.Add(btSerializar);
      Font = new Font("Segoe UI", 10.2F, FontStyle.Bold, GraphicsUnit.Point);
      Margin = new Padding(4, 3, 4, 3);
      Name = "Form1";
      Text = "Form1";
      groupBox1.ResumeLayout(false);
      groupBox1.PerformLayout();
      ResumeLayout(false);
      PerformLayout();
    }

    #endregion

    private Button btSerializar;
    private TextBox edXML;
    private Label label2;
    private GroupBox groupBox1;
    private RadioButton rbDistNfeRS;
    private RadioButton rbConsSitNfe;
    private RadioButton rbConsNfeDest;
  }
}