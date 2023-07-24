using System;
using System.Collections.Generic;
using System.Windows.Forms;

namespace DGViewListImp
{
    public partial class PrintOptions : Form
    {
        public PrintOptions(List<string> availableFields)
        {
            InitializeComponent();

            //Verifica quais os campos disponíveis
            foreach (string field in availableFields)
                chklst.Items.Add(field, true);
        }

        public List<string> GetSelectedColumns()
        {
            //"Guarda" os itens seleccionados na ListBox
            List<string> lst = new List<string>();
            foreach (object item in chklst.CheckedItems)
                lst.Add(item.ToString());
            return lst;
        }

        private void btnCancelaImpress_Click(object sender, EventArgs e)
        {
            // Fecha a caixa de diálogo referente à impressão
            this.DialogResult = DialogResult.Cancel;
            this.Close();
        }

        private void btnConfirmaImpress_Click(object sender, EventArgs e)
        {
            // Abre a caixa de diálogo referente à impressão
            this.DialogResult = DialogResult.OK;
            this.Close();
        }
    }
}
