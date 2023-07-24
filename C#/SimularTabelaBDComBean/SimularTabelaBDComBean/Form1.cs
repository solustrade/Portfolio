using SimularTabelaBDComBean.Bean;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Windows.Forms;

namespace SimularTabelaBDComBean
{
    public partial class Form1 : Form
    {
        List<OrigemBean> origemList = new List<OrigemBean>();

        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            bsOrigem.DataSource = origemList;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            int iteracao = 2;

            for (int i = 1; i <= 10; i++)
            {
                for (int ii = 1; ii <= iteracao; ii++)
                {
                    OrigemBean origem = new OrigemBean();

                    origem.Codigo = i;
                    origem.Descricao = "Descrição " + i.ToString();
                    origem.Valor1 = i * 10;
                    origem.Valor2 = i * 11;

                    origemList.Add(origem);
                }
            }

            dataGridView1.DataSource = origemList;

            //bsOrigem.DataSource = origemList.ToArray();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            List<TabelaBean> tabelaBeanList = new List<TabelaBean>();

            int existeRegistro = 0;

            foreach (OrigemBean item in origemList)
            {
                TabelaBean tabelaBean = new TabelaBean();

                foreach (TabelaBean item1 in tabelaBeanList.Where(t => t.Codigo == item.Codigo))
                {
                    existeRegistro++;

                    item1.Valor1 += item.Valor1;
                    item1.Valor2 += item.Valor2;
                }

                if (existeRegistro == 0)
                {
                    tabelaBean.Codigo = item.Codigo;
                    tabelaBean.Descricao = item.Descricao;
                    tabelaBean.Valor1 = item.Valor1;
                    tabelaBean.Valor2 = item.Valor2;

                    tabelaBeanList.Add(tabelaBean);
                }

                existeRegistro = 0;
            }

            dataGridView2.DataSource = tabelaBeanList;
        }
    }
}
