using System;
using System.Collections;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Net.WebRequestMethods;

namespace ListarPastasEmList
{
    public partial class Form1 : Form
    {
        string caminho = @"C:\Inova\NFE\NFE_Protocolo\Emissao_Propria\NFE_202211\";
        List<string> pastas = new List<string>();
        List<string> arquivos = new List<string>();
        List<string> resultList = new List<string>();

        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
            pastas.Clear();

            foreach (string item in Directory.GetDirectories(caminho))
            {
                listBox1.Items.Add(item);
                pastas.Add(item);
            }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            listBox1.Items.Clear();
            arquivos.Clear();
            resultList.Clear();

            if (pastas != null)
            {
                foreach (string item in pastas)
                {

                    //Marca o diretório a ser listado
                    DirectoryInfo diretorio = new DirectoryInfo(item);

                    //Executa função GetFile(Lista os arquivos desejados de acordo com o parametro)
                    FileInfo[] Arquivos = diretorio.GetFiles("*.*"); //"*.xml"

                    //Começamos a listar os arquivos
                    foreach (FileInfo fileinfo in Arquivos)
                    {
                        arquivos.Add((string)fileinfo.Name /*FullName*/);
                    }
                }

                //Utilizando expressão regular para eliminar itens da lista.
                //Nos testes, a parte \.xml foi obrigatória.
                var myRegex = new Regex(@"^.*nfe_sign\.xml$");

                resultList = arquivos.Where(a => !myRegex.IsMatch(a)).ToList();

                foreach (var item in resultList)
                {
                    listBox1.Items.Add(item);
                }
            }
        }
    }
}
