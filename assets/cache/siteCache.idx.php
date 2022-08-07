<?php
$c=&$this->config;$c['settings_version']="";$c['manager_theme']="default";$c['server_offset_time']="0";$c['manager_language']="russian-UTF8";$c['modx_charset']="UTF-8";$c['site_name']="My Evolution Site";$c['site_start']="1";$c['error_page']="1";$c['unauthorized_page']="1";$c['site_status']="1";$c['auto_template_logic']="sibling";$c['default_template']="3";$c['old_template']="";$c['publish_default']="1";$c['friendly_urls']="1";$c['friendly_alias_urls']="1";$c['use_alias_path']="1";$c['cache_type']="2";$c['failed_login_attempts']="3";$c['blocked_minutes']="60";$c['use_captcha']="0";$c['emailsender']="mail@a-sharapov.com";$c['use_editor']="1";$c['use_browser']="1";$c['fe_editor_lang']="russian-UTF8";$c['fck_editor_toolbar']="standard";$c['fck_editor_autolang']="0";$c['editor_css_path']="";$c['editor_css_selectors']="";$c['upload_maxsize']="10485760";$c['manager_layout']="4";$c['auto_menuindex']="1";$c['session.cookie.lifetime']="604800";$c['mail_check_timeperiod']="600";$c['manager_direction']="ltr";$c['xhtml_urls']="0";$c['automatic_alias']="1";$c['datetime_format']="dd-mm-YYYY";$c['warning_visibility']="0";$c['remember_last_tab']="1";$c['enable_bindings']="1";$c['seostrict']="1";$c['number_of_results']="30";$c['theme_refresher']="";$c['show_picker']="0";$c['show_newresource_btn']="0";$c['show_fullscreen_btn']="0";$c['email_sender_method']="1";$c['site_id']="62efd262d855a";$this->aliasListing=array();$a=&$this->aliasListing;$d=&$this->documentListing;$m=&$this->documentMap;$a[1]=array('id'=>1,'alias'=>'minimal-base','path'=>'','parent'=>0,'isfolder'=>0,'alias_visible'=>1);$d['minimal-base']=1;$m[]=array(0=>1);$c=&$this->contentTypes;$c=&$this->chunkCache;$s=&$this->snippetCache;$s['DocInfo']='return require MODX_BASE_PATH.\'assets/snippets/docinfo/snippet.docinfo.php\';';$s['DocLister']='return require MODX_BASE_PATH.\'assets/snippets/DocLister/snippet.DocLister.php\';';$s['if']='return require MODX_BASE_PATH.\'assets/snippets/if/snippet.if.php\';';$p=&$this->pluginCache;$p['CodeMirror']='/**
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

