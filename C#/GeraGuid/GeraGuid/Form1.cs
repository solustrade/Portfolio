namespace GeraGuid
{
  public partial class Form1 : Form
  {
    public Form1()
    {
      InitializeComponent();
    }

    private void btGerar_Click(object sender, EventArgs e)
    {
      edGuid.Clear();

      Guid g = Guid.NewGuid();
      edGuid.Text = g.ToString();
    }
  }
}