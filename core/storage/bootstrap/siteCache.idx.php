<?php
$c=&$this->config;$c['automatic_alias']="1";$c['auto_menuindex']="1";$c['auto_template_logic']="sibling";$c['blocked_minutes']="60";$c['cache_type']="2";$c['datetime_format']="dd-mm-YYYY";$c['default_template']="3";$c['editor_css_path']="";$c['editor_css_selectors']="";$c['emailsender']="mail@a-sharapov.com";$c['email_sender_method']="1";$c['enable_bindings']="1";$c['error_page']="1";$c['failed_login_attempts']="3";$c['fck_editor_autolang']="0";$c['fck_editor_toolbar']="standard";$c['fe_editor_lang']="ru";$c['friendly_alias_urls']="1";$c['friendly_urls']="1";$c['mail_check_timeperiod']="600";$c['manager_direction']="ltr";$c['manager_language']="ru";$c['manager_layout']="4";$c['manager_theme']="default";$c['modx_charset']="UTF-8";$c['number_of_results']="30";$c['old_template']="";$c['publish_default']="1";$c['remember_last_tab']="1";$c['seostrict']="1";$c['server_offset_time']="0";$c['session.cookie.lifetime']="604800";$c['settings_version']="";$c['show_fullscreen_btn']="0";$c['show_newresource_btn']="0";$c['show_picker']="0";$c['site_id']="628360a5e164f";$c['site_name']="My Evolution Site";$c['site_start']="1";$c['site_status']="1";$c['smtp_autotls']="0";$c['theme_refresher']="";$c['unauthorized_page']="1";$c['upload_maxsize']="10485760";$c['use_alias_path']="1";$c['use_browser']="1";$c['use_captcha']="0";$c['use_editor']="1";$c['warning_visibility']="0";$c['xhtml_urls']="0";$this->aliasListing=array();$a=&$this->aliasListing;$d=&$this->documentListing;$m=&$this->documentMap;$a[1]=array('id'=>1,'alias'=>'index','path'=>'','parent'=>0,'isfolder'=>1,'alias_visible'=>1);$d['index']=1;$m[]=array(0=>1);$c=&$this->contentTypes;$c=&$this->chunkCache;$s=&$this->snippetCache;$p=&$this->pluginCache;$p['CodeMirror']='/**
 * CodeMirror
 *
 * JavaScript library that can be used to create a relatively pleasant editor interface based on CodeMirror 5.33 (released on 21-12-2017)
 *
 * @category    plugin
 * @version     1.5
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @package     evo
 * @internal    @events OnDocFormRender,OnChunkFormRender,OnModFormRender,OnPluginFormRender,OnSnipFormRender,OnTempFormRender,OnRichTextEditorInit
 * @internal    @modx_category Manager and Admin
 * @internal    @properties &theme=Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;default &darktheme=Dark Theme;list;default,ambiance,blackboard,cobalt,eclipse,elegant,erlang-dark,lesser-dark,midnight,monokai,neat,night,one-dark,rubyblue,solarized,twilight,vibrant-ink,xq-dark,xq-light;one-dark &fontSize=Font-size;list;10,11,12,13,14,15,16,17,18;14 &lineHeight=Line-height;list;1,1.1,1.2,1.3,1.4,1.5;1.3 &indentUnit=Indent unit;int;4 &tabSize=The width of a tab character;int;4 &lineWrapping=lineWrapping;list;true,false;true &matchBrackets=matchBrackets;list;true,false;true &activeLine=activeLine;list;true,false;false &emmet=emmet;list;true,false;true &search=search;list;true,false;false &indentWithTabs=indentWithTabs;list;true,false;true &undoDepth=undoDepth;int;200 &historyEventDelay=historyEventDelay;int;1250
 * @internal    @installset base
 * @reportissues https://github.com/evolution-cms/evolution/issues/
 * @documentation Official docs https://codemirror.net/doc/manual.html
 * @author      hansek from http://www.modxcms.cz
 * @author      update Mihanik71
 * @author      update Deesen
 * @author      update 64j
 * @lastupdate  08-01-2018
 */

