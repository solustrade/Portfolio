using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Reflection;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace EscolherPastaECarregarNoTextBox
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            //string folder = new FileInfo(Path.GetDirectoryName(Assembly.GetExecutingAssembly().Location)).ToString();

            //Define as configurações básicas do componente

            //Define rótulo
            folderBrowserDialog1.Description = "SELECIONE A PASTA QUE CONTEM OS ARQUIVOS XML";

            //Caixa de diálogo começa na pasta raiz
            //folderBrowserDialog1.RootFolder = Environment.SpecialFolder.MyComputer;

            //Caixa de diálogo começa na pasta onde é criado o EXE
            folderBrowserDialog1.SelectedPath = new FileInfo(Path.GetDirectoryName(Assembly.GetExecutingAssembly().Location)).ToString();

            folderBrowserDialog1.ShowNewFolderButton = false; //Habilita a opção para criar nova pasta

            //Abre caixa de diálogo para escolher o destino       
            if (folderBrowserDialog1.ShowDialog() == DialogResult.OK)
            {
                textBox1.Text = folderBrowserDialog1.SelectedPath.ToUpper();
            }
        }
    }
}