$_CM_URL = $modx->config[\'site_url\'] . $_CM_BASE;

require(MODX_BASE_PATH. $_CM_BASE .\'codemirror.plugin.php\');';$p['CodeMirrorProps']='{"theme":"default","darktheme":"one-dark","fontSize":"14","lineHeight":"1.3","indentUnit":"4","tabSize":"4","lineWrapping":"true","matchBrackets":"true","activeLine":"false","emmet":"true","search":"false","indentWithTabs":"true","undoDepth":"200","historyEventDelay":"1250"}';$p['ElementsInTree']='require MODX_BASE_PATH.\'assets/plugins/elementsintree/plugin.elementsintree.php\';';$p['ElementsInTreeProps']='{"adminRoleOnly":"yes","treeButtonsInTab":"yes"}';$p['FileSource']='require MODX_BASE_PATH.\'assets/plugins/filesource/plugin.filesource.php\';';$p['Forgot Manager Login']='require MODX_BASE_PATH.\'assets/plugins/forgotmanagerlogin/plugin.forgotmanagerlogin.php\';';$p['ManagerManager']='/**
 * ManagerManager
 *
 * Customize the EVO Manager to offer bespoke admin functions for end users or manipulate the display of document fields in the manager.
 *
 * @category plugin
 * @version 0.6.3
 * @license http://creativecommons.org/licenses/GPL/2.0/ GNU Public License (GPL v2)
 * @internal @properties &remove_deprecated_tv_types_pref=Remove deprecated TV types;list;yes,no;yes &config_chunk=Configuration Chunk;text;mm_rules
 * @internal @events OnDocFormRender,OnDocFormPrerender,OnBeforeDocFormSave,OnDocFormSave,OnDocDuplicate,OnPluginFormRender,OnTVFormRender
 * @internal @modx_category Manager and Admin
 * @internal @installset base
 * @internal @legacy_names Image TV Preview, Show Image TVs
 * @reportissues https://github.com/DivanDesign/MODXEvo.plugin.ManagerManager/
 * @documentation README [+site_url+]assets/plugins/managermanager/readme.html
 * @documentation Official docs http://code.divandesign.biz/modx/managermanager
 * @link        Latest version http://code.divandesign.biz/modx/managermanager
 * @link        Additional tools http://code.divandesign.biz/modx
 * @link        Full changelog http://code.divandesign.biz/modx/managermanager/changelog
 * @author      Inspired by: HideEditor plugin by Timon Reinhard and Gildas; HideManagerFields by Brett @ The Man Can!
 * @author      DivanDesign studio http://www.DivanDesign.biz
 * @author      Nick Crossland http://www.rckt.co.uk
 * @author      Many others
 * @lastupdate  22/01/2018
 */

// Run the main code
include($modx->config[\'base_path\'].\'assets/plugins/managermanager/mm.inc.php\');';$p['ManagerManagerProps']='{"remove_deprecated_tv_types_pref":"yes","config_chunk":"mm_rules"}';$p['OutdatedExtrasCheck']='/**
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

require MODX_BASE_PATH . \'assets/plugins/extrascheck/OutdatedExtrasCheck.plugin.php\';';$p['OutdatedExtrasCheckProps']='{"wdgVisibility":"AdminOnly"}';$p['TinyMCE4']='/**
 * TinyMCE4
 *
 * Javascript rich text editor
 *
 * @category    plugin
 * @version     4.9.11
 * @license     http://www.gnu.org/copyleft/gpl.html GNU Public License (GPL)
 * @internal    @properties &styleFormats=Custom Style Formats <b>RAW</b><br/><br/><ul><li>leave empty to use below block/inline formats</li><li>allows simple-format: <i>Title,cssClass|Title2,cssClass2</i></li><li>Also accepts full JSON-config as per TinyMCE4 docs / configure / content-formating / style_formats</li></ul>;textarea; &styleFormats_inline=Custom Style Formats <b>INLINE</b><br/><br/><ul><li>will wrap selected text with span-tag + css-class</li><li>simple-format only</li></ul>;textarea;InlineTitle,cssClass1|InlineTitle2,cssClass2 &styleFormats_block=Custom Style Formats <b>BLOCK</b><br/><br/><ul><li>will add css-class to selected block-element</li><li>simple-format only</li></ul>;textarea;BlockTitle,cssClass3|BlockTitle2,cssClass4 &customParams=Custom Parameters<br/><b>(Be careful or leave empty!)</b>;textarea; &entityEncoding=Entity Encoding;list;named,numeric,raw;named &entities=Entities;text; &pathOptions=Path Options;list;Site config,Absolute path,Root relative,URL,No convert;Site config &resizing=Advanced Resizing;list;true,false;false &disabledButtons=Disabled Buttons;text; &webTheme=Web Theme;test;webuser &webPlugins=Web Plugins;text; &webButtons1=Web Buttons 1;text;bold italic underline strikethrough removeformat alignleft aligncenter alignright &webButtons2=Web Buttons 2;text;link unlink image undo redo &webButtons3=Web Buttons 3;text; &webButtons4=Web Buttons 4;text; &webAlign=Web Toolbar Alignment;list;ltr,rtl;ltr &width=Width;text;100% &height=Height;text;400px &introtextRte=<b>Introtext RTE</b><br/>add richtext-features to "introtext";list;enabled,disabled;disabled &inlineMode=<b>Inline-Mode</b>;list;enabled,disabled;disabled &inlineTheme=<b>Inline-Mode</b><br/>Theme;text;inline &browser_spellcheck=<b>Browser Spellcheck</b><br/>At least one dictionary must be installed inside your browser;list;enabled,disabled;disabled &paste_as_text=<b>Force Paste as Text</b>;list;enabled,disabled;disabled
 * @internal    @events OnLoadWebDocument,OnParseDocument,OnWebPagePrerender,OnLoadWebPageCache,OnRichTextEditorRegister,OnRichTextEditorInit,OnInterfaceSettingsRender
 * @internal    @modx_category Manager and Admin
 * @internal    @legacy_names TinyMCE Rich Text Editor
 * @internal    @installset base
 * @logo        /assets/plugins/tinymce4/tinymce/logo.png
 * @reportissues https://github.com/extras-evolution/tinymce4-for-modx-evo
 * @documentation Plugin docs https://github.com/extras-evolution/tinymce4-for-modx-evo
 * @documentation Official TinyMCE4-docs https://www.tinymce.com/docs/
 * @author      Deesen
 * @lastupdate  2018-01-17
 */
if (!defined(\'MODX_BASE_PATH\')) { die(\'What are you doing? Get out of here!\'); }

require(MODX_BASE_PATH."assets/plugins/tinymce4/plugin.tinymce.inc.php");';$p['TinyMCE4Props']='{"styleFormats_inline":"InlineTitle,cssClass1|InlineTitle2,cssClass2","styleFormats_block":"BlockTitle,cssClass3|BlockTitle2,cssClass4","entityEncoding":"named","pathOptions":"Site config","resizing":"false","webTheme":"webuser","webButtons1":"bold italic underline strikethrough removeformat alignleft aligncenter alignright","webButtons2":"link unlink image undo redo","webAlign":"ltr","width":"100%","height":"400px","introtextRte":"disabled","inlineMode":"disabled","inlineTheme":"inline","browser_spellcheck":"disabled","paste_as_text":"disabled"}';$p['TransAlias']='require MODX_BASE_PATH.\'assets/plugins/transalias/plugin.transalias.php\';';$p['TransAliasProps']='{"table_name":"russian","char_restrict":"lowercase alphanumeric","remove_periods":"No","word_separator":"dash"}';$p['Updater']='require MODX_BASE_PATH.\'assets/plugins/updater/plugin.updater.php\';';$p['UpdaterProps']='{"version":"evolution-cms\\/evolution","wdgVisibility":"All","showButton":"AdminOnly","type":"tags","branch":"develop","stableOnly":"true"}';$e=&$this->pluginEvent;$e['OnBeforeDocFormSave']=array('ManagerManager');$e['OnBeforeManagerLogin']=array('Forgot Manager Login');$e['OnBeforePluginFormSave']=array('FileSource');$e['OnBeforeSnipFormSave']=array('FileSource');$e['OnChunkFormDelete']=array('ElementsInTree');$e['OnChunkFormRender']=array('CodeMirror');$e['OnChunkFormSave']=array('ElementsInTree');$e['OnDocDuplicate']=array('ManagerManager');$e['OnDocFormPrerender']=array('ManagerManager');$e['OnDocFormRender']=array('CodeMirror','ManagerManager');$e['OnDocFormSave']=array('ManagerManager');$e['OnInterfaceSettingsRender']=array('TinyMCE4');$e['OnLoadWebDocument']=array('TinyMCE4');$e['OnLoadWebPageCache']=array('TinyMCE4');$e['OnManagerAuthentication']=array('Forgot Manager Login');$e['OnManagerLoginFormRender']=array('Forgot Manager Login');$e['OnManagerMainFrameHeaderHTMLBlock']=array('ElementsInTree');$e['OnManagerTreePrerender']=array('ElementsInTree');$e['OnManagerTreeRender']=array('ElementsInTree');$e['OnManagerWelcomeHome']=array('OutdatedExtrasCheck','Updater');$e['OnModFormDelete']=array('ElementsInTree');$e['OnModFormRender']=array('CodeMirror');$e['OnModFormSave']=array('ElementsInTree');$e['OnPageNotFound']=array('Updater');$e['OnParseDocument']=array('TinyMCE4');$e['OnPluginFormDelete']=array('ElementsInTree');$e['OnPluginFormPrerender']=array('FileSource');$e['OnPluginFormRender']=array('CodeMirror','FileSource','ManagerManager');$e['OnPluginFormSave']=array('ElementsInTree');$e['OnRichTextEditorInit']=array('CodeMirror','TinyMCE4');$e['OnRichTextEditorRegister']=array('TinyMCE4');$e['OnSiteRefresh']=array('Updater');$e['OnSnipFormDelete']=array('ElementsInTree');$e['OnSnipFormPrerender']=array('FileSource');$e['OnSnipFormRender']=array('CodeMirror','FileSource');$e['OnSnipFormSave']=array('ElementsInTree');$e['OnStripAlias']=array('TransAlias');$e['OnTempFormDelete']=array('ElementsInTree');$e['OnTempFormRender']=array('CodeMirror');$e['OnTempFormSave']=array('ElementsInTree');$e['OnTVFormDelete']=array('ElementsInTree');$e['OnTVFormRender']=array('ManagerManager');$e['OnTVFormSave']=array('ElementsInTree');$e['OnWebPagePrerender']=array('TinyMCE4');
