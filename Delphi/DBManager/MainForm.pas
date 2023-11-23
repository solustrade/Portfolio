unit MainForm;

interface

uses
  Winapi.Windows, Winapi.Messages, System.SysUtils, System.Variants, System.Classes, Vcl.Graphics,
  Vcl.Controls, Vcl.Forms, Vcl.Dialogs, sSkinManager, acTitleBar, Vcl.ExtCtrls,
  sPanel, Vcl.StdCtrls, sComboBox, sLabel, sButton, System.IniFiles, Vcl.Buttons,
  Vcl.Mask, sMaskEdit, sCustomComboEdit;

type
  TfrMainForm = class(TForm)
    alsm1: TsSkinManager;
    atb1: TsTitleBar;
    pnChooseDB: TsPanel;
    sLabel1: TsLabel;
    cbbDataBase: TsComboBox;
    mmoSQL: TMemo;
    pnButtons: TsPanel;
    btLoadScript: TsButton;
    btExecScript: TsButton;
    odScript: TOpenDialog;
    sLabel2: TsLabel;
    cbbServidor: TsComboBox;
    btCancela: TsButton;
    procedure FormClose(Sender: TObject; var Action: TCloseAction);
    procedure FormKeyPress(Sender: TObject; var Key: Char);
    procedure FormShow(Sender: TObject);
    procedure btLoadScriptClick(Sender: TObject);
    procedure btExecScriptClick(Sender: TObject);
    procedure cbbServidorChange(Sender: TObject);
    procedure cbbDataBaseChange(Sender: TObject);
    procedure btCancelaClick(Sender: TObject);
  private
    procedure MostraMensagem(iNumero: Integer);
  public
    { Public declarations }
  end;

var
  frMainForm: TfrMainForm;

implementation

uses
    Funcoes, ModuloDeDados;

{$R *.dfm}

procedure TfrMainForm.btCancelaClick(Sender: TObject);
begin
    FormShow(nil);
end;

procedure TfrMainForm.btExecScriptClick(Sender: TObject);
begin
    if (cbbServidor.ItemIndex = -1) then
    begin
        MostraMensagem(0);

        Exit;
    end;

    if (cbbDataBase.ItemIndex = -1) then
    begin
        MostraMensagem(1);

        Exit;
    end;

    if (mmoSQL.Lines.Text = '') then
    begin
        MostraMensagem(2);

        Exit;
    end;


    try
        if (cbbServidor.ItemIndex = 0) then
        begin
            dmBancos.qpFirebird.Clear;

            dmBancos.qpFirebird.Script.Clear;
            dmBancos.qpFirebird.LoadFromFile(odScript.FileName);

            dmBancos.qpFirebird.Execute;
        end
        else if (cbbServidor.ItemIndex = 1) then
        begin
            dmBancos.qrMySQL.Close;

            dmBancos.qrMySQL.SQL.Clear;
            dmBancos.qrMySQL.SQL.Text := mmoSQL.Lines.Text;

            dmBancos.qrMySQL.ExecSQL;
        end
        else if (cbbServidor.ItemIndex = 2) then
        begin
            dmBancos.qrSQLite.Close;

            dmBancos.qrSQLite.SQL.Clear;
            dmBancos.qrSQLite.SQL.Text := mmoSQL.Lines.Text;

            dmBancos.qrSQLite.ExecSQL;
        end;

        Application.MessageBox('A OPERAÇÃO DE ATUALIZAÇÃO DO BANCO DE DADOS OBTEVE ÊXITO.',
          'SUCESSO!', MB_OK + MB_ICONINFORMATION);
    except
        on E : Exception do
        begin
            ShowMessage('Exception class name = '+E.ClassName + Chr(13) +
                        'Exception message = '+E.Message);
        end;
    end;

    mmoSQL.clear;
    btExecScript.Enabled := False;
end;

procedure TfrMainForm.btLoadScriptClick(Sender: TObject);
begin
    if (cbbServidor.ItemIndex = -1) then
    begin
        MostraMensagem(0);

        Exit;
    end;

    if (cbbDataBase.ItemIndex = -1) then
    begin
        MostraMensagem(1);

        Exit;
    end;

    if (odScript.Execute) then
    begin
        mmoSQL.Lines.LoadFromFile(odScript.FileName);
    end;

    btExecScript.Enabled := True;
end;

