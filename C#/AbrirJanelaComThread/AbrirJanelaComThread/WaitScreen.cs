using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace AbrirJanelaComThread
{
    public static class WaitScreen
    {
        private static Thread threadWaitScreen;
        private static WaitScreenMessage waitScreenMessage;
        private static WaitScreenMessage openWindow = new WaitScreenMessage();

        //private static BackgroundWorker backgroundWorker = new BackgroundWorker();

        public static void OpenWaitScreen()
        {
            //backgroundWorker.WorkerSupportsCancellation = true;
            //backgroundWorker.DoWork += backgroundWorker_DoWork;

            //if (backgroundWorker.IsBusy)
            //    backgroundWorker.CancelAsync();

            //while (backgroundWorker.IsBusy)
            //    Application.DoEvents();

            //backgroundWorker.RunWorkerAsync();

            threadWaitScreen = new Thread(ExecuteThread);

            // ApartmentState: MTA - Multi Threading Apartment
            //                 STA - Single Threading Apartment
            //                 unknow - Não definida
            threadWaitScreen.SetApartmentState(ApartmentState.STA);
            threadWaitScreen.Start();
        }

        public static void CloseWaitScreen()
        {
            threadWaitScreen.Abort();
            threadWaitScreen = null;

            openWindow.Dispose();
        }

        private static void ExecuteThread()
        {
            waitScreenMessage = new WaitScreenMessage();
            waitScreenMessage.FormBorderStyle = FormBorderStyle.None;

            // ShowDialog() abre a janela em modo "Modal".
            // Se quiser abrir de forma não "Modal", utilize Show()
            waitScreenMessage.ShowDialog();
            waitScreenMessage.BringToFront();

            openWindow = waitScreenMessage;
        }

        private static void backgroundWorker_DoWork(object sender, DoWorkEventArgs e)
        {
            //if (backgroundWorker.CancellationPending)
            //{
            //    e.Cancel = true;
            //    return;
            //}

            waitScreenMessage = new WaitScreenMessage
            {
                FormBorderStyle = FormBorderStyle.None
            };

            // ShowDialog() abre a janela em modo "Modal".
            // Se quiser abrir de forma não "Modal", utilize Show()
            waitScreenMessage.ShowDialog();

            waitScreenMessage.BringToFront();

            openWindow = waitScreenMessage;
        }
    }
}
