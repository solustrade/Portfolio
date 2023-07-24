namespace SimularTabelaBDComBean
{
    partial class Form1
    {
        /// <summary>
        /// Variável de designer necessária.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpar os recursos que estão sendo usados.
        /// </summary>
        /// <param name="disposing">true se for necessário descartar os recursos gerenciados; caso contrário, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código gerado pelo Windows Form Designer

        /// <summary>
        /// Método necessário para suporte ao Designer - não modifique 
        /// o conteúdo deste método com o editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.button1 = new System.Windows.Forms.Button();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.bsOrigem = new System.Windows.Forms.BindingSource(this.components);
            this.Codigo = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Descricao = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Valor1 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Valor2 = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.button2 = new System.Windows.Forms.Button();
            this.dataGridView2 = new System.Windows.Forms.DataGridView();
            this.CodigoTabela = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.DescricaoTabela = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Valor1Tabela = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Valor2Tabela = new System.Windows.Forms.DataGridViewTextBoxColumn();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.bsOrigem)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).BeginInit();
            this.SuspendLayout();
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(12, 12);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(149, 23);
            this.button1.TabIndex = 0;
            this.button1.Text = "Carrega dados na origem";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // dataGridView1
            // 
            this.dataGridView1.AutoGenerateColumns = false;
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.Codigo,
            this.Descricao,
            this.Valor1,
            this.Valor2});
            this.dataGridView1.DataSource = this.bsOrigem;
            this.dataGridView1.Location = new System.Drawing.Point(12, 41);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.Size = new System.Drawing.Size(776, 150);
            this.dataGridView1.TabIndex = 1;
            // 
            // Codigo
            // 
            this.Codigo.DataPropertyName = "Codigo";
            this.Codigo.HeaderText = "Código";
            this.Codigo.Name = "Codigo";
            this.Codigo.ReadOnly = true;
            // 
            // Descricao
            // 
            this.Descricao.DataPropertyName = "Descricao";
            this.Descricao.HeaderText = "Descrição";
            this.Descricao.Name = "Descricao";
            this.Descricao.ReadOnly = true;
            // 
            // Valor1
            // 
            this.Valor1.DataPropertyName = "Valor1";
            this.Valor1.HeaderText = "Valor 1";
            this.Valor1.Name = "Valor1";
            this.Valor1.ReadOnly = true;
            // 
            // Valor2
            // 
            this.Valor2.DataPropertyName = "Valor2";
            this.Valor2.HeaderText = "Valor 2";
            this.Valor2.Name = "Valor2";
            this.Valor2.ReadOnly = true;
            // 
            // button2
            // 
            this.button2.Location = new System.Drawing.Point(12, 197);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(149, 23);
            this.button2.TabIndex = 2;
            this.button2.Text = "Carregar dados tabela";
            this.button2.UseVisualStyleBackColor = true;
            this.button2.Click += new System.EventHandler(this.button2_Click);
            // 
            // dataGridView2
            // 
            this.dataGridView2.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView2.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.CodigoTabela,
            this.DescricaoTabela,
            this.Valor1Tabela,
            this.Valor2Tabela});
            this.dataGridView2.Location = new System.Drawing.Point(12, 226);
            this.dataGridView2.Name = "dataGridView2";
            this.dataGridView2.Size = new System.Drawing.Size(776, 150);
            this.dataGridView2.TabIndex = 3;
            // 
            // CodigoTabela
            // 
            this.CodigoTabela.DataPropertyName = "Codigo";
            this.CodigoTabela.HeaderText = "Código";
            this.CodigoTabela.Name = "CodigoTabela";
            this.CodigoTabela.ReadOnly = true;
            // 
            // DescricaoTabela
            // 
            this.DescricaoTabela.DataPropertyName = "Descricao";
            this.DescricaoTabela.HeaderText = "Descricao";
            this.DescricaoTabela.Name = "DescricaoTabela";
            this.DescricaoTabela.ReadOnly = true;
            // 
            // Valor1Tabela
            // 
            this.Valor1Tabela.DataPropertyName = "Valor1";
            this.Valor1Tabela.HeaderText = "Valor 1";
            this.Valor1Tabela.Name = "Valor1Tabela";
            this.Valor1Tabela.ReadOnly = true;
            // 
            // Valor2Tabela
            // 
            this.Valor2Tabela.DataPropertyName = "Valor2";
            this.Valor2Tabela.HeaderText = "Valor 2";
            this.Valor2Tabela.Name = "Valor2Tabela";
            this.Valor2Tabela.ReadOnly = true;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(800, 450);
            this.Controls.Add(this.dataGridView2);
            this.Controls.Add(this.button2);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.button1);
            this.Name = "Form1";
            this.Text = "Form1";
            this.Load += new System.EventHandler(this.Form1_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.bsOrigem)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView2)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.BindingSource bsOrigem;
        private System.Windows.Forms.DataGridViewTextBoxColumn Codigo;
        private System.Windows.Forms.DataGridViewTextBoxColumn Descricao;
        private System.Windows.Forms.DataGridViewTextBoxColumn Valor1;
        private System.Windows.Forms.DataGridViewTextBoxColumn Valor2;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.DataGridView dataGridView2;
        private System.Windows.Forms.DataGridViewTextBoxColumn CodigoTabela;
        private System.Windows.Forms.DataGridViewTextBoxColumn DescricaoTabela;
        private System.Windows.Forms.DataGridViewTextBoxColumn Valor1Tabela;
        private System.Windows.Forms.DataGridViewTextBoxColumn Valor2Tabela;
    }
}

