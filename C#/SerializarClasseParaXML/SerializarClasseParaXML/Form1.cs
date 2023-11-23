using System.Xml;
using Twilio.TwiML;

//<? xml version = "1.0" encoding = "utf-8" ?>
//< soap12 : Envelope xmlns: xsi = "http://www.w3.org/2001/XMLSchema-instance" xmlns: xsd = "http://www.w3.org/2001/XMLSchema" xmlns: soap12 = "http://www.w3.org/2003/05/soap-envelope" >
//  < soap12:Body >
//    < nfeIntegracaoContab xmlns = "http://www.portalfiscal.inf.br/nfe/wsdl/NFeIntegracao" >
//      < nfeDadosMsgDownload ></ nfeDadosMsgDownload >
//    </ nfeIntegracaoContab >
//  </ soap12:Body >
//</ soap12:Envelope >


namespace SerializarClasseParaXML
{
  public partial class Form1 : Form
  {
    private object? c;

    public Form1()
    {
      InitializeComponent();
    }

    private void btSerializar_Click(object sender, EventArgs e)
    {

      edXML.Text = ConverteXmlEmString();
    }

    private string ConverteXmlEmString()
    {
      if (rbConsNfeDest.Checked)
      {
        c = new ConsultaNFe.TConsNFeDest();
      } else if (rbConsSitNfe.Checked)
      {
        c = new ConsSitNfe.TConsSitNFe();
      } else if (rbDistNfeRS.Checked)
      {
        c = new TDistNFeRS();
      }

      using (TextWriter writer = new Utf8StringWriter())
      {
        using (XmlWriter xmlWriter = XmlWriter.Create(writer))
        {
          System.Xml.Serialization.XmlSerializer x = new System.Xml.Serialization.XmlSerializer(c.GetType());

          //x.Serialize(serialisedXML, c);
          x.Serialize(xmlWriter, c);
        }

        return writer.ToString();
      }
    }
  }
}