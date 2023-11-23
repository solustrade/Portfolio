using System;

namespace CalculaChaveAcessoNF
{
  internal class Program
  {
    static void Main(string[] args)
    {
      ChaveAcesso ca = new ChaveAcesso("23", "23", "11", "04277111000109", "55", "001", "000011510", "1", "00011511");

      string chave = ca.RetornarChave();

      Console.WriteLine("Chave de acesso: " + chave);
    }
  }
}
