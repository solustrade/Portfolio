program DBManager;

uses
  Vcl.Forms,
  MainForm in 'MainForm.pas' {frMainForm},
  ModuloDeDados in 'ModuloDeDados.pas' {dmBancos: TDataModule},
  Funcoes in '..\..\Em execução\Desktop\Solusline\Bridge\Funções\Funcoes.pas',
  WbemScripting_TLB in '..\..\Em execução\Desktop\Solusline\Bridge\Funções\WbemScripting_TLB.pas';

{$R *.res}

begin
  Application.Initialize;
  Application.MainFormOnTaskbar := True;
  Application.CreateForm(TfrMainForm, frMainForm);
  Application.CreateForm(TdmBancos, dmBancos);
  Application.Run;
end.
