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
  'server' => 'localhost',
  'port' => '3306',
  'username' => 'shineray_admin',
  'password' => 'admin@2015',
  'database' => 'shineray_base'
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
    $result[] = array('caption' => 'Produtos', 'short_caption' => 'Produtos', 'filename' => 'produtos.php', 'name' => 'produtos', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Motor', 'short_caption' => 'Motor', 'filename' => 'motor.php', 'name' => 'motor', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Capacidades', 'short_caption' => 'Capacidades', 'filename' => 'capacidades.php', 'name' => 'capacidades', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Chassi', 'short_caption' => 'Chassi', 'filename' => 'chassi.php', 'name' => 'chassi', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Dimensoes', 'short_caption' => 'Dimensoes', 'filename' => 'dimensoes.php', 'name' => 'dimensoes', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Atributos', 'short_caption' => 'Atributos', 'filename' => 'atributos.php', 'name' => 'atributos', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Manual', 'short_caption' => 'Manual', 'filename' => 'manual.php', 'name' => 'manual', 'group_name' => 'Default', 'add_separator' => false);
    $result[] = array('caption' => 'Banner', 'short_caption' => 'Banner', 'filename' => 'banner.php', 'name' => 'banner', 'group_name' => 'Default', 'add_separator' => false);
    return $result;
}

function GetPagesHeader()
{
    return
    '<br>
<img src="../../images/logo.png" border="0" />
<br><br>';
}

function GetPagesFooter()
{
    return
        '<form action="http://www.shineraymotos.com/CPanel">
  <button class="btn" type="submit">Voltar</button>
</form>'; 
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
    return 'd-m-Y';
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