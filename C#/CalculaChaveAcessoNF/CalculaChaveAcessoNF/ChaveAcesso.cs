using System;
using System.Text;

namespace CalculaChaveAcessoNF
{
  public class ChaveAcesso
  {
    // Atributos da classe
    private string uf; // Código da UF do emitente
    private string ano; // Ano de emissão da NF-e
    private string mes; // Mês de emissão da NF-e
    private string cnpj; // CNPJ do emitente
    private string modelo; // Modelo da NF-e
    private string serie; // Série da NF-e
    private string numero; // Número da NF-e
    private string tipo; // Tipo de emissão da NF-e
    private string codigo; // Código numérico aleatório da NF-e
    private string dv; // Dígito verificador da chave de acesso

    // Construtor da classe
    public ChaveAcesso(string uf, string ano, string mes, string cnpj, string modelo, string serie, string numero, string tipo, string codigo)
    {
      this.uf = uf;
      this.ano = ano;
      this.mes = mes;
      this.cnpj = cnpj;
      this.modelo = modelo;
      this.serie = serie;
      this.numero = numero;
      this.tipo = tipo;
      this.codigo = codigo;
      this.dv = CalcularDV(); // Calcula o dígito verificador ao criar o objeto
    }

    // Método para calcular o dígito verificador da chave de acesso
    private string CalcularDV()
    {
      // Concatena os campos da chave de acesso sem o dígito verificador
      string chave = uf + ano + mes + cnpj + modelo + serie + numero + tipo + codigo;

      // Aplica o algoritmo do módulo 11 para obter o dígito verificador
      int soma = 0;
      int peso = 2;
      for (int i = chave.Length - 1; i >= 0; i--)
      {
        int digito = int.Parse(chave[i].ToString());
        soma += digito * peso;
        peso++;
        if (peso > 9)
        {
          peso = 2;
        }
      }
      int resto = soma % 11;
      int dv;
      if (resto == 0 || resto == 1)
      {
        dv = 0;
      } else
      {
        dv = 11 - resto;
      }

      // Retorna o dígito verificador como uma string
      return dv.ToString();
    }

    // Método para retornar a chave de acesso completa
    public string RetornarChave()
    {
      // Concatena os campos da chave de acesso com o dígito verificador
      string chave = uf + ano + mes + cnpj + modelo + serie + numero + tipo + codigo + dv;

      // Retorna a chave de acesso como uma string
      return chave;
    }
  }
}
