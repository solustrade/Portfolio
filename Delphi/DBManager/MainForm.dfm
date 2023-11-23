object frMainForm: TfrMainForm
  Left = 0
  Top = 0
  BorderIcons = [biSystemMenu]
  BorderStyle = bsSingle
  Caption = 'frMainForm'
  ClientHeight = 612
  ClientWidth = 843
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -13
  Font.Name = 'Tahoma'
  Font.Style = [fsBold]
  KeyPreview = True
  OldCreateOrder = False
  Position = poScreenCenter
  OnClose = FormClose
  OnKeyPress = FormKeyPress
  OnShow = FormShow
  PixelsPerInch = 96
  TextHeight = 16
  object pnChooseDB: TsPanel
    Left = 0
    Top = 0
    Width = 843
    Height = 57
    Align = alTop
    TabOrder = 0
    object sLabel1: TsLabel
      Left = 362
      Top = 20
      Width = 164
      Height = 16
      Caption = 'Defina o banco de dados:'
    end
    object sLabel2: TsLabel
      Left = 48
      Top = 20
      Width = 116
      Height = 16
      Caption = 'Defina o servidor:'
    end
    object cbbDataBase: TsComboBox
      Left = 532
      Top = 17
      Width = 145
      Height = 24
      TabOrder = 0
      OnChange = cbbDataBaseChange
      AutoDropDown = True
      Items.Strings = (
        '')
      Style = csDropDownList
    end
    object cbbServidor: TsComboBox
      Left = 170
      Top = 17
      Width = 145
      Height = 24
      TabOrder = 1
      OnChange = cbbServidorChange
      Items.Strings = (
        'Firebird'
        'MySQL'
        'SQLite')
      Style = csDropDownList
    end
  end
  object mmoSQL: TMemo
    Left = 0
    Top = 57
    Width = 843
    Height = 498
    Align = alClient
    ReadOnly = True
    ScrollBars = ssVertical
    TabOrder = 1
  end
  object pnButtons: TsPanel
    Left = 0
    Top = 555
    Width = 843
    Height = 57
    Align = alBottom
    TabOrder = 2
    object btLoadScript: TsButton
      Left = 10
      Top = 16
      Width = 138
      Height = 25
      Caption = 'Carrega script'
      TabOrder = 0
      OnClick = btLoadScriptClick
    end
    object btExecScript: TsButton
      Left = 154
      Top = 16
      Width = 138
      Height = 25
      Caption = 'Executa script'
      TabOrder = 1
      OnClick = btExecScriptClick
    end
    object btCancela: TsButton
      Left = 720
      Top = 16
      Width = 112
      Height = 25
      Caption = 'Cancela'
      TabOrder = 2
      OnClick = btCancelaClick
    end
  end
  object alsm1: TsSkinManager
    ButtonsOptions.OldGlyphsMode = True
    Active = False
    InternalSkins = <>
    SkinDirectory = 'data\skin'
    SkinName = 'Deep'
    SkinInfo = 'N/A'
    ThirdParty.ThirdEdits = ' '
    ThirdParty.ThirdButtons = 'TButton'
    ThirdParty.ThirdBitBtns = ' '
    ThirdParty.ThirdCheckBoxes = ' '
    ThirdParty.ThirdGroupBoxes = ' '
    ThirdParty.ThirdListViews = ' '
    ThirdParty.ThirdPanels = ' '
    ThirdParty.ThirdGrids = ' '
    ThirdParty.ThirdTreeViews = ' '
    ThirdParty.ThirdComboBoxes = ' '
    ThirdParty.ThirdWWEdits = ' '
    ThirdParty.ThirdVirtualTrees = ' '
    ThirdParty.ThirdGridEh = ' '
    ThirdParty.ThirdPageControl = ' '
    ThirdParty.ThirdTabControl = ' '
    ThirdParty.ThirdToolBar = ' '
    ThirdParty.ThirdStatusBar = ' '
    ThirdParty.ThirdSpeedButton = ' '
    ThirdParty.ThirdScrollControl = ' '
    ThirdParty.ThirdUpDown = ' '
    ThirdParty.ThirdScrollBar = ' '
    ThirdParty.ThirdStaticText = ' '
    ThirdParty.ThirdNativePaint = ' '
    Left = 800
    Top = 16
  end
  object atb1: TsTitleBar
    Items = <
      item
        FontData.Font.Charset = DEFAULT_CHARSET
        FontData.Font.Color = clWindowText
        FontData.Font.Height = -11
        FontData.Font.Name = 'Tahoma'
        FontData.Font.Style = []
        Height = 16
        Width = 16
        Index = 0
        Name = 'TacTitleBarItem'
      end
      item
        FontData.Font.Charset = DEFAULT_CHARSET
        FontData.Font.Color = clWindowText
        FontData.Font.Height = -11
        FontData.Font.Name = 'Tahoma'
        FontData.Font.Style = []
        Height = 16
        Width = 16
        Index = 1
        Name = 'TacTitleBarItem'
      end>
    Left = 800
    Top = 64
  end
  object odScript: TOpenDialog
    Left = 800
    Top = 112
  end
end
