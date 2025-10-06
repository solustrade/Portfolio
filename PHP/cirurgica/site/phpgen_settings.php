<?php

//  define('SHOW_VARIABLES', 1);
//  define('DEBUG_LEVEL', 1);

//  error_reporting(E_ALL ^ E_NOTICE);
//  ini_set('display_errors', 'On');

set_include_path('.' . PATH_SEPARATOR . get_include_path());


include_once dirname(__FILE__) . '/' . 'components/utils/system_utils.php';

//  SystemUtils::DisableMagicQuotesRuntime();

SystemUtils::SetTimeZoneIfNeed('America/Argentina/Buenos_Aires');

function GetGlobalConnectionOptions()
{
    return array(
  'server' => 'sql5c75d.carrierzone.com',
  'port' => '3306',
  'username' => 'cirurgicad550351',
  'password' => 'ManageWeb@2017',
  'database' => 'phpmy1_cirurgicadivinopolis_com'
);
}

function HasAdminPage()
{
    return false;
}

function GetPageGroups()
{
    $result = array('Default');
    return $result;
}

function GetPageInfos()
{
    $result = array();
    $result[] = array('caption' => 'Categorias', 'short_caption' => 'Categorias', 'filename' => 'categorias.php', 'name' => 'categorias', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Empresa', 'short_caption' => 'Empresa', 'filename' => 'empresa.php', 'name' => 'empresa', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Produtos', 'short_caption' => 'Produtos', 'filename' => 'produtos.php', 'name' => 'produtos', 'group_name' => 'Default', 'add_separator' => false);
    return $result;
}

function GetPagesHeader()
{
    return
    '<script>
  function VoltaPagina() {
    history.back(-2);
  }
</script>

<br>
<div style="background-color: #fff; padding: 10px; border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;">
     <a href="./index.php" target="_self">
        <img src="./images/logo.png" border="0" 
        style="width: 80px; height: 80px;">
     </a>
     <h3>Cir&uacute;rgica Divin&oacute;polis</h3>
</div>
<br>';
}

function GetPagesFooter()
{
    return
        '<button class="btn" type="submit" onclick="VoltaPagina();">Voltar</button>'; 
    }

function ApplyCommonPageSettings(Page $page, Grid $grid)
{
    $page->SetShowUserAuthBar(false);
    $page->OnCustomHTMLHeader->AddListener('Global_CustomHTMLHeaderHandler');
    $page->OnGetCustomTemplate->AddListener('Global_GetCustomTemplateHandler');
    $grid->BeforeUpdateRecord->AddListener('Global_BeforeUpdateHandler');
    $grid->BeforeDeleteRecord->AddListener('Global_BeforeDeleteHandler');
    $grid->BeforeInsertRecord->AddListener('Global_BeforeInsertHandler');
}

/*
  Default code page: 1252
*/
function GetAnsiEncoding() { return 'windows-1252'; }

function Global_CustomHTMLHeaderHandler($page, &$customHtmlHeaderText)
{

}

function Global_GetCustomTemplateHandler($part, $mode, &$result, &$params, Page $page = null)
{

}

function Global_BeforeUpdateHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeDeleteHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function Global_BeforeInsertHandler($page, &$rowData, &$cancel, &$message, $tableName)
{

}

function GetDefaultDateFormat()
{
    return 'Y-m-d';
}

function GetFirstDayOfWeek()
{
    return 0;
}

function GetEnableLessFilesRunTimeCompilation()
{
    return false;
}



?>