procedure TfrMainForm.cbbDataBaseChange(Sender: TObject);
begin
    dmBancos.conConectaFirebird.Disconnect;
    dmBancos.conConectaMySQL.Disconnect;
    dmBancos.conConectaSQLite.Disconnect;

    if (cbbServidor.ItemIndex = 0) then
    begin
        if (cbbDataBase.ItemIndex = 0) then
            dmBancos.conConectaFirebird.Database := 'C:\Estacionamento\data\SOLUSPARK.FDB'
        else if (cbbDataBase.ItemIndex = 1) then
            dmBancos.conConectaFirebird.Database := 'C:\Rodeo\data\RODEODB.FDB'
        else if (cbbDataBase.ItemIndex = 2) then
        begin
            dmBancos.conConectaFirebird.LibraryLocation := 'C:\Solus FastPlay3\fbembed.dll';
            dmBancos.conConectaFirebird.Database        := 'C:\Solus FastPlay3\data\FPLAY.FDB';
        end
        else if (cbbDataBase.ItemIndex = 3) then
        begin
            dmBancos.conConectaFirebird.LibraryLocation := 'C:\SolusCob\Data\fbclient.dll';
            dmBancos.conConectaFirebird.Database        := 'C:\SolusCob\Data\DB.FDB';
        end;

        dmBancos.conConectaFirebird.Connect;
    end
    else if (cbbServidor.ItemIndex = 1) then
    begin
        if (cbbDataBase.ItemIndex = 0) then
        begin
            dmBancos.conConectaMySQL.Catalog  := 'petdb';
            dmBancos.conConectaMySQL.Database := 'petdb';
        end
        else if (cbbDataBase.ItemIndex = 1) then
        begin
            dmBancos.conConectaMySQL.Catalog  := 'solusbridge';
            dmBancos.conConectaMySQL.Database := 'solusbridge';
        end
        else if (cbbDataBase.ItemIndex = 2) then
        begin
            dmBancos.conConectaMySQL.Catalog  := 'solusfinanc';
            dmBancos.conConectaMySQL.Database := 'solusfinanc';
        end;

        dmBancos.conConectaMySQL.Connect;
    end
    else if (cbbServidor.ItemIndex = 2) then
    begin
        if (cbbDataBase.ItemIndex = 0) then
            dmBancos.conConectaSQLite.Database := 'C:\SolusLogger\data\db'
        else if (cbbDataBase.ItemIndex = 1) then
            dmBancos.conConectaSQLite.Database := 'C:\SolusWorker\data\db';

        dmBancos.conConectaSQLite.Connect;
    end;
end;

procedure TfrMainForm.cbbServidorChange(Sender: TObject);
begin
    cbbDataBase.Items.Clear;

    if (cbbServidor.ItemIndex = 0) then
    begin
        cbbDataBase.Items.Add('Estacionamento');
        cbbDataBase.Items.Add('Rodeio');
        cbbDataBase.Items.Add('FastPlay');
        cbbDataBase.Items.Add('Cobrança');

        dmBancos.conConectaFirebird.Protocol := 'firebird';
        dmBancos.conConectaFirebird.Password := 'PSBiosAdmin@2019';
    end
    else if (cbbServidor.ItemIndex = 1) then
    begin
        cbbDataBase.Items.Add('SolusPet');
        cbbDataBase.Items.Add('SolusBridge');
        cbbDataBase.Items.Add('SolusFinanc');
    end
    else if (cbbServidor.ItemIndex = 2) then
    begin
        cbbDataBase.Items.Add('Logger');
        cbbDataBase.Items.Add('Worker');
    end;
end;

procedure TfrMainForm.FormClose(Sender: TObject; var Action: TCloseAction);
begin
    Action := caFree;
end;

procedure TfrMainForm.FormKeyPress(Sender: TObject; var Key: Char);
begin
    if (Key = #27) then
    begin
        Key := #0;

        Close;
    end;

    if (Key = #13) then
    begin
        Key := #0;

        Perform(WM_NEXTDLGCTL, 0, 0);
    end;
end;

procedure TfrMainForm.FormShow(Sender: TObject);
begin
    Caption := 'DataBase Manager - Version ' + VersaoExe;

    atb1.Items[0].Caption := Caption + Spaces(4);
    atb1.Items[1].Caption := Spaces(6) + 'Tela principal' + Spaces(6);

    btExecScript.Enabled := False;

    alsm1.Active := True;

    LimpaObjetos(frMainForm);

    cbbServidor.ItemIndex := -1;
    cbbDataBase.ItemIndex := -1;
    cbbDataBase.Items.Clear;

    dmBancos.conConectaFirebird.Disconnect;
    dmBancos.conConectaMySQL.Disconnect;
    dmBancos.conConectaSQLite.Disconnect;
end;

procedure TfrMainForm.MostraMensagem(iNumero: Integer);
begin
    if (iNumero = 0) then
        Application.MessageBox('NENHUM SERVIDOR FOI SELECIONADO!',
        'ATENÇÃO!', MB_OK + MB_ICONSTOP);

    if (iNumero = 1) then
        Application.MessageBox('NENHUM BANCO DE DADOS FOI SELECIONADO!',
        'ATENÇÃO!', MB_OK + MB_ICONSTOP);

    if (iNumero = 2) then
        Application.MessageBox('NENHUM SCRIPT FOI CARREGADO!',
        'ATENÇÃO!', MB_OK + MB_ICONSTOP);
end;

end.
