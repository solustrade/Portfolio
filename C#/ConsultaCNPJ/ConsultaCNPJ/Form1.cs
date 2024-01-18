using Newtonsoft.Json;
using Newtonsoft.Json.Linq;

namespace ConsultaCNPJ {
  public partial class Form1 : Form {
    public Form1() {
      InitializeComponent();
    }

    private void button1_Click(object sender, EventArgs e) {
      textBox1.Clear();
      edNome.Clear();
      edEndereco.Clear();

      CNPJBean.Root? cnpj = new CNPJBean.Root();

      JObject json = Utils.ConsultaCNPJ();
      string str = JsonConvert.SerializeObject(json);

      foreach (var item in json) {
        textBox1.Text += item + "\r\n";
      }

      cnpj = JsonConvert.DeserializeObject<CNPJBean.Root>(str);

      edNome.Text = cnpj.company.name;
      edEndereco.Text = cnpj.address.street + ", " + cnpj.address.number + ", " + cnpj.address.district + " - CEP: " + cnpj.address.zip + " - " + cnpj.address.city + " / " + cnpj.address.state;
    }
  }
}