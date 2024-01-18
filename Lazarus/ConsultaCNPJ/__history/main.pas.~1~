unit Main;

{$mode objfpc}{$H+}

interface

uses
  Classes, SysUtils, Forms, Controls, Graphics, Dialogs, StdCtrls,
  fphttpclient, jsonparser, fpjson, IdHTTP, IdSSLOpenSSL;

type

  { TForm1 }

  TForm1 = class(TForm)
    Button1: TButton;
    Button2: TButton;
    Edit1: TEdit;
    Edit2: TEdit;
    IdHTTP1: TIdHTTP;
    Label1: TLabel;
    Label2: TLabel;
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);
  private
    procedure GetCNPJData(const ACNPJ: string; const AApiKey: string);

  public

  end;

var
  Form1: TForm1;

implementation

{$R *.lfm}

{ TForm1 }

procedure TForm1.Button1Click(Sender: TObject);
begin
  GetCNPJData('64397557000190', '7c49c380-b862-40e2-bfb5-34391a038b61-663867f8-113d-4021-83ff-948afb19866b');
end;

procedure TForm1.Button2Click(Sender: TObject);
var
  IdHTTP: TIdHTTP;
  IdSSL: TIdSSLIOHandlerSocketOpenSSL;

  Response: string;

  Data: TJSONData;
  Parser: TJSONParser;
  Obj: TJSONObject;
  Arr: TJSONArray;
  I: Integer;

  CompanyName: String;
begin
  IdHTTP := TIdHTTP.Create(nil);
  IdSSL := TIdSSLIOHandlerSocketOpenSSL.Create(nil);
  IdHTTP.IOHandler := IdSSL;
  IdHTTP.Request.ContentType := 'application/json';
  IdHTTP.Request.Accept := 'application/json';
  IdHTTP.Request.CustomHeaders.Add('Authorization: 63ca986c-b75c-46c3-bec6-014d3a5c4303-7306defb-0b4c-474c-b703-b14ff392297b');

  Response := IdHTTP.Get('https://api.cnpja.com/office/64397557000190');

  Parser := TJSONParser.Create(Response);
  Data := Parser.Parse;
  Parser.Free;

  if Data.JSONType = jtObject then
  begin
    Obj := TJSONObject(Data);
    // faça algo com o objeto JSON

    Edit1.Text := Obj.FindPath('company.name').AsString;
    Edit2.Text := obj.FindPath('address.street').AsString + ', ' +
    obj.FindPath('address.number').AsString + ', ' +
    obj.FindPath('address.district').AsString + ' - CEP: ' +
    Copy(obj.FindPath('address.zip').AsString, 1, 5) + '-' +
    Copy(obj.FindPath('address.zip').AsString, 6, 3) + ' - ' +
    obj.FindPath('address.city').AsString + ' / ' +
    obj.FindPath('address.state').AsString;

    //CompanyName := Obj.FindPath('company.name').AsString;
    //ShowMessage('Nome da empresa: ' + CompanyName);
  end
  else if Data.JSONType = jtArray then
  begin
    Arr := TJSONArray(Data);
    for I := 0 to Arr.Count - 1 do
    begin
      // faça algo com cada elemento do array JSON
    end;
  end;
  Data.Free;
end;

procedure TForm1.GetCNPJData(const ACNPJ: string; const AApiKey: string);
var
  HTTPClient: TFPHTTPClient;
  JSONParser: TJSONParser;
  JSONData: TJSONData;
  JSONObject: TJSONObject;
  Response: String;
  URL: String;
  CompanyName: String;
begin
  // Cria uma instância do cliente HTTP
  HTTPClient := TFPHTTPClient.Create(nil);

  try
    // Substitui {cnpj} na URL pelo valor real do CNPJ
    URL := 'https://api.cnpja.com/office/' + ACNPJ;

    // Configura o cabeçalho de autorização com a chave da API
    HTTPClient.AddHeader('Authorization', AApiKey);

    try
      // Executa a solicitação GET
      Response := HTTPClient.Get(URL);

      // Analisa os dados JSON da resposta
      JSONParser := TJSONParser.Create(Response);
      try
        JSONData := JSONParser.Parse;
        try
          // Aqui você pode acessar JSONData que agora é uma representação da resposta JSON
          // Você precisará converter para a classe apropriada como TJSONObject ou TJSONArray
          // dependendo da estrutura do JSON para trabalhar com os dados.
          // Por exemplo, para acessar o nome da empresa:
          if JSONData.JSONType = jtObject then
          begin
            JSONObject := TJSONObject(JSONData);
            // Acessa o objeto 'company' e então o campo 'name'
            CompanyName := JSONObject.FindPath('company.name').AsString;
            ShowMessage('Nome da empresa: ' + CompanyName);
          end;
        finally
          JSONData.Free; // Sempre libere os dados JSON após o uso
        end;
      finally
        JSONParser.Free; // Sempre libere o analisador após o uso
      end;
    except
      on E: Exception do
        ShowMessage('Falha ao obter dados do CNPJ: ' + E.Message);
    end;

  finally
    HTTPClient.Free; // Sempre libere o cliente após o uso
  end;
end;

end.

