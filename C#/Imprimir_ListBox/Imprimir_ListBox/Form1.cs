using System;
using System.Data;
using System.Data.SqlClient;
using System.Windows.Forms;
using System.IO;
using System.Drawing;

namespace Imprimir_ListBox
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private StringReader meuLeitor;

        private void Form1_Load(object sender, EventArgs e)
        {
            string[] nomes = new string[12];

            nomes[0] = "Macoratti";
            nomes[1] = "Jefferson";
            nomes[2] = "Janice";
            nomes[3] = "Jessica";
            nomes[4] = "Miriam";
            nomes[5] = "Marcia";
            nomes[6] = "Irene";
            nomes[7] = "Yuri";
            nomes[8] = "Bianca";
            nomes[9] = "Igor";
            nomes[10] = "Larissa";
            nomes[11] = "Giovana";

            lbDados.Items.AddRange(nomes);
        }

        private void btnCarregarDados_Click(object sender, EventArgs e)
        {
            try
            {
                SqlConnection conn = new SqlConnection(@"Data Source=.\SQLEXPRESS;Initial Catalog=Northwind;Integrated Security=True");
                conn.Open();
                DataSet ds = new DataSet();
                SqlDataAdapter adapter = new SqlDataAdapter("SELECT ProductId, ProductName from Products", conn);
                adapter.Fill(ds, "Products");
                lbDados.ValueMember = "ProductId";
                lbDados.DisplayMember = "ProductName";
                lbDados.DataSource = ds.Tables["Products"];
            }
            catch (Exception ex)
            {
                MessageBox.Show("Erro " + ex.Message, "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }

        private void pd1_PrintPage(object sender, System.Drawing.Printing.PrintPageEventArgs e)
        {
            //define as variáveis para controlar as linhas, o posicionamento e a caneta e cor usada
            float linhasPorPagina = 0;
            float yPosicao = 0;
            int contador = 0;
            float MargemEsquerda = e.MarginBounds.Left;
            float MargemTopo = e.MarginBounds.Top;
            string linha = null;

            // define a fonte e a pena e sua cor
            Font FonteImpressao = this.lbDados.Font;
            SolidBrush minhaPena = new SolidBrush(Color.Black);
         
            // Define o numero de linhas por pagina usando MarginBounds.
            linhasPorPagina = e.MarginBounds.Height / FonteImpressao.GetHeight(e.Graphics);

            // Percorre a string usando o StringReadere imprime cada linha
            while (contador < linhasPorPagina && ((linha = meuLeitor.ReadLine()) != null))
           {
                // calcula a posição da proxima linha com base na
                // altura da fonte de acordo com o dispositivo de impressão
                yPosicao = MargemTopo + (contador * FonteImpressao.GetHeight(e.Graphics));
                // desenha a proxim alinha no controle 
                e.Graphics.DrawString(linha, FonteImpressao, minhaPena, MargemEsquerda, yPosicao, new StringFormat());
                contador++;
            }

            // Se existe mais linhas imprime outra pagina
            if (linha != null)
                e.HasMorePages = true;
            else
                e.HasMorePages = false;
                minhaPena.Dispose();
       }

        private void btnImprimir_Click(object sender, EventArgs e)
        {
            printDialog1.Document = pd1;
            string strTexto = "";

            if (chkBD.Checked)
            {
                for (int i = 0; i < lbDados.Items.Count-1; i++)
                {
                        DataRowView drv = (DataRowView)lbDados.Items[i];
                        String elemento = drv["ProductName"].ToString();
                        strTexto = strTexto + elemento.ToString() + "\n";
                }
            }
            else
            {
                foreach (object x in lbDados.Items)
                {
                        strTexto = strTexto + x.ToString() + "\n";
                }
            }
         
            meuLeitor = new StringReader(strTexto);

            if (printDialog1.ShowDialog() == DialogResult.OK)
            {
                 this.pd1.Print();
            }
        }

        private void chkBD_CheckedChanged(object sender, EventArgs e)
        {

            btnCarregarDados.Enabled = chkBD.Checked;
        }
    }
}
