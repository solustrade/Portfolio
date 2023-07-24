using System;
using System.Threading;
using System.Windows.Forms;

namespace AbrirJanelaComThread
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            gbPrincipal.Enabled = false;
            
            WaitScreen.OpenWaitScreen();
            
            Thread.Sleep(TimeSpan.FromSeconds(5));

            WaitScreen.CloseWaitScreen();

            gbPrincipal.Enabled = true;
        }
    }
}
