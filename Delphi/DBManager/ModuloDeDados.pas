unit ModuloDeDados;

interface

uses
  System.SysUtils, System.Classes, Data.DB, ZAbstractRODataset,
  ZAbstractDataset, ZDataset, ZAbstractConnection, ZConnection, ZSqlProcessor;

type
  TdmBancos = class(TDataModule)
    conConectaFirebird: TZConnection;
    conConectaMySQL: TZConnection;
    qrMySQL: TZQuery;
    conConectaSQLite: TZConnection;
    qrSQLite: TZQuery;
    qpFirebird: TZSQLProcessor;
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  dmBancos: TdmBancos;

implementation

{%CLASSGROUP 'Vcl.Controls.TControl'}

{$R *.dfm}

end.
