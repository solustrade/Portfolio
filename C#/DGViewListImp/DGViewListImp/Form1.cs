using iTextSharp.text;
using iTextSharp.text.pdf;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Drawing.Printing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml.Linq;

namespace DGViewListImp
{
  public partial class Form1 : Form
  {
    public Form1()
    {
      InitializeComponent();
    }

    private void button1_Click(object sender, EventArgs e)
    {
      List<Entidade> listaEntidade = new List<Entidade>();

      for (int item = 1; item < 20; item++)
      {
        Entidade entidade = new Entidade();

        entidade.Id = item;
        entidade.Descricao = "TESTE 0" + item.ToString();
        entidade.Preco = item * 100.01;

        listaEntidade.Add(entidade);
      }

      this.grLista.DataSource = listaEntidade;
    }

    private void button2_Click(object sender, EventArgs e)
    {
      //printDGV.Print_DataGridView(grLista, "Listagem do DataGridView");

      if (grLista.Rows.Count > 0)
      {
        SaveFileDialog sfd = new SaveFileDialog();
        sfd.Filter = "PDF (*.pdf)|*.pdf";
        sfd.FileName = "Output.pdf";
        bool fileError = false;
        if (sfd.ShowDialog() == DialogResult.OK)
        {
          if (File.Exists(sfd.FileName))
          {
            try
            {
              File.Delete(sfd.FileName);
            }
            catch (IOException ex)
            {
              fileError = true;
              MessageBox.Show("It wasn't possible to write the data to the disk." + ex.Message);
            }
          }
          if (!fileError)
          {
            try
            {
              PdfPTable pdfTable = new PdfPTable(grLista.Columns.Count);
              pdfTable.DefaultCell.Padding = 3;
              pdfTable.WidthPercentage = 100;
              pdfTable.HorizontalAlignment = Element.ALIGN_LEFT;

              foreach (DataGridViewColumn column in grLista.Columns)
              {
                PdfPCell cell = new PdfPCell(new Phrase(column.HeaderText));
                pdfTable.AddCell(cell);
              }

              foreach (DataGridViewRow row in grLista.Rows)
              {
                foreach (DataGridViewCell cell in row.Cells)
                {
                  pdfTable.AddCell(cell.Value.ToString());
                }
              }

              using (FileStream stream = new FileStream(sfd.FileName, FileMode.Create))
              {
                Document pdfDoc = new Document(PageSize.A4, 10f, 20f, 20f, 10f);
                PdfWriter.GetInstance(pdfDoc, stream);
                pdfDoc.Open();
                pdfDoc.Add(pdfTable);
                pdfDoc.Close();
                stream.Close();
              }

              MessageBox.Show("Data Exported Successfully !!!", "Info");
            }
            catch (Exception ex)
            {
              MessageBox.Show("Error :" + ex.Message);
            }
          }
        }
      }
      else
      {
        MessageBox.Show("No Record To Export !!!", "Info");
      }
    }
  }
}