$_CM_BASE = \'assets/plugins/codemirror/\';

$_CM_URL = MODX_SITE_URL . $_CM_BASE;

require(MODX_BASE_PATH. $_CM_BASE .\'codemirror.plugin.php\');';$p['CodeMirrorProps']='{"theme":"default","darktheme":"one-dark","fontSize":"14","lineHeight":"1.3","indentUnit":"4","tabSize":"4","lineWrapping":"true","matchBrackets":"true","activeLine":"false","emmet":"true","search":"false","indentWithTabs":"true","undoDepth":"200","historyEventDelay":"1250"}';$p['OutdatedExtrasCheck']='/**
 * OutdatedExtrasCheck
 *
 * Check for Outdated critical extras not compatible with EVO 1.4.6
 *
 * @category	plugin
 * @version     1.4.6
 * @license 	http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @package     evo
 * @author      Author: Nicola Lambathakis
 * @internal    @events OnManagerWelcomeHome
 * @internal    @properties &wdgVisibility=Show widget for:;menu;All,AdminOnly,AdminExcluded,ThisRoleOnly,ThisUserOnly;AdminOnly &ThisRole=Run only for this role:;string;;;(role id) &ThisUser=Run only for this user:;string;;;(username)
 * @internal    @modx_category Manager and Admin
 * @internal    @installset base
 * @internal    @disabled 0
 */

require MODX_BASE_PATH . \'assets/plugins/extrascheck/OutdatedExtrasCheck.plugin.php\';';$p['OutdatedExtrasCheckProps']='{"wdgVisibility":"AdminOnly"}';$p['TransAlias']='require MODX_BASE_PATH.\'assets/plugins/transalias/plugin.transalias.php\';';$p['TransAliasProps']='{"table_name":"russian","char_restrict":"lowercase alphanumeric","remove_periods":"No","word_separator":"dash"}';$p['Updater']='require MODX_BASE_PATH.\'assets/plugins/updater/plugin.updater.php\';';$p['UpdaterProps']='{"version":"evolution-cms\\/evolution","wdgVisibility":"All","showButton":"AdminOnly","type":"tags","branch":"develop","stableOnly":"true"}';$p['TinyMCE4']='if (!defined(\'MODX_BASE_PATH\')) { die(\'What are you doing? Get out of here!\'); }

require(MODX_BASE_PATH."assets/plugins/tinymce4/plugin.tinymce.inc.php");';$p['TinyMCE4Props']='{"styleFormats_inline":"InlineTitle,cssClass1|InlineTitle2,cssClass2","styleFormats_block":"BlockTitle,cssClass3|BlockTitle2,cssClass4","entityEncoding":"named","pathOptions":"Site config","resizing":"false","webTheme":"webuser","webButtons1":"bold italic underline strikethrough removeformat alignleft aligncenter alignright","webButtons2":"link unlink image undo redo","webAlign":"ltr","width":"100%","height":"400px","introtextRte":"disabled","inlineMode":"disabled","inlineTheme":"inline","browser_spellcheck":"disabled","paste_as_text":"disabled"}';$e=&$this->pluginEvent;$e['OnChunkFormRender']=array('CodeMirror');$e['OnDocFormRender']=array('CodeMirror');$e['OnInterfaceSettingsRender']=array('TinyMCE4');$e['OnLoadWebDocument']=array('TinyMCE4');$e['OnLoadWebPageCache']=array('TinyMCE4');$e['OnManagerWelcomeHome']=array('OutdatedExtrasCheck','Updater');$e['OnModFormRender']=array('CodeMirror');$e['OnPageNotFound']=array('Updater');$e['OnParseDocument']=array('TinyMCE4');$e['OnPluginFormRender']=array('CodeMirror');$e['OnRichTextEditorInit']=array('CodeMirror','TinyMCE4');$e['OnRichTextEditorRegister']=array('TinyMCE4');$e['OnSiteRefresh']=array('Updater');$e['OnSnipFormRender']=array('CodeMirror');$e['OnStripAlias']=array('TransAlias');$e['OnTempFormRender']=array('CodeMirror');$e['OnWebPagePrerender']=array('TinyMCE4');
