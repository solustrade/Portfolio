program DBManager;

uses
  Vcl.Forms,
  MainForm in 'MainForm.pas' {frMainForm},
  ModuloDeDados in 'ModuloDeDados.pas' {dmBancos: TDataModule},
  Funcoes in '..\..\Em execu��o\Desktop\Solusline\Bridge\Fun��es\Funcoes.pas',
  WbemScripting_TLB in '..\..\Em execu��o\Desktop\Solusline\Bridge\Fun��es\WbemScripting_TLB.pas';

{$R *.res}

begin
  Application.Initialize;
  Application.MainFormOnTaskbar := True;
  Application.CreateForm(TfrMainForm, frMainForm);
  Application.CreateForm(TdmBancos, dmBancos);
  Application.Run;
end.
