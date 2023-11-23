object dmBancos: TdmBancos
  OldCreateOrder = False
  Height = 488
  Width = 615
  object conConectaFirebird: TZConnection
    ControlsCodePage = cCP_UTF16
    Catalog = ''
    HostName = ''
    Port = 0
    Database = ''
    User = 'sysdba'
    Password = 'PSBiosAdmin@2019'
    Protocol = 'firebird'
    Left = 48
    Top = 16
  end
  object conConectaMySQL: TZConnection
    ControlsCodePage = cCP_UTF16
    Catalog = ''
    HostName = 'localhost'
    Port = 3306
    Database = ''
    User = 'userdatasec'
    Password = 'psbiosits2017r10'
    Protocol = 'mysqld-5'
    LibraryLocation = 'libmysql.dll'
    Left = 160
    Top = 16
  end
  object qrMySQL: TZQuery
    Connection = conConectaMySQL
    Params = <>
    Left = 160
    Top = 64
  end
  object conConectaSQLite: TZConnection
    ControlsCodePage = cCP_UTF16
    Catalog = ''
    HostName = ''
    Port = 0
    Database = ''
    User = ''
    Password = ''
    Protocol = 'sqlite-3'
    LibraryLocation = 'db.dll'
    Left = 272
    Top = 16
  end
  object qrSQLite: TZQuery
    Connection = conConectaSQLite
    Params = <>
    Left = 272
    Top = 64
  end
  object qpFirebird: TZSQLProcessor
    Params = <>
    Connection = conConectaFirebird
    Delimiter = ';'
    Left = 48
    Top = 64
  end
end
