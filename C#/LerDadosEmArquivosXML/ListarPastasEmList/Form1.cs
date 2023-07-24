using System;
using System.Collections.Generic;
using System.Data;
using System.IO;
using System.Linq;
using System.Text.RegularExpressions;
using System.Windows.Forms;
using System.Xml;
using System.Xml.Linq;
using System.Xml.Serialization;
using static ListarPastasEmList.Bean.BeanNfe;
using static System.Collections.Specialized.BitVector32;

namespace ListarPastasEmList
{
  public partial class Form1 : Form
  {
    //string caminho = @"C:\Users\nova\Downloads\C# - XML\XML";
    //string caminho = @"D:\Projetos\Desenvolvimento\.doc\C#\SolusStockAudit\Josildo\XML\112022";
    string caminho = @"D:\Projetos\Desenvolvimento\.doc\C#\SolusStockAudit\Josildo\XML\Teste";
    List<string> pastas = new List<string>();
    List<string> arquivos = new List<string>();
    List<string> resultList = new List<string>();
    List<string> emitenteList = new List<string>();
    List<ProdutosNfe> listProdutos = new List<ProdutosNfe>();

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
        pastas.Add(item);
        listBox1.Items.Add(item);
      }

      if (pastas == null || pastas.Count == 0)
      {
        pastas.Add(caminho);
        listBox1.Items.Add(caminho);
      }
    }

    private void button2_Click(object sender, EventArgs e)
    {
      listBox1.Items.Clear();
      arquivos.Clear();
      resultList.Clear();

      foreach (string item in pastas)
      {

        //Marca o diretório a ser listado
        DirectoryInfo diretorio = new DirectoryInfo(item);

        //Executa função GetFile(Lista os arquivos desejados de acordo com o parametro)
        FileInfo[] Arquivos = diretorio.GetFiles("*.xml"); //"*.*"

        //Começamos a listar os arquivos
        foreach (FileInfo fileinfo in Arquivos)
        {
          arquivos.Add((string)fileinfo.FullName /*Name*/);
        }
      }

      //Utilizando expressão regular para eliminar itens da lista.
      //Nos testes, a parte \.xml foi obrigatória.
      //var myRegex = new Regex(@"^.*nfe_sign\.xml$");

      //resultList = arquivos.Where(a => !myRegex.IsMatch(a)).ToList();
      resultList = arquivos.ToList();

      foreach (var item in resultList)
      {
        listBox1.Items.Add(item);
      }
    }

    private void button3_Click(object sender, EventArgs e)
    {
      listBox1.Items.Clear();
      emitenteList.Clear();
      listProdutos.Clear();

      foreach (var item in resultList)
      {
        // <nfeProc xmlns="http://www.portalfiscal.inf.br/nfe" versao="4.00">
        XNamespace name = "http://www.portalfiscal.inf.br/nfe";

        var doc = XDocument.Load(item);

        //List<ProdutosNfe> listProdutos = new List<ProdutosNfe>();
        var produtos = from i in doc.Descendants(name + "prod")
                       select i;

        foreach (XElement prod in produtos)
        {
          listProdutos.Add(new ProdutosNfe
          {
            Codigo = (string)prod.Element(name + "cProd"),
            Descricao = (string)prod.Element(name + "xProd"),
            ValorUnitario = (string)prod.Element(name + "vUnCom"),
            Quantidade = (string)prod.Element(name + "qCom"),
            ValorTotal = (string)prod.Element(name + "vProd")
          });
        }

        //XmlSerializer serializer = new XmlSerializer(typeof(NfeProc));

        //using (StringReader reader = new StringReader(item))
        //{
        //    var /*NfeProc*/ nfe = (NfeProc)serializer.Deserialize(reader);
        //}


        //    //XmlSerializer serializer = new XmlSerializer(typeof(TNFe));
        //XmlSerializer serializer = new XmlSerializer(typeof(nfeProc));

        //using (StreamReader reader = new StreamReader(item))
        //{
        //    //TNFe nfe = (TNFe)serializer.Deserialize(reader);
        //    nfeProc nfe = (nfeProc)serializer.Deserialize(reader);

        //    nfeProcNFeInfNFeEmit emitente = (nfeProcNFeInfNFeEmit)serializer.Deserialize(reader);
        //}

        //string cnpj = nfe.infNFe.emit.Item. emit.CNPJ.ToString();

        //foreach (var item in nfe.NFe.infNFe.det)
        //{

        //}

        //nfeProcNFeInfNFeEmit emitente; //= new nfeProcNFeInfNFeEmit();


        //            class Student { public int id; public string name,string section}

        //List<Student> studentLst = dox.Descendants("Student").Select(d =>
        //new Student
        //{
        //    id = d.Element("Id").Value,
        //    name = d.Element("Name").Value,
        //    section = d.Element("Section").Value
        //}).ToList();
        //}




        //XmlDocument document = new XmlDocument();
        //document.Load(item);


        //XmlNodeList emitenteNode = document.SelectNodes("/nfeProc"); // /NFe/infNFe/emit");
        //XmlNode emitenteNode = document.SelectSingleNode("/emit");
        //XmlNode emitenteNode = document.SelectSingleNode("//emit");

        //foreach (XmlNode node in emitenteNode)
        //{
        //    emitenteList.Add(node["CNPJ"].InnerText);
        //}

        //emitenteList.Add(emitenteNode["CNPJ"].InnerText);
      }
    }
  }
}